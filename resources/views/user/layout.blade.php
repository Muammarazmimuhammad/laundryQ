<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundryQ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-blue-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            
            <div class="flex items-center gap-6">
                <a href="{{ route('booking.create') }}" class="text-2xl font-extrabold tracking-wider">Laundry<span class="text-yellow-300">Q</span></a>
                
                @auth
                    <a href="{{ route('booking.create') }}" class="hover:text-blue-200 transition font-medium">Pesan Antrean</a>
                    <a href="{{ route('tracking.index') }}" class="hover:text-blue-200 transition font-medium">Pesanan Saya</a>
                    
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm font-bold transition">Area Admin</a>
                    @endif
                @endauth
            </div>

            <div>
                @auth
                    <div class="flex items-center gap-4">
                        <span class="font-semibold text-sm">Halo, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-white text-blue-600 px-4 py-1 rounded shadow hover:bg-gray-100 font-bold transition">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-white text-blue-600 px-4 py-2 rounded shadow hover:bg-gray-100 font-bold transition">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="min-h-screen">
        @yield('content')
    </main>

</body>
</html>