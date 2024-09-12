<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/products', [SaleController::class, 'products']);
Route::get('/quantity', [SaleController::class, 'quantity']);
Route::get('/sales', [SaleController::class, 'sales']);
Route::get('/inventory', [SaleController::class, 'inventory']);

Route::post('/sale', [SaleController::class, 'store']);
Route::put('/sale/{id}', [SaleController::class, 'update']);
Route::post('/product', [ProductController::class, 'store']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::post('/inventory', [InventoryController::class, 'store']);
Route::put('/inventory/{id}', [InventoryController::class, 'update']);
