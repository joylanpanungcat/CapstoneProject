<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\applicant_account;
use App\Models\admin;
use App\Models\inspector;
use App\Models\address;

class registerController extends Controller
{
    //

    public function verify_username(Request $request){
        $username =$request->username;
        $output = '';
        $code;
       
        $data=applicant_account::where('username',$request->username)->get();
        $admin=admin::where('username',$request->username)->get();
        $inspector=inspector::where('username',$request->username)->get();

        if($data->count()>0 || $admin->count()> 0 ||$inspector->count() > 0 ){
                $output .= 'Username Already Taken';
                $code= 400;
        }else{
            $code=200;
            $output .= '';
        }
       
        return response()->json([
            'code'=> $code,
            'output'=>$output
        ]);
    }

    public function register_applicant(Request $request){

        $Fname =$request->Fname;
        $Lname =$request->Lname;
        $username =$request->username;
        $password =$request->password;
        $txtPassword =$request->txtPassword;
        $contact_num =$request->contact_num;
        $purok =$request->purok;
        $barangay =$request->barangay;
        $city =$request->city;
        $date_register = date('y-m-d');

       $data = new applicant_account;
       $data->Fname =$Fname;
       $data->Lname =$Lname;
       $data->username =$username;
       $data->password =$password;
       $data->contact_num =$contact_num;
       $data->date_register =$date_register;
       $data->image='';
      $request = $data->save();
      $applicantId = $data->accountId;

      $address =  new address;
      $address->applicantId =$applicantId;
       $address->purok=$purok;
       $address->barangay=$barangay;
       $address->city=$city;
       $address->save();
      if($request){
          return response()->json([
              'code'=>200,
              'msg'=>'Successfully Registered'
          ]);
      }else{
        return response()->json([
            'msg'=>'something went wrong'
        ]);
      }
    }


}
