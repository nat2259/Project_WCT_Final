<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductDetail::with('category')->where('available', true)->get();
        return view('index', compact('products'));
    }
}
