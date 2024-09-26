<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\TimeSlot;
use App\Models\UserProfiles;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class PatientController extends Controller
{
        
    public function getCalendar() {
        return view(view: "patient.calendar");
    }
    
    public function getReservations() {

        $reservations = Reservation::where('userprofile_id', auth()->user()->userProfile->id)
        ->where('reservation_status', 'approved')->get();

        return view("patient.appointments", compact("reservations"));
    }

    public function createReservations(Request $request) {
        $today = Carbon::today()->format('Y-m-d');

        // Get the end date (two months from today)
        $endDate = Carbon::today()->addMonths(2)->format('Y-m-d');

    
        // Fetch all appointments between today and two months from now
        $appointments = TimeSlot::whereBetween('date', [$today, $endDate])->get();
    
        // Prepare dates with available and fully booked statuses
        $dates = [];
        $period = CarbonPeriod::create($today, $endDate);
        $allTimeSlots = ['8AM-9AM', '9AM-10AM', '10AM-11AM', '11AM-12PM', '1PM-2PM', '2PM-3PM', '3PM-4PM'];

        foreach ($period as $date) {
            $dateFormatted = $date->format('Y-m-d');
            $appointmentsForDate = $appointments->where('date', $dateFormatted);
            
            // Check if all time slots are booked for this date
            if ($appointmentsForDate->isNotEmpty()) {
                $bookedTimeSlots = $appointmentsForDate->pluck('time_range')->toArray();
                
                // Check if every time slot for the day is booked
                $isFullyBooked = collect($allTimeSlots)->diff($bookedTimeSlots)->isEmpty();
                
                // Mark date as fully booked if all slots are booked, else available
                $dates[$dateFormatted] = $isFullyBooked ? 'fully-booked' : 'available';
            } else {
                // No appointments for this date, mark as available
                $dates[$dateFormatted] = 'available';
            }
        }

    
        // Fetch available time slots for the selected date if it exists in the request
        $timeSlots = [];
       // Check if the time slots are being populated correctly
        if ($request->has('reservation_date')) {
            $selectedDate = $request->input('reservation_date');
            $appointmentsForDate = TimeSlot::where('date', $selectedDate)->get();
            $timeSlots = [
                '8AM-9AM'  => ['is_occupied' => $appointmentsForDate->where('time_range', '8AM-9AM')->first()->is_occupied ?? false],
                '9AM-10AM' => ['is_occupied' => $appointmentsForDate->where('time_range', '9AM-10AM')->first()->is_occupied ?? false],
                '10AM-11AM'=> ['is_occupied' => $appointmentsForDate->where('time_range', '10AM-11AM')->first()->is_occupied ?? false],
                '11AM-12PM'=> ['is_occupied' => $appointmentsForDate->where('time_range', '11AM-12PM')->first()->is_occupied ?? false],
                '1PM-2PM'  => ['is_occupied' => $appointmentsForDate->where('time_range', '1PM-2PM')->first()->is_occupied ?? false],
                '2PM-3PM'  => ['is_occupied' => $appointmentsForDate->where('time_range', '2PM-3PM')->first()->is_occupied ?? false],
                '3PM-4PM'  => ['is_occupied' => $appointmentsForDate->where('time_range', '3PM-4PM')->first()->is_occupied ?? false],
            ];
        }

        return view('patient.createReservation', compact('dates', 'timeSlots', 'today', 'endDate'));
    }
    
    public function editProfile(){
        return view("patient.editProfile");
    }

    public function updateProfile(UserProfiles $id){
        
        $requiredFields = ['lastname', 'firstname', 'email','age', 'username', 'address', 'sex', "phone_number", "birthday", "emergency_name", "emergency_contact", "emergency_relationship"];
    
        foreach ($requiredFields as $field) {
            if (empty(request($field))) {
                dd($field);
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

        return redirect()->route("patient.profile")->with("success", "Profile updated successfully");
    }

    public function getTreatmentHistory() {

        $reservations= Reservation::whereIn('reservation_status', ['completed', 'no-show'])->get();

        return view("patient.treatmentHistory", compact("reservations"));
    }

    public function getProfile() {
        return view("patient.profile");
    }
}
