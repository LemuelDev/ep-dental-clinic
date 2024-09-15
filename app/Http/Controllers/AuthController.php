<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function login() {
        return view("shared.login");
    }

    public function signup() {
        return view("shared.signup");
    }

    public function forgotPassword() {
        return view("shared.forgot-password");
    }

    public function store() {

        $requiredFields = ['lastname', 'firstname', 'email', 'username', 'password', 'address', 'sex', "phone_number", "birthday", ];
    
        foreach ($requiredFields as $field) {
            if (empty(request($field))) {
                return back()->withErrors(['general' => 'All fields must be filled up.'])->withInput();
            }
        }
        
        $validated = request()->validate([
            "lastname" => "required|string|max:40",
            "firstname" => "required|string|max:40",
            "middlename" => "nullable|string|max:40",
            "extensionname" => "nullable|string|max:40",
            "email" => "required|email",
            "username" => "required|max:40",
            "password" => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/', // must contain at least one lowercase letter
                'regex:/[A-Z]/', // must contain at least one uppercase letter
                'regex:/[0-9]/', // must contain at least one number
                'regex:/[@$!%*?&#]/' // must contain a special character
            ],
            "address" => "required|string",
            "sex" => "required|string",
            "phone_number" => "required|string",
            "birthday" => "required|string",
             // Optional field with validation for image file
        ], [
            'password.regex' => 'Password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.'
        ]);

        // Check if email already exists in users table
            if (UserProfiles::where('email', $validated['email'])->exists() && User::where('username', $validated['username'])->exists()) {
                return redirect()->back()->with('failed', 'This user already has an account.');
            }

               // Calculate the age using Carbon
        $age = Carbon::parse($validated['birthday'])->age;
    
        // Create the user profile
        $userProfile = UserProfiles::create([
            "firstname" => $validated["firstname"],
            "lastname" => $validated["lastname"],
            "middlename" => $validated["middlename"] ?? '',
            "extensionname" => $validated["extensionname"] ?? '',
            "email" => $validated["email"],
            "address" => $validated["address"],
            "sex" => $validated["sex"],
            "phone_number" => $validated["phone_number"],
            "birthday" => $validated["birthday"],
            "age" => $age,
            
        ]);
    
        // Create the user and associate it with the user profile
        User::create([
            "username" => $validated["username"],
            "password" => Hash::make($validated["password"]),
            "userprofile_id" => $userProfile->id 
        ]);
    
        session()->put('email', $validated['email']);
    
        // // Send email notification
        // $message = "Thanks for Signing up! Your Account is still for approval. We will contact you once your account is approved and ready to use.";
        // Mail::to($validated["email"])->send(new WelcomeEmail(
        //     $message, 
        //     $name, // Use concatenated name here
        //     $validated["username"], 
        //     $validated["email"], 
        //     $validated["municipality"]
        // ));
    
        return redirect()->route("login")->with("signup-success", "Account created successfully.");
    }
    
    public function authenticate(){
        
        $validated = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'required' => 'All fields must be filled up', // Custom message for required fields
        ]);

         if (auth()->attempt($validated)){
        
           
            $user = auth()->user();
            if ($user->userProfile->isPending == 'pending'){

                return redirect()->route("login")->with('failed', 'Your account is still for approval.');
            }else if ($user->userProfile->user_status == 'disabled'){
                
                return redirect()->route("login")->with('failed', 'Your account is disabled.');
            }else {

                request()->session()->regenerate();

               if ($user->userProfile->user_type === 'admin') {
                    return redirect()->route('admin.calendar');
        
                } else {
                    return redirect()->route('patient.calendar');
                }
            }

        }else {
                    // Check if the username exists in the database
                $usernameExists = User::where('username', request('username'))->exists();

                if ($usernameExists) {
                    // If username exists but password is wrong
                    return redirect()->route("login")->with(
                        "password" , "Incorrect password. Please try again."
                    );
                } else {
                    // If username doesn't exist
                    return redirect()->route("login")->with(
                        "username" , "Invalid login credentials. Please try again."
                    );
                }
        }
        
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect()->route("login")->with("success","Logout Successfully");
    }



}
