<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_sales')->insert([
            [
                'car_id' => 1, // Ensure this ID exists in the cars table
                'customer_id' => 1, // Ensure this ID exists in the customers table
                'sale_date' => '2024-01-15',
                'total_price' => 300000000, // Example price in Indonesian Rupiah
            ],
            [
                'car_id' => 2, // Ensure this ID exists in the cars table
                'customer_id' => 2, // Ensure this ID exists in the customers table
                'sale_date' => '2024-02-20',
                'total_price' => 250000000,
            ],
            [
                'car_id' => 4, // Ensure this ID exists in the cars table
                'customer_id' => 1, // Ensure this ID exists in the customers table
                'sale_date' => '2024-03-05',
                'total_price' => 400000000,
            ],
            // Add more entries as needed
        ]);
    }
}
