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
use Illuminate\Support\Facades\Notification;
use App\Notifications\RegisteredUserNotification;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

 
class AuthRegisteredUserController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Auth/Register', [
            'roles' => ['customer', 'tech_expert'],
        ]);
    }

    public function store(Request $request)
    {
        //Block if honeypot is filled (likely a bot
        if ($request->filled('honeypot')) {
            return response()->json([
                'success' => false,
                'message' => '',
                'errors' => [
                    'honeypot' => 'Bot detection triggered. Please try again.',
                ]
            ], 422);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role' => ['required', 'in:customer,tech_expert'],
            //'terms' => ['accepted'],
        ]);

        log::info('User registration attempt', $request->all());

        $registeredUser = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        try {
            $admin = User::where('role', 'admin')->first();
            if ($admin && $registeredUser) {
                Notification::send(
                    $admin,
                    new RegisteredUserNotification($registeredUser)
                );
            }
        } catch(\Throwable $th) {
            Log::error('Error sending registration notification: ' . $th->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Registration successful! Please check your email for confirmation.',
            'data' => [],
        ], 201);
    }
}