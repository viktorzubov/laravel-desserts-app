@props(['product', 'cart'])

@php
    $quantity = $cart?->quantityOf($product) ?? 0;
@endphp

<li class="aspect-square rounded-lg">
    <article>
        <img class="aspect-square object-cover rounded-xl" src="{{ Vite::asset('resources/images/' . $product->image) }}"
            alt="{{ $product->name }}">
        @if ($quantity)
            <div class="flex items-center bg-red py-3 rounded-full text-white mx-auto px-3 -translate-y-1/2 w-40 justify-center gap-4">
                <form
                    action="{{ route('cart.removeOne', $product) }}" 
                    method="POST"
                >
                    @csrf
                    @method("PATCH")
                    <button type="submit" class="border-2 border-white rounded-full p-1">
                        <x-icons.decrement class="size-2.5 text-white" />
                    </button>
                </form>
                <span class="flex-1 text-center">{{$quantity}}</span>
                <form 
                    action="{{ route('cart.addOne', $product) }}" 
                    method="POST"
                >
                    @csrf
                    <button type="submit" class="border-2 border-white rounded-full p-1">
                        <x-icons.increment class="size-2.5 text-white" />
                    </button>
                </form>
            </div>
        @else    
            <form action="{{ route('cart.addOne', $product) }}" method="POST" class="flex justify-center -mt-5">
                @csrf
                <button
                    class="bg-white border border-rose-500 hover:border-red hover:text-red rounded-full px-8 h-10 font-medium flex gap-2 items-center"
                    type="submit">
                    <x-icons.add-to-cart />
                    <span>Add to cart</span>
                </button>
            </form>
        @endif
        <p class="mt-4 text-rose-500">{{ $product->category }}</p>
        <h2 class="text-lg font-medium">{{ $product->name }}</h2>
        <p class="font-medium text-red">{{ $product->formattedPrice() }}</p>
    </article>
</li>
