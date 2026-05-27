@props(['cart'])

<div class="m-auto max-h-dvh bg-transparent transition duration-300 backdrop:bg-black/50 
        backdrop:backdrop-blur-sm starting:scale-95 starting:opacity-0 opacity-0 translate-y-1 
        open:translate-y-0 open:opacity-100 transition-discrete open:flex open:flex-col open:gap-6" popover
    id="order-confirmation">
    <div class="bg-white p-8 rounded-lg w-120 max-w-full">
        <x-icons.confirm class="size-12 text-green" />
        <div>
            <h2 class="font-bold text-2xl">Order Confirmed!</h2>
            <p class="mt-2">We hope you enjoy your food!</p>
        </div>
        <div class="rounded-lg bg-rose-50 px-4">
            <ul>
                @foreach ($cart->items as $item)
                <li class="flex justify-between items-center gap-4 border-b border-rose-100 py-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ Vite::asset('resources/images/' . $item->product->image) }}"
                            alt="Picture of {{ $item->product->name }}" class="size-12 rounded-md object-cover">
                        <div>
                            <h2 class="font-medium">{{ $item->product->name }}</h2>
                            <div class="flex gap-2 mt-1">
                                <span class="font-medium text-red mr-2">{{$item->quantity}}x</span>
                                <span class="text-rose-500">{{$item->product->formattedPrice()}}</span>

                            </div>
                        </div>
                    </div>
                    <div>
                        <span class="text-rose-500 text-lg font-medium">{{$item->formattedTotal()}}</span>
                    </div>
                </li>
                @endforeach
            </ul>

            <div class="flex justify-between items-center gap-4 py-6">
                <p>Order Total</p>
                <p class="text-2xl font-bold">{{$cart->formattedTotal()}}</p>
            </div>
        </div>
        <form action="{{ route('cart.emptyCart') }}" method="POST">
            @csrf
            <button type="submit" class="w-full bg-red text-white rounded-full py-4 px-6">
                Start New Order
            </button>
        </form>

    </div>
</div>