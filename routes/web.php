<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('products', [
        'products' => Product::all(),
    ]);
});
