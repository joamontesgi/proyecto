<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function store(Request $request){
        if($request->product_id < 0 || $request->stock < 0){
            return response()->json(['error' => 'No se permiten valores negativos']);
        }
        $inventory = new Inventory();
        $inventory->product_id = $request->product_id;
        $inventory->stock = $request->stock;
        $inventory->save();
        return response()->json($inventory);
    }

    public function update(Request $request, $id){
        if($request->stock < 0){
            return response()->json(['error' => 'No se permiten valores negativos']);
        }
        $inventory = Inventory::find($id);
        $inventory->stock = $request->stock;
        $inventory->save();
        return response()->json($inventory);
    }
}
