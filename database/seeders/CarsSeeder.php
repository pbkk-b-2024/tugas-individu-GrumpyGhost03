<?php

// database/seeders/CarsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarsSeeder extends Seeder
{
    public function run()
    {
        Car::create(['make' => 'Toyota', 'model' => 'Avanza', 'year' => 2022, 'price' => 250000000, 'stock' => 10, 'VIN' => 'JT123456789012345']);
        Car::create(['make' => 'Honda', 'model' => 'Jazz', 'year' => 2022, 'price' => 240000000, 'stock' => 8, 'VIN' => 'HDA123456789012345']);
        Car::create(['make' => 'Daihatsu', 'model' => 'Xenia', 'year' => 2022, 'price' => 230000000, 'stock' => 5, 'VIN' => 'DIA123456789012345']);
        Car::create(['make' => 'Suzuki', 'model' => 'Ertiga', 'year' => 2022, 'price' => 220000000, 'stock' => 7, 'VIN' => 'SUZ123456789012345']);
    }
}
