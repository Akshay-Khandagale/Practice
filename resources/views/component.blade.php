<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <div class="flex">
    {{-- Sidebar component --}}
    <x-sidebar />

    <div class="flex-1 min-h-screen">
      {{-- Topbar component --}}
      <x-topbar />

      {{-- Page content --}}
      <main class="ml-64 pt-16 h-screen overflow-y-auto p-6 bg-gray-100">
        @yield('content')
      </main>
    </div>
  </div>

</body>
</html>
