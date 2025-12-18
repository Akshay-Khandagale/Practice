<aside class="w-64 bg-gray-800 text-white h-screen p-5 fixed">
    <h2 class="text-2xl font-bold mb-6">My Admin</h2>

    <ul class="space-y-2">
        <li><a href="index" class="block p-2 hover:bg-gray-700 rounded">Dashboard</a></li>

        <!-- Users Dropdown -->
         <li>
            <button onclick="toggleMenu()"
                class="w-full flex justify-between items-center p-2 hover:bg-gray-700">
                <span>Users</span>
                <span>▾</span>
            </button>

            <ul id="usersMenu" class="hidden ml-4 mt-2 space-y-1">
                <li><a href="add-user" class="block p-2 hover:bg-gray-700 rounded">User</a></li>
                <li><a href="users" class="block p-2 hover:bg-gray-700 rounded">Reports</a></li>
            </ul>
        </li>

        <!-- Users Dropdown -->
        <li>
            <button onclick="toggleMenu()"
                class="w-full flex justify-between items-center p-2 hover:bg-gray-700">
                <span>Users</span>
                <span>▾</span>
            </button>

            <ul id="usersMenu" class="hidden ml-4 mt-2 space-y-1">
                <li><a href="add-user" class="block p-2 hover:bg-gray-700 rounded">User</a></li>
                <li><a href="users" class="block p-2 hover:bg-gray-700 rounded">Reports</a></li>
            </ul>
        </li>

            
        <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Appointments</a></li>
        
        <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Settings</a></li>
    </ul>
</aside>
<script>
function toggleMenu() {
    const menu = document.getElementById('usersMenu');
    menu.classList.toggle('hidden');
}
</script>
