@extends('layout.admin')

@section('content')
<div class="flex h-screen">
    <!-- Sidebar -->
    @include('admin.sidebar')


    <!-- Main content -->
    <div class="flex-1 flex flex-col w-full">
        <!-- Navbar -->
        @include('admin.navbar')
        
        
        <!-- Main content area -->
        <main class="flex-1 p-6 " id="main-content">
            <div class="w-full">
                <!-- Your main content goes here -->
                <div class="flex gap-4 items-center justify-between px-4">
                    <h1 class="text-3xl font-bold pb-4">Active Users</h1>
                    <select name="filter-user" id="" class="py-3 px-7  bg-transparent shadow rounded-lg">
                        <option value="enable">Enable</option>
                        <option value="disable">Disable</option>
                    </select>
                </div>

                @include('admin.tableUsers') 
            </div>
                       
        </main>
       
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }
</script>

@endsection
