<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            ['employee_name' => 'John Doe', 'role' => 'Driver', 'phone' => '123456789', 'address' => '123 Main St', 'salary' => 5000],
            ['employee_name' => 'Jane Smith', 'role' => 'Operator', 'phone' => '987654321', 'address' => '456 Elm St', 'salary' => 6000],
        ]);
    }
}
