<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Contact::with('user')->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "user_id" => "required|integer",
          
            ]);

            $contact = new Contact();
            $contact->user_id = $request->user_id;
            $contact->save();

            return response()->json(["message" => "Contact created successfully"], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return Contact::with('user')->findOrFail($contact->id);
    }

  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        try {
            $request->validate([
                "user_id" => "required|integer",
            ]);

            $contact->user_id = $request->user_id;
            $contact->save();

            return response()->json(["message" => "Contact updated successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return response()->json(["message" => "Contact deleted successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
