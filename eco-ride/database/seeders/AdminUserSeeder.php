<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'saed@ecoride.com'],
            [
                'name' => 'Saed',
                'password' => Hash::make('Saed@123'),
                'role' => 'admin',
                'credits' => 0,
            ]
        );
    }
}
