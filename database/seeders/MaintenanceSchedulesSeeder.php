<?php

// database/seeders/MaintenanceSchedulesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MaintenanceSchedule;

class MaintenanceSchedulesSeeder extends Seeder
{
    public function run()
    {
        MaintenanceSchedule::create(['car_id' => 1, 'maintenance_type' => 'Ganti Oli', 'due_date' => '2024-01-01']);
        MaintenanceSchedule::create(['car_id' => 2, 'maintenance_type' => 'Rotasi Ban', 'due_date' => '2024-02-01']);
    }
}
