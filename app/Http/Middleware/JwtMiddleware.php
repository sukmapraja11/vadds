<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Token not found'], 401);
        }

        try {
            $decoded = JWT::decode($token, new Key('Qw3rty!@#-laravel-jwt-2026-secure', 'HS256'));

            if (!is_object($decoded)) {
                return response()->json([
                    'message' => 'Invalid token structure'
                ], 401);
            }

            $request->attributes->set('auth', $decoded);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Invalid token',
                'error' => $e->getMessage()
            ], 401);
        }

        return $next($request);
    }
}
