<nav class="bg-white p-4 shadow flex justify-between ml-64">
    <h1 class="text-xl font-semibold">Dashboard</h1>

    <div class="flex items-center space-x-4">
        <span class="text-gray-600">Hello, {{ Auth::user()->name ?? 'Admin' }}</span>

        <a href="#" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="text-red-500">Logout</a>

        <form id="logout-form" method="POST" action="#" class="hidden">
            @csrf
        </form>
    </div>
</nav>
