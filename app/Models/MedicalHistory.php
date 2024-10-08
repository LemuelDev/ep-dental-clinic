<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_history',
        'description',   
    ];

    protected $table = "medicalhistory_tables";

    public function reservations()
    {
        return $this->hasOne(Reservation::class, 'id');
    }
    
}
