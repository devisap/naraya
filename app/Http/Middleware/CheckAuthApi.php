<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class CheckAuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $jwt    = JWT::decode($request->header("Authorization"), new Key(env('JWT_SECRET_KEY'), env('JWT_ALGO')));
            $user   = User::find($jwt->u_id);

            if(!$user){
                return response([
                    'status_code' => 401,
                    'status_message' => 'User not registered'
                ], 200);
            }

            return $next($request);
        } catch (Exception $err) {
            return response([
                'status_code'    => 401,
                'status_message' => "Authentication failed"
            ], 200);
        }
        return $next($request);
    }
}
