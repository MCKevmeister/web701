<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TokenController;
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


Route::inertia('/', 'Home');

Route::group(['middleware' => ['web', 'auth:sanctum', 'verified']], function () {
    Route::get('/admin', [AccountController::class, 'index']);
});

Route::inertia('/account', 'AccountDetails');

Route::controller(ProductController::class)
    ->middleware('web')
    ->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/{product}', 'show');
    });

Route::controller(LoginController::class)
    ->middleware('web')
    ->group(function () {
        Route::get('/login', 'index');
        Route::post('/login', 'login');
        Route::post('/logout', 'logout');
    });

Route::controller(AccountController::class)
    ->middleware('web')->group(function () {
        Route::get('/register', 'index');
        Route::post('/register', 'store');
        Route::get('/account/', 'show'); //TODO
        Route::post('/account/{user}/edit', 'update');//TODO
    });

Route::inertia('/get-token', 'GetToken'); //TODO

Route::controller(TokenController::class)
    ->middleware('web')->group(function () {
        Route::get('/token', 'index');
        Route::post('/token', 'store');
        Route::get('/token/{token}', 'show');
        Route::delete('/token/{token}', 'destroy');
    });

Route::post('/contact', function () {
    return redirect('/');
});
