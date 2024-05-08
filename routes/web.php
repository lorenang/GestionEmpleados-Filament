<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SucursalController;

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
    return view('welcome');
});

route::get('sucursales', [SucursalController::class, 'index']);
route::post('sucursal', [SucursalController::class, 'store']);
route::get('sucursal/{sucursal}', [SucursalController::class, 'show']);
route::put('sucursal/{sucursal}', [SucursalController::class, 'update']);
route::delete('sucursal/{sucursal}', [SucursalController::class, 'destroy']);
