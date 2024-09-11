<!DOCTYPE html>
<html lang="en" data-theme="cupcake">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}} (LOGIN)</title>
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
<body>
    
    <section class="flex h-screen max-sm:grid ">
        
            {{-- Clinic logo section --}}
            <div data-theme="cupcake" class="flex justify-center items-center w-1/2 max-sm:w-full border-r-2">
                <div class="flex justify-center items-center gap-6 max-lg:flex-col max-sm:flex-row h-auto py-4">
                    <h4 class="text-4xl max-lg:text-3xl max-sm:text-2xl font-bold text-black text-center">ESPINELI-PARADEZA <br> DENTAL CLINIC</h4>
                    <img src="{{ asset('images/tooth-whitening.png') }}" alt="" class="rounded-md w-40 h-160 max-lg:h-130 max-sm:100 max-sm:w-20 align-middle">
                </div>
            </div>
            
            {{-- Login section --}}
            <div data-theme="dark" class="flex justify-center items-center w-1/2 max-sm:w-full">
                <div class="text-center py-6">
                    <h4 class="text-3xl font-bold text-white mb-4 tracking-widest">LOGIN</h4>
                    <form action="POST" class="grid gap-4 items-center text-left">
                        <div class="grid">
                            <label for="username" class="text-lg text-white tracking-wider">Username:</label>
                            <input type="text" name="username" id="username" placeholder="Username" class="rounded-md px-10 py-3 bg-white hover:bg-gray-200 text-black placeholder:text-gray-400">
                        </div>
                        <div class="grid">
                            <label for="password" class="text-lg text-white tracking-wider">Password:</label>
                            <input type="password" placeholder="Password" name="password" id="password" class="rounded-md px-10 py-3 bg-white placeholder:text-gray-400">
                        </div>
                        <button class="btn btn-primary mt-4 text-md tracking-wide ">Login</button>

                        <div class="text-center grid">
                            <a href="{{route('forgotPassword')}}" class="text-lg text-white tracking-wide hover:text-blue-500 py-3">Forgot Password?</a>
                            <a href="{{route('signup')}}" class="text-lg text-white tracking-wide hover:text-blue-500 py-1">Don't have an account? Sign Up</a>
                        </div>

                    </form>
                </div>
            </div>

        

    </section>


</body>
</html>