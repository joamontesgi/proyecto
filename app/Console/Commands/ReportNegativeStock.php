<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ReportNegativeStock extends Command
{
    protected $signature = 'report:negative-stock';
    protected $description = 'Generate a report of products with negative stock';

    public function handle()
    {
        $products = DB::table('inventory')
            ->join('products', 'inventory.product_id', '=', 'products.id')
            ->where('inventory.stock', '<', 0)
            ->select('products.id', 'products.name', 'inventory.stock')
            ->get();

        if ($products->isEmpty()) {
            $this->info('No negative stock found.');
        } else {
            $this->info('Products with negative stock:');
            foreach ($products as $product) {
                $this->line("Product ID: {$product->id}, Name: {$product->name}, Stock: {$product->stock}");
            }
        }
    }
}
