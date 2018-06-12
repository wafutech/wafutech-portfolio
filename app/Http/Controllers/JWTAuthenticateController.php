<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegisterFormRequest;
use App\User;


class JWTAuthenticateController extends Controller
{
    
    public function register(RegisterFormRequest $request)
{
    $user = new User;
    $user->email = $request->input('email');
    $user->name = $request->input('name');
    $user->password = bcrypt($request->input('password'));
    $user->save();
    return response([
        'status' => 'success',
        'data' => $user
       ], 200);

 }

 public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    if ( ! $token = JWTAuth::attempt($credentials)) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], 400);
    }


    return response([
            'status' => 'success'
        ]) ->header('Authorization', $token);
}

public function user(Request $request)
{
    $user = User::find(Auth::User()->id);
   return response([
            'status' => 'success',
            'data' => $user
        ]);
        return $user;
}
public function refresh()
{
    return response([
            'status' => 'success'
        ]);
}
}
