<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Товар 1',
            'price' => 10.00,
        ]);

        Product::create([
            'name' => 'Товар 2',
            'price' => 20.00,
        ]);

        Product::create([
            'name' => 'Товар 3',
            'price' => 30.00,
        ]);

        Product::create([
            'name' => 'Товар 4',
            'price' => 40.00,
        ]);

        Product::create([
            'name' => 'Товар 5',
            'price' => 50.00,
        ]);
    }
}
