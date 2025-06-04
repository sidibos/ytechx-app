<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Customer/Dashboard');
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Customer/Dashboard', [
            // 'customerName' => $request->user()->name,
            // 'customerEmail' => $request->user()->email,
            // 'customerPhone' => $request->user()->phone,
        ]);
    }
}
