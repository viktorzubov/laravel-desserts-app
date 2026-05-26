@props(['product'])

<li class="aspect-square rounded-lg">
    <article>
        <img class="aspect-square object-cover rounded-xl" src="{{ Vite::asset('resources/images/' . $product->image) }}"
            alt="{{ $product->name }}">
        <form method="POST" class="flex justify-center -mt-5">
            @csrf
            <button
                class="bg-white border border-rose-500 hover:border-red hover:text-red rounded-full px-8 h-10 font-medium flex gap-2 items-center"
                type="submit">
                <x-icons.add-to-cart />
                <span>Add to cart</span>
            </button>
        </form>
        <p class="mt-4 text-rose-500">{{ $product->category }}</p>
        <h2 class="text-lg font-medium">{{ $product->name }}</h2>
        <p class="font-medium text-red">{{ $product->formattedPrice() }}</p>
    </article>
</li>
