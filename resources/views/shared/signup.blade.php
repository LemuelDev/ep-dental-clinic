<!DOCTYPE html>
<html lang="en" data-theme="cupcake">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EP-CLINIC (SIGNUP)</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body class=""> 

    <dialog id="my_modal_6" class="modal">
        <div class="modal-box">
          <h3 class="text-lg font-bold">PASSWORD VALIDATIONS!</h3>
          <p class="py-4">Must be atleast one character, one uppercase, one lowercase and one number.</p>
        </div>
        <form method="dialog" class="modal-backdrop">
          <button>close</button>
        </form>
      </dialog>

    <section class="flex min-h-screen max-lg:grid ">
        
        
            {{-- Clinic logo section --}}
            <div data-theme="light" class="flex justify-center items-center w-1/2 max-lg:w-full border-r-2">
                <div class="flex justify-center items-center gap-6  h-auto py-4 max-sm:py-8">
                    <h4 class="text-4xl max-lg:text-3xl max-sm:text-2xl font-bold text-black text-center">ESPINELI-PARADEZA <br> DENTAL CLINIC</h4>
                    <img src="{{ asset('images/tooth-whitening.png') }}" alt="" class="rounded-md w-40 h-160 max-lg:h-130 max-sm:100 max-sm:w-20 align-middle">
                </div>

               
            </div>
            
            {{-- Login section --}}
            <div data-theme="dark" class="flex justify-center items-center w-1/2 max-lg:w-full">
                <div class="text-center py-4">
                    <h4 class="text-3xl font-bold text-white mb-4 tracking-widest">SIGN UP</h4>
                    <form action="{{route('users.store')}}" method="POST" class="grid grid-cols-1  sm:grid-cols-2  px-4 gap-5 items-start text-left">
                        @csrf
                        <div class="grid">
                            <label for="firstname" class="text-lg text-white tracking-tight">FirstName:</label>
                            <input type="text" value="{{old('firstname')}}" name="firstname" id="firstname" placeholder="Firstname" class="rounded-md px-4 py-3 bg-white hover:bg-gray-200 text-black placeholder:text-black">
                        </div>
                        <div class="grid">
                            <label for="middlename" class="text-lg text-white tracking-tight">MiddleName:</label>
                            <input type="text" value="{{old('middlename')}}"  placeholder="Middlename" name="middlename" id="middlename" class="rounded-md px-4 py-3 bg-white text-black placeholder:text-black">
                            <span class="text-gray-200 italic">Optional</span>
                        </div>
                        <div class="grid">
                            <label for="lastname" class="text-lg text-white tracking-tight">LastName:</label>
                            <input type="text" value="{{old('lastname')}}"  placeholder="Lastname" name="lastname" id="lastname" class="rounded-md px-4 py-3 bg-white text-black placeholder:text-black">
                        </div>
                        <div class="grid">
                            <label for="extensionname" class="text-lg text-white tracking-tight">ExtensionName:</label>
                            <input type="text" value="{{old('extensionname')}}"  placeholder="Extension name" name="extensionname" id="extensionname" class="rounded-md px-4 py-3 bg-white text-black placeholder:text-black">
                        </div>

                        <div class="grid">
                            <label for="address" class="text-lg text-white tracking-tight">Address:</label>
                            <input type="text" value="{{old('address')}}"  placeholder="Address" name="address" id="address" class="rounded-md px-4 py-3 bg-white text-black placeholder:text-black">
                        </div>

                        <div class="grid">
                            <label for="sex" class="text-lg text-white tracking-tight">Sex:</label>
                            <select name="sex" id="sex" class="rounded-md px-4 py-3 bg-white text-black placeholder:text-gray-600">
                                <option value="" disabled selected>Select Sex</option>
                                <option class="text-black" value="male">Male</option>
                                <option class="text-black" value="female">Female</option>
                            </select>
                        </div>

                        <div class="grid">
                            <label for="birthday" class="text-lg text-white tracking-tight">Birthday:</label>
                            <input type="date" value="{{old('birthday')}}" name="birthday" id="birthday" class="rounded-md px-4 py-3 bg-white text-black placeholder:text-black">
                        </div>

                        <div class="grid">
                            <label for="phone_number" class="text-lg text-white tracking-tight">Phone number:</label>
                            <input type="number" value="{{old('phone_number')}}" name="phone_number" id="phone_number"  placeholder="Phone number" class="rounded-md px-4 py-3 bg-white text-black placeholder:text-black">
                        </div>

                        <div class="grid">
                            <label for="emergency_name" class="text-lg text-white tracking-tight">Emergency Contact(Name):</label>
                            <input type="text" value="{{old('emergency_name')}}"  name="emergency_name" id="emergency_name" placeholder="Contact Name" class="rounded-md px-4 py-3 bg-white text-black placeholder:text-black">
                        </div>

                        <div class="grid">
                            <label for="emergency_contact" class="text-lg text-white tracking-tight">Emergency Contact:</label>
                            <input type="number" value="{{old('emergency_contact')}}"  name="emergency_contact" id="emergency_contact" placeholder="Emergency Contact" class="rounded-md px-4 py-3 bg-white text-black placeholder:text-black">
                        </div>

                        <div class="grid">
                            <label for="emergency_relationship" class="text-lg text-white tracking-tight">Emergency Contact(Relationship):</label>
                            <input type="text" value="{{old('emergency_relationship')}}" name="emergency_relationship" id="emergency_relationship" placeholder="Contact Relationship" class="rounded-md px-4 py-3 bg-white text-black placeholder:text-black">
                        </div>


                        
                        <div class="grid">
                            <label for="email" class="text-lg text-white tracking-tight">Email:</label>
                            <input type="email" value="{{old('email')}}" placeholder="Email" name="email" id="email" class="rounded-md px-4 py-3 bg-white placeholder:text-black text-black">
                        </div>

                        <div class="grid">
                            <label for="username" class="text-lg text-white tracking-tight">Username:</label>
                            <input type="text" value="{{old('username')}}" placeholder="Username" name="username" id="username" class="rounded-md px-4 py-3 bg-white placeholder:text-black text-black">
                        </div>  

                        <div class="grid">
                            <label for="password" class="text-lg text-white tracking-tight">Password:</label>
                            <input type="password" placeholder="Password" name="password" id="password" class="rounded-md px-4 py-3 bg-white placeholder:text-black text-black">
                            <span class="text-gray-300 italic pt-2 cursor-pointer"  onclick="my_modal_6.showModal()">check valid passwords here</span>
                            <!-- Open the modal using ID.showModal() method -->
                        </div>

                        <div class="grid">
                            <label for="password_confirmation" class="text-lg text-white tracking-tight">Confirm:</label>
                            <input type="password" placeholder="Confirm password" name="password_confirmation" id="password_confirmation" class="rounded-md px-4 py-3 bg-white placeholder:text-black text-black">
                        </div>


                        <button class="btn btn-primary mt-4 text-md text-lg tracking-wide sm:col-span-2">SIGN UP</button>

                        <div class="text-center grid sm:col-span-2">
                            <a href="{{route('login')}}" class="text-lg text-white tracking-wide hover:text-blue-500 py-1">Already have an account? Login </a>
                        </div>

                    </form>
                </div>
             
            </div>

            @if (session()->has('general'))
                <dialog id="my_modal_25" class="modal">
                    <div class="modal-box">
                    <h3 class="text-xl font-bold">Signup Failed!</h3>
                    <p class="py-4 pt-8 text-center text-red-600">{{session('general')}}</p>
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
                    document.getElementById('my_modal_25').showModal();
                    });
                </script>
             @endif

             @if (session()->has('failed'))
             <dialog id="my_modal_26" class="modal">
                 <div class="modal-box">
                 <h3 class="text-xl font-bold">Signup Failed!</h3>
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
                 document.getElementById('my_modal_26').showModal();
                 });
             </script>
          @endif

          @if ($errors->has('email'))
          <dialog id="my_modal_27" class="modal">
              <div class="modal-box">
              <h3 class="text-xl font-bold">Signup Failed!</h3>
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

       
       @if ($errors->has('password'))
       <dialog id="my_modal_28" class="modal">
           <div class="modal-box">
           <h3 class="text-xl font-bold">Signup Failed!</h3>
           <p class="py-4 pt-8 text-center text-red-600">{{$errors->first('password')}}</p>
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
           document.getElementById('my_modal_28').showModal();
           });
       </script>
    @endif

    </section>

   

</body>
</html>