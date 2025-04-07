<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUsMessage;

class ContactUsMessageController extends Controller
{
    public function index()
    {
        $messages = ContactUsMessage::latest()->paginate(10);


        return Inertia::render('Admin/ContactUs/Index', [
            'messages' => $messages,
        ]);
    }

    public function show($id)
    {
        $message = ContactUsMessage::findOrFail($id);

        return Inertia::render('Admin/ContactUs/Show', [
            'message' => $message,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = ContactUsMessage::findOrFail($id);
        $contact->update($validated);

        return redirect()->route(
            'admin.contacts.show', 
            $id)->with('success', 
            'Message updated.'
        );
    }
}
