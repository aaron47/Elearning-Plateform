<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    public static function login_post(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8"
        ]);

        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            return response("Login successful", 200);
        }

        return response("Wrong Credentials, please try again", 400);
    }

    public static function register_post(Request $request)
    {
        $request->validate([
            "email" => "required|email|unique:users",
            "password" => "required|min:8"
        ]);

        $data['email'] = $request->input("email");
        $data['password'] = Hash::make($request->input("password"));
        $user = User::create($data);

        if (!$user) {
            return response("Wrong Credentials, please try again", 400);
        }

        return response("Account created successfully", 201);
    }

    public static function find_user_by_email()
    {
        $email = request()->input("email");
        return User::findOrFail($email);
    }

    public static function find_user_by_id($id)
    {
        return User::findOrFail($id);
    }
}
