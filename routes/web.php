<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Stripe\StripeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stripe/success', [StripeController::class, 'success'])->name('stripe.success');
Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

Route::prefix('api')->group(function () {

    Route::get('home-data', [AppController::class, 'landingData']);
    Route::get('last-viewed-products', [AppController::class, 'lastViewedProducts']);

    Route::prefix('global')->group(function () {
        Route::get('catalog', [AppController::class, 'catalog']);
        Route::get('filters', [AppController::class, 'filters']);
    });

    Route::prefix('categories')->group(function () {
        Route::get('minimal', [CategoryController::class, 'minimalList']);
        Route::get('{custom_category_resolver}', [CategoryController::class, 'show']);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('{product}', [ProductController::class, 'show']);
    });

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');
    Route::get('me', [AuthController::class, 'me'])->middleware('auth');

    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'getCart']);
        Route::post('add', [CartController::class, 'addToCart']);
        Route::delete('remove', [CartController::class, 'removeFromCart']);
        Route::put('change-quantity', [CartController::class, 'changeItemQuantity']);
        Route::post('payment-key', [CartController::class, 'setPaymentKey']);
        Route::post('shipment-key', [CartController::class, 'setShipmentKey']);
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->middleware('auth');
        Route::post('/', [OrderController::class, 'store'])->middleware('auth');
        Route::get('{order}', [OrderController::class, 'show'])->middleware('auth');
    });

    Route::prefix('user')->group(function () {
        Route::get('departments', [UserController::class, 'userDepartments'])->middleware('auth');
        Route::get('favorite-products', [ProductController::class, 'getFavoriteProducts'])->middleware('auth');
        Route::get('recommended-products', [ProductController::class, 'getRecommendedProducts'])->middleware('auth');
        Route::get('notifications', [NotificationController::class, 'index'])->middleware('auth');
        Route::get('notifications/{notification}', [NotificationController::class, 'show'])->middleware('auth');
        Route::post('update-avatar', [UserController::class, 'updateAvatar'])->middleware('auth');
        Route::post('update-default-address', [UserController::class, 'updateDefaultAddress'])->middleware('auth');
        Route::post('update-departments', [UserController::class, 'updateDepartments'])->middleware('auth');
        Route::post('add-product-to-favorites', [ProductController::class, 'addProductToFavorites'])->middleware('auth');
        Route::post('remove-product-from-favorites', [ProductController::class, 'removeProductFromFavorites'])->middleware('auth');
    });

    Route::get('departments', [DepartmentController::class, 'index']);
    Route::get('departments/{department}', [DepartmentController::class, 'show']);
});
