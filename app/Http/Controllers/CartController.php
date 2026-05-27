<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
class CartController extends Controller
{
    public function addOne(Product $product)
    {
        $cart = Cart::ensureExists();
        $cart->incrementItem($product);

        return back();
    }
}
