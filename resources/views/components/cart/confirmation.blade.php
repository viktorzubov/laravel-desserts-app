@props(['cart'])

<div class="starting:scale-95 starting:opacity-0 transition-discrete m-auto max-h-[calc(100dvh-2rem)] translate-y-1 bg-transparent opacity-0 transition duration-300 backdrop:bg-black/50 backdrop:backdrop-blur-sm open:flex open:translate-y-0 open:flex-col open:gap-6 open:opacity-100"
    popover id="order-confirmation">
    <div class="w-120 max-w-full rounded-lg bg-white p-8">
        <x-icons.confirm class="text-green size-12 shrink-0" />
        <div>
            <h2 class="text-2xl font-bold">Order Confirmed!</h2>
            <p class="mt-2">We hope you enjoy your food!</p>
        </div>
        <div class="rounded-lg bg-rose-50 px-4">
            <ul>
                @foreach ($cart->items as $item)
                    <li class="flex items-center justify-between gap-4 border-b border-rose-100 py-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ Vite::asset('resources/images/' . $item->product->image) }}"
                                alt="Picture of {{ $item->product->name }}" class="size-12 rounded-md object-cover">
                            <div>
                                <h2 class="font-medium">{{ $item->product->name }}</h2>
                                <div class="mt-1 flex gap-2">
                                    <span class="text-red mr-2 font-medium">{{ $item->quantity }}x</span>
                                    <span class="text-rose-500">{{ $item->product->formattedPrice() }}</span>

                                </div>
                            </div>
                        </div>
                        <div>
                            <span class="text-lg font-medium text-rose-500">{{ $item->formattedTotal() }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="flex items-center justify-between gap-4 py-6">
                <p>Order Total</p>
                <p class="text-2xl font-bold">{{ $cart->formattedTotal() }}</p>
            </div>
        </div>
        <form action="{{ route('cart.emptyCart') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red w-full rounded-full px-6 py-4 text-white">
                Start New Order
            </button>
        </form>

    </div>
</div>
