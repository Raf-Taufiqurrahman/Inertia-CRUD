<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;

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
    return Inertia::render('Auth/Login');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', DashboardController::class);
    Route::resource('/customer', CustomerController::class)->except('show');
    Route::resource('/product', ProductController::class)->except('show');
    Route::resource('/order', OrderController::class);
});
