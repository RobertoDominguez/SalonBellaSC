<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;

Route::post('/nueva_reserva',[ReserveController::class,'store']);

Route::post('/productos',[ProductController::class,'all']);
Route::post('/servicios',[ServiceController::class,'all']);

Route::post('/horas_reservadas',[ReserveController::class,'horasReservadas']);