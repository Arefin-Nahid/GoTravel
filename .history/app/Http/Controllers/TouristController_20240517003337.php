<?php

namespace App\Http\Controllers;

use App\Models\TravelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TouristController extends Controller
{
    public function register()
    {
        return view('tourist_user.register');
    }

    public function registerPost(Request $request)
    {
        $travel_user = new TravelUser();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::guard('travel_user')->login($user);

        return redirect()->route('touristprofile')->with('success', 'Register successfully');
    }

    public function login()
    {
        return view('tourist_user.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('travel_user')->attempt($credentials)) {
            return redirect()->route('touristprofile')->with('success', 'Login Success');
        }

        return back()->with('error', 'Error Email or Password');
    }

    public function logout()
    {
        Auth::guard('travel_user')->logout();
        return redirect()->route('touristlogin');
    }

    public function profile()
    {
        return view('tourist_user.profile');
    }
}