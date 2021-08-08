<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('category/get_all', [CategoryController::class, 'getAll']);
Route::get('product/change_active/{product}', [ProductController::class, 'changeActive']);

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
