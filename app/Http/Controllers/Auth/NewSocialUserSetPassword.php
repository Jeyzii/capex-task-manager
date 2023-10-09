<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NewSocialUserSetPassword extends Controller
{
    public function index(){

        $user = Auth::user();

        //Check if user already has a password set
        if (Auth::user()->password !== null) {
            return redirect('/');
        }
        //If password is not set, show the new user set password view
            return view('auth.new-user-set-password', compact('user'));
    }

    public function addPassword(Request $request){
        //Validate the incoming request data
        $request->validate([
            'password' => ['confirmed', 'required', 'min:8'],
        ]);

        //Update the authenticated user's password with the new hashed password
        auth()->user()->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect('/');
    }
}
