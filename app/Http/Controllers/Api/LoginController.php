<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class LoginController extends Controller {
    
    //
    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if ($user != null && Hash::check($request->password, $user->password)) {
            $datas = [
                'id'    => $user->id,
                'exp'   => time() + (60*60*24*7) //Válido por uma semana
            ];
            $jwt = JWT::encode($datas, config('jwt.key'));
            return response()->json(['jwt' => $jwt], 200);
        }
        return response()->json('User not found', 404);
    }
}
