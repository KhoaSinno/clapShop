<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'username' => 'sinoo',
            'role' => 'admin',
            'fullname' => 'sinoo',
            'password' => Hash::make('123456'),
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'address' => '123 Main St, City A',
            'gender' => 'Male',
            'dateOfBirth' => '2004-01-11',
        ]);

        // Customer
        User::create([
            'username' => 'teo',
            'role' => 'customer',
            'fullname' => 'Tèo Em',
            'password' => Hash::make('cus123'),
            'email' => 'teoem@gmail.com',
            'phone' => '0123456789',
            'address' => '123 Main St, City',
            'gender' => 'male',
            'dateOfBirth' => now()->subYears(25),
        ]);

        User::create([
            'username' => 'tun',
            'role' => 'customer',
            'fullname' => 'Anh Tủn',
            'password' => Hash::make('cus123'),
            'email' => 'tun@gmail.com',
            'phone' => '0987654321',
            'address' => '456 Elm St, City',
            'gender' => 'female',
            'dateOfBirth' => now()->subYears(30),
        ]);
    }
}
