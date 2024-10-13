<?php
// app/Models/ServicePart.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'part_number',
        'price',
        'service_id',
        'maintenance_schedule_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class); // Relationship with Service
    }

    public function maintenanceSchedule()
    {
        return $this->belongsTo(MaintenanceSchedule::class); // Relationship with MaintenanceSchedule
    }
}
