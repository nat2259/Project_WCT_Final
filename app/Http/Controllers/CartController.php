<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cart::all();
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                "user_id" => "required|integer",
                "product_detail_id" => "required|integer",
                "quantity" => "required|integer|min:1",
                 "size" => "required|string"

            ]);

            $cart = new Cart();
            $cart->user_id = $request->user_id;
            $cart->product_detail_id = $request->product_detail_id;
            $cart->quantity = $request->quantity;
            $cart->size = $request->size;
            $cart->save();

            return response()->json(["message" => "Cart item created successfully"], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        return Cart::findOrFail($cart->id);
    }


    public function update(Request $request, Cart $cart)
    {
        try {
            $request->validate([
                "user_id" => "required|integer",
                "product_detail_id" => "required|integer",
                "quantity" => "required|integer|min:1",
                "size" => "required|string"
            ]);

            $cart->user_id = $request->user_id;
            $cart->product_detail_id = $request->product_detail_id;
            $cart->quantity = $request->quantity;
            $cart->size = $request->size;
            $cart->save();

            return response()->json(["message" => "Cart item updated successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy(Cart $cart)
    {
        try {
            $cart->delete();
            return response()->json(["message" => "Cart item deleted successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
