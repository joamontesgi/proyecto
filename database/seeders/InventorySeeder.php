<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = DB::table('products')->pluck('id');

        $inventory = [];
        foreach ($products as $productId) {
            $inventory[] = [
                'product_id' => $productId,
                'stock' => rand(-50, 200),
            ];
        }

        DB::table('inventory')->insert($inventory);
    }
}
