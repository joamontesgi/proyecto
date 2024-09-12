<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = DB::table('products')->pluck('id');

        $sales = [];
        for ($i = 1; $i <= 10000; $i++) {
            $productId = $products->random();
            $quantity = rand(-100, 30); // Cantidad aleatoria entre 1 y 30
            $productPrice = DB::table('products')->where('id', $productId)->value('price');

            $sales[] = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'total_amount' => $productPrice * $quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('sales')->insert($sales);
    }
}
