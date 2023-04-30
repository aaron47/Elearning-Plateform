<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    public function login_post(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            return response([
                "error" => false,
                "message" => "Logged in successfully",
                "email" => $request->input("email"),
                "type" => Auth::user()->type,
                "id" => Auth::user()->id,
            ], 200);
        }

        return response([
            "error" => true,
            "message" => "Wrong Credentials, please try again",
        ], 400);
    }

    public function register_post(Request $request)
    {
        $request->validate([
            "email" => "required|email|unique:users",
            "password" => "required|min:8"
        ]);

        $data['email'] = $request->input("email");
        $data['password'] = Hash::make($request->input("password"));
        $data['type'] = $request->input("type");
        $user = User::create($data);

        if (!$user) {
            return response([
                "error" => true,
                "message" => "Wrong Credentials, please try again",
            ], 400);
        }

        return response([
            "error" => false,
            "message" => "Account created successfully",
            "email" => $request->input("email"),
        ], 201);
    }

    public function find_user_by_id($id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return response([
                "error" => true,
                "message" => "User not found",
            ], 404);
        }

        return response(["user" => User::findOrFail($id)], 200);
    }
}
