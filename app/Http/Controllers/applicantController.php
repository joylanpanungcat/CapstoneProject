<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
// use Illuminate\Support\Facades\DB;
use App\Models\applicant_account;
use App\Models\application;
use App\Models\applicant;
use App\Models\address;
use App\Models\inspector;
use App\Models\schedule;
use App\Models\assessment;
use App\Models\defaultFee;

use DataTables;
use Hash;

class applicantController extends Controller
{
    //

  // fetch applicant account data
  public function account(){
    return view('admin/account');
  }
    public function accountFetch(){
       $data = applicant_account::
             orderBy('accountId','desc')
             ->get();
        return DataTables::of($data)
                          ->addIndexColumn()
                          ->addColumn('actions', function($row){
                                  return "
                                  

                                  <button type='button'  class='btn btn-defualt btn-xs actionButton sendArchive' id='".$row['accountId']."'><i class='fa fa-archive'></i></button>
                                  <button type='button' name='update' class='btn btn-defualt actionButton  btn-xs update' id='".$row['accountId']."' ><i class='fa fa-eye'></i></button>
                            
                <input type='hidden' id='account_id'  val='".$row['accountId']."'>
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
//User::create($data)
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
  public function loginApplicant(Request $request){
    $validator = Validator::make($request->all([
      'username'=>'required',
      'password'=>'required',
    ]),);

    if($validator->fails()){
      return response()->json([
        'status'=>400,
        'errors'=>$validator->messages()
    ]);
    }else{
      $applicant= applicant::where('username',$request->username)->first();

      if($applicant && Hass::check($request->password, $applicant->password)){
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $reponse =['applicant'=>$applicant,'token'=>$token];
        return response()->json($reponse,200);
      }else{
        $reponse = ['message'=>'Incorrect username or password'];
        return response()->json($reponse,400);
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

      return view('admin/applicant_profile')->with('account_details',$account_details);
 
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
public function update_info(Request $req){
  $id = $req->id;
  $Fname = $req->Fname;
  $Lname = $req->Lname;
  $Mname = $req->Mname;
  $contact_num = $req->contact_num;
  $alcontact = $req->alcontact;
  $purok = $req->purok;
  $barangay = $req->barangay;
  $city = $req->city;


  $applicant_account = applicant::find($id);
  
  $applicant_account->update([
  "Fname"=>$Fname,
    "Lname"=>$Lname,
    "Mname"=>$Mname,
    "contact_num"=>$contact_num,
    "alcontact"=>$alcontact,
  ]);

$address= address::where('applicantId',$id)->first();
$address->update([
  'purok'=>$purok,
  'barangay'=>$barangay,
  'city'=>$city,
]);

  if($applicant_account){
    return response()->json([
      'status'=>200,
      'msg'=>'Successfully Updated',
      'data'=>$address,
    ]);
  }else{
    return response()->json([
      'status'=>0,
      'msg'=>'something went wrong'
    ]);
  }



}
// public function applicationRecord(Request $request){
//     $account_id= $request->account_id;
//       $accound_details=applicant_account::find($account_id);
//         return response()->json(['details'=>$accound_details]);
// }

public function view_business_info(Request $request){
  $applicationId= $request->applicationId;

  $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
  ->where('applicationId',$applicationId)->get();
   $address_application = application::join('address','address.applicationId','=','application.applicationId')
  ->where('application.applicationId',$applicationId)->get();

  $address_applicant = application::join('address','address.applicantId','=','application.applicantId')
  ->where('application.applicationId',$applicationId)->get();

  $inspector = inspector::get();
  $schedule = schedule::where('applicationId',$applicationId)->get();

  return response()->json([
    'data2'=>$data,
    'inspector'=>$inspector,
    'address_application'=>$address_application,
    'address_applicant'=>$address_applicant,
    'schedule'=>$schedule
  ]);
  

}
public function update_business_info(Request $request){
 $applicationId = $request->applicationId_businessInfo;
 $applicantId = $request->applicant_businessInfo;
 

        $application = application::where('applicationId',$applicationId);
        $application->update([
          'type_application' => $request->type_application,
          'control_number' => $request->control_number,
          'type_occupancy' => $request->type_occupancy,
          'nature_business' =>$request->nature_business,
          'business_name' => $request->type_occupancy,
          'Bin' =>$request->Bin,
          'BP_num' => $request->BP_num,
          'OR_num' =>$request->OR_num,
          'status' => $request->status,
          'date_apply' =>$request->date_apply,
          'remarks' => $request->remarks,
        ]);

        $applicant = applicant::where('applicantId',$applicantId);
        $applicant->update([
          'Fname'=>$request->Fname_Business,
          'Lname'=>$request->Fname_Business,
          'Mname'=>$request->Mname_Business,
          'contact_num'=>$request->contact_num_Business,
          'alcontact'=>$request->alcontact_business,
        ]);

        $address_applicant = address::where('applicantId',$applicantId);
        $address_applicant->update([
          'purok'=>$request->purok_applicant,
          'barangay'=>$request->barangay_applicant,
          'city'=>$request->city_applicant,
        ]);

        $address_application = address::where('applicationId',$applicationId);
        $address_application->update([
          'purok'=>$request->purok_business,
          'barangay'=>$request->barangay_business,
          'city'=>$request->barangay_business,
        ]);

        return response()->json([
          'msg'=>'Successfully Update!'
        ]);
}

public function set_schedule(Request $request){
  $applicationId = $request->applicationId;
  $inpector_id = $request->inpector_id;
  $applicantId = $request->applicantId;
  $date_inspection = $request->date_inspection;


  $schedule = new schedule();
  $schedule->applicantId=$applicantId;
  $schedule->applicationId=$applicationId;
  $schedule->inspectorId=$inpector_id;
  $schedule->date_inspection=$date_inspection;
  $schedule->save();

  return response()->json([
    'output'=>'INSPECTION SCHEDULE ON '.$date_inspection.'',
    'msg'=> 'Set schedule successfully'
  ]);

}

public function payment_view(Request $request){
  $applicationId =$request->applicationId ;
  $applicantId =$request->applicantId ;
  $output = '';
  $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
  ->join('assessment','assessment.applicationId','=','application.applicationId')
  ->join('address','address.applicantId','=','applicant.applicantId')
  ->where('application.applicationId',$applicationId)
  ->get();

  $data2= assessment::join('sub_assessment','sub_assessment.assessmentId','=','assessment.assessmentId')
          ->join('fees','fees.fees_id','=','sub_assessment.fees_id')
          ->where('assessment.applicationId',$applicationId)
  ->get();
  $data3=defaultFee::all();
  // <td><input type='text' class='assessment_input' value='".$item['account_code']."' id='".$item['fees_id']."' readonly='' /></td>
  foreach($data2 as $item){
    $output .= "<tr><td>".$item['natureof_payment']."</td><td> <input type='number' class='assessment_total' id='".$item['fees_id']."'  value=".$item['assessment_total']."  readonly=''/></td></tr>";
    $total = $item['total_amount'];
  }
//   $output.='<tr>
//   <td>TOTAL</td>
//   <td></td>
//   <td>'.$total.'</td>
// </tr>';

  return response()->json([
    'data'=>$data,
    'output'=>$output,
    'data2'=>$data2,
    'data3'=>$data3
  ]);
}

}
