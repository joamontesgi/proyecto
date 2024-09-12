<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ReportExcessiveSales extends Command
{
    protected $signature = 'report:excessive-sales';
    protected $description = 'Generate a report of sales exceeding the available stock';

    public function handle()
    {
        $sales = DB::table('sales')
            ->join('inventory', 'sales.product_id', '=', 'inventory.product_id')
            ->whereColumn('sales.quantity', '>', 'inventory.stock')
            ->select('sales.product_id', 'sales.quantity', 'inventory.stock')
            ->get();

        if ($sales->isEmpty()) {
            $this->info('No excessive sales found.');
        } else {
            $this->info('Sales exceeding the available stock:');
            foreach ($sales as $sale) {
                $this->line("Product ID: {$sale->product_id}, Sale Quantity: {$sale->quantity}, Available Stock: {$sale->stock}");
            }
        }
    }
}
