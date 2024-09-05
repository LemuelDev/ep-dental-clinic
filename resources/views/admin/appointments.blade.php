@extends('layout.admin')

@section('content')
<div class="flex h-screen">
    <!-- Sidebar -->
    @include('admin.sidebar')


    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        @include('admin.navbar')

        

        <!-- Main content area -->
        <main class="flex-1 p-6" id="main-content">
            <div class="container mx-auto">
                <!-- Your main content goes here -->
                <h1 class="text-3xl font-bold">Welcome to the Dashboard</h1>
                <p>This is your main content area.</p>
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
