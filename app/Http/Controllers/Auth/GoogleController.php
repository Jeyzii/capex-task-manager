<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            //Authenticate user with Google
            $googleUser = Socialite::driver('google')->user();

            //Create or find user in the database
            $newUser = User::firstOrCreate(
                ['google_id' => $googleUser->id],
                [
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                ]
            );

            //Log in the user
            Auth::login($newUser);

            //Redirect based on user's password status
            return $newUser->password
                ? redirect('/') // If user has a password, redirect to home page
                : redirect()->route('set.password'); // If not, redirect to set password route

        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Something went wrong while logging in.');
        }
    }

}