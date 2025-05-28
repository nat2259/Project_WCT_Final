<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Wishlist::all();
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                "user_id" => "required|integer",
                "product_detail_id" => "required|integer",
           
            ]);

            $wishlist = new Wishlist();
            $wishlist->user_id = $request->user_id;
            $wishlist->product_detail_id = $request->product_detail_id;
    
            $wishlist->save();

            return response()->json(["message" => "Wishlist item created successfully"], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        return Wishlist::findOrFail($wishlist->id);
    }



    public function update(Request $request, Wishlist $wishlist)
    {
        try {
            $request->validate([
                "user_id" => "required|integer",
                "product_detail_id" => "required|integer",
            ]);

            $wishlist->user_id = $request->user_id;
            $wishlist->product_detail_id = $request->product_detail_id;
            $wishlist->save();

            return response()->json(["message" => "Wishlist item updated successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        try {
            $wishlist->delete();
            return response()->json(["message" => "Wishlist item deleted successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
