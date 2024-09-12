<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function getAppointments() {
        return view("patient.appointments");
    }

    public function getPatientHistory() {
        return view("patient.treatmentHistory");
    }

    public function getProfile() {
        return view("patient.profile");
    }
}
