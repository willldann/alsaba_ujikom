<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Dendeng Manis',
            'category' => 'Dendeng',
            'price' => 50000,
            'image' => 'dendeng-manis.jpg',
        ]);

        Product::create([
            'name' => 'Dendeng Pedas',
            'category' => 'Dendeng',
            'price' => 55000,
            'image' => 'dendeng-pedas.jpg',
        ]);
    }
}
