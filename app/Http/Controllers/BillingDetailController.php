<?php

namespace App\Http\Controllers;

use App\Models\BillingDetail;
use Illuminate\Http\Request;

class BillingDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BillingDetail::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "user_id" => "required|integer",
                "first_name" => "required|string",
                "last_name" => "required|string",
            
                "country" => "required|string",
                "street_address" => "required|string",
                "apartment" => "required|string",
                "city" => "required|string",
                "postcode" => "required|string",
                "phone'" => "required|string",
                "email'" => "required|string",
            ]);

            $billingDetail = new BillingDetail();
            $billingDetail->user_id = $request->user_id;
          
            $billingDetail->country = $request->country;
            $billingDetail->street_address = $request->street_address;
            $billingDetail->apartment = $request->apartment;                
            $billingDetail->city = $request->city;
            $billingDetail->postcode = $request->postcode;
            $billingDetail->phone = $request->phone;
            $billingDetail->email = $request->email;
            $billingDetail->save();

            return response()->json(["message" => "Billing detail created successfully"], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BillingDetail $billingDetail)
    {
        return BillingDetail::findOrFail($billingDetail->id);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BillingDetail $billingDetail)
    {
        try {
            $request->validate([
                "user_id" => "required|integer",
                "first_name" => "required|string",
                "last_name" => "required|string",
            
                "country" => "required|string",
                "street_address" => "required|string",
                "apartment" => "required|string",
                "city" => "required|string",
                "postcode" => "required|string",
                "phone'" => "required|string",
                "email'" => "required|string",
            ]);

            $billingDetail->user_id = $request->user_id;
         
            $billingDetail->country = $request->country;
            $billingDetail->street_address = $request->street_address;
            $billingDetail->apartment = $request->apartment;                
            $billingDetail->city = $request->city;
            $billingDetail->postcode = $request->postcode;
            $billingDetail->phone = $request->phone;
            $billingDetail->email = $request->email;
            $billingDetail->save();

            return response()->json(["message" => "Billing detail updated successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BillingDetail $billingDetail)
    {
        try {
            $billingDetail->delete();
            return response()->json(["message" => "Billing detail deleted successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
