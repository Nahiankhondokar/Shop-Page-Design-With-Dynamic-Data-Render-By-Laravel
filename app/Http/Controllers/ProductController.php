<?php

namespace App\Http\Controllers;

use App\Models\ProductUnit;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        dd($request->all());
    }
}