<?php

namespace App\Http\Controllers;

use App\Mail\ApproveEmail;
use App\Models\Reservation;
use App\Models\UserProfiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    
    public function getCalendar() {
        return view("admin.calendar");
    }
    
    public function getAppointments(Request $request) {
        // $filter = $request->query('filter', 'all'); // Default to 'all'
    
        $query= Reservation::where('reservation_status', "approved");
    
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
        
        // Use whereHas to filter based on the related UserProfile model
                $query = $query->whereHas('userProfile', function($query) use ($searchTerm) {
                    $query->where('firstname', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $searchTerm . '%');
                });
        }
        
        $reservations = $query->get();
      
    
        return view("admin.appointments", compact("reservations"));
    }

    public function getApprovals() {
        $users = UserProfiles::where("user_type", 'patient')
        ->where("user_status", 'enable')
        ->where("isPending", "pending")
        ->orderBy('firstname', 'asc')->get();

        return view("admin.approvals", compact("users"));
    }
    
    public function trackApproval(UserProfiles $id) {

        return view("admin.trackApproval", compact("id"));
    }

    public function approveUser(UserProfiles $id) {
        $id->isPending = "approved";
        $id->save();


        $message = "Congratulations! Your account has been successfully activated. You can now log in to your account and conveniently reserve your appointments to our Dental Clinic. Welcome aboard!";
        Mail::to($id->email)->send(new ApproveEmail(
            $message, 
        ));
        
        return redirect()->route('admin.approvals')->with("success", "User Approved Successfully");
    }

    public function trackUser(UserProfiles $id){
        return view("admin.trackUser", compact("id"));
    }

    public function getActiveUsers() {

        $users = UserProfiles::where('user_type', 'patient')
        ->where("user_status", 'enable')
        ->where("isPending", "approved")
        ->orderBy('firstname', 'asc')->get();

        return view("admin.activeUser", compact("users"));
    }

    public function getDisableUsers() {
        
        $users = UserProfiles::where('user_type', 'patient')
        ->where("user_status", "disabled")
        ->orderBy('firstname', 'asc')->get();

        return view("admin.activeUser", compact("users"));

    }

    public function getPatientHistory(Request $request) {
   
        $query= Reservation::where('reservation_status', "approved");
    
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
        
        // Use whereHas to filter based on the related UserProfile model
                $query = $query->whereHas('userProfile', function($query) use ($searchTerm) {
                    $query->where('firstname', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $searchTerm . '%');
                });
        }
        
        $reservations = $query->get();
        return view("admin.patientHistory", compact("reservations",));
    }

    public function noShowHistory(Request $request) {
   
        $query= Reservation::where('reservation_status', "no-show");
    
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
        
        // Use whereHas to filter based on the related UserProfile model
                $query = $query->whereHas('userProfile', function($query) use ($searchTerm) {
                    $query->where('firstname', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $searchTerm . '%');
                });
        }
        
        $reservations = $query->get();
        return view("admin.patientHistory", compact("reservations",));
    }

    public function getProfile() {
        return view("admin.profile");
    }


    public function  disableUser(UserProfiles $id) {
        
        $id->update([
            "user_status" => "disabled"
        ]);

        return redirect()->route("admin.activeUsers")->with("success", "User disabled successfully!");
    }

    public function  enableUser(UserProfiles $id) {
        
        $id->update([
            "user_status" => "enable"
        ]);

        return redirect()->route("admin.activeUsers")->with("success", "User enabled successfully!");
    }


    public function trackReservation(Reservation $id) {
        
        return view("admin.trackReservation", compact("id"));
    }

    public function approveReservation(Reservation $id) {
        
        $id->update([
            "reservation_status" => "completed"
        ]);

        return redirect()->route('admin.appointments')->with("success", "Reservation set to completed.");
    }
    
    public function rejectReservation(Reservation $id) {
        
        $id->update([
            "reservation_status" => "no-show"
        ]);

        return  redirect()->route('admin.appointments')->with("success", "Reservation set to no-shows.");
    }

    public function editProfile(){
        return view("admin.editProfile");
    }

    public function updateProfile(UserProfiles $id){
        
        $requiredFields = ['lastname', 'firstname', 'email','age', 'username', 'address', 'sex', "phone_number", "birthday", "emergency_name", "emergency_contact", "emergency_relationship"];
        
        foreach ($requiredFields as $field) {
            if (empty(request($field))) {
                return redirect()->back()->with(['failed' => 'All fields must be filled up.'])->withInput();
            }
        }
        $validated = request()->validate([
            "lastname" => "required|string|max:40",
            "firstname" => "required|string|max:40",
            "middlename" => "nullable|string|max:40",
            "extensionname" => "nullable|string|max:40",
            "email" => "required|email|unique:userprofiles,email," . auth()->user()->userProfile->id,
            "username" => "required|max:40",
            "address" => "required|string",
            "sex" => "required|string",
            "age"=> "required|string",
            "phone_number" => "required|string",
            "birthday" => "required|string",
            "emergency_name" => "required|string",
            "emergency_contact" => "required|string",
             "emergency_relationship" => "required|string",
             // Optional field with validation for image file
        ], [
            'email.unique' => 'The email address is already registered. Please use a different email address.' // Custom error message for unique email
        ]);

        $id->update([
            "firstname" => $validated["firstname"],
            "lastname" => $validated["lastname"],
            "middlename" => $validated["middlename"] ?? '',
            "extensionname" => $validated["extensionname"] ?? '',
            "email" => $validated["email"],
            "address" => $validated["address"],
            "sex" => $validated["sex"],
            "phone_number" => $validated["phone_number"],
            "birthday" => $validated["birthday"],
            "age" => $validated["age"],
            "emergency_relationship" => $validated["emergency_relationship"],
            "emergency_name" => $validated["emergency_name"],
            "emergency_contact" => $validated["emergency_contact"],
        ]);

        $id->user->update([
            "username" => $validated["username"]
        ]);

        return redirect()->route("admin.profile")->with("success", "Profile updated successfully");
    }
 
}
