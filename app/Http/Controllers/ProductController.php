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
        return view('layouts.product', compact('variations'));
    }

    public function productList()
    {
        $products = Product::with('productVariation')->orderByDesc('id')->paginate(10);
        return view('layouts.product-list', compact('products'));
    }

    public function shopPageIndex()
    {
        $products = Product::orderByDesc('id')->paginate(10);
        $products->getCollection()->transform(function ($product) {
            $product->custom_qty = 1;
            return $product;
        });
    
        return view('layouts.shop', [
            'products'  => $products
        ]);
    }

    public function store(ProductStoreRequest $request)
    {
        return DB::transaction(function () use ($request){

            // price calculation
            if(!$request->selling_price){
                // discount calculation
                $discountAmount = $request->regular_price * $request->discount / 100;
                $taxAmount = $request->regular_price * $request->tax / 100;
                $price = ($request->regular_price - $discountAmount) - $taxAmount;
               
            }else {
                $price = $request->regular_price;
                $discountAmount = 00;
                $taxAmount = 00;
            }

            $product = new Product();
            $product->product_name  = $request->product_name; 
            $product->sku           = $request->sku; 
            $product->selling_price = $request->selling_price; 
            $product->regular_price = $price; 
            $product->discount      = $discountAmount; 
            $product->tax           = $taxAmount; 
            $product->quantity      = $request->quantity; 

            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $unique = md5(time().rand()).'.'.$img->getClientOriginalExtension();
                $img->move(public_path('media/product/image/'), $unique);
                $filePath = 'media/product/image/'.$unique;
            }
        
            $product->image       = $filePath ?? null; 
            $product->save();
            $product->refresh();
            
            // product variation manage
            if($request->product_unit){
                if($request->product_unit_value && $request->variat_price){
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

    public function search(Request $request)
    {
        $searchData = '%'.$request->search.'%';
        $products = Product::query()
        ->where('product_name', 'LIKE', $searchData)
        ->orWhere('sku', $searchData)
        ->orderByDesc('id')
        ->paginate(10);

        $products->getCollection()->transform(function ($product) {
            $product->custom_qty = 1;
            return $product;
        });
        
        return view('layouts.shop', [
            'products'  => $products
        ]);
    }
}