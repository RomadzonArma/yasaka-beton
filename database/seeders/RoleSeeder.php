<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['role_name' => 'CEO'],
            ['role_name' => 'Manager'],
            ['role_name' => 'Admin'],
            ['role_name' => 'Driver'],
            ['role_name' => 'Field Team'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
