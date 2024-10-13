<?php

// database/seeders/CustomersSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomersSeeder extends Seeder
{
    public function run()
    {
        Customer::create(['name' => 'Andi', 'email' => 'andi@example.com', 'phone' => '081234567890', 'address' => 'Jakarta, Indonesia']);
        Customer::create(['name' => 'Budi', 'email' => 'budi@example.com', 'phone' => '081234567891', 'address' => 'Bandung, Indonesia']);
    }
}
