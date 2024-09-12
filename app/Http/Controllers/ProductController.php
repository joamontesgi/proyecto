<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request){
        if($request->price < 0 ){
            return response()->json(['error' => 'No se permiten valores negativos']);
        }
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json($product);
    }

    public function update(Request $request, $id){
        if($request->price < 0){
            return response()->json(['error' => 'No se permiten valores negativos']);
        }
        $product = Product::find($id);
        $product->price = $request->price;
        $product->save();
        return response()->json($product);
    }
}
