<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\UserProfiles;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function getCalendar() {
        return view("admin.calendar");
    }
    
    public function getAppointments() {

        $reservations = Reservation::where('reservation_status', 'pending')
        ->orderBy('start', 'asc')->get();

        return view("admin.appointments", compact("reservations"));
    }

    public function getActiveUsers() {

        $users = UserProfiles::where('user_type', 'patient')
        ->orderBy('firstname', 'asc')->get();

        return view("admin.activeUser", compact("users"));
    }

    public function getPatientHistory() {
        return view("admin.patientHistory");
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
    
}
