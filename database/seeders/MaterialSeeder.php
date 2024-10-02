<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = [
            ['material_name' => 'Cement', 'purchase_price' => 100.00, 'stock_quantity' => 200],
            ['material_name' => 'Sand', 'purchase_price' => 50.00, 'stock_quantity' => 500],
            ['material_name' => 'Gravel', 'purchase_price' => 80.00, 'stock_quantity' => 300],
        ];

        foreach ($materials as $material) {
            Material::create($material);
        }
    }
}
