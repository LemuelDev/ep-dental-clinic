<?php

namespace App\Http\Controllers;

use App\Models\EmergencyContact;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    
    public function  store(Request $request) {

       // Validate the request inputs
     $request->validate([
        'service_choice' => 'required|string',
        'reservation_date' => 'required|date|after_or_equal:today',
        'reservation_time' => 'required|date_format:H:i',
        'name' => 'required|string|max:255',
        'relationship' => 'required|string|max:255',
        'phone_number' => 'required|numeric',
    ]);

    // Combine date and time for the start
    $startDateTime = Carbon::parse($request->reservation_date . ' ' . $request->reservation_time);

    // Calculate the end time by adding 1 hour to the start time
    $endDateTime = $startDateTime->clone()->addHour();

    // Check if the selected time slot is already taken
    $existingReservation = Reservation::where('start', '<=', $endDateTime)
        ->where('end', '>=', $startDateTime)
        ->exists();

        if ($existingReservation) {
            return redirect()->back()->with('failed', 'The selected time slot is already occupied. Please choose another time.');
        }
    // Create a new reservation
    $reservation = Reservation::create([
        'userprofile_id' => auth()->id(),  // Assuming the user is logged in
        'treatment_choice' => $request->service_choice,
        'start' => $startDateTime,
        'end' => $endDateTime,
        'reservation_status' => 'pending',  // Set default status to 'pending'
    ]);

    // Create an emergency contact entry (assuming a relationship to the reservation)
    EmergencyContact::create([
        'reservation_id' => $reservation->id,
        'name' => $request->name,
        'relationship' => $request->relationship,
        'phone_number' => $request->phone_number,
    ]);
    
    return redirect()->route("patient.reservations")->with("success", "Reservation created successfully. Please wait for the admin approval.");

    }

    public function delete() {
        
    }


    public function update() {
        
    }


    public function patientAppoinments() {
    
        
    }


}

