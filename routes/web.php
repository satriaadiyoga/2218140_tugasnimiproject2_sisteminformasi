<?php

use App\Http\Controllers\datadokterController;
use App\Http\Controllers\pasienController;
use App\Http\Controllers\userController;
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

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('dokter', datadokterController::class);

Route::resource('pasien', pasienController::class);

Route::resource('user', userController::class);