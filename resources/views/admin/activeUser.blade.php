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
                    <select name="filter-user" id="filter-user" class="py-3 px-7 bg-transparent shadow rounded-lg">
                        <option class="text-black" value="{{route('admin.activeUsers')}}" {{request()->route()->getName() == 'admin.activeUsers' ? 'selected' : ''}}>Enable</option>
                        <option  class="text-black" value="{{route('admin.disabledUsers')}}" {{request()->route()->getName() == 'admin.disabledUsers' ? 'selected' : ''}}>Disable</option>
                    </select>
                    <script>
                       const filterUser = document.getElementById('filter-user');

                        filterUser.addEventListener('change', function() {
                            const filterUserValue = filterUser.value; // Get the selected option's value
                            
                            if (filterUserValue) {
                                window.location.href = filterUserValue; // Redirect to the selected route
                            }
                        });

                        
                    </script>
                    
                </div>

                @include('admin.tableUsers') 
            </div>
                       
        </main>

        @if (session()->has('success'))
        <dialog id="my_modal_38" class="modal">
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
            document.getElementById('my_modal_38').showModal();
            });
        </script>
        @endif

        
        @if (session()->has('failed'))
        <dialog id="my_modal_37" class="modal">
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
            document.getElementById('my_modal_37').showModal();
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
