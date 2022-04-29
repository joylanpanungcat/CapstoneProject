<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\applicant_account;
use App\Models\User;
use Carbon\Carbon;


class loginController extends Controller
{

    public function login(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
            $credentials = request(['username']);
            $applicant = applicant_account::
            join('address','address.accountId','=','applicant_account.accountId')->where('username',$credentials)->first();

            if(!$applicant)
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

            if($applicant['password']== $request->password){
                $tokenResult = $applicant->createToken('Personal Access Token');
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
                    'user'=>$applicant
                ]);
            }else{
            return response()->json([
                'message' => 'Unauthorized'
            ],401);
         }

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
        $applicant = applicant_account::
        join('address','address.accountId','=','applicant_account.accountId')->where('applicant_account.accountId',$request->user()->accountId)->first();
        return response()->json($applicant);
    }
}
