@props(['product'])

<li class="bg-rose-100 aspect-square rounded-lg">
    <article>
        <img src="{{ Vite::asset('resources/images/' . $product->image) }}" alt="{{ $product->name }}">
        <form method="POST">
            @csrf
            <button type="submit">Add to cart</button>
        </form>
        <p>{{ $product->category }}</p>
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->formattedPrice() }}</p>
    </article>
</li>
