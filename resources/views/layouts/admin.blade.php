<!DOCTYPE html>
<html lang="ro" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="h-full flex bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-amber-900 text-white min-h-screen">
        <div class="p-4">
            <h1 class="text-2xl font-bold">Admin Panel</h1>
        </div>
        <nav class="mt-8">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-amber-800">
                <i class="fas fa-home mr-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.menu-items.index') }}" class="block px-4 py-2 hover:bg-amber-800">
                <i class="fas fa-utensils mr-2"></i> Meniu
            </a>
            <a href="{{ route('admin.events.index') }}" class="block px-4 py-2 hover:bg-amber-800">
                <i class="fas fa-calendar mr-2"></i> Evenimente
            </a>
            <a href="{{ route('admin.about.edit') }}" class="block px-4 py-2 hover:bg-amber-800">
                <i class="fas fa-info-circle mr-2"></i> Despre Noi
            </a>
            <form method="POST" action="{{ route('admin.logout') }}" class="block px-4 py-2">
                @csrf
                <button type="submit" class="text-white hover:text-amber-200">
                    <i class="fas fa-sign-out-alt mr-2"></i> Deconectare
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
