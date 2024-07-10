<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('global')->group(function () {
//     Route::get('catalog', [AppController::class, 'catalog']);
//     Route::get('filters', [AppController::class, 'filters']);
// });

// Route::prefix('categories')->group(function () {
//     Route::get('minimal', [CategoryController::class, 'minimalList']);
//     Route::get('{custom_category_resolver}', [CategoryController::class, 'show']);
// });

// Route::prefix('products')->group(function () {
//     Route::get('/', [ProductController::class, 'index']);
//     Route::get('{product}', [ProductController::class, 'show']);
// });
