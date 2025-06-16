<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUsMessage;
use Illuminate\Support\Facades\Gate;

class AdminContactUsMessageController extends Controller
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

        Gate::authorize('view', $message);

        return Inertia::render('Admin/ContactUs/Show', [
            'message' => $message,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'budget' => 'nullable|integer',
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
