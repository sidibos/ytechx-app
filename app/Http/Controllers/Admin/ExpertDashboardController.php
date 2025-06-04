<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class ExpertDashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Expert/Dashboard');
    }


    /**
     * Handle the incoming request.
     */
    // public function __invoke(Request $request)
    // {
    //     return Inertia::render('Expert/Dashboard', [
    //         // 'customerName' => $request->user()->name,
    //         // 'customerEmail' => $request->user()->email,
    //         // 'customerPhone' => $request->user()->phone,
    //     ]);
    // }
}
