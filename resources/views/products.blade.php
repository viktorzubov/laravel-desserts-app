<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Frontend Mentor | Product list with cart') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap"
        rel="stylesheet">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="max-w-360 mx-auto grid gap-8 bg-rose-50 px-4 py-16 sm:px-6 md:grid-cols-[1fr_480px] lg:px-8">
    <main>
        <h1 class="text-5xl font-bold">Desserts</h1>

        <ul class="mt-10 grid gap-6 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3">
            @foreach ($products as $product)
                <x-product :product="$product" :cart=$cart />
            @endforeach
        </ul>
    </main>

    <x-cart :cart="$cart" />
</body>


</html>
