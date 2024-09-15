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
            <div class=" ">
                <!-- Your main content goes here -->
               <div class="flex justify-between items-center">
                <h1 class="lg:text-3xl text-xl font-bold pb-4">Patient Records</h1>
                <select name="filter-appointment" id="" class="py-2 px-5 bg-transparent shadow rounded-lg">
                    <option value="">Today</option>
                    <option value="">Next 3 days</option>
                    <option value="">This whole week</option>
                    <option value="">Next Week</option>
                    <option value="">Next Two Weeks</option>
                </select>
               </div>
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
