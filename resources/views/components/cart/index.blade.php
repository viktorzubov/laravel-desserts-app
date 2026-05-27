@props(['cart'])

<aside>
    <div class="bg-white p-6 rounded-xl">
        <h2 class="text-red font-bold text-2xl">Your Cart ({{ $cart->totalQuantity() }})</h2>
        @if ($cart->totalQuantity())
            <x-cart.active />
        @else
            <x-cart.empty />
        @endif
    </div>
</aside>
