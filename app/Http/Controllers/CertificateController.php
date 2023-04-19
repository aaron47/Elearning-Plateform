<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function create_certificate(Request $request)
    {

        $request->validate([
            'user_name' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'date' => 'required',
        ]);

        $create_certificate_info = $request->only(
            "user_name",
            "name",
            "description",
            "image",
            "date",
        );

        $certificate = Certificate::create($create_certificate_info);
    }

    public function get_user_certificates(string $user_id)
    {
        return response([
            "error" => false,
            "certificates" => User::find($user_id)->certificates,
        ], 200);
    }
}
