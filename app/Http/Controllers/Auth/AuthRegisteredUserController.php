<?php
 
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

 
class AuthRegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:customer,tech_expert'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        //Auth::login($user);

        // Return JSON response
        // return response()->json([
        //     'success' => true,
        //     'message' => 'User Created successfully!',
        //     'data' => [],
        // ]);

        //Instead of redirecting, return an Inertia response
        return Inertia::render('Auth/Register', [
            'success' => true,
            'message' => 'Registration successful!',
        ]);
    }
}