<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        // validate
        $attributes = request()->validate([
            "first_name" => 'required|min:3|',
            "last_name"  => ['required' ,'string', 'min:3'],
            "email"      => ['required', 'string', 'email', 'min:3','unique:users'],
            "password"   => ['required', Password::min(6), 'confirmed'],
        ]);

        // create the user
        $user = User::create($attributes);

        // log in
        Auth::login($user);

        // redirect
        return redirect('/jobs');
    }
}