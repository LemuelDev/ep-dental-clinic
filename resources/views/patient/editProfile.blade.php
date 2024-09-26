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
                <h1 class="text-3xl font-bold pb-4 py-2 tracking-wide max-lg:text-center">Edit Profile</h1>
                
                {{-- profile content --}}
                <form action="{{route("patient.updateProfile", auth()->user()->userProfile->id)}}" method="POST" class="grid gap-6 shadow-xl rounded-xl">
                    {{-- name section --}}
                    @csrf
                    <div class="shadow-sm rounded-xl p-8">
                        <h4 class="py-4 text-xl font-bold tracking-wide">Personal Information</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 ">
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">FirstName:</label>
                                <input type="text" name="firstname" value="{{auth()->user()->userProfile->firstname}}" class=" bg-transparent rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">MiddleName:</label>
                                <input type="text" name="middlename" value="{{auth()->user()->userProfile->middlename}}" class="bg-transparent  rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">LastName:</label>
                                <input type="text" name="lastname" value="{{auth()->user()->userProfile->lastname}}" class="bg-transparent  rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">ExtensionName:</label>
                                <input type="text" name="extensionname" value="{{auth()->user()->userProfile->extensionname}}" class="bg-transparent  rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                        </div>  
                    </div>

                    <div class="shadow-sm rounded-xl p-8">
                        {{-- <h4 class="py-4 text-xl font-bold tracking-wide">Other Information</h4> --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 ">
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">Birthday:</label>
                                <input type="date" name="birthday" value="{{auth()->user()->userProfile->birthday}}" class=" bg-transparent rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">Age:</label>
                                <input type="number" name="age" value="{{auth()->user()->userProfile->age}}" class="bg-transparent  rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">Address:</label>
                                <input type="text" name="address" value="{{auth()->user()->userProfile->address}}" class="bg-transparent  rounded-lg shadow px-4 w-full py-3 text-left text-md">
                            </div>
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">Sex:</label>
                                <input type="text" name="sex" value="{{auth()->user()->userProfile->sex}}" class="bg-transparent  rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                            <div class="flex justify-start items-center">
                                <label for="" class="min-w-40">Phone Number:</label>
                                <input type="number" name="phone_number" value="{{auth()->user()->userProfile->phone_number}}" class="bg-transparent  rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                        </div>  
                    </div>

                    <div class="shadow-sm rounded-xl p-8">
                        <h4 class="py-4 text-xl font-bold tracking-wide">Emergency Contact Information</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ">
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">Name:</label>
                                <input type="text" name="emergency_name" value="{{auth()->user()->userProfile->emergency_name}}" class=" bg-transparent rounded-lg shadow lg:px-10 px-2 py-3 text-left text-md w-full">
                            </div>
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">Contact Number:</label>
                                <input type="number" name="emergency_contact" value="{{auth()->user()->userProfile->emergency_contact}}" class="bg-transparent  rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">Relationship:</label>
                                <input type="text"  name="emergency_relationship" value="{{auth()->user()->userProfile->emergency_relationship}}" class="bg-transparent  rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                           
                        </div>  
                    </div>

                    <div class="shadow-sm rounded-xl p-8">
                        <h4 class="py-4 text-xl font-bold tracking-wide">Additional Information</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 ">
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">Email:</label>
                                <input type="email" name="email" value="{{auth()->user()->userProfile->email}}" class=" bg-transparent rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                            <div class="flex gap-4 justify-start items-center">
                                <label for="">Username:</label>
                                <input type="text" name="username" value="{{auth()->user()->username}}" class="bg-transparent  rounded-lg shadow lg:px-10 px-4 py-3 text-left text-md w-full">
                            </div>
                           
                        </div>  
                    </div>

                    <div class="mx-auto px-4 w-full max-[520px]:max-w-[600px]  max-sm:flex-col flex gap-4 items-center justify-center py-8">
                        <button type="submit" class="px-10 py-3 rounded-md text-center border-none text-lg text-white shadow bg-[#624E88] hover:bg-[#58457b]">Update Profile</button>
                    </div>
                

                </form>

            </div>
                       
        </main>

        
        @if (session()->has('failed'))
        <dialog id="my_modal_24" class="modal">
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
            document.getElementById('my_modal_24').showModal();
            });
        </script>
        @endif

        @if ($errors->has('email'))
        <dialog id="my_modal_27" class="modal">
            <div class="modal-box">
            <h3 class="text-xl font-bold">Failed!</h3>
            <p class="py-4 pt-8 text-center text-red-600">{{$errors->first('email')}}</p>
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
            document.getElementById('my_modal_27').showModal();
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
