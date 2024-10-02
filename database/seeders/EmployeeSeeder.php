<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $managerRoleId = Role::where('role_name', 'Manager')->first()->id;
        $driverRoleId = Role::where('role_name', 'Driver')->first()->id;
        $adminRoleId = Role::where('role_name', 'Admin')->first()->id;
        $ceoRoleId = Role::where('role_name', 'CEO')->first()->id;

        Employee::create([
            'name' => 'Alice Johnson',
            'phone_number' => '08123456789',
            'email' => 'alice.johnson@example.com',
            'role_id' => $ceoRoleId, // ID role CEO
            'hire_date' => '2024-01-15',
        ]);

        Employee::create([
            'name' => 'Bob Smith',
            'phone_number' => '08123456780',
            'email' => 'bob.smith@example.com',
            'role_id' => $managerRoleId, // ID role Manager
            'hire_date' => '2024-01-20',
        ]);

        Employee::create([
            'name' => 'Charlie Brown',
            'phone_number' => '08123456781',
            'email' => 'charlie.brown@example.com',
            'role_id' => $driverRoleId, // ID role Driver
            'hire_date' => '2024-01-25',
        ]);

        Employee::create([
            'name' => 'Daisy Miller',
            'phone_number' => '08123456782',
            'email' => 'daisy.miller@example.com',
            'role_id' => $adminRoleId, // ID role Admin
            'hire_date' => '2024-02-01',
        ]);
    }
}
