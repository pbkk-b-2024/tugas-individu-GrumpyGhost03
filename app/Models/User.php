<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable; // Include Notifiable for notification features

    protected $fillable = ['name', 'email', 'password', 'role_id'];

    protected $hidden = [
        'password', // Hide password field
        'remember_token', // Optional: hide remember token if you're using it
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function carSales()
    {
        return $this->hasMany(CarSale::class);
    }

    public function serviceRecords()
    {
        return $this->hasMany(ServiceRecord::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function appointments()
    {
        return $this->hasMany(CarServiceAppointment::class);
    }
}
