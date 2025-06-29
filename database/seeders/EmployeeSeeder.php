<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::updateOrCreate(
            ['email' => 'john@example.com'],
            [
                'name' => 'John Doe',
                'password' => Hash::make('password123'),
                'role' => 'employee',
            ]
        );

        Employee::updateOrCreate(
            ['email' => 'jane@example.com'],
            [
                'name' => 'Jane Owner',
                'password' => Hash::make('password123'),
                'role' => 'owner',
            ]
        );
    }
}