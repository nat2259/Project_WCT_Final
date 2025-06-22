<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        // Get all cart items for logged in user with product details
        $cartItems = Cart::with('productDetail')
            ->where('user_id', Auth::id())
            ->get();


    $subtotal = 0;
    foreach ($cartItems as $item) {
        $subtotal += $item->productDetail->price * $item->quantity;
    }

    $delivery = 5.00; // You can adjust this logic

    $discount = 0;
    if (session('coupon')) {
        $discount = ($subtotal * session('coupon.discount_percent')) / 100;
    }

    $total = $subtotal + $delivery - $discount;

    return view('cart', compact('cartItems', 'subtotal', 'delivery', 'discount', 'total'));
        }




   public function add(Request $request)
{
    $productDetailId = $request->input('product_id'); // You may call this product_detail_id if needed
    $userId = Auth::id();

    // Optional: Get size from request, default to 'default'
    $size = $request->input('size', 'default');

    // Check if item already exists in cart
    $existingCartItem = Cart::where('user_id', $userId)
                            ->where('product_detail_id', $productDetailId)
                            ->where('size', $size)
                            ->first();

    if ($existingCartItem) {
        // If already in cart, increment quantity
        $existingCartItem->quantity += 1;
        $existingCartItem->save();
    } else {
        // If not, create new cart item
        Cart::create([
            'user_id' => $userId,
            'product_detail_id' => $productDetailId,
            'quantity' => 1,
            'size' => $size,
        ]);
    }

    return redirect('cart')->with('success', 'Product added to cart!');
}



    public function remove($id)
{
    $cartItem = Cart::findOrFail($id);

    if ($cartItem->user_id != Auth::id()) {
        abort(403);
    }

    $cartItem->delete();

    return back()->with('success', 'Item removed from cart');
}
public function update(Request $request, $id)
{
    $request->validate([
        'quantity' => 'required|integer|min:0|max:100',
    ]);

    $cartItem = Cart::findOrFail($id);

    if ($request->quantity == 0) {
        // Remove item from cart if quantity is zero
        $cartItem->delete();
    } else {
        // Update quantity
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
    }

    return redirect()->back()->with('success', 'Cart updated successfully!');
}

public function applyCoupon(Request $request)
{
    $code = $request->input('coupon_code');
    $coupon = Coupon::where('coupons_code', $code)->first();

    if (!$coupon) {
        return redirect()->back()->with('error', 'Invalid coupon code.');
    }

    // Store the coupon in the session
    Session::put('coupon', [
        'code' => $coupon->coupons_code,
        'discount_percent' => $coupon->discount_percent
    ]);

    return redirect()->back()->with('success', 'Coupon applied successfully!');
}

    public function checkout()
{
    $cartItems = Cart::with('productDetail')
        ->where('user_id', Auth::id())
        ->get();

    $subtotal = 0;
    foreach ($cartItems as $item) {
        $subtotal += $item->productDetail->price * $item->quantity;
    }

    $delivery = 5.00;

    $discount = 0;
    if (session('coupon')) {
        $discount = ($subtotal * session('coupon.discount_percent')) / 100;
    }

    $total = $subtotal + $delivery - $discount;

    // Pass all variables to the checkout view
    return view('checkout', compact('cartItems', 'subtotal', 'delivery', 'discount', 'total'));
}


}
