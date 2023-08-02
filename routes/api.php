<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResources([
    'products' => ProductController::class,
    'orders' => OrderController::class
]);

/*Route::get('/userOrders', [OrderController::class, 'getUserOrders']);

Route::get('/products', [ProductController::class, 'getProducts']);

Route::delete('/products/{id}', [ProductController::class, 'deleteProduct']);

Route::put('/products/{id}', [ProductController::class, 'updateProduct']);
*/

