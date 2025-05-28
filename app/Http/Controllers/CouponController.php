<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Coupon::all();
    }


    public function store(Request $request)
    {
        try{
            $request->validate([
                "coupons_code" => "required|string",
                "discount_percent" => "required|numeric",
                
            ]);

            $coupon = new Coupon();
            $coupon->coupons_code = $request->coupons_code;
            $coupon->discount_percent = $request->discount_percent;
          
            $coupon->save();

            return response()->json(["message" => "Coupon created successfully"], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function show(Coupon $coupon)
    {
        return Coupon::findOrFail($coupon->id);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        try {
            $request->validate([
                "coupons_code" => "required|string",
                "discount_percent" => "required|numeric",
            ]);

            $coupon->coupons_code = $request->coupons_code;
            $coupon->discount_percent = $request->discount_percent;
            $coupon->save();

            return response()->json(["message" => "Coupon updated successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        try {
            $coupon->delete();
            return response()->json(["message" => "Coupon deleted successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
