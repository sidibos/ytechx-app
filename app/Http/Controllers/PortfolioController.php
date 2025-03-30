<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
 
class PortfolioController extends Controller
{
    /**
     * Show the profile.
     */
    public function index(): Response
    {
        return Inertia::render('Portfolio', [
            'companyName' => 'Ytechx',
        ]);
    }
}