<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Branch;
use App\Models\Menu;
use App\Models\Dish;
use App\Models\DishType;
use App\Models\Beverage;
use App\Models\BeverageType;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Muestra el panel de administración.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();

        // Obtén todos los roles
        $roles = Role::all();

        // Crea un array para almacenar el conteo de usuarios por rol
        $userCountsByRole = [];

        // Recorre cada rol y cuenta los usuarios que tienen ese rol
        foreach ($roles as $role) {
            $userCountsByRole[$role->name] = User::role($role->name)->count();
        }

        // Cuenta los usuarios que no tienen roles
        $userCountsByRole['clientes'] = User::doesntHave('roles')->count();

        // Obtener los datos necesarios para los gráficos
        $branchCount = Branch::count();
        $menuCount = Menu::count();
        $dishCount = Dish::count();
        $beverageCount = Beverage::count();

        $dishesByType = DishType::withCount('dishes')->get();
        $beveragesByType = BeverageType::withCount('beverages')->get();

        // Obtener el total de usuarios y platos
        $totalUsers = User::count();
        $totalDishes = Dish::count(); // Aquí deberías obtener el total de platos según tu lógica

        // Obtener todos los platos vendidos
        $allDishes = DB::table('dishes_in_order')
            ->select('dish_id', DB::raw('SUM(quantity) as total'))
            ->groupBy('dish_id')
            ->get();

        $allDishesData = [];
        foreach ($allDishes as $dish) {
            $dishName = Dish::findOrFail($dish->dish_id)->name;
            $allDishesData[$dishName] = $dish->total;
        }

        // Obtener todas las bebidas vendidas
        $allBeverages = DB::table('beverages_in_order')
            ->select('beverage_id', DB::raw('SUM(quantity) as total'))
            ->groupBy('beverage_id')
            ->get();

        $allBeveragesData = [];
        foreach ($allBeverages as $beverage) {
            $beverageName = Beverage::findOrFail($beverage->beverage_id)->name;
            $allBeveragesData[$beverageName] = $beverage->total;
        }

        // Definir el rango de tiempo para la consulta
        $dateRange = Carbon::now()->subWeek(); // Cambia esto a ->subDays(30) para el último mes, ->subDays(7) para la última semana, etc.

        $totalOrdersLastMonth = Order::where('created_at', '>=', $dateRange)->count();

        $topUsersLastMonth = Order::select('user_id', DB::raw('count(*) as order_count'))
            ->where('created_at', '>=', $dateRange)
            ->groupBy('user_id')
            ->orderBy('order_count', 'desc')
            ->take(5)
            ->with('user')
            ->get();

        $topDishesLastMonth = DB::table('dishes_in_order')
            ->join('orders', 'dishes_in_order.order_id', '=', 'orders.id')
            ->select('dish_id', DB::raw('SUM(dishes_in_order.quantity) as total'))
            ->where('orders.created_at', '>=', $dateRange)
            ->groupBy('dish_id')
            ->orderBy('total', 'desc')
            ->take(3)
            ->get()
            ->map(function ($dish) {
                $dish->name = Dish::find($dish->dish_id)->name;
                return $dish;
            });

        $topBeveragesLastMonth = DB::table('beverages_in_order')
            ->join('orders', 'beverages_in_order.order_id', '=', 'orders.id')
            ->select('beverage_id', DB::raw('SUM(beverages_in_order.quantity) as total'))
            ->where('orders.created_at', '>=', $dateRange)
            ->groupBy('beverage_id')
            ->orderBy('total', 'desc')
            ->take(3)
            ->get()
            ->map(function ($beverage) {
                $beverage->name = Beverage::find($beverage->beverage_id)->name;
                return $beverage;
            });

        // Calcular ganancias de platos
        $totalDishEarnings = DB::table('dishes_in_order')
            ->join('orders', 'dishes_in_order.order_id', '=', 'orders.id')
            ->join('dishes', 'dishes_in_order.dish_id', '=', 'dishes.id')
            ->where('orders.created_at', '>=', $dateRange)
            ->select(DB::raw('SUM(dishes_in_order.quantity * dishes.price) as total_earnings'))
            ->value('total_earnings');

        // Calcular ganancias de bebidas
        $totalBeverageEarnings = DB::table('beverages_in_order')
            ->join('orders', 'beverages_in_order.order_id', '=', 'orders.id')
            ->join('beverages', 'beverages_in_order.beverage_id', '=', 'beverages.id')
            ->where('orders.created_at', '>=', $dateRange)
            ->select(DB::raw('SUM(beverages_in_order.quantity * beverages.price) as total_earnings'))
            ->value('total_earnings');

        // Calcular ganancias totales
        $totalEarnings = $totalDishEarnings + $totalBeverageEarnings;

        return view('admin', compact(
            'branches',
            'userCountsByRole',
            'branchCount',
            'menuCount',
            'dishCount',
            'beverageCount',
            'dishesByType',
            'beveragesByType',
            'totalUsers',
            'totalDishes',
            'allDishesData',
            'allBeveragesData',
            'totalOrdersLastMonth',
            'topUsersLastMonth',
            'topDishesLastMonth',
            'topBeveragesLastMonth',
            'totalDishEarnings',
            'totalBeverageEarnings',
            'totalEarnings'
        ));
    }

    /**
     * Display the menus of a specific branch for visitors.
     *
     * @param  int  $branchId
     * @return \Illuminate\Http\Response
     */
    public function showBranchMenus($branchId)
    {
        $branch = Branch::findOrFail($branchId);
        $menus = $branch->menus()->get();
        return view('branchMenus', compact('branch', 'menus'));
    }
    public function report(Request $request)
    {
        // Obtener las fechas del formulario
        $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
        $endDate = Carbon::parse($request->input('end_date'))->endOfDay();

        // Calcular ganancias de platos
        $totalDishEarnings = DB::table('dishes_in_order')
            ->join('orders', 'dishes_in_order.order_id', '=', 'orders.id')
            ->join('dishes', 'dishes_in_order.dish_id', '=', 'dishes.id')
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->select(DB::raw('SUM(dishes_in_order.quantity * dishes.price) as total_earnings'))
            ->value('total_earnings');

        // Calcular ganancias de bebidas
        $totalBeverageEarnings = DB::table('beverages_in_order')
            ->join('orders', 'beverages_in_order.order_id', '=', 'orders.id')
            ->join('beverages', 'beverages_in_order.beverage_id', '=', 'beverages.id')
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->select(DB::raw('SUM(beverages_in_order.quantity * beverages.price) as total_earnings'))
            ->value('total_earnings');

        // Calcular ganancias totales
        $totalEarnings = $totalDishEarnings + $totalBeverageEarnings;

        return view('report', compact('totalDishEarnings', 'totalBeverageEarnings', 'totalEarnings', 'startDate', 'endDate'));
    }

}
