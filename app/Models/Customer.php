<?php
// app/Models/Customer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address']; // Fillable attributes

    public function carSales()
    {
        return $this->hasMany(CarSale::class); // Relationship with CarSale model
    }
}
