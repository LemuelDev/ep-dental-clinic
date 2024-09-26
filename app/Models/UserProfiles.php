<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfiles extends Model
{
    use HasFactory;

    protected $fillable = [
        "firstname",
        "middlename",
        "lastname",
        "extensionname",
        "email",
        "phone_number",
        "address",
        "sex",
        "birthday",
        "age",
        "user_status",
        "emergency_name",
        "emergency_contact",
        "emergency_relationship"
    ];
    
    protected $table = 'userprofiles';

    public function user()
    {
            return $this->hasOne(User::class, 'userprofile_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'userprofile_id')->onDelete('cascade');
    }
}
