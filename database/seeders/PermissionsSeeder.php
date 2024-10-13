<?php

// database/seeders/PermissionsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'view cars']);
        Permission::create(['name' => 'manage cars']);
        Permission::create(['name' => 'manage services']);
    }
}
