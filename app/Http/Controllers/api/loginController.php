<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\applicant;
use App\Models\User;
use Carbon\Carbon;


class loginController extends Controller
{

    // public function login(Request $request){

    //     $login =  $request->validate([
    //                 'email'=>'required|string',
    //                 'password'=>'required|string'
    //             ]);

    //         if(!Auth::attempt([$login])){
    //             return response(['message'=>'Invalid Login credentials']);
    //         }
    //     $accessToken = Auth::user()->createToken('authToken')->accessToken;
    //     return response(['user'=>Auth::user(),'accessToken'=>$accessToken]);
    // }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            //'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
            // $token =  Auth::user()->createToken('Token Name')->accessToken;
            // return response(['user'=>Auth::user(),'accessToken'=>$token,  'token_type' => 'Bearer',]);
            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
                'user'=>Auth::user()
            ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
