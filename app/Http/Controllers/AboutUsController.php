<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
 
class AboutUsController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(): Response
    {
        return Inertia::render('AboutUs', [
            'companyName' => 'Ytechx',
        ]);
    }
}