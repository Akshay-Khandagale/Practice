<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<aside class="w-64 bg-gray-800 text-white h-screen p-5 fixed">
    <h2 class="text-2xl font-bold mb-6">My Admin</h2>

    <ul class="space-y-2">
        <li><a href="/api/index" class="block p-2 hover:bg-gray-700 rounded">Dashboard</a></li>

        <!-- Users Dropdown -->
         <li>
            <button onclick="toggleMenu('user')"
                class="w-full flex justify-between items-center p-2 hover:bg-gray-700">
                <span>Users</span>
                <span>▾</span>
            </button>

            <ul id="usersMenu" class="hidden ml-4 mt-2 space-y-1">
                <li><a href="/api/add-user" class="block p-2 hover:bg-gray-700 rounded">Add Links</a></li>
                <li><a href="/api/users" class="block p-2 hover:bg-gray-700 rounded">Reports</a></li>
            </ul>
        </li>

        <!-- Users Dropdown -->
        <li>
            <button onclick="toggleMenu('payment')"
                class="w-full flex justify-between items-center p-2 hover:bg-gray-700">
                <span>Payment</span>
                <span>▾</span>
            </button>

            <ul id="paymentMenu" class="hidden ml-4 mt-2 space-y-1">
                <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Payment Integration</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Payment Report</a></li>
            </ul>
        </li>

            
        <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Appointments</a></li>
        
        <li><a href="/api/register" class="block p-2 hover:bg-gray-700 rounded">New Register</a></li>
    </ul>
</aside>
<script>
function toggleMenu(tabname) {
    
    if(tabname == 'user'){
        const menu = document.getElementById('usersMenu');
        menu.classList.toggle('hidden');
    } else if(tabname == 'payment'){
        const paymenu = document.getElementById('paymentMenu');
        paymenu.classList.toggle('hidden');
    } 
}
</script>
