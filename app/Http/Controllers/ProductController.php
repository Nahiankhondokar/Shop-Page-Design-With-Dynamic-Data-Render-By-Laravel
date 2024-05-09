<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        
        return view('layouts.product');
    }
    public function shopPageIndex()
    {
        
        return view('layouts.shop');
    }
}