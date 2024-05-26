<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Show the form for register.
     */
    public function show(): View
    {
        return view('form', [
            'title' => 'Daftar',
            'type' => 'register'
        ]);
    }

    /**
     * Register a new user.
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ], [
            'name.required' => 'Nama belum diisi',
            'email.required' => 'Email belum diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password belum diisi',
            'password_confirmation.required' => 'Konfirmasi password belum diisi',
            'password_confirmation.same' => 'Konfirmasi password tidak sesuai',
        ]);

        if (User::where('email', $request->email)->exists()) {
            return back()->with([
                'type' => 'danger',
                'message' => 'Email sudah terdaftar',
            ])->withInput(
                $request->except(['password', 'password_confirmation'])
            );
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login')->with([
            'type' => 'success',
            'message' => 'Registrasi berhasil, silahkan login'
        ])->withInput($request->only(['name']));
    }
}
