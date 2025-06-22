<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $products = ProductDetail::all();
         

        return view('product.index', compact('products'));

    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                "product_name" => "required|string",
                "discount" => "required|numeric",
                "cost" => "required|numeric",
                "category_id" => "required|integer",
                "available" => "required|boolean",
                "image" => "required|image"
            ]);

            $productDetail = new ProductDetail();
            $productDetail->product_name = $request->product_name;
            $productDetail->discount = $request->discount;
            $productDetail->cost = $request->cost;
            $productDetail->category_id = $request->category_id;
            $productDetail->available = $request->available;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $productDetail->image = $imagePath;
            }

            $productDetail->save();

            return response()->json(["message" => "Product created successfully"], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductDetail $productDetail)
    {
        return response()->json($productDetail);
    }

    public function update(Request $request, ProductDetail $productDetail)
    {
        try {
            $request->validate([
                "product_name" => "required|string",
                "discount" => "required|numeric",
                "cost" => "required|numeric",
                "category_id" => "required|integer",
                "available" => "required|boolean",
                "image" => "nullable|image"
            ]);

            $productDetail->product_name = $request->product_name;
            $productDetail->discount = $request->discount;
            $productDetail->cost = $request->cost;
            $productDetail->category_id = $request->category_id;
            $productDetail->available = $request->available;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $productDetail->image = $imagePath;
            }

            $productDetail->save();

            return response()->json(["message" => "Product updated successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy(ProductDetail $productDetail)
    {
        try {
            $productDetail->delete();
            return response()->json(["message" => "Product deleted successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
