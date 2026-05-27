<?php

use App\Models\Cart;
use App\Models\Product;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('products', [
        'products' => Product::all(),
        'cart' => Cart::ifExists(),
    ]);
});

Route::post('/cart/{product}', [CartController::class, 'addOne'])->name('cart.addOne');
