<?php

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

Route::get('/', function () {
    return view('home');
})->name('home');

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShoppingCartController;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// مسارات السلة الشرائية (للمستخدمين المسجلين)
Route::middleware('auth')->group(function () {
    Route::post('products/{product}/add-to-cart', [ShoppingCartController::class, 'addToCart'])->name('cart.add');
    Route::get('my-cart', [ShoppingCartController::class, 'showCart'])->name('cart.index');
    Route::delete('cart-item/{item}', [ShoppingCartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('checkout', [ShoppingCartController::class, 'checkout'])->name('checkout.index');
    Route::post('checkout', [ShoppingCartController::class, 'processPayment'])->name('checkout.process');
    Route::get('order/{order}/confirmation', [ShoppingCartController::class, 'orderConfirmation'])->name('order.confirmation');
});

Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('categories', CategoryController::class)->only(['index', 'show']);
Route::resource('carts', CartController::class)->only(['index', 'show']);
Route::resource('orders', OrderController::class)->only(['index', 'show']);

Route::middleware(['auth', 'role:admin,assistant'])->group(function () {
    Route::resource('products', ProductController::class)->except(['index', 'show']);
    Route::resource('categories', CategoryController::class)->except(['index', 'show']);
    Route::resource('carts', CartController::class)->except(['index', 'show']);
    Route::resource('orders', OrderController::class)->except(['index', 'show']);
});
