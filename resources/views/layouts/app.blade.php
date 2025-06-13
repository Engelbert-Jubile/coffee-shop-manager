<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-image: url('/images/coffee-bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            color: white;
        }

        .bg-overlay {
            background-color: rgba(0, 0, 0, 0.6); /* Dark overlay */
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="bg-overlay">
        <nav class="bg-white bg-opacity-20 shadow p-4 mb-4 backdrop-blur-sm">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-bold text-yellow-200">☕ COFFEE UNIVERSE</h1>
                <div class="space-x-4">
                    <a href="{{ route('items.index') }}" class="text-white hover:underline">Home</a>
                    <a href="{{ route('items.create') }}" class="text-white hover:underline">Add Item</a>
                    <a href="{{ route('items.trash') }}" class="text-red-300 hover:underline">Trash</a>
                </div>
            </div>
        </nav>

        <div class="container mx-auto px-4 py-6">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>
