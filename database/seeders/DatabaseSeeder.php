<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\CarSale;
use Illuminate\Database\Seeder;
use Database\Seeders\CarSalesSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            UsersSeeder::class,
            PermissionsSeeder::class,
            CarsSeeder::class,
            CustomersSeeder::class,
            CarSalesSeeder::class,
            MaintenanceSchedulesSeeder::class,
            ServicesSeeder::class,
            ServicePartsSeeder::class,
            ServiceRecordsSeeder::class,
            CarServiceAppointmentsSeeder::class,
            InvoicesSeeder::class,
        ]);
    }
}
