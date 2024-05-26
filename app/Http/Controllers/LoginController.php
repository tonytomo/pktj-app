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
    public function show(): View
    {
        return view('form', [
            'title' => 'Masuk',
            'type' => 'login'
        ]);
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
            'email.required' => 'Email belum diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password belum diisi',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('home')->with([
                'type' => 'success',
                'message' => 'Kamu berhasil login'
            ]);
        }

        return back()->with(
            [
                'type' => 'danger',
                'message' => 'Email atau password salah',
            ]
        )->withInput($request->all());
    }

    /**
     * Logout a user.
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('login')->with([
            'type' => 'success',
            'message' => 'Kamu berhasil logout',
        ]);
    }
}
