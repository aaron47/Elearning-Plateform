<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function get_all_formations()
    {
        $formations = Formation::all();

        if (!$formations) {
            return response([
                "error" => true,
                "message" => "No formations found",
            ], 404);
        }

        return response([
            "error" => false,
            "formations" => $formations,
        ], 200);
    }

    public function get_user_formations(string $user_id)
    {
        $formations = User::find($user_id)->formations;

        if (!$formations) {
            return response([
                "error" => true,
                "message" => "No formations found",
            ], 404);
        }

        return response([
            "error" => false,
            "formations" => $formations,
        ], 200);
    }

    public function create_formation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'image' => 'required',
        ]);

        $user_id = $request->input("user_id");
        if (!$user_id) {
            return response([
                "error" => true,
                "message" => "User id was not provided",
            ], 400);
        }

        $data['user_id'] = $user_id;
        $data['name'] = $request->input('name');
        $data['description'] = $request->input('description');
        $data['price'] = $request->input('price');
        $data['duration'] = $request->input('duration');
        $data['image'] = $request->input('image');

        $formation = Formation::create($data);

        if (!$formation) {
            return response([
                "error" => true,
                "message" => "Formation not created",
            ], 400);
        }

        return response([
            "error" => false,
            "message" => "Formation created successfully",
        ], 201);
    }
}
