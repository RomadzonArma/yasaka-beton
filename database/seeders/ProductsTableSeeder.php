<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['product_name' => 'Beton K225', 'description' => 'BTK225', 'price_per_unit' => 100000, 'available_volume' => '100'],
            ['product_name' => 'Beton K250', 'description' => 'BTK250', 'price_per_unit' => 120000, 'available_volume' => '100'],
        ]);
    }
}
