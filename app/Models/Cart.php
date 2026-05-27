<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Number;

class Cart extends Model
{
    use Prunable;

    protected $fillable = ['session_id'];

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function quantityOf(Product $product): int
    {
        return $this->items->firstWhere('product_id', $product->id)->quantity ?? 0;
    }

    public function totalItemsCount()
    {
        return $this->items->sum('quantity');
    }

    public function formattedTotal()
    {
        $total = $this->items->sum(fn ($item) => $item->product->price_cents * $item->quantity);

        return Number::currency($total / 100, 'USD');
    }

    public static function ifExists()
    {
        return static::with('items.product')
            ->where('session_id', session()->getId())
            ->first();
    }

    public static function ensureExists()
    {
        return static::firstOrCreate([
            'session_id' => session()->getId(),
        ]);
    }

    public function incrementItem(Product $product)
    {
        $this->items()->firstOrCreate([
            'product_id' => $product->id,
        ], [
            'quantity' => 0,
        ])->increment('quantity');
    }

    public function decrementItem(Product $product)
    {
        $item = $this->items->firstWhere('product_id', $product->id);

        if (! $item) {
            return;
        }

        if ($item->quantity > 1) {
            $item->decrement('quantity');
        } else {
            $item->delete();
        }
    }

    public function prunable()
    {
        return static::where('updated_at', '<=', now()->subHours(2));
    }
}
