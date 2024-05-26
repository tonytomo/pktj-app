<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function detail(string $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ])->with('message', 'User detail retrieved');
    }

    /**
     * Display a listing of the resource.
     */
    public function show($limit = 10): View
    {
        return view('user', [
            'users' => User::simplePaginate($limit)
        ])->with('message', 'List of users retrieved');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('user.create')->with('message', 'Creating a new user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): View
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'name.required' => 'Name is required',
            'name.max' => 'Name is too long',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return view('user.profile', [
            'user' => $user
        ])->with('message', 'User created');
    }

    /**
     * Show the form for editing the role of the user.
     */
    public function edit(string $id): View
    {
        return view('user.edit', [
            'user' => User::findOrFail($id)
        ])->with('message', 'Editing user role');
    }

    /**
     * Update the role of the specified user in storage.
     */
    public function update(Request $request, string $id): View
    {
        $request->validate([
            'role' => ['required', 'in:admin,user'],
        ], [
            'role.required' => 'Role is required',
            'role.in' => 'Role must be either admin or user',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return view('user.profile', [
            'user' => $user
        ])->with('message', 'User role updated');
    }
}
