<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return view('app');
});
Route::get('product/', [ProductController::class, "index"])->name('product.add');
Route::get('shop/', [ProductController::class, "shopPageIndex"])->name('shop');

// product variations added
Route::post('product-unit/add', [ProductVariationController::class, "store"])->name('product-unit.store');
Route::post('product-unit-value/add', [ProductVariationController::class, "productUnitValueStore"])->name('product-unit-value.store');

Route::get('product-value-get-unit-wise/{id}', [ProductVariationController::class, "productValueGetUnitWise"]);