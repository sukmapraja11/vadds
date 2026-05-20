<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    public function generateToken(Request $request)
    {
        $secretKey = $secretKey = 'my-super-secret-key-2026-laravel-jwt-authentication';

        $payload = [
            'name' => $request->name,
            'iat' => time(),
            'exp' => time() + 3600
        ];

        $token = JWT::encode($payload, $secretKey, 'HS256');

        return response()->json([
            "name" => $request->name,
            "date_request" => $request->date_request,
            "token" => $token,
            "exp" => $payload['exp']
        ]);
    }

}
