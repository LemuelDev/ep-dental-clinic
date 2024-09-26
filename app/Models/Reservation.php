<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

       // Allow mass assignment for these fields
       protected $fillable = [
        'userprofile_id',
        'time_slot_id',
        'medicalhistory_table_id',
        'treatment_choice',
        'description_of_cancel',
        'reservation_status'
    ];

    protected $table = "reservations";

    public $timestamps = false; // Disable timestamps

    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class, 'id');
    }

    public function timeSlots()
    {
        return $this->hasOne(TimeSlot::class, 'id');
    }

    public function userProfile()
    {
        return $this->belongsTo(UserProfiles::class, 'userprofile_id');
    }

}
