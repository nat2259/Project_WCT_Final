<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    /**
     * Display the user's wishlist
     */
    public function index()
    {
        $wishlistItems = Wishlist::with('productDetail')
            ->where('user_id', Auth::id())
            ->get();

        return view('wishlist', compact('wishlistItems'));
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product_details,id'
        ]);

        // Check if already in wishlist
        $exists = Wishlist::where('user_id', Auth::id())
                         ->where('product_detail_id', $request->product_id)
                         ->exists();

        if ($exists) {
           return redirect('wishlist')->with('info', 'This product is already in your wishlist!');
        }

        // Add to wishlist
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_detail_id' => $request->product_id
        ]);

        return redirect('wishlist')->with('info', 'This product is already in your wishlist!');
      
    }

        /**
     * Remove a product from wishlist
     */

public function remove($id)
    {
        $item = Wishlist::findOrFail($id);

        // Security check
        if ($item->user_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $item->delete();

        return back()->with('success', 'Item removed!');
        
    }


    
}