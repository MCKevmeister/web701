<?php

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

Route::inertia('/account', 'AccountDetails');

Route::controller(ProductController::class)
    ->middleware('web')->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/{product}', 'show');
        Route::get('/product/create', 'create');
        Route::post('/products', 'store');
    });

Route::controller(TokenController::class)
    ->middleware('web')->group(function () {
        Route::get('/tokens', 'index');
        Route::post('/tokens', 'store');
    });

Route::post('/contact', function () {
    return redirect('/');
});
