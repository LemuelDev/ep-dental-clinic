<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;

    public $timestamps = false; // Disable timestamps
    protected $table = "emergency_contacts";

    protected $fillable = [
        "name",
        "relationship",
        "phone_number" ,   
        "reservation_id"
    ];

    public function reservation()
    {
            return $this->belongsTo(Reservation::class, 'id');
    }
}
