<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Number;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'product_id', 'quantity'];

    protected $touches = ['cart'];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function formattedTotal()
    {
        return Number::currency($this->quantity * $this->product->price_cents / 100, 'USD');
    }
}
