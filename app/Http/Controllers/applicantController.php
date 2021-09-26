<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
// use Illuminate\Support\Facades\DB;
use App\Models\applicant_account;
use App\Models\application;
use DataTables;

class applicantController extends Controller
{
    //

  // fetch applicant account data
  public function account(){
    return view('account');
  }
    public function accountFetch(){
       $data = applicant_account::
             orderBy('accountId','desc')
             ->get();
        return DataTables::of($data)
                          ->addIndexColumn()
                          ->addColumn('actions', function($row){
                                  return "
                                  

                                  <button type='button'  class='btn btn-defualt btn-xs sendArchive' id='".$row['accountId']."'><i class='fa fa-archive'></i></button>|| <button type='button' name='update' class='btn btn-defualt btn-xs update' id='".$row['accountId']."' ><i class='fa fa-edit'></i></button>||
                            
                <input type='hidden' id='account_id'  val='".$row['accountId']."'>

                 <a type='button' name='viewApplicant' class='btn btn-defualt btn-xs ' href='applicant_profile/".$row['accountId']."' target='_blank'><i class='fa fa-eye'></i></a>
                ";
                              })
                             ->rawColumns(['actions'])

                          ->make(true);
    }
    
    public function add(Request $request){
      $validator= Validator::make($request->all(),[
        'First_Name'=>'required',
        'Last_Name'=>'required',
        'username'=>'required',
        'password'=>'required',
        'city'=>'required',
        'barangay'=>'required',
        'purok'=>'required',
        'Contact_Number'=>'required'
      ]);

      if($validator->fails())
      {
        return response()->json([
            'status'=>400,
            'errors'=>$validator->messages()
        ]);
      }else{

        $account = new applicant_account;
        $account->Fname=$request->First_Name;
        $account->Lname=$request->Last_Name;
        $account->username=$request->username;
        $account->password=$request->password;
        $account->contact_num=$request->Contact_Number;
        $account->date_register=$request->date_register;
        $account->image='null';
        $query =$account->save();
    //     $values=[
    //     "Fname"=>$request->input('Fname'),
    //     "Lname"=>$request->input('Lname'),
    //    "password"=>$request->input('password'),
    //     "contact_num"=>$request->input('contact_num'),
    //     "date_register"=>$request->input('date_register'),
    //     "image"=>'null'
    // ];

      // $query=DB::table('applicant_account')->insert($values);

      // if($query){
      //     return response()->json([
      //     'status'=>200,
      //     'message'=>"Applicant added successfully!"
      //   ]);
      // }
        if(!$query){
           return response()->json([
            'status'=>400,
            'msg'=>"Something went wrong!"
        ]);
        }else{
           return response()->json([
            'status'=>1,
            'msg'=>"Applicant successfully added!"
        ]);
        }
      
      }
    }

    // get applicant detials
    public function getApplicantDetails(Request $request){
      $account_id= $request->account_id;
      $accound_details=applicant_account::find($account_id);

      return response()->json(['details'=>$accound_details]);
    }

    public function updateApplicant(Request $request){
      $account_id=$request->EditAccount_id;

      $validator=Validator::make($request->all(),[
        'First_Name'=>'required',
        'Last_Name'=>'required',
        'username'=>'required',
        'password'=>'required',

      ]);

      if(!$validator->passes()){
         return response()->json([
            'status'=>400,
            'errors'=>$validator->messages()
        ]);
      }else{



        $account=applicant_account::find($account_id);
        $account->Fname=$request->First_Name;
        $account->Lname=$request->Last_Name;
       $query= $account->save();

        if($query){
          return response()->json([
             'status'=>1,
             'msg'=>'Applicant account updated successfully!' 
          ]);
        }else
        {
          return response()->json([
             'status'=>0,
             'msg'=>'Something went wrong!' 
          ]);
        }
      }

    }
public function viewApplicant(Request $request){
    $account_id= $request->id;
      $account_details=applicant_account::find($account_id);

      return view('applicant_profile')->with('account_details',$account_details);
 
}
public function swalert(Request $request){
  $accountId=$request->accountId;
 $query= applicant_account::find($accountId)->delete();

   if($query){
          return response()->json([
             'status'=>1,
             'msg'=>'data archived' 
          ]);
        }else
        {
          return response()->json([
             'status'=>0,
             'msg'=>'something went wrong!' 
          ]);
        }
}
public function restore(Request $request){
  $accountId=$request->accountId;
  $query=applicant_account::withTrashed()->find($accountId)->restore();
 if($query){
          return response()->json([
             'status'=>1,
             'msg'=>'data undone' 
          ]);
        }else
        {
          return response()->json([
             'status'=>0,
             'msg'=>'something went wrong!' 
          ]);
        }
 
}
// public function applicationRecord(Request $request){
//     $account_id= $request->account_id;
//       $accound_details=applicant_account::find($account_id);
//         return response()->json(['details'=>$accound_details]);
// }



}
