<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\DB;
// use App\Models\applicant_account;

class applicant_account extends Controller
{
    //
    public function add(Request $request){
      $validator= Validator::make($request->all(),[
        'Fname'=>'required',
        'Lname'=>'required',
        'username'=>'required',
        'password'=>'required',
        'city'=>'required',
        'barangay'=>'required',
        'purok'=>'required',
        'contact_num'=>'required'
      ]);

      if($validator->fails())
      {
        return response()->json([
            'status'=>400,
            'errors'=>$validator->messages()
        ]);
      }else{
        $values=[
        "Fname"=>$request->input('Fname'),
        "Lname"=>$request->input('Lname'),
       "password"=>$request->input('password'),
        "contact_num"=>$request->input('contact_num'),
        "date_register"=>$request->input('date_register'),
        "image"=>'null'
    ];

      $query=DB::table('applicant_account')->insert($values);

      if($query){
          return response()->json([
          'status'=>200,
          'message'=>"Applicant added successfully!"
        ]);
      }
      
      }
    }
}
