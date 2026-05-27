@props(['cart'])

<aside>
    <div class="bg-white p-6 rounded-xl">
        <h2 class="text-red font-bold text-2xl">Your Cart ({{ $cart?->totalItemsCount() ?? 0 }})</h2>
        @if ($cart?->totalItemsCount())
            <x-cart.active :cart="$cart" />
        @else
            <x-cart.empty />
        @endif
    </div>
</aside>
