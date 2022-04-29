<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\applicant_account;
use App\Models\address;

class register extends Controller
{
    //

    public function register_applicant(Request $request){

        $Fname =  $request->data['Fname'];
        $Lname =  $request->data['Lname'];
        $username =  $request->data['username'];
        $password = $request->data['password'];
        $contact_num = $request->data['contact_num'];
        $purok = $request->data['purok'];
        $barangay = $request->data['barangay'];
        $city = $request->data['city'];

       $data = new applicant_account;
       $data->Fname = $Fname;
       $data->Lname = $Lname;
       $data->username =$username;
       $data->password = $password;
       $data->contact_num =$contact_num;
       $data->alternative_num ='';
       $data->date_register =date('y-m-d');
       $data->image='';
       $save = $data->save();
       $accountId = $data->accountId;

      $address =  new address;
      $address->accountId =$accountId;
       $address->purok=$purok;
       $address->barangay=$barangay;
       $address->city=$city;
       $address->save();
      if($save){
          return response()->json([
              'code'=>200,
              'message'=>'Successfully Registered'
          ]);
      }else{
        return response()->json([
            'message'=>'something went wrong'
        ]);
      }
    }

}
