<?php

namespace Database\Seeders;

use App\Models\ConcreteType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConcreteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $concreteTypes = [
            ['type_name' => 'Standard', 'profit_percentage' => 20.00, 'price_per_cubic' => 500.00],
            ['type_name' => 'High Strength', 'profit_percentage' => 25.00, 'price_per_cubic' => 700.00],
            ['type_name' => 'Lightweight', 'profit_percentage' => 15.00, 'price_per_cubic' => 600.00],
        ];

        foreach ($concreteTypes as $concreteType) {
            ConcreteType::create($concreteType);
        }
    }
}
