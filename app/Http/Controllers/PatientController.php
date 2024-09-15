<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class PatientController extends Controller
{
        
    public function getCalendar() {
        return view(view: "patient.calendar");
    }
    
    public function getReservations() {

        $reservations = Reservation::where('userprofile_id', auth()->user()->userProfile->id)
        ->where('reservation_status', 'pending')->get();

        return view("patient.appointments", compact("reservations"));
    }


    public function createReservations (){
        return view("patient.createReservation");
    }

    public function getTreatmentHistory() {
        return view("patient.treatmentHistory");
    }

    public function getProfile() {
        return view("patient.profile");
    }
}
