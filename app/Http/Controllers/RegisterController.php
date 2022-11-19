<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {

        //        dd(request()->all());
        //
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'unique:users,username', 'max:255', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email'), 'max:255'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        // The following is valid. But there is a way to be replaced with mutator
        // $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        // login the user
        auth()->login($user);

        // session()->flash('success', 'Your account has been registered successfully');
        // the following with method is equivalent

        return redirect('/')->with('success', 'Your account has been registered successfully');
    }
}
