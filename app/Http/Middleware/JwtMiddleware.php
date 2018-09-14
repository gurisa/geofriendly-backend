<?php

namespace App\Http\Middleware;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

use App\Models\User;

class JwtMiddleware {

    public function handle($request, Closure $next, $guard = null) {
        $token = $request->get('token');
        if(!$token) {
            return response()->json([
                'status' => false,
				'message' => 'Token not provided.',
				'code' => 401,
				'data' => [],
            ]);
        }
        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } 
        catch(ExpiredException $e) {
            return response()->json([
                'status' => false,
				'message' => 'Provided token is expired.',
				'code' => 400,
				'data' => $e,
            ]);
        } 
        catch(Exception $e) {
            return response()->json([
                'status' => false,
				'message' => 'An error while decoding token.',
				'code' => 400,
				'data' => $e,
            ]);
        }
        $user = User::find($credentials->sub);
        $request->auth = $user;
        return $next($request);
    }

}