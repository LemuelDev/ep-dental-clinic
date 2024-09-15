<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function getCalendar() {
        return view("admin.calendar");
    }
    
    public function getAppointments() {
        return view("admin.appointments");
    }

    public function getActiveUsers() {
        return view("admin.activeUser");
    }

    public function getPatientHistory() {
        return view("admin.patientHistory");
    }

    public function getProfile() {
        return view("admin.profile");
    }
}
