<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/css/app.css',])
</head>
<body class="bg-gray-100 font-sans text-gray-900 antialiased min-h-screen flex flex-col justify-start">

@include('layouts.dev-mode')

{{--@include('layouts.navigation')--}}

<!-- Page Heading -->
@if (isset($header))
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
@endif

<!-- Page Content -->
<main class="bg-gray-100 dark:bg-gray-900 grow py-6">
    <div class="grow max-w-7xl mx-auto
                bg-white dark:bg-gray-900
                border-gray-400 dark:border-gray-600
                rounded rounded-lg
                shadow shadow-lg ">
        {{ $slot }}
    </div>
</main>

<!-- Page Heading -->
@if (isset($header))
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
@endif

@include('layouts.footer')
</body>
</html>
