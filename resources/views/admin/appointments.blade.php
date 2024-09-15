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
            <div class="w-full ">
                <!-- Your main content goes here -->
                <div class="flex max-sm:flex-col justify-center max-sm:gap-5 sm:justify-between items-center">
                    <h1 class="lg:text-3xl text-2xl font-bold ">Reservations</h1>
                    <div class="flex sm:flex-col gap-4 items-center justify-center">
                        <select name="filter-appointment" id="" class="py-2 lg:py-1 px-5 w-full bg-transparent shadow rounded-lg">
                            <option value="">All</option>
                            <option value="">Today</option>
                            <option value="">Next 3 days</option>
                            <option value="">This whole week</option>
                            <option value="">Next Week</option>
                            <option value="">Next Two Weeks</option>
                        </select>
                        <select name="filter-status" id="" class="py-2 lg:py-1 px-5 w-full bg-transparent shadow rounded-lg">
                            <option value="">Pending</option>
                            <option value="">Approved</option>
                        </select>
                   </div>
                </div>
                @include('admin.tableAppointments') 
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
