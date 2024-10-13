<?php

// database/seeders/ServicesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        Service::create(['name' => 'Servis Berkala', 'description' => 'Servis rutin untuk semua kendaraan', 'price' => 300000]);
        Service::create(['name' => 'Ganti Oli', 'description' => 'Ganti oli mesin kendaraan', 'price' => 150000]);
    }
}
