<?php

// database/seeders/ServicePartsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicePart;

class ServicePartsSeeder extends Seeder
{
    public function run()
    {
        ServicePart::create(['name' => 'Oli Mesin', 'part_number' => 'OLI123', 'price' => 50000, 'service_id' => 2]);
        ServicePart::create(['name' => 'Filter Oli', 'part_number' => 'FOLI456', 'price' => 30000, 'service_id' => 2]);
    }
}
