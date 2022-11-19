<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        // 1. validate the input
        $attributes = request()->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            // 'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // 2. validate user auth login
        if (!auth()->attempt($attributes)) {
            // 3. if auth failed
            // method 1:
            throw ValidationException::withMessages(['email' => 'Your provided credentials couldnot be verified.']);
            // method 2:
            return back()
                ->withInput()
                ->withErrors([
                    'password' => 'Your provided credentials could not be verified.'
                ]);
        }

        // 4. if auth succeeded, regenerate session & redirect to home page
        session()->regenerate();
        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
