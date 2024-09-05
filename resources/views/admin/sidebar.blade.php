<aside 
    id="sidebar" 
    class="shadow-xl rounded-lg w-64 transition-all duration-300 ease-in-out transform lg:translate-x-0 -translate-x-full lg:relative fixed h-full z-[1000]">
    <div class="flex flex-col h-full p-4">
        <div class="flex justify-end">
            <button 
            id="sidebarToggle" 
            class="block lg:hidden focus:outline-none items-end"
            onclick="toggleSidebar()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            </button>
        </div>
        <!-- Sidebar content -->
        <ul class="mt-4 flex-grow">
            <li class="mb-2">
                <a href="#" class="block p-2 hover:bg-gray-700 hover:text-white rounded">Appointments</a>
            </li>
            <li class="mb-2">
                <a href="#" class="block p-2 hover:bg-gray-700 hover:text-white rounded">Approvals</a>
            </li>
            <li class="mb-2">
                <a href="#" class="block p-2 hover:bg-gray-700 hover:text-white rounded">Active Users</a>
            </li>
            <li class="mb-2">
                <a href="#" class="block p-2 hover:bg-gray-700 hover:text-white rounded">Patient History</a>
            </li>
            <li class="mb-2">
                <a href="#" class="block p-2 hover:bg-gray-700 hover:text-white rounded">Profile</a>
            </li>
            <!-- Add more sidebar links -->
        </ul>
        <!-- Footer -->
        <footer class="mt-auto text-center p-2 text-sm border-2 border-gray-400 rounded-lg">
            <p>Espineli-Paradeza</p>
            <p>Dental Clinic</p>
        </footer>
    </div>
</aside>