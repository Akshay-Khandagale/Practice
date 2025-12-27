<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="fixed top-0 left-64 right-0 h-16 bg-white shadow flex justify-between items-center px-4 z-50">
    <h1 class="text-xl font-semibold">Dashboard</h1>

    <div class="flex items-center space-x-4">
        <span class="text-gray-600">Hello, {{ Auth::user()->name ?? 'Admin' }}</span>

        <a href="/login" class="text-red-500">Logout</a>
    </div>
</nav>