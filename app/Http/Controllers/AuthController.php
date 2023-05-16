<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function actionRegister(Request $request)
    {
        try {
            $validated = $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'username' => 'required|min:3|max:255|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5|max:255|confirmed'
            ]);
            $validated['password'] = Hash::make($validated['password']);

            User::create($validated);

            return redirect()->route('login')->with('succes', "Your account succesfully created!");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function login()
    {
    }
}
