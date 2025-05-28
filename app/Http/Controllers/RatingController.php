<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Rating::all();
    }

  
    public function store(Request $request)
    {
        try {
            $request->validate([
                "score" => "required|numeric",
                "product_detail_id" => "required|integer",
                "user_id" => "required|integer"
            ]);

            $rating = new Rating();
            $rating->score = $request->score;
            $rating->product_detail_id = $request->product_detail_id;
            $rating->user_id = $request->user_id;
            $rating->save();

            return response()->json(["message" => "Rating created successfully"], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        return Rating::findOrFail($rating);
    }


    public function update(Request $request, Rating $rating)
    {
        try {
            $request->validate([
                "score" => "required|numeric",
                "product_detail_id" => "required|integer",
                "user_id" => "required|integer"
            ]);

            $rating->score = $request->score;
            $rating->product_detail_id = $request->product_detail_id;
            $rating->user_id = $request->user_id;
            $rating->save();

            return response()->json(["message" => "Rating updated successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy(Rating $rating)
    {
        try {
            $rating->delete();
            return response()->json(["message" => "Rating deleted successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
