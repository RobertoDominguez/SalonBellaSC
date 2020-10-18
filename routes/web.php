<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\UserController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;


Route::get('/login',[UserController::class,'getLogin'])->name('login');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/',[ReserveController::class,'sucursal1'])->name('sucursal1');
Route::get('/centro',[ReserveController::class,'sucursal2'])->name('sucursal2');
Route::get('/centenario',[ReserveController::class,'sucursal3'])->name('sucursal3');

//products
Route::get('/productos',[ProductController::class,'index'])->name('products.index');
Route::get('/agregar_producto',[ProductController::class,'create'])->name('products.create');
Route::post('/agregar_producto',[ProductController::class,'store'])->name('products.store');

Route::get('/editar_producto/{product}',[ProductController::class,'edit'])->name('products.edit');
Route::post('/editar_producto/{product}',[ProductController::class,'update'])->name('products.update');
Route::post('/eliminar_producto/{product}',[ProductController::class,'destroy'])->name('products.destroy');

//services
Route::get('/servicios',[ServiceController::class,'index'])->name('services.index');
Route::get('/agregar_servicio',[ServiceController::class,'create'])->name('services.create');
Route::post('/agregar_servicio',[ServiceController::class,'store'])->name('services.store');

Route::get('/editar_servicio/{service}',[ServiceController::class,'edit'])->name('services.edit');
Route::post('/editar_servicio/{service}',[ServiceController::class,'update'])->name('services.update');
Route::post('/eliminar_servicio/{service}',[ServiceController::class,'destroy'])->name('services.destroy');

//reserves
Route::post('/eliminar_servicio1/{reserve}',[ReserveController::class,'destroy1'])->name('reserves1.destroy');
Route::post('/eliminar_servicio2/{reserve}',[ReserveController::class,'destroy2'])->name('reserves2.destroy');
Route::post('/eliminar_servicio3/{reserve}',[ReserveController::class,'destroy3'])->name('reserves3.destroy');
