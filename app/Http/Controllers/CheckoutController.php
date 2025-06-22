<?php

// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillingDetail;
use App\Models\Order;
// Add the correct import for OrderItem
use App\Models\OrderItem;

use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

        public function index()
        {
            $cartItems = \App\Models\Cart::with('productDetail')->where('user_id', Auth::id())->get();
            return view('checkout', compact('cartItems'));
        }

    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required|string",
            "last_name" => "required|string",
            "country" => "required|string",
            "street_address" => "required|string",
            "apartment" => "nullable|string",
            "city" => "required|string",
            "postcode" => "required|string",
            "phone" => "required|string",
            "email" => "required|email",
            "payment_method" => "required|string",
            "terms" => "accepted",
        ]);

        // Save billing details
        $billing = BillingDetail::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country' => $request->country,
            'street_address' => $request->street_address,
            'apartment' => $request->apartment,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        // Save order
        Order::create([
            'user_id' => Auth::id(),
            'billing_detail_id' => $billing->id,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('checkout')->with('success', 'Order placed successfully!');
    }


    public function submit(Request $request)
{
    $request->validate([
        'first_name'      => 'required',
        'last_name'       => 'required',
        'country'         => 'required',
        'street_address'  => 'required',
        'city'            => 'required',
        'postcode'        => 'nullable',
        'phone'           => 'required',
        'email'           => 'required|email',
        'payment_method'  => 'required',
        'terms'           => 'accepted',
    ]);

    // Save billing detail
    $billing = BillingDetail::create([
        'user_id'        => Auth::id(),
        'first_name'     => $request->first_name,
        'last_name'      => $request->last_name,
        'country'        => $request->country,
        'street_address' => $request->street_address,
        'apartment'      => $request->apartment,
        'city'           => $request->city,
        'postcode'       => $request->postcode,
        'phone'          => $request->phone,
        'email'          => $request->email,
    ]);

    // Save order
    $order = Order::create([
        'user_id'          => Auth::id(),
        'billing_detail_id'=> $billing->id,
        'total_amount'     => 0, // you can calculate it from cart
        'status'           => 'pending',
        'payment_method'   => $request->payment_method,
    ]);

    return redirect()->route('home')->with('success', 'Order placed successfully!');
}

   

}

