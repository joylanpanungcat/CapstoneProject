<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\application;
use App\Models\address;
use App\Models\applicant;
use App\Models\applicant_account;
use App\Models\emergency;

class applicationControllerApplicant extends Controller
{
    //
    public function add_appllication_action(Request $request){
        $accountId   = session()->get('accountId')['accountId'];
        $type_application  =$request->type_application;
        $type_occupancy  =$request->type_occupancy;
        $nature_business  =$request->nature_business;
        $business_name  =$request->business_name;
        $date_apply  = date('y-m-d');
        $status  = 'pending';
        $filenames  = '';
        $city  = 'Panabo';
        $remarks  = 'new';

        $purok   =$request->purok ;
        $barangay   =$request->barangay ;

        $Fname =$request->Fname;
        $Lname =$request->Lname;
        $Mname =$request->Mname;
        $contact_num =$request->contact_num;

        $applicant = new applicant;
        $applicant->Fname =$Fname;
        $applicant->Lname =$Lname;
        $applicant->Mname =$Mname;
        $applicant->contact_num =$contact_num;
        $applicant->save();
        $applicantId = $applicant->applicantId;

        $application = new application;
        $application->applicantId= $applicantId;
        $application->accountId= $accountId;
        $application->type_application=$type_application;
        $application->type_occupancy=$type_occupancy;
        $application->nature_business=$nature_business;
        $application->business_name=$business_name;
        $application->date_apply =$date_apply;
        $application->status= $status;
        $application->filenames= $filenames;
        $application->remarks= $remarks;
        
        $application->save();
        $applicationId= $application->applicationId;

        $address = new address;
        $address->applicationId= $applicationId;
        $address->purok=$purok;
        $address->barangay=$barangay;
        $address->city=$city;
        $address->save();

        $address2 = new address;
        $address2->applicantId= $applicantId;
        $address2->purok=$purok;
        $address2->barangay=$barangay;
        $address2->city=$city;
        $address2->save();

        return response()->json([
            'msg'=>'Applied Successfully'
        ]);

        
    }

    public function update_profile(Request $request){
        $accountId = $request->accountId;
        $Fname = $request->Fname;
        $Lname = $request->Lname;
        $username = $request->username;
        $password = $request->password;
        $contact_num = $request->contact_num;
        $alternative_num = $request->alternative_num;
        $purok = $request->purok;
        $barangay = $request->barangay;

        $data = applicant_account::join('address','address.applicantId','=','applicant_account.accountId')
                ->where('address.applicantId', $accountId);

        $data->update([
            'Fname'=>$Fname,
            'Lname'=>$Lname,
            'username'=>$username,
            'password'=>$password,
            'contact_num'=>$contact_num,
            'alternative_num'=>$alternative_num,
            'purok'=>$purok,
            'barangay'=>$barangay,
        ]);
                
        return response()->json([
            'msg'=>'Successfully Updated'
        ]);
    }

    

   public function view_application (Request $request){
    $applicationId = $request->id;
    $verify='verify';
    $data=application::
    join('applicant','applicant.applicantId','=','application.applicantId')
    ->join('address','address.applicationId','application.applicationId')
    ->where('application.applicationId',$applicationId)
    ->get();

    return view('application_view',['data'=>$data]);
   }

   public function connect_account(Request $request){
    $accountId = session()->get('adminID')['accountId'];
       $control_number =$request->control_num_connect;
       $contact_num =$request->contact_num_connect;
       $code =200;
        

       $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
       ->where('application.control_number',$control_number)
       ->where('applicant.contact_num',$contact_num)->get();

       if($data->count()> 0){
           foreach($data as $item){
               $applicationId =$item['applicationId'];
               $application = application::where('applicationId',$applicationId);
               $application->update([
                   'accountId'=> $accountId
               ]);
                 $code =400;

           }
    
       }

       return response()->json([
           'code'=> $code
       ]);
   }
   public function update_application(Request $request){
    
    $applicationId = $request->applicationId;
    $type_occupancy = $request->type_occupancy;
    $nature_business = $request->nature_business;
    $business_name = $request->business_name;
    $Fname = $request->Fname;
    $Mname = $request->Mname;
    $Lname = $request->Lname;
    $purok = $request->purok;
    $barangay = $request->barangay;
    
    $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
    ->join('address','address.applicationId','=','application.applicationId')
    ->where('application.applicationId',$applicationId);
    $data->update([
        'type_occupancy'=>$type_occupancy,
        'nature_business'=>$nature_business,
        'business_name'=>$business_name,
        'Fname'=>$Fname,
        'Mname'=>$Mname,
        'Lname'=>$Lname,
        'purok'=>$purok,
        'barangay'=>$barangay,
    ]);

    return response()->json([
        'msg'=>'Successfully Updated'
    ]);

   }
   public function delete_application(Request $request){
    $accountId=$request->applicationId;
    $query= application::find($accountId)->delete();
   
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
   public function view_renewal (Request $request){
    $applicationId = $request->id;
    $verify='verify';
    $data=application::
    join('applicant','applicant.applicantId','=','application.applicantId')
    ->join('address','address.applicationId','application.applicationId')
    ->where('application.applicationId',$applicationId)
    ->get();

    return view('renewal_view',['data'=>$data]);
   }

public function send_emergency(Request $request){
    $accountId = session()->get('adminID')['accountId'];
    $business_name = $request->business_name;
    $count = 0;

    $data = application::join('address','address.applicationId','=','application.applicationId')
    ->where('application.accountId',$accountId)->where('business_name',$business_name)
    ->get();

 
    foreach($data as $data){

        $applicationId = $data['applicationId'];
        $emergency = new emergency;
        $emergency->application_id = $applicationId;
        $emergency->accountId = $accountId;
        $emergency->emergency_date	 = date('y-m-d ');
        $emergency->count =$count;
        $query = $emergency->save();
    }

    if($query){
        return response()->json([
            'code'=>400
        ]);
    }


}
}
