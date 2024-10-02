<?php

namespace Database\Seeders;

use App\Models\Armada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArmadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $armadas = [
            ['fleet_number' => 'TRK001','fleet_name' => 'TRUCK HINO 200', 'capacity' => 10.00, 'status' => 'active'],
            ['fleet_number' => 'TRK002','fleet_name' => 'TRUCK HINO 200', 'capacity' => 12.00, 'status' => 'active'],
            ['fleet_number' => 'MBL001','fleet_name' => 'GRANDMAX 200', 'capacity' => 00.00, 'status' => 'active'],
        ];

        foreach ($armadas as $armada) {
            Armada::create($armada);
        }
    }
}
