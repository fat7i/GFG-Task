<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $toDB = [];
        $brands = ['Ralph Lauren', 'Tommy Hilfiger', 'Nike', 'Hugo Boss', 'Diesel', 'Levis', 'Gucci', 'Lacoste', 'Adidas', 'Versace'];
        foreach ($brands as $brand) {
            $toDB[] = [
                'name' => $brand,
                'created_at' => now(),
            ];
        }
        \Api\Models\Brand::insert($toDB);
    }
}
