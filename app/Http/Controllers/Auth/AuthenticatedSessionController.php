<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Models\User;
use App\Models\LoginRequest as ModelsLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(UserLoginRequest $request): RedirectResponse
    {
        // Retrieve the user by email
        /** @var \App\Models\User|null $user */
        $user = User::where('email', $request->email)->first();

        // Check if user exists
        if (!$user) {
            return back()->withErrors([
                'email' => 'No user found with this email.',
            ]);
        }

        // Debug to check user is fetched properly
      
        // If the user is not allowed, create a login request
        // If the user is not allowed or their status is pending
        if (!$user->is_allowed || $user->status === 'pending') {
            // Debugging: Check if user is allowed and status is pending
          

            // Create a login request for admin approval
            $loginRequest = ModelsLoginRequest::create([
                'user_id' => $user->id,
                'status' => 'pending',
            ]);

            // Debugging: Check if login request is created
           

            return back()->withErrors([
                'email' => 'Your account is pending admin approval.',
            ]);
        }


        // Authenticate the user if allowed
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard', absolute: false));
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
