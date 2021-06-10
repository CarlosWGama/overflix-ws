<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    //

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6'
        ]);

        if ($validator->fails()) return response()->json($validator->errors(), 401);

        $datas = $request->all();
        $datas['password'] = bcrypt($datas['password']);
        $datas['avatar'] = 'avatar.jpg';

        $user = User::create($datas);

        $datas = [
            'id'    => $user->id,
            'exp'   => time() + (60*60*24*7) //Válido por uma semana
        ];
        $jwt = JWT::encode($datas, config('jwt.key'));
        $user = $user->toArray();
        unset($user['password']);

        return response()->json(['jwt' => $jwt, 'user' => $user], 200);

        return response()->json($user, 201);
    }
}
