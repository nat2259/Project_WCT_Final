<?php
namespace App\Http\Controllers;

use App\Models\ProductDetail;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = ProductDetail::with('category')->get();
        $categories = Category::all();
        
        return view('shop', compact('products', 'categories'));
    }
    
    public function filterByCategory($categoryId)
    {
        $products = ProductDetail::where('category_id', $categoryId)->with('category')->get();
        $categories = Category::all();
        
        return view('shop', compact('products', 'categories'));
    }
}
