<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [];
        for ($i = 1; $i <= 10000; $i++) {
            $products[] = [
                'name' => 'Product ' . $i,
                'price' => rand(-100, 1000),
            ];
        }

        DB::table('products')->insert($products);
    }
}
