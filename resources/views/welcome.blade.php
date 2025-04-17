<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">

            <!-- Alpine.js Test Start -->
            <div x-data="{ open: false }" class="mt-8 text-center">
                <button @click="open = !open" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                    Toggle Alpine Box
                </button>

                <div x-show="open" class="mt-4 bg-green-200 text-green-900 p-4 rounded shadow transition-all">
                    ✅ Alpine.js is working!
                </div>
            </div>
            <!-- Alpine.js Test End -->

            <!-- Existing Content (Docs, Laracasts, etc.) -->
            <!-- Keep all your existing links and cards here -->
        </div>
    </div>

</body>
</html>
