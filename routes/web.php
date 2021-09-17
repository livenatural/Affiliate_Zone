<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
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

Route::prefix('/')->group(function () {
    Route::get('login', [LoginController::class, 'UserLogin']);
    Route::post('login', [LoginController::class, 'UserLoginPost']);
    Route::get('/', [ProductController::class, 'UserProducts']);
    Route::get('logout', [LogoutController::class, 'UserLogout']);
});

Route::prefix('owner')->group(function () {

    //ROUTES WITHOUT MIDDLEWARE
    Route::get('login', [LoginController::class, 'OwnerLogin']);
    Route::post('login', [LoginController::class, 'OwnerLoginPost']);

    //ROUTES WITH MIDDLEWARE
    Route::middleware(['owner'])->group(function () {

        //ALL OWNER ROUTES
        Route::get('dashboard', [DashboardController::class, 'OwnerDashboard']);
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'OwnerProductList']);
            Route::get('new', [ProductController::class, 'NewOwnerProduct']);
            Route::post('new', [ProductController::class, 'NewOwnerProductPost']);
            Route::get('{id}/edit', [ProductController::class, 'OwnerProductEdit']);
            Route::post('{id}/edit', [ProductController::class, 'OwnerProductEditPost']);
            Route::get('{id}/delete', [ProductController::class, 'OwnerProductDelete']);
        });
        Route::prefix('users')->group(function () {
            Route::get('/', [UsersController::class, 'OwnerUsers']);
            Route::get('{id}/block', [UsersController::class, 'OwnerUsersBlock']);
        });
        Route::get('logout', [LogoutController::class, 'OwnerLogout']);
    });
});
