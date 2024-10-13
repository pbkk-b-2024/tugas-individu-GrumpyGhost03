<?php

// app/Models/Car.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['make', 'model', 'year', 'price', 'stock', 'vin', 'image']; // Added 'image' here

    public function carSales()
    {
        return $this->hasMany(CarSale::class);
    }

    public function serviceRecords()
    {
        return $this->hasMany(ServiceRecord::class);
    }

    public function appointments()
    {
        return $this->hasMany(CarServiceAppointment::class);
    }
}
