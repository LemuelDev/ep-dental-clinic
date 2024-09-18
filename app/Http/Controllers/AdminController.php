<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\UserProfiles;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function getCalendar() {
        return view("admin.calendar");
    }
    
    public function getAppointments(Request $request) {
        $status = $request->query('status', 'pending'); // Default to 'pending'
        $filter = $request->query('filter', 'all'); // Default to 'all'
    
        $query = Reservation::where('reservation_status', $status);
    
        // Apply date filtering based on the 'filter' value from the dropdown
        switch ($filter) {
            case 'today':
                $query->whereDate('start', Carbon::today());
                break;
            case 'next-3-days':
                $query->whereBetween('start', [Carbon::today(), Carbon::today()->addDays(3)]);
                break;
            case 'this-week':
                $query->whereBetween('start', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'next-week':
                $query->whereBetween('start', [Carbon::now()->startOfWeek()->addWeek(), Carbon::now()->endOfWeek()->addWeek()]);
                break;
            case 'next-2-weeks':
                $query->whereBetween('start', [Carbon::now(), Carbon::now()->addWeeks(2)]);
                break;
            default:
                // 'all' - no date filtering applied
                break;
        }
    
        $reservations = $query->orderBy('start', 'asc')->get();
    
        return view("admin.appointments", compact("reservations", "filter", "status"));
    }
    

    public function getActiveUsers() {

        $users = UserProfiles::where('user_type', 'patient')
        ->where("user_status", 'enable')
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
        $status = $request->query('status', 'completed'); // Default to 'completed'
        
        $query = Reservation::where('reservation_status', $status);

        $reservations = $query->orderBy('start', 'asc')->get();
        return view("admin.patientHistory", compact("reservations", "status"));
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
            "reservation_status" => "approved"
        ]);

        return redirect()->route('admin.appointments')->with("success", "Reservation approved successfully.");
    }
    
    public function rejectReservation(Reservation $id) {
        
        $id->update([
            "reservation_status" => "rejected"
        ]);

        return  redirect()->route('admin.appointments')->with("success", "Reservation rejected successfully.");
    }

 
}
