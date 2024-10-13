<?php

// database/seeders/ServiceRecordsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceRecord;

class ServiceRecordsSeeder extends Seeder
{
    public function run()
    {
        ServiceRecord::create(['service_id' => 1, 'car_id' => 1, 'customer_id' => 1, 'service_date' => '2023-10-01', 'service_price' => 300000, 'parts_total_price' => 80000]);
        ServiceRecord::create(['service_id' => 2, 'car_id' => 2, 'customer_id' => 2, 'service_date' => '2023-11-01', 'service_price' => 150000, 'parts_total_price' => 80000]);
    }
}
