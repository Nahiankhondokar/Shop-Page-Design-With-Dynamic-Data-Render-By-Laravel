<?php

namespace App\Http\Controllers;

use App\Models\ProductUnit;
use App\Models\ProductUnitValue;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    public function store(Request $request)
    {
        ProductUnit::create([
            'key'       => $request->product_unit
        ]);

        return redirect()->back();
    }

    public function productUnitValueStore(Request $request)
    {
        foreach($request->product_unit_value as $value){
            ProductUnitValue::create([
                'product_unit_id'       => $request->product_unit_id, 
                'value'                 => $value,
            ]);
        }

        return redirect()->back();
    }

    public function productValueGetUnitWise($id)
    {
        $prodcutUnitValue = ProductUnitValue::where('product_unit_id', $id)->get();
        return response()->json([
            'data'  => $prodcutUnitValue 
        ]);
    }
}