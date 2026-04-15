<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the unified login page for Admin and Super Admin.
     */
    public function showLogin()
    {
        // Already authenticated? Redirect to the right dashboard
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user());
        }

        return view('auth.login');
    }

    /**
     * Handle login form submission.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Ensure the user actually has an admin role
            if (!in_array($user->role, ['admin', 'super_admin'])) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You do not have permission to access this portal.',
                ]);
            }

            return $this->redirectByRole($user);
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been signed out successfully.');
    }

    /**
     * Redirect user to the correct dashboard based on their role.
     */
    private function redirectByRole($user)
    {
        return match ($user->role) {
            'super_admin' => redirect()->route('admin.superAdmin'),
            default       => redirect()->route('admin.crm'),
        };
    }
}
