<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\application;
use App\Models\address;
use App\Models\applicant;
use App\Models\applicant_account;
use App\Models\emergency;
use App\Models\folderUpload;
use App\Models\fileUpload;

class applicationControllerApplicant extends Controller
{
    //
    public function add_appllication_action(Request $request){
        $accountId   = session()->get('accountId')['accountId'];
        $applicantFname =session()->get('accountId')['Fname'];
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

        $applicant_purok   =$request->applicant_purok ;
        $applicant_barangay   =$request->applicant_barangay ;
        $applicant_city   =$request->applicant_city ;

        $Fname =$request->Fname;
        $Lname =$request->Lname;
        $Mname =$request->Mname;
        $contact_num =$request->contact_num;

        if($request->file('file')){
            $img = $request->file('file');
            $files=[];
            $path = public_path().'/files/';
            foreach($img as $file){
                 $name=$file->getClientOriginalName();
               // $imageName = strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
                $file->move($path.$Fname.$Lname.'/'.$type_application,$name);
                  $files[]=$name;
                }
        }
        $path2=$Fname.$Lname.'/'.$type_application;
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
        $application->filenames= $path2;
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
        $address2->purok=$applicant_purok;
        $address2->barangay=$applicant_barangay;
        $address2->city=$applicant_city;
        $address2->save();



        $folder= new folderUpload;
        $folder->applicationId= $applicationId;
        $folder->folderName= $Fname.$Lname;
        $folder->uploader= $applicantFname;
        $folder->parentId= null;
        $folder->created=date("F j, Y, g:i a");
        $folder->lastModified=date("F j, Y, g:i a");
        $folder->save();
        $folderParent = $folder->folderId;


        $folder2= new folderUpload;
        $folder2->applicationId= $applicationId;
        $folder2->folderName= $type_application;
        $folder2->parentId= $folderParent;
        $folder2->uploader= $applicantFname;
        $folder2->lastModified=date("F j, Y, g:i a");
        $folder2->created=date("F j, Y, g:i a");
        $folder2->save();
        $folderParent2 = $folder2->folderId;

      foreach($files as $name){
            $filesUpload= new  fileUpload;
            $filesUpload->applicationId=$applicationId;
            $filesUpload->filename=$name;
            $filesUpload->folderId=$folderParent2;
            $filesUpload->lastModified=date("F j, Y, g:i a");
            $filesUpload->save();
        }

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

    return view('applicant/application_view',['data'=>$data]);
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
