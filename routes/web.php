<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReciboController;


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

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/menu',[MenuController::class,'menu']);
Route::get('/menu/platillo/{id}',[MenuController::class,'show']);
Route::get('view-category/{nombre_categoria}',[CategoriaController::class,'viewcategory']);
// Route::get('/categoria/{nombre_categoria}',[MenuController::class,'filtrar'])->name('menu.filtrado');
Route::post('/menu/ingresar/pedido',[PedidoController::class, 'store']);
Route::get('/menu/mostrar/{id}',[PedidoController::class,'pedidoexist']);
// Route::get('/tableplatos', [MenuController::class,'index']);
Route::resource('/tableplatos','App\Http\Controllers\MenuController');
Route::post('/tableplatos/addcategoria',[MenuController::class, 'addcategoria']);
Route::post('/tableplatos/editcategoria',[MenuController::class, 'editcategoria']);
// Route::resource('/tableplatos', MenuController::class);
// Route::get('/addplato', function () {
//     return view('menu.addplato');
// });

// Route::get('/reservacion', [ReservacionController::class,'index']);
Route::resource('/reservacion','App\Http\Controllers\ReservacionController');



Route::get('/ventas', function () {
    return view('ventas.ventas');
});

Route::get('/menu/pruebas', function () {
    return view('menu.pruebas');
});

Route::get('/carrito', function () {
    return view('menu.carrito');
});

Route::resource('/clientes','App\Http\Controllers\ClienteController');
Route::resource('/pedidos','App\Http\Controllers\PedidoController');
Route::resource('/recibos','App\Http\Controllers\ReciboController');
Route::get('/recibos/detalles/{id}',[ReciboController::class,'detalles']);
// Route::get('/recibos/tipo_pago/{id}',[ReciboController::class,'edit']);

// Route::get('/clientes',[ClienteController::class,'index']);
Route::get('/inicio',[ClienteController::class,'inicio']);

Route::get('/usuarios',[UsuarioController::class,'index']);



Route::get('registrar',[UsuarioController::class,'createout']);

Route::post('registrar/guardar',[UsuarioController::class,'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('inicio'); 
})->name('inicio');

Route::middleware(['auth:sanctum', 'verified'])->group(function () { 

});

// Route::get('clientes/editar/{id}',[ClienteController::class, 'edit'] );