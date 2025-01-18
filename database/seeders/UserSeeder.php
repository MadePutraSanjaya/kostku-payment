<?php

namespace Database\Seeders;

use App\Http\Enums\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => Role::ADMIN,
        ]);

        // Create Penghuni User
        User::create([
            'name' => 'Penghuni User',
            'email' => 'penghuni@example.com',
            'password' => Hash::make('password'),
            'role' => Role::PENGHUNI,
        ]);
    }
}
