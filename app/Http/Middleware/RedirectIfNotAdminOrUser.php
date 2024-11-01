<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAdminOrUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Check the user's role
            $user = Auth::user();

            // Redirect to admin dashboard if the user is an admin
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // Redirect to user dashboard if the user is a regular user
            if ($user->role === 'user') {
                return redirect()->route('dashboard');
            }
        }

        // If the user is not authenticated, redirect to the login page or desired route
        return redirect()->route('login'); // Change to your desired redirect route
    }
    }
}
