<?php

namespace Database\Seeders;

use App\Models\guru;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            // $validation =
            'username' => 'Admin123',
            'password' => '12345',
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'Operator123',
            'password' => '12345678',
            'role' => 'operator'
        ]);

        User::create([
            'username' => 'Kii',
            'password' => '123',
            'role' => 'operator'
        ]);
    }
}
