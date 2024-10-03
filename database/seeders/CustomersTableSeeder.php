<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            ['name' => 'PT. ABC', 'email' => 'PT.ABC', 'contact_person' => 'Budi', 'phone' => '111222333', 'address' => 'Jl. Raya No. 1'],
            ['name' => 'CV. DEF', 'email' => 'CV.DEF', 'contact_person' => 'Siti', 'phone' => '444555666', 'address' => 'Jl. Merdeka No. 2'],
        ]);
    }
}
