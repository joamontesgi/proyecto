<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\SaleController;

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
