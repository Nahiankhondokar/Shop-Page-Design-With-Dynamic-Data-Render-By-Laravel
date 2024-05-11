<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\ProductVariations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $variations = ProductUnit::with('productUnitValue')->orderByDesc('id')->get();
        // dd($variations->toArray());
        return view('layouts.product', compact('variations'));
    }

    public function shopPageIndex()
    {
        
        return view('layouts.shop');
    }

    public function store(ProductStoreRequest $request)
    {
        // dd($request->all() );
        return DB::transaction(function () use ($request){
            $product = new Product();
            $product->product_name  = $request->product_name; 
            $product->sku           = $request->sku; 
            $product->selling_price = $request->selling_price; 
            $product->regular_price = $request->regular_price; 
            $product->discount       = $request->discount; 
            $product->tax           = $request->tax; 

            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $unique = md5(time().rand()).$img->getClientOriginalExtension();
                $img->move(public_path('media/product/image/'), $unique);
                $filePath = 'media/product/image/'.$unique;
            }
        
            $product->image       = $filePath ?? null; 
            $product->save();
            $product->refresh();
            
            // product variation manage
            if($request->product_unit){
                if($request->product_unit_value && $request->variat_price){
                    $productUnit = ProductUnit::find($request->product_unit);
                    $removeExtraSpace = str_replace(' ', '', $request->variat_price);
                    $priceArray = explode(',', $removeExtraSpace);

                    foreach($request->product_unit_value as $index => $value){
                        $variations = new ProductVariations();
                        $variations->product_id = $product->id;
                        $variations->variant = $value;
                        $variations->price = $priceArray[$index] ?? 00;
                        $variations->qty = $request->variant_qty ?? 0;
                        $variations->save();
                    }
                }else{
                    return redirect()->back()->with('variants', 'Variants informations are missing !');
                }
            }

            return redirect()->route('product')->with('product', 'Produdct added successfully');
        });
    }
}