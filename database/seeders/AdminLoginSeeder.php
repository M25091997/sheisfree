<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@example.com'], // unique field
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'), // choose a secure password
                'is_admin' => 1, // assuming you have an is_admin column
            ]
        );
    }
}
