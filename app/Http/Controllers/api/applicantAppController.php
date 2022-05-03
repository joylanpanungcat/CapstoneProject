<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\applicant_account;
use App\Models\address;
use App\Models\applicant;
use App\Models\application;
use App\Models\folderUpload;
use App\Models\fileUpload;

class applicantAppController extends Controller
{
    //

    public function updateUser(Request $request){
        $accountId =  $request->data['accountId'];
        $Fname =  $request->data['Fname'];
        $Lname =  $request->data['Lname'];
        $username =  $request->data['username'];
        $password = $request->data['password'];
        $contact_num = $request->data['contact_num'];
        $alternative_num = $request->data['alternative_num'];
        $purok = $request->data['purok'];
        $barangay = $request->data['barangay'];
        $city = $request->data['city'];

     $data = applicant_account::where('accountId', $accountId);
    $update=  $data->update([
            'Fname'=>$Fname,
            'Lname'=>$Lname,
            'username'=>$username,
            'password'=>$password,
            'contact_num'=>$contact_num,
            'alternative_num'=>$alternative_num,
        ]);
    $address =address::where('accountId', $accountId);
    $update2=  $address->update([
        'purok'=>$purok,
        'barangay'=>$barangay,
        'city'=>$city
    ]);

    if($update || $update2){
        return response()->json([
            'msg'=>'Successfully Updated'
        ]);
    }else{
        return response()->json([
            'msg'=>'wala'
        ],401);
    }

}
public function addApplication(Request $request){

    $accountId = $request->user()->accountId;
    $Fname =  $request->fname;
    $Lname = $request->lname;
    $Mname= $request->mname;
    $contact_num= $request->contactNum;
    $applicantPurok =$request->applicantPurok;
    $applicantBarangay =$request->applicantBarangay;
    $applicantCity =$request->applicantCity;
    $type_application =$request->typeApplication;
    $type_occupancy =$request->occupancy;
    $nature_business= $request->natureBusiness;
    $business_name =$request->businessName;
    $businessPurok =$request->businessPurok;
    $businessBarangay =$request->businessBarangay;
    $businessCity =$request->businessCity;
    $date_apply  = date('y-m-d');
    $status  = 'pending';
    $filenames  = '';
    $remarks  = 'new';


    if($request->file('files')){
        $img = $request->file('files');
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

    $address2 = new address;
    $address2->applicationId= $applicationId;
    $address2->purok=$businessPurok;
    $address2->barangay=$businessBarangay;
    $address2->city=$businessCity;
    $address2->save();

    $address = new address;
    $address->applicantId= $applicantId;
    $address->purok=$applicantPurok;
    $address->barangay=$applicantBarangay;
    $address->city=$applicantCity;
    $address->save();

    $folder= new folderUpload;
    $folder->applicationId= $applicationId;
    $folder->folderName= $Fname.$Lname;
    $folder->uploader= $Fname;
    $folder->parentId= null;
    $folder->created=date("F j, Y, g:i a");
    $folder->lastModified=date("F j, Y, g:i a");
    $folder->save();
    $folderParent = $folder->folderId;


    $folder2= new folderUpload;
    $folder2->applicationId= $applicationId;
    $folder2->folderName= $type_application;
    $folder2->parentId= $folderParent;
    $folder2->uploader= $Fname;
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
        'msg'=>'Application Successfully Added'
    ]);
}

public function getApplication(Request $request){
    $accountId = $request->user()->accountId;
    $data2 = application::
    join('address','address.applicationId','=','application.applicationId')
    ->select('address.purok','address.barangay','address.city','application.*')->where('application.accountId',$accountId )->get();
    return $data2;
}

public function viewApplication(Request $request){
    $accountId = $request->accountId;
    $applicationId = $request->applicationId;
    $data = application::
    join('address','address.applicantId','=','application.applicantId')
    ->join('applicant','applicant.applicantId','=','application.applicantId')
    ->select('address.purok','address.barangay','address.city','application.*','applicant.*')->where('application.accountId',$accountId )
    ->where('application.applicationId',$applicationId)->get();

    for($i =0 ; $i<$data->count(); $i++){
        $data[0]->businessAddress = address::where('applicationId',$applicationId)->get();
    }
    return $data;
}
public function searchApplication(Request $request){
    $data = application::
    join('address','address.applicationId','=','application.applicationId')
    ->where('type_application','LIKE','%'.$request->typeApplication.'%')
    ->select('address.purok','address.barangay','address.city','application.*')->where('application.accountId',$request->accountId )->get();
    return $data;
}
public function updateApplication(Request $request){
    $Fname = $request->data[0]['Fname'];
    $Lname = $request->data[0]['Lname'];
    $Mname = $request->data[0]['Mname'];
    $accountId = $request->data[0]['accountId'];
    $applicantId = $request->data[0]['applicantId'];
    $applicationId = $request->data[0]['applicationId'];
    $barangay = $request->data[0]['barangay'];
    $business_name = $request->data[0]['business_name'];
    $city = $request->data[0]['city'];
    $contact_num = $request->data[0]['contact_num'];
    $nature_business = $request->data[0]['nature_business'];
    $purok = $request->data[0]['purok'];
    $type_application = $request->data[0]['type_application'];
    $businessAddressPurok = $request->data[0]['businessAddress'][0]['purok'];
    $businessAddressBarangay = $request->data[0]['businessAddress'][0]['barangay'];
    $businessAddressCity = $request->data[0]['businessAddress'][0]['city'];

    $type_occupancy = $request->data[0]['type_occupancy'];


    $updateApplicant = applicant::where('applicantId',$applicantId)->update([
        'Fname'=>$Fname,
        'Lname'=>$Lname,
        'Mname'=>$Mname,
        'contact_num'=>$contact_num,
    ]);
    $updateAddress = address::where('applicantId',$applicantId)->update([
        'purok'=>$purok,
        'barangay'=>$barangay,
        'city'=>$city,
    ]);
    $updateApplication = application::where('applicationId',$applicationId)->update([
        'type_application'=>$type_application,
        'type_occupancy'=>$type_occupancy,
        'nature_business'=>$nature_business,
        'business_name'=>$business_name,
    ]);
    $updateAddressBus = address::where('applicationId',$applicationId)->update([
        'purok'=>$businessAddressPurok,
        'barangay'=>$businessAddressBarangay,
        'city'=>$businessAddressCity,
    ]);

      if($updateApplicant || $updateAddress || $updateApplication || $updateAddressBus){
        return response()->json([
            'msg'=>'Application Successfully Updated'
        ]);
      }else{
        return response()->json([
            'msg'=>'No Changes'
        ]);
      }
}
public function deleteApplication(Request $request){
    $applicationId=  $request->data;
    $applicantId=  $request->data2;
    $deleteApplication = application::where('applicationId',$applicationId)->delete();
    $deleteAddress = address::where('applicationId',$applicationId)
    ->orWhere('applicantId',$applicantId)->delete();
    $deleteApplicant = applicant::where('applicantId',$applicantId)->delete();

    if($deleteAddress || $deleteApplicant || $deleteApplication){
        return response()->json([
            'msg'=>'Application Successfully Deleted'
        ]);
    }
}
}
