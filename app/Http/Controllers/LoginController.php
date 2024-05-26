<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class LoginController extends Controller
{
    /**
     * Show the form for login.
     */
    public function showLoginForm(): View
    {
        return view('login');
    }

    /**
     * Login a user.
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('app')->with('message', 'You are now logged in');
        }

        return back()->with('message', 'Email or password is incorrect');
    }

    /**
     * Logout a user.
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('login')->with('message', 'You have been logged out');
    }
}
