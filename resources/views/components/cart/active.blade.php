@props(['cart'])

<div class="flex flex-col gap-8">
    <ul class="mt-4">
        @foreach ($cart->items as $item)
            <li class="flex items-center justify-between gap-4 border-b border-rose-100 py-4">
                <div>
                    <h2 class="font-medium">{{ $item->product->name }}</h2>
                    <div class="mt-1 flex gap-2">
                        <span class="text-red mr-2 font-medium">{{ $item->quantity }}x</span>
                        <span class="text-rose-500">{{ $item->product->formattedPrice() }}</span>
                        <span class="font-medium text-rose-500">{{ $item->formattedTotal() }}</span>
                    </div>
                </div>
                <form action="{{ route('cart.removeAll', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="cursor-pointer rounded-full border border-rose-500 p-0.5">
                        <x-icons.delete class="size-2.5 rounded-full text-rose-500" />
                    </button>
                </form>
            </li>
        @endforeach
    </ul>

    <div class="flex items-center justify-between gap-4">
        <p>Order Total</p>
        <p class="text-2xl font-bold">{{ $cart->formattedTotal() }}</p>
    </div>

    <div class="flex justify-center gap-2 rounded-lg bg-rose-50 p-4 text-center">
        <x-icons.tree class="text-green size-6" />
        <p>This is a <span class="font-bold">carbon-neutral</span> delivery.</p>
    </div>

    <button popovertarget="order-confirmation"
        class="bg-red hover:bg-red-dark cursor-pointer rounded-full px-6 py-4 text-white transition">
        Confirm Order
    </button>

    <x-cart.confirmation :cart="$cart" />
</div>
