<?php

// app/Models/Invoice.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'total', 'invoice_date']; // Fillable attributes

    public function customer()
    {
        return $this->belongsTo(Customer::class); // Relationship with Customer model
    }
}
