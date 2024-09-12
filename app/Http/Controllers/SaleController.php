<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Inventory;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function products(){
        $products = Product::all();
        return response()->json($products);
    }

    public function quantity(){
        $products_with_quantity_negative = Sale::where('quantity', '<', 0)->get();
        return response()->json($products_with_quantity_negative);
    }
    public function inventory(){
        $products_with_quantity_negative = Inventory::where('stock', '<', 0)->get();
        return response()->json($products_with_quantity_negative);
    }

    public function sales(){
        $sales = Sale::all();
        return response()->json($sales);
    }

    public function store(Request $request){
        if($request->quantity < 0 || $request->total_amount < 0){
            return response()->json(['error' => 'No se permiten valores negativos']);
        }
        $sale = new Sale();
        $sale->product_id = $request->product_id;
        $sale->quantity = $request->quantity;
        $sale->total_amount = $request->total_amount;
        $sale->save();
        return response()->json($sale);
    }

    public function update(Request $request, $id){
        if($request->quantity < 0 || $request->total_amount < 0){
            return response()->json(['error' => 'No se permiten valores negativos']);
        }
        $sale = Sale::find($id);
        $sale->quantity = $request->quantity;
        $sale->total_amount = $request->total_amount;
        $sale->save();
        return response()->json($sale);
    }
}
