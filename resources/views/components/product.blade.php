@props(['product', 'cart'])

@php
    $quantity = $cart?->quantityOf($product) ?? 0;
@endphp

<li class="aspect-square rounded-lg">
    <article>
        <img class="{{ $quantity ? 'border-2 border-red' : '' }} aspect-square rounded-xl object-cover"
            src="{{ Vite::asset('resources/images/' . $product->image) }}" alt="{{ $product->name }}">
        @if ($quantity)
            <div
                class="bg-red mx-auto flex w-40 -translate-y-1/2 items-center justify-center gap-4 rounded-full px-3 py-3 text-white">
                <form action="{{ route('cart.removeOne', $product) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                        class="group cursor-pointer rounded-full border-2 border-white p-1 hover:bg-white">
                        <x-icons.decrement class="group-hover:text-red size-2.5 text-white" />
                    </button>
                </form>
                <span class="flex-1 text-center">{{ $quantity }}</span>
                <form action="{{ route('cart.addOne', $product) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="group cursor-pointer rounded-full border-2 border-white p-1 hover:bg-white">
                        <x-icons.increment class="group-hover:text-red size-2.5 text-white" />
                    </button>
                </form>
            </div>
        @else
            <form action="{{ route('cart.addOne', $product) }}" method="POST" class="-mt-5 flex justify-center">
                @csrf
                <button
                    class="hover:border-red hover:text-red flex h-10 items-center gap-2 rounded-full border border-rose-500 bg-white px-8 font-medium"
                    type="submit">
                    <x-icons.add-to-cart />
                    <span>Add to cart</span>
                </button>
            </form>
        @endif
        <p class="mt-4 text-rose-500">{{ $product->category }}</p>
        <h2 class="text-lg font-medium">{{ $product->name }}</h2>
        <p class="text-red font-medium">{{ $product->formattedPrice() }}</p>
    </article>
</li>
