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
                      <!-- Appointment Filter -->
                    <select name="filter-appointment" id="filter-appointment" class="py-2 lg:py-1 px-5 w-full bg-transparent shadow rounded-lg">
                      <option  class="text-black" value="all" {{$filter == 'all' ? 'selected' : ''}}>All</option>
                      <option  class="text-black" value="today" {{$filter == 'today' ? 'selected' : ''}}>Today</option>
                      <option  class="text-black" value="next-3-days" {{$filter == 'next-3-days' ? 'selected' : ''}}>Next 3 days</option>
                      <option  class="text-black" value="this-week" {{$filter == 'this-week' ? 'selected' : ''}}>This whole week</option>
                      <option  class="text-black" value="next-week" {{$filter == 'next-week' ? 'selected' : ''}}>Next Week</option>
                      <option  class="text-black" value="next-2-weeks" {{$filter == 'next-2-weeks' ? 'selected' : ''}}>Next Two Weeks</option>
                    </select>

                    <!-- Status Filter -->
                    <select name="filter-status" id="filter-status" class="py-2 lg:py-1 px-5 w-full bg-transparent shadow rounded-lg">
                      <option  class="text-black" value="pending" {{$status == 'pending' ? 'selected' : ''}}>Pending</option>
                      <option  class="text-black" value="approved" {{$status == 'approved' ? 'selected' : ''}}>Approved</option>
                    </select>

                    <script>
                        const filterAppointment = document.getElementById('filter-appointment');
                        const filterStatus = document.getElementById('filter-status');

                        // Event listener for appointment filter
                        filterAppointment.addEventListener('change', function() {
                            const selectedAppointmentValue = filterAppointment.value;
                            const selectedStatusValue = filterStatus.value;

                            // Redirect with both filter and status as query parameters
                            window.location.href = `/admin/appointments?filter=${selectedAppointmentValue}&status=${selectedStatusValue}`;
                        });

                        // Event listener for status filter
                        filterStatus.addEventListener('change', function() {
                            const selectedAppointmentValue = filterAppointment.value;
                            const selectedStatusValue = filterStatus.value;

                            // Redirect with both filter and status as query parameters
                            window.location.href = `/admin/appointments?filter=${selectedAppointmentValue}&status=${selectedStatusValue}`;
                        });

                    </script>

                   </div>
                </div>
                @include('admin.tableAppointments') 
            </div>
                       
        </main>

         @if (session()->has('success'))
        <dialog id="my_modal_20" class="modal">
            <div class="modal-box">
              <h3 class="text-xl font-bold">Success!</h3>
              <p class="py-4 pt-8 text-center text-green-600">{{session('success')}}</p>
              <div class="modal-action">
                <form method="dialog">
                  <!-- if there is a button in form, it will close the modal -->
                  <button class="btn">Close</button>
                </form>
              </div>
            </div>
          </dialog>

           <!-- JavaScript to automatically open modal -->
        <script>
            // Automatically open modal on page load
            window.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('my_modal_20').showModal();
            });
        </script>
        @endif

        
        @if (session()->has('failed'))
        <dialog id="my_modal_21" class="modal">
          <div class="modal-box">
            <h3 class="text-xl font-bold">Failed!</h3>
            <p class="py-4 pt-8 text-center text-red-600">{{session('failed')}}</p>
            <div class="modal-action">
              <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
              </form>
            </div>
          </div>
          </dialog>

           <!-- JavaScript to automatically open modal -->
        <script>
            // Automatically open modal on page load
            window.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('my_modal_21').showModal();
            });
        </script>
        @endif
       
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }
</script>

@endsection
