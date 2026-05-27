@props(['cart'])

<div class="flex flex-col gap-8">
    <ul class="mt-4">
        @foreach ($cart->items as $item)
            <li class="flex justify-between items-center gap-4 border-b border-rose-100 py-4">
                <div>
                    <h2 class="font-medium">{{ $item->product->name }}</h2>
                    <div class="flex gap-2 mt-1">
                        <span class="font-medium text-red mr-2">{{$item->quantity}}x</span>
                        <span class="text-rose-500">{{$item->product->formattedPrice()}}</span>
                        <span class="text-rose-500 font-medium">{{$item->formattedTotal()}}</span>
                    </div>
                </div>
                <form 
                    action="{{ route('cart.removeAll', $item) }}" 
                    method="POST"
                >
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="border rounded-full border-rose-500 p-0.5">
                        <x-icons.delete class="size-2.5 text-rose-500 rounded-full" />
                    </button>
                </form>
            </li>
        @endforeach
    </ul>

    <div class="flex justify-between items-center gap-4">
        <p>Order Total</p>
        <p class="text-2xl font-bold">{{$cart->formattedTotal()}}</p>
    </div>

    <div class="bg-rose-50 rounded-lg p-4 text-center flex gap-2 justify-center">
        <x-icons.tree class="size-6 text-green" />
        <p>This is a <span class="font-bold">carbon-neutral</span> delivery.</p>
    </div>

    <button popovertarget="order-confirmation" 
        class="bg-red text-white rounded-full py-4 px-6"
    >
        Confirm Order
    </button>

    <x-cart.confirmation :cart="$cart" />
</div>