<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        switch (auth()->user()->role) {
            case 'expert':
            case 'tech_expert':
                // Normalize 'tech_expert' to 'expert'
                return redirect()->route('expert.dashboard');
                break;
            
            case 'customer':
                return redirect()->route('customer.dashboard');
                break;
            
            case 'admin':
                return redirect()->route('admin.dashboard');
                break;
                        
            default:
                return redirect()->route('login');
                break;
        }
    }
}
