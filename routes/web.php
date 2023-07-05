<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Permiso;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\Roles;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('permisos', Permiso::class);
Route::resource('rol', Roles::class);
Route::resource('empresa', EmpresaController::class);
Route::resource('venta', VentaController::class);

Route::get('rol/{role}/assign-permissions', [Roles::class, 'assignPermissions'])->name('rol.assign_permissions');
Route::put('rol/{role}/update-permissions', [Roles::class, 'updatePermissions'])->name('rol.update_permissions');

Route::get('user/{user}/assign-role', [UserController::class, 'assignRole'])->name('user.assign_role');
Route::put('user/{user}/update-role', [UserController::class, 'updateRole'])->name('user.update_role');



Route::get('notaVenta{id}', [VentaController::class, 'notaVenta'])->name('notaVenta');
Route::get('notaCompra{id}', [CompraController::class, 'notaCompra'])->name('notaCompra');
Route::resource('user',UserController::class);
Route::resource('producto', ProductoController::class);
Route::resource('categoria', CategoriaController::class);
Route::resource('marca',MarcaController::class);
Route::resource('stock',StockController::class);
Route::resource('proveedor',ProveedorController::class);
Route::resource('compra', CompraController::class);
Route::resource('carrito', CarritoController::class)->except(['update']);
Route::put('carrito$carrito', [CarritoController::class, 'update'])->name('carrito.update');

Route::resource('pedido', PedidoController::class)->except(['update']);
// Route::put('pedido$pedido', [PedidoController::class, 'update'])->name('.update');
