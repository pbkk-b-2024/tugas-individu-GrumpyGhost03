<?php

// app/Models/CarSale.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\Customer;
use App\Models\User;

class CarSale extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'customer_id', 'sale_date', 'total_price']; // Fillable attributes

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class); // Relationship with Car model
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class); // Relationship with Customer model
    }
}
