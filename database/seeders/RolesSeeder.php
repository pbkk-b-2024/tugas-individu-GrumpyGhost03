<?php
// database/seeders/RolesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'admin', 'description' => 'Administrator', 'level' => 1]);
        Role::create(['name' => 'teknisi', 'description' => 'Teknisi', 'level' => 2]);
        Role::create(['name' => 'pelanggan', 'description' => 'Pelanggan', 'level' => 3]);
    }
}
