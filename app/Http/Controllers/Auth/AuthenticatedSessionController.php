<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Models\User;
use App\Models\LoginRequest as ModelsLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $user = User::where('email', $request->email);

        // Check if user exists
        if (!$user) {
            return back()->withErrors([
                'email' => 'No user found with this email.',
            ]);
        }

        if ($user->last_login && now()->diffInHours($user->last_login) > 24) {
            $user->is_allowed = false; // Disallow login after 24 hours
            $user->save();
        }

        // Handle login logic for pending or disallowed accounts
        if (!$user->is_allowed) {
            $existingRequest = ModelsLoginRequest::where('user_id', $user->id);

            if (!$existingRequest) {
                ModelsLoginRequest::create([
                    'user_id' => $user->id,
                    'status' => 'pending',
                ]);
            }

            return back()->withErrors([
                'email' => 'Your account is pending admin approval.',
            ]);
        }

        // Authenticate if user is allowed and approved
        if ($user->is_allowed) {
            // Debug: Check password matching
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user); // Login the user manually
                $request->session()->regenerate();
        

                return redirect()->intended(route('dashboard'));
            }
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
