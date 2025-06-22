<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::all();
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                "user_id" => "required|integer",
                "billing_detail_id" => "required|integer",
                "payment_method" => "required|string",
             
            ]);

            $order = new Order();
            $order->user_id = $request->user_id;
            $order->billing_detail_id = $request->billing_detail_id; // billing_detail_id foreign key
            $order->payment_method = $request->payment_method;
         
            $order->save();

            return response()->json(["message" => "Order created successfully"], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return Order::findOrFail($order->id);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        try {
            $request->validate([
                "user_id" => "required|integer",
                "billing_detail_id" => "required|integer",
                "payment_method" => "required|string",
               
            ]);

            $order->user_id = $request->user_id;
            $order->payment_method = $request->payment_method;
           
            $order->billing_detail_id = $request->billing_detail_id; // billing_detail_id foreign key
            $order->save();

            return response()->json(["message" => "Order updated successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return response()->json(["message" => "Order deleted successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }


}
