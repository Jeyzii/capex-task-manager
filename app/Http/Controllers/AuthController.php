<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login()
    {
        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'password', 'min:6'],
        ]);

        if (auth()->attempt(\request()->only(['email', 'password']))) {
            return redirect('/');
        }

        return redirect()->back()->withErrors(['email' => 'Your email or password is incorrect.']);
    }

    public function logout()
    {
        auth()->logout();
        Session::flush();
        return redirect('/login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users'], 
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
        ]);

        $user = User::create($data);
        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}