<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

        // client

        User::create([
            'username' => 'cus1',
            'role' => 'customer',
            'fullname' => 'Alexander',
            'password' => Hash::make('cus123'), // Mật khẩu cho customer1
            'email' => 'customer1@example.com',
            'phone' => '0123456789',
            'address' => '123 Main St, City',
            'gender' => 'male',
            'dateOfBirth' => now()->subYears(25), // 25 tuổi
        ]);

        User::create([
            'username' => 'cus2',
            'role' => 'customer',
            'fullname' => 'Justen',
            'password' => Hash::make('cus123'), // Mật khẩu cho customer2
            'email' => 'customer2@example.com',
            'phone' => '0987654321',
            'address' => '456 Elm St, City',
            'gender' => 'female',
            'dateOfBirth' => now()->subYears(30), // 30 tuổi
        ]);


    }
}
