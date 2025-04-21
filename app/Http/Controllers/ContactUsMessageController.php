<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\ContactUsMessage;
use Illuminate\Http\Request;

class ContactUsMessageController extends Controller
{
    public function index()
    {
        // Optional: if you want to list all messages in admin panel
        $messages = ContactMessage::latest()->get();
        return Inertia::render('Admin/ContactUsMessages', ['messages' => $messages]);
    }

    public function create()
    {
        return Inertia::render('ContactUs/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'string|max:255',
            'budget' => 'int|nullable',
            'status' => 'string|max:255',
            'message' => 'required|string|min:10',
        ]);

        ContactUsMessage::create($validated);

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Submitted successfully!',
            'data' => [],
        ]);

        //return redirect()->back()->with('success', 'Your message has been submitted.');
    }
}
