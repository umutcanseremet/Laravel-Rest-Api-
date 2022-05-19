<?php

use App\Http\Controllers\ProductController;
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


Route::controller(ProductController::class)
    ->group(function () {
        Route::get('/products', 'index')->name('api');
        Route::get('/products/{id}', 'show');
        Route::post('/products', 'store');
        Route::put('/products/{id}', 'update');
        Route::delete('/products/{id}', 'destroy');
    });

