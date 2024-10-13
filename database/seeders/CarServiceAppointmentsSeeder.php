<?php

// database/seeders/CarServiceAppointmentsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarServiceAppointment;

class CarServiceAppointmentsSeeder extends Seeder
{
    public function run()
    {
        CarServiceAppointment::create(['car_id' => 1, 'user_id' => 2, 'service_id' => 1, 'appointment_date' => '2024-01-10 10:00:00', 'status' => 'Pending']);
        CarServiceAppointment::create(['car_id' => 2, 'user_id' => 2, 'service_id' => 2, 'appointment_date' => '2024-01-15 11:00:00', 'status' => 'Pending']);
    }
}
