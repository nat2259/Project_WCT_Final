<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

 

    public function store(Request $request)
    {
        try {
            $request->validate([
                "name_category" => "required|string|max:255",
            ]);

            $category = new Category();
            $category->name_category = $request->name_category;
            $category->save();

            return response()->json(["message" => "Category created successfully"], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return Category::findOrFail($category->id);
    }

 

    public function update(Request $request, Category $category)
    {
        try {
            $request->validate([
                "name_category" => "required|string|max:255",
            ]);

            $category->name_category = $request->name_category;
            $category->save();

            return response()->json(["message" => "Category updated successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }


    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json(["message" => "Category deleted successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
