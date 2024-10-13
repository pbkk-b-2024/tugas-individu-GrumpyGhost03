<?php

// database/seeders/UsersSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1, // Admin
        ]);

        User::create([
            'name' => 'Pelanggan A',
            'email' => 'pelanggan_a@example.com',
            'password' => Hash::make('password'),
            'role_id' => 3, // Pelanggan
        ]);
    }
}
