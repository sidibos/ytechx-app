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
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:customer,tech_expert'],
        ]);

        try {
            $registeredUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
    
            $admin = User::where('role', 'admin')->first();
            if ($admin && $registeredUser) {
                Notification::send(
                    $admin, 
                    new RegisteredUserNotification($registeredUser)
                );
            }
        } catch (\Throwable $th) {
            Log::error('Registration error: ' . $th->getMessage());
        }


        // Redirect to the login page with success message
        return redirect()->route('register')->with('success', 'Registration successful!');
    }
}