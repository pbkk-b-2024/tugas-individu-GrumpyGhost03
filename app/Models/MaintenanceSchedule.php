<?php
// app/Models/MaintenanceSchedule.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'maintenance_type',
        'due_date',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class); // Relationship with Car
    }

    public function services()
    {
        return $this->hasMany(Service::class); // If you have a relationship with services, otherwise remove this
    }
}
