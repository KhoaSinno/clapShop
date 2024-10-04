<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class NewUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admins
        User::create([
            'username' => 'Oris',
            'role' => 'admin',
            'fullname' => 'Nguyễn Văn Oris',
            'password' => Hash::make('123456'),
            'email' => 'oris@example.com',
            'phone' => '0123456781',
            'address' => '123 Admin St, City A',
            'gender' => 'Male',
            'dateOfBirth' => '2004-01-01',
        ]);

        User::create([
            'username' => 'admin2',
            'role' => 'admin',
            'fullname' => 'Admin Two',
            'password' => Hash::make('123456'),
            'email' => 'admin2@example.com',
            'phone' => '0123456782',
            'address' => '124 Admin St, City A',
            'gender' => 'Female',
            'dateOfBirth' => '1981-02-02',
        ]);

        User::create([
            'username' => 'admin3',
            'role' => 'admin',
            'fullname' => 'Admin Three',
            'password' => Hash::make('123456'),
            'email' => 'admin3@example.com',
            'phone' => '0123456783',
            'address' => '125 Admin St, City A',
            'gender' => 'Male',
            'dateOfBirth' => '1982-03-03',
        ]);

        User::create([
            'username' => 'admin4',
            'role' => 'admin',
            'fullname' => 'Admin Four',
            'password' => Hash::make('123456'),
            'email' => 'admin4@example.com',
            'phone' => '0123456784',
            'address' => '126 Admin St, City A',
            'gender' => 'Female',
            'dateOfBirth' => '1983-04-04',
        ]);

        User::create([
            'username' => 'admin5',
            'role' => 'admin',
            'fullname' => 'Admin Five',
            'password' => Hash::make('123456'),
            'email' => 'admin5@example.com',
            'phone' => '0123456785',
            'address' => '127 Admin St, City A',
            'gender' => 'Male',
            'dateOfBirth' => '1984-05-05',
        ]);

        // Customers
        User::create([
            'username' => 'customer1',
            'role' => 'customer',
            'fullname' => 'Customer One',
            'password' => Hash::make('123456'),
            'email' => 'customer1@example.com',
            'phone' => '0987654321',
            'address' => '123 Customer St, City B',
            'gender' => 'Male',
            'dateOfBirth' => now()->subYears(25),
        ]);

        User::create([
            'username' => 'customer2',
            'role' => 'customer',
            'fullname' => 'Customer Two',
            'password' => Hash::make('123456'),
            'email' => 'customer2@example.com',
            'phone' => '0987654322',
            'address' => '124 Customer St, City B',
            'gender' => 'Female',
            'dateOfBirth' => now()->subYears(26),
        ]);

        User::create([
            'username' => 'customer3',
            'role' => 'customer',
            'fullname' => 'Customer Three',
            'password' => Hash::make('123456'),
            'email' => 'customer3@example.com',
            'phone' => '0987654323',
            'address' => '125 Customer St, City B',
            'gender' => 'Male',
            'dateOfBirth' => now()->subYears(27),
        ]);

        User::create([
            'username' => 'customer4',
            'role' => 'customer',
            'fullname' => 'Customer Four',
            'password' => Hash::make('123456'),
            'email' => 'customer4@example.com',
            'phone' => '0987654324',
            'address' => '126 Customer St, City B',
            'gender' => 'Female',
            'dateOfBirth' => now()->subYears(28),
        ]);

        User::create([
            'username' => 'customer5',
            'role' => 'customer',
            'fullname' => 'Customer Five',
            'password' => Hash::make('123456'),
            'email' => 'customer5@example.com',
            'phone' => '0987654325',
            'address' => '127 Customer St, City B',
            'gender' => 'Male',
            'dateOfBirth' => now()->subYears(29),
        ]);
    }
}
