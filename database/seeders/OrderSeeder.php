<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $order = Order::create([
                'total_price' => rand(50, 250),
            ]);

            $products = Product::inRandomOrder()->take(rand(1, 3))->get();

            foreach ($products as $product) {
                $order->products()->attach($product->id, [
                    'quantity' => rand(1, 5),
                ]);
            }
        }
    }
}
