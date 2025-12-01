<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">

    {{-- Navbar (optional) --}}
    <nav class="bg-white shadow-md mb-6">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">

        <h1 class="text-xl font-semibold text-gray-800">
            Sistem Pelatihan
        </h1>

        <div class="flex items-center space-x-6">

            <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600">Home</a>
            <a href="{{ url('/pelatihans') }}" class="text-gray-600 hover:text-blue-600">Pelatihan</a>
            <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-blue-600">Dashboard</a>

            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="cursor-pointer text-red-500 hover:text-red-700 font-semibold">
                        Logout
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                    Login
                </a>
            @endguest

        </div>

    </div>
</nav>


    {{-- Main content --}}
    <main class="max-w-7xl mx-auto px-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="text-center text-gray-500 mt-10 py-4 border-t">
        <p>&copy; 2025 Sistem Pelatihan</p>
    </footer>

</body> 
</html>
