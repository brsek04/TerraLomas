<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Menu;
use App\Models\Dish;
use App\Models\DishType;
use App\Models\Beverage;
use App\Models\BeverageType;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
            'totalDishes'
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
}
