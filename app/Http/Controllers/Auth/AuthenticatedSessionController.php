<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
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
    public function store(LoginRequest $request): RedirectResponse
    {
        // Attempt to authenticate the user
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Check if the authenticated user's account is activated
            if (Auth::user()->activated != 1) {
                // Log out the user if their account is not activated
                Auth::logout();
                // Redirect back to the login page with an error message
                return redirect()->route('login')->withErrors(['username' => 'Your account is not activated. Please contact the administrator for assistance.']);
            }
    
            // If the user's account is activated, proceed with the normal login process
            $request->session()->regenerate();
    
            // Redirect to the intended page after successful login
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    
        // If authentication fails, redirect back to the login page with an error message
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
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
