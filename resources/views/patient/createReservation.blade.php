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
            <div class="w-full ">
                <!-- Your main content goes here -->
                <h1 class="text-3xl font-bold pb-4">Schedule your Reservation</h1>
                
                {{-- reservation form --}}
          
                    <form action="{{ route('patient.create') }}" method="POST" class="grid gap-4 px-10 py-4 rounded-lg shadow"> 
                        @csrf
                        <div class="grid grid-cols-3 gap-4 ">
                            <div>
                                <label for="service_choice">Choose a Treatment:</label>
                                <select name="service_choice" id="service_choice" required class="px-6 py-2 w-full rounded-md shadow bg-transparent border-gray-600 border">
                                    <option value="" disabled selected>Select Treatment</option>
                                    <option value="cleaning">Teeth Cleaning</option>
                                    <option value="whitening">Teeth Whitening</option>
                                    <option value="filling">Dental Filling</option>
                                </select>
                            </div>
                        
                            <div>
                                <label for="reservation_date">Date:</label>
                                <input type="date" id="reservation_date" name="reservation_date" class="px-6 py-2 w-full rounded-md shadow  bg-transparent border-gray-600 border" min="{{ now()->toDateString() }}" max="{{ now()->addMonths(2)->toDateString() }}" required>
                            </div>
                            
                            <div>
                                <label for="reservation_time">Time:</label>
                                <input type="time" id="reservation_time" class="px-6 py-2 w-full rounded-md shadow bg-transparent border-gray-600 border" name="reservation_time" min="08:00" max="16:00" step="1800" value="08:00" required>
                            </div>
                        </div>

                        <h4 class="text-xl font-bold py-2 ">Emergency Contact</h4>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="">
                                <label for="">Name:</label>
                                <input type="text" name="name" id="" placeholder="Name" class="px-6 py-2 w-full rounded-md shadow bg-transparent border-gray-600 border">
                            </div>
                            <div class="">
                                <label for="">Relationship:</label>
                                <input type="text" name="relationship" id="" placeholder="Relationship" class="px-6 py-2 w-full rounded-md shadow bg-transparent border-gray-600 border">
                            </div>
                            <div class="">
                                <label for="">Phone Number:</label>
                                <input type="number" name="phone_number" id="" placeholder="Phone number" class="px-6 py-2 w-full rounded-md shadow bg-transparent border-gray-600 border">
                            </div>
                        </div>
                        
                        <div class="max-w-[400px] mx-auto mt-6 py-3">
                            <button type="submit" class="px-8 py-3 rounded-md border-none text-white text-lg bg-violet-600 hover:bg-violet-700">Submit Reservation</button>
                        </div>

                    </form>

                
                

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
