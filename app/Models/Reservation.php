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
        'start',
        'end',
        'treatment_choice',
        'reservation_status'
    ];

    protected $table = "reservations";

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public $timestamps = false; // Disable timestamps

    public function emergencyContact()
    {
        return $this->hasOne(EmergencyContact::class, 'reservation_id');
    }
    public function userProfile()
    {
        return $this->belongsTo(UserProfiles::class, 'userprofile_id');
    }

}
