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
                <div class="flex max-sm:flex-col justify-center max-sm:gap-5 sm:justify-between items-center">
                    <h1 class="lg:text-3xl text-2xl font-bold ">Patient History</h1>
                          <!-- Status Filter -->
                          <select name="filter-status" id="filter-status-history" class="py-2 px-5  bg-transparent shadow rounded-lg">
                            <option  class="text-black" value="completed" {{$status == 'completed' ? 'selected' : ''}}>Completed</option>
                            <option  class="text-black" value="rejected" {{$status == 'rejected' ? 'selected' : ''}}>Rejected</option>
                            <option  class="text-black" value="no-show" {{$status == 'no-show' ? 'selected' : ''}}>No-show</option>
                          </select>
      
                          <script>
                              const filterStatusHistory = document.getElementById('filter-status-history');
                              // Event listener for status filter
                              filterStatusHistory.addEventListener('change', function() {
                                  const selectedStatusValue = filterStatusHistory.value;
                                  // Redirect with both filter and status as query parameters
                                  window.location.href = `/admin/patientHistory?status=${selectedStatusValue}`;
                              });
      
                          </script>
                </div>
            </div>
                 @include('admin.tableHistory')  
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
