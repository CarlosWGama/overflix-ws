<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {

        try {
            $token = $request->bearerToken();
            $datas = JWT::decode($token, config('jwt.key'), ['HS256']);
            if ($datas->exp > time())
                return $next($request);
            return response()->json('Token expirado', 403);
        } catch(\Exception $e) {
            print_r($e->getMessage());die;
            return response()->json('Acesso negado', 403);
        }
    }
}
