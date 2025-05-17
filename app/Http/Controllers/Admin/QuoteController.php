<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ContactUsMessage;

class QuoteController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Quotes/Index', [
            'quotes' => Quote::with('contactUsMessage')->latest()->get()
        ]);
    }

    public function createFromMessage($id)
    {
        $message = ContactUsMessage::findOrFail($id);

        return Inertia::render('Admin/Quotes/Create', [
            'prefillMessage' => $message,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Quotes/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'contact_us_message_id' => 'required|exists:contact_us_messages,id',
            'price_estimate' => 'nullable|numeric',
            'status' => 'required|in:pending,approved,rejected',
            'notes' => 'nullable|string',
        ]);

        Quote::create($validated);

        return redirect()->route('admin.quotes.index')->with('success', 'Quote created.');
    }

    public function edit(Quote $quote)
    {
        return Inertia::render('Admin/Quotes/Edit', [
            'quote' => $quote
        ]);
    }

    public function update(Request $request, Quote $quote)
    {
        $validated = $request->validate([
            'price_estimate' => 'nullable|numeric',
            'status' => 'required|in:pending,approved,rejected',
            'notes' => 'nullable|string',
        ]);

        $quote->update($validated);

        return redirect()->route('admin.quotes.index')->with('success', 'Quote updated.');
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();

        return redirect()->route('admin.quotes.index')->with('success', 'Quote deleted.');
    }
}
