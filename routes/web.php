<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DishTypeController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\BeverageTypeController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;

use App\Http\Controllers\FuncionarioController;

use App\Http\Controllers\ReservaController;

use App\Http\Controllers\MesaController;

use App\Http\Controllers\UserActionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome Routes
Route::get('/visitante', [VisitanteController::class, 'index'])->name('visitante.index');
Route::redirect('/', '/visitante');

Route::get('/branch/{branch}/menus', [VisitanteController::class, 'showBranchMenus'])->name('branch.menus');

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Menu Routes
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

Route::get('/menus/{menu}/public', [MenuController::class, 'showPublic'])->name('menus.showPublic');
Route::get('/menus/{menu}/shop', [CartController::class, 'shop'])->name('menus.shop');

// Post Routes
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::resource('reservas', ReservaController::class);
Route::get('/branch/{branch}/reservas', [ReservaController::class, 'reservasPorBranch'])->name('branch.reservas');
Route::get('/branch/{branch_id}/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');



Route::resource('mesas', MesaController::class);

Route::get('/user-profile', [UserActionController::class, 'index'])->name('user-profile');
Route::get('/all-reservations', [UserActionController::class, 'allReservations'])->name('all-reservations');
Route::put('/reservas/rechazar/{id}', [UserActionController::class, 'rechazar'])->name('reservas.rechazar');



// Authentication Routes
Auth::routes();

// Protected Routes
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('dish-types', DishTypeController::class);
    Route::resource('dishes', DishController::class);
    Route::resource('beverage-types', BeverageTypeController::class);
    Route::resource('beverages', BeverageController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('abouts', AboutController::class);
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('report', [AdminController::class, 'report'])->name('admin.report');
    Route::get('generate-pdf', [AdminController::class, 'generateTCPDF'])->name('admin.generatePDF');
    Route::get('order-history', [AdminController::class, 'orderHistory'])->name('order.history');
    Route::post('/roles', [RolController::class, 'store'])->name('roles.store');    
    

    Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
    Route::get('/funcionarios/{id}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
    Route::post('/funcionarios/{id}/document', [FuncionarioController::class, 'storeDocument'])->name('funcionarios.storeDocument');

    


});

// Cart Routes
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

//Route::get('/menus/{menu}/shop', 'MenuController@showShop')->name('menus.shop');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


// Shop Routes
Route::get('/shop/{menuId}', [CartController::class, 'shop'])->name('shop.index');
Route::get('/shop/{menuId}/filter', [CartController::class, 'filter'])->name('shop.filter');

Route::get('/qr/{qrCodePath}', 'CartController@qrCode')->name('qr');

