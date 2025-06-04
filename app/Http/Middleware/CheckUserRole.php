<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $role): Response
    {
        $userRole = auth()->user()->role ?? null;
        if (auth()->user()->role === 'tech_expert') {
            $userRole = 'expert';
        }
        // Check if the user is authenticated
        if($userRole !== $role) {
            // If the user has the specified role, allow access
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
