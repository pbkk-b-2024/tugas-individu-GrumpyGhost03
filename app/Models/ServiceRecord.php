<?php

// app/Models/ServiceRecord.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRecord extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'car_id', 'user_id', 'service_date', 'total_price'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
