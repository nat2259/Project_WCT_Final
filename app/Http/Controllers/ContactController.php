<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'subject' => 'nullable|string',
        'message' => 'required|string',
    ]);

    // Add user_id if authenticated
    $validated['user_id'] = Auth::id();

    Contact::create($validated);

    return redirect()->route('contact.index')->with('success', 'Message sent!');
}
}
