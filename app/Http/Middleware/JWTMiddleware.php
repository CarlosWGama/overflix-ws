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
            if (!$token) return response()->json('Token necessário', 403);
            
            $datas = JWT::decode($token, config('jwt.key'), ['HS256']);
            if ($datas->exp > time())
                return $next($request);
        } catch(\Exception $e) {
            print_r($e->getMessage());die;
            return response()->json('Acesso negado', 403);
        }
    }
}
