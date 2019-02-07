<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        $products = [];
        for ($i = 1; $i <= 100; $i++) {
            $products[] = [
                'title' => ucfirst($faker->safeColorName . ' ' . $faker->randomElement(['Shoes', 'T-Shirt', 'Trousers', 'Bag' , 'Socks'])),
                'stock' => rand(50, 200),
                'price' => $faker->randomFloat(NULL, $min = 1, 200),
                'brand_id' => rand(1, 10),
                'created_at' => now(),
            ];
        }
        \Api\Models\Product::insert($products);
    }
}
