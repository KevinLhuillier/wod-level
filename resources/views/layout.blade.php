<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-gray-200 flex flex-col min-h-screen">
<!-- Header -->
<header class="bg-gray-800 shadow-lg py-4 px-6 flex justify-between items-center border-b border-gray-700">
    <h1 class="text-2xl font-extrabold text-cyan-600 tracking-wide">
        <a href="{{ route('home') }}" class="hover:underline">
            {{ config('app.name') }}
        </a>
    </h1>
    <div class="flex items-center space-x-4">
        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition duration-300">Dashboard</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
               class="px-4 py-3 bg-gray-900 text-white rounded-lg hover:bg-red-700 transition duration-300 flex items-center">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </form>
    </div>
</header>

<!-- Main Content -->
<main class="flex-grow container mx-auto p-6">
    @yield('content')
</main>
</body>
</html>
