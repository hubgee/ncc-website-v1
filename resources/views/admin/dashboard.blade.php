<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <h1 class="text-xl font-bold text-green-700">Admin Dashboard</h1>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-700 font-semibold">Logout</button>
            </form>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-sm text-gray-500">Total Content</p>
                <p class="text-3xl font-bold text-green-700">{{ $stats['total'] }}</p>
            </div>
            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-sm text-gray-500">Published</p>
                <p class="text-3xl font-bold text-green-700">{{ $stats['published'] }}</p>
            </div>
            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-sm text-gray-500">Sections</p>
                <p class="text-3xl font-bold text-green-700">{{ $stats['sections'] }}</p>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Quick Links</h2>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('admin.contents.index', 'home') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Manage Home</a>
            </div>
        </div>
    </main>
</body>
</html>
