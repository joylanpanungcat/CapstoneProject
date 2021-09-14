<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;

class applicant_account extends Controller
{
    //
    public function add(Request $request){
      $validator= Validator::make($request->all(),[
        'Fname'=>'required|max:5',
        'Lname'=>'required'
      ]);

      if($validator->fails())
      {
        return response()->json([
            'status'=>400,
            'errors'=>$validator->messages()
        ]);
      }else{
        
      }
    }
}
