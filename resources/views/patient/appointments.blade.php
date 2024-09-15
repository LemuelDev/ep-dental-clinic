@extends('layout.patient')

@section('content')
<div class="flex h-screen">
    <!-- Sidebar -->
    @include('patient.sidebar')


    <!-- Main content -->
    <div class="flex-1 flex flex-col w-full">
        <!-- Navbar -->
        @include('patient.navbar')

        
        <!-- Main content area -->
        <main class="flex-1 p-6 " id="main-content">
            <div class="w-full">

                <!-- Your main content goes here -->
                <div class="flex justify-center max-sm:flex-col gap-4 sm:justify-between items-center w-full">
                    <h1 class="lg:text-3xl text-2xl font-bold ">Reservations</h1>
                   @if (count($reservations) > 0)
                   <div class="flex items-center gap-3">
                    <a href="{{route('patient.create')}}" class="px-3 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        Book a Reservation
                    </a>
                    <select name="filter-appointment" id="" class="py-3 px-5 bg-transparent shadow rounded-lg">
                        <option value="">Today</option>
                        <option value="">Next 3 days</option>
                        <option value="">This whole week</option>
                        <option value="">Next Week</option>
                        <option value="">Next Two Weeks</option>
                    </select>
                   </div>
                   @endif
                </div>
                @include('patient.tableAppointments') 
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
