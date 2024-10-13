<?php

// app/Models/Service.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'maintenance_schedule_id', // Include maintenance_schedule_id in fillable attributes
    ];

    public function serviceRecords()
    {
        return $this->hasMany(ServiceRecord::class); // Relationship with ServiceRecord
    }

    public function appointments()
    {
        return $this->hasMany(CarServiceAppointment::class); // Relationship with CarServiceAppointment
    }

    public function maintenanceSchedule()
    {
        return $this->belongsTo(MaintenanceSchedule::class); // Relationship with MaintenanceSchedule
    }
}
