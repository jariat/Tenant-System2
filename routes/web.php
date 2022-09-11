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
Route::resource('tenant','App\Http\Controllers\TenantController');
Route::resource('contract','App\Http\Controllers\ContractController');
Route::resource('house','App\Http\Controllers\HouseController');
Route::resource('payment','App\Http\Controllers\PaymentController');
Route::resource('user','App\Http\Controllers\UserController');
Route::resource('order','App\Http\Controllers\orderController');
Route::resource('dashboards','App\Http\Controllers\DashboardController');
Route::get('/', function () {
    return view('welcome');
});
Route::resource('dashboard','App\Http\Controllers\DashboardController');

require __DIR__.'/auth.php';
