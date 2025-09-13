<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gowesyuk.com'],
            [
                'name' => 'Super Admin',
                'phone' => '08123456789',
                'full_name' => 'Admin Gowes',
                'role' => 'admin',
                'password' => Hash::make('123456'),
            ]
        );
    }
}
