<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trivial Work</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gradient-to-br from-red-100 via-red-200 to-red-400 min-h-screen flex flex-col">
    <div class="flex-1 flex flex-col justify-center items-center">
        <div class="bg-white/90 rounded-xl shadow-2xl p-10 max-w-lg w-full border border-red-200">
            <div class="flex flex-col items-center">
                <div class="bg-red-500 rounded-full p-4 mb-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-red-700 mb-2">Trivial Work</h1>
                <!-- <p class="text-gray-700 text-center mb-6">Selamat datang di aplikasi Trivial Work! Kelola tugas-tugas harianmu dengan mudah dan efisien.</p> -->
                @if (Route::has('login'))
                    <div class="flex justify-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-red-600 text-white rounded-lg font-semibold shadow hover:bg-red-700 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-6 py-2 bg-red-500 text-white rounded-lg font-semibold shadow hover:bg-red-600 transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-6 py-2 bg-white border border-red-400 text-red-600 rounded-lg font-semibold shadow hover:bg-red-50 transition">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
    <footer class="text-center py-4 text-sm text-red-900 bg-red-100 border-t border-red-200">
        &copy; {{ date('Y') }} Trivial Work 
        <!-- &mdash; Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) -->
    </footer>
</body>
</html>