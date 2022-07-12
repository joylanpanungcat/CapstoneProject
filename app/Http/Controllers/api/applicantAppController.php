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
use App\Models\emergency;
use App\Models\inspection_details;
use App\Models\schedule;
use App\Models\inspector;
use App\Models\notice;
use App\Models\defects;

use Carbon\Carbon;

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
    $date_apply  = date('Y-m-d H:i:s');
    $count= 1;
    $status  = 'pending';
    $filenames  = '';
    $remarks  = 'New';


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
    $application->count =$count;
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
public function getApplicationRenewal(Request $request){
    $accountId = $request->accountId;
    $data2 = application::
    join('address','address.applicationId','=','application.applicationId')
    ->select('address.purok','address.barangay','address.city','application.*')
    ->where('application.accountId',$accountId )
    ->where('application.status','=','renewal')
    ->get();
    return $data2;
}
public function checkApplication(Request $request){
    $accountId = $request->accountId;
    $data2 = application::
    join('address','address.applicationId','=','application.applicationId')
    ->select('address.purok','address.barangay','address.city','application.*')
    ->where('application.accountId',$accountId )
    ->where(function($query)
    {
        $query->select('*')
              ->from('application')
                ->where('application.status','=','renewal')
                ->orWhere('application.status','=','approved')
                ->orWhere('application.status','=','renewed');
    })
    // ->where('application.status','=','renewal')
    // ->orWhere('application.status','=','approved')
    // ->orWhere('application.status','=','renewed')
    ->get();
    if($data2->count()>0){
        return response()->json([
            'code'=> 200,
            'data'=>$data2
        ]);
    }else{
        return response()->json([
            'code'=> 401
        ]);
    }
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

public function connectAccount(Request $request){
   $passCode=  $request->item;
   $accountId=  $request->accountId;

   $data = application::where('passCode',$passCode)->whereNull('accountId')->get();
    if($data->count()>0){
        $data2= application::where('passCode',$passCode)->whereNull('accountId');
        $data2->update([
           'accountId'=> $accountId
        ]);
        return response()->json([
            'msg'=> 'Account Successfully Connected'
        ]);
    }else{
        return response()->json([
            'msg'=> 'Invalid Pass Code'
        ],401);
    }
}
public function sendEmergency(Request $request){
   $accountId = $request->accountId;
   $applicationId = $request->item['applicationId'];
   $count= 1;

   $data= emergency::where('application_id',$applicationId)
   ->where('accountId',$accountId)->get();

   if($data->count()>=0 && $data->count()<3){
    $emergency = new emergency;
    $emergency->application_id = $applicationId;
    $emergency->accountId = $accountId;
    $emergency->emergency_date = Carbon::now()->format('Y-m-d H:i:s');
    $emergency->count = $count;
    $emergency->save();

    return response()->json([],200);
   }else{
       return response()->json([],401);
   }
}

public function getApplicationInspector(Request $request){
    $inspectorId = $request->inspectorId;
    $data = application:: join('schedule','schedule.applicationId','=','application.applicationId')
    ->join('applicant','applicant.applicantId','=','application.applicantId')
    ->join('address','address.applicationId','=','application.applicationId')
    ->where('schedule.inspectorId',$inspectorId)
    ->where('schedule.inspected',null)
    ->where('schedule.deleted_at',null)
    ->get();
    return $data;
}
public function viewApplicationInspector(Request $request){
    $applicationId = $request->applicationId;
    $data = application::
    join('address','address.applicantId','=','application.applicantId')
    ->join('applicant','applicant.applicantId','=','application.applicantId')
    ->select('address.purok','address.barangay','address.city','application.*','applicant.*')
    ->where('application.applicationId',$applicationId)->get();

    for($i =0 ; $i<$data->count(); $i++){
        $data[0]->businessAddress = address::where('applicationId',$applicationId)->get();
        $data[0]->noticeToComply = inspection_details::where('applicationId',$applicationId)->get();
    }
    return $data;
}
public function addNoticeToCorrect(Request $request){
    $inspectorId= $request->inspectorId;
    $inspection_id = $request->inspectionId;
    $noticeToCorrect= $request->noticeToCorrect;
    $notice_array = json_decode($noticeToCorrect,true);

    if(count($notice_array)> 0 ){
        $addNotice = new noticeToCorrect;
        $addNotice->inspection_id =$inspection_id;
        $addNotice->date =Carbon::now()->format('Y-m-d H:i:s');
        $addNotice->save();
        $notice_id =$addNotice->notice_id;

        $applicationData = application::where('applicationId',$applicationId);
        $applicationData->update([
            'status'=>'reinspection'
        ]);

        for($i = 0 ; $i< count($notice_array); $i++){

            $dataDefects = new toCorrectDefects;
            $dataDefects->notice_id = $notice_id;
            $dataDefects->defects =  $notice_array[$i]['defects'];
            $dataDefects->grace_period = $notice_array[$i]['gracePeriod'];
            $dataDefects->save();
        }
        return response()->json([
            'msg'=>'notice to comply updated successfully',
            'code'=>200
        ]);

    }

}
public function inspectionReport(Request $request ){
    $inspectorId= $request->inspectorId;
    $applicationId= $request->applicationId;
    $lat= $request->lat;
    $long= $request->long;
    $item= $request->item;
    $noticeToComply= $request->noticeToComply;
    $notice_array = json_decode($noticeToComply,true);


    $inspected='true';
        $inspection = new inspection_details;
        $inspection->inspectorId =$inspectorId;
        $inspection->applicationId =$applicationId;
        $inspection->date_inspect =Carbon::now()->format('Y-m-d H:i:s');
        $inspection->under_construction=$request['under_construction'];
        $inspection->occupancy_permit=$request['occupancy_permit'];
        $inspection->business_permit=$request['business_permit'];
        $inspection->periodic_inspection=$request['periodic_inspection'];
        $inspection->verification_inspection_compliance=$request['verification_inspection_compliance'];
        $inspection->verification_inspection_complaint=$request['verification_inspection_complaint'];
        $inspection->others_specify=$request['others_specify'];
        //general information
        $inspection->name_building=$request['name_building'];
        $inspection->business_name=$request['business_name'];
        $inspection->address=$request['address'];
        $inspection->nature_business=$request['nature_business'];
        $inspection->name_owner=$request['name_owner'];
        $inspection->owner_contact_no=$request['owner_contact_no'];
        $inspection->name_representative=$request['name_representative'];
        $inspection->representative_no=$request['representative_no'];
        $inspection->no_storey=$request['no_storey'];
        $inspection->height_building=$request['height_building'];
        $inspection->portion_occupied=$request['portion_occupied'];
        $inspection->area_per_flr=$request['area_per_flr'];
        $inspection->total_flr_area=$request['total_flr_area'];
        $inspection->fire_insurance=$request['fire_insurance'];
        $inspection->policy_no=$request['policy_no'];
        $inspection->date_issued=$request['date_issued'];
        $inspection->type_occupancy=$request['type_occupancy'];
         //BUILDING CONSTRUCTION
        $inspection->beams=$request['beams'];
        $inspection->exterior=$request['exterior'];
        $inspection->main_stair=$request['main_stair'];
        $inspection->main_door=$request['main_door'];
        $inspection->colums=$request['colums'];
        $inspection->corridor_walls=$request['corridor_walls'];
        $inspection->windows=$request['windows'];
        $inspection->trussess=$request['trussess'];
        $inspection->flooring=$request['flooring'];
        $inspection->room_partitions=$request['room_partitions'];
        $inspection->ceiling=$request['ceiling'];
        $inspection->roof=$request['roof'];
        $inspection->sectional_occupancy=$request['sectional_occupancy'];
          //classification
        $inspection->occupancy_classification=$request['occupancy_classification'];
        $inspection->other_classification=$request['other_classification'];
        $inspection->occupant_load=$request['occupant_load'];
        $inspection->any_renoviation=$request['any_renoviation'];
        $inspection->other_renoviation=$request['other_renoviation'];
        $inspection->under_ground=$request['under_ground'];
        $inspection->windowless=$request['windowless'];
          //exit details
        $inspection->horizontal_exit=$request['horizontal_exit'];
        $inspection->capcity_exit_stair=$request['capcity_exit_stair'];
        $inspection->no_exits=$request['no_exits'];
        $inspection->remote=$request['remote'];
        $inspection->location_exit=$request['location_exit'];
        $inspection->enclosure_provided=$request['enclosure_provided'];
          //means of egress
        $inspection->ready_accessible=$request['ready_accessible'];
        $inspection->travel_distance=$request['travel_distance'];
        $inspection->adequete_illumination=$request['adequete_illumination'];
        $inspection->panic_hardware=$request['panic_hardware'];
        $inspection->doors_open_easily=$request['doors_open_easily'];
        $inspection->bldg_with_mezzanine=$request['bldg_with_mezzanine'];
        $inspection->corridors=$request['corridors'];
        $inspection->obstructed=$request['obstructed'];
        $inspection->dead_ends=$request['dead_ends'];
        $inspection->proper_rating_illumination=$request['proper_rating_illumination'];
        $inspection->door_swing=$request['door_swing'];
        $inspection->self_closure=$request['self_closure'];
        $inspection->mezzanne_with_proper_exit=$request['mezzanne_with_proper_exit'];
          //fire protection equipement
        $inspection->emergency_lights=$request['emergency_lights'];
        $inspection->illuminated_signs=$request['illuminated_signs'];
        $inspection->no_stinguisher=$request['no_stinguisher'];
        $inspection->type=$request['type'];
        $inspection->capacity=$request['capacity'];
        $inspection->accessible=$request['accessible'];
        $inspection->fire_alarm=$request['fire_alarm'];
        $inspection->detectors=$request['detectors'];
        $inspection->location_panel=$request['location_panel'];
        $inspection->functional=$request['functional'];
          //flammables
        $inspection->hazardous_materials=$request['hazardous_materials'];
        $inspection->store_handled=$request['store_handled'];
        $inspection->bfp_permnit=$request['bfp_permnit'];
        $inspection->stocks_ceiling=$request['stocks_ceiling'];
        $inspection->sign_provide=$request['sign_provide'];
        $inspection->smoking_permitted=$request['smoking_permitted'];
        $inspection->smoking_where=$request['smoking_where'];
        $inspection->stoved_used=$request['stoved_used'];
        $inspection->kind_fuel=$request['kind_fuel'];
        $inspection->smoke_hood=$request['smoke_hood'];
        $inspection->spark_arrester=$request['spark_arrester'];
        $inspection->partition_construction=$request['partition_construction'];
        //operating features
        $inspection->brigade_organization=$request['brigade_organization'];
        $inspection->brigade_organization_date=$request['brigade_organization_date'];
        $inspection->safety_seminar=$request['safety_seminar'];
        $inspection->safety_seminar_date=$request['safety_seminar_date'];
        $inspection->emergency_procedures=$request['emergency_procedures'];
        $inspection->emergency_procedures_date=$request['emergency_procedures_date'];
        $inspection->evacuation_drill=$request['evacuation_drill'];
        $inspection->evacuation_drill_date=$request['evacuation_drill_date'];
        $inspection->defects=$request['defects'];
        $inspection->recommendation=$request['recommendation'];
        $inspection->status=$request['status'];
        $inspection->save();
        $inspection_id = $inspection->inspection_id;

    $application = application::where('applicationId',$applicationId);
    $application->update([
        'inpector_id'=> $inspectorId,
        'lat'=>$lat,
        'long'=>$long,
    ]);

    $schedule = schedule::where('inspectorId',$inspectorId)->where('applicationId',$applicationId);
    $schedule->update([
        'inspected'=>$inspected
    ]);

    if(count($notice_array)> 0 ){
        $addNotice = new notice;
        $addNotice->inspection_id =$inspection_id;
        $addNotice->inspector_id =$inspectorId;
        $addNotice->date =Carbon::now()->format('Y-m-d H:i:s');
        $addNotice->save();
        $notice_id =$addNotice->notice_id;

        $applicationData = application::where('applicationId',$applicationId);
        $applicationData->update([
            'status'=>'reinspection'
        ]);

        for($i = 0 ; $i< count($notice_array); $i++){

            $dataDefects = new defects;
            $dataDefects->notice_id = $notice_id;
            $dataDefects->defects =  $notice_array[$i]['defects'];
            $dataDefects->grace_period = $notice_array[$i]['gracePeriod'];
            $dataDefects->save();
        }
    return response()->json([
        'msg'=>'Inspection Successfully Recorded',
        'code'=>201
    ]);

    }

    return response()->json([
        'msg'=>'Inspection Successfully Recorded'
    ]);
}
public function getInspectionHistory(Request $request){
    $inspectorId = $request->inspectorId;
    $data = application::
    join('applicant','applicant.applicantId','=','application.applicantId')
    ->join('address','address.applicationId','=','application.applicationId')
    ->join('inspection_details','inspection_details.applicationId','=','application.applicationId')
    ->where('application.inpector_id',$inspectorId)
    ->where('inspection_details.status','=','approved')
    ->get();
    return $data;
}
public function getReinspection(Request $request){
    $inspectorId = $request->inspectorId;
    $data = application::
    join('applicant','applicant.applicantId','=','application.applicantId')
    ->join('address','address.applicationId','=','application.applicationId')
    ->join('inspection_details','inspection_details.applicationId','=','application.applicationId')
    ->join('notice','notice.inspection_id','=','inspection_details.inspection_id')
    ->where('application.inpector_id',$inspectorId)
    ->where('inspection_details.status','=','reinspection')
    ->get();
    return $data;
}
public function getNoticeToComply(Request $request){
    $inspection_id  = $request->inspectionId;
    $inspectorId = $request->inspectorId;

    $data = notice::join('defects','defects.notice_id','=','notice.notice_id')
    ->where('notice.inspection_id',$inspection_id)
    ->where('defects.status','=','uncomplied')->get();
    return $data;
}
public function getInspectionDetails(Request $request){
    $inspection_id  = $request->inspectionId;
    $inspectorId = $request->inspectorId;

    $data = inspection_details::where('inspection_id',$inspection_id)->get();
    return $data;
}
public function getComplied(Request $request){
    $inspection_id  = $request->inspectionId;
    $inspectorId = $request->inspectorId;
    $data = notice::join('defects','defects.notice_id','=','notice.notice_id')
    ->where('notice.inspection_id',$inspection_id)
    ->where('defects.status','=','complied')->get();

    return $data;
}
public function compliedAction(Request $request){
    $defect_id  = $request->defectId;

    $data = defects::where('defect_id',$defect_id);
    $data->update([
        'status'=>'complied'
    ]);
    return response()->json([
        'msg'=>'complied'
    ],200);
}
public function removeComplied(Request $request){
    $defect_id  = $request->defectId;
    $data = defects::where('defect_id',$defect_id);
    $data->update([
        'status'=>'uncomplied'
    ]);
    return response()->json([
        'msg'=>'uncomplied'
    ],200);
}
public function getInspectionHistoryDetails(Request $request)
{
    $applicationId = $request->applicationId;
    $inspectorId = $request->inspectorId;
    $data = application::join('inspection_details','application.applicationId','=','inspection_details.applicationId')
    ->where('application.inpector_id',$inspectorId)
    ->where('application.applicationId',$applicationId)->get();

    return $data;
}
public function updateInspectionDetails(Request $request){


    $item =  $request->item;
foreach($item as $data){
    $inspection_id =  $data['inspection_id'];
        $inspection =  inspection_details::find($inspection_id);
        $inspection->date_inspect =Carbon::now()->format('Y-m-d H:i:s');
        $inspection->under_construction=$data['under_construction'];
        $inspection->occupancy_permit=$data['occupancy_permit'];
        $inspection->business_permit=$data['business_permit'];
        $inspection->periodic_inspection=$data['periodic_inspection'];
        $inspection->verification_inspection_compliance=$data['verification_inspection_compliance'];
        $inspection->verification_inspection_complaint=$data['verification_inspection_complaint'];
        $inspection->others_specify=$data['others_specify'];
        //general information
        $inspection->name_building=$data['name_building'];
        $inspection->business_name=$data['business_name'];
        $inspection->address=$data['address'];
        $inspection->nature_business=$data['nature_business'];
        $inspection->name_owner=$data['name_owner'];
        $inspection->owner_contact_no=$data['owner_contact_no'];
        $inspection->name_representative=$data['name_representative'];
        $inspection->representative_no=$data['representative_no'];
        $inspection->no_storey=$data['no_storey'];
        $inspection->height_building=$data['height_building'];
        $inspection->portion_occupied=$data['portion_occupied'];
        $inspection->area_per_flr=$data['area_per_flr'];
        $inspection->total_flr_area=$data['total_flr_area'];
        $inspection->fire_insurance=$data['fire_insurance'];
        $inspection->policy_no=$data['policy_no'];
        $inspection->date_issued=$data['date_issued'];
        $inspection->type_occupancy=$data['type_occupancy'];
         //BUILDING CONSTRUCTION
        $inspection->beams=$data['beams'];
        $inspection->exterior=$data['exterior'];
        $inspection->main_stair=$data['main_stair'];
        $inspection->main_door=$data['main_door'];
        $inspection->colums=$data['colums'];
        $inspection->corridor_walls=$data['corridor_walls'];
        $inspection->windows=$data['windows'];
        $inspection->trussess=$data['trussess'];
        $inspection->flooring=$data['flooring'];
        $inspection->room_partitions=$data['room_partitions'];
        $inspection->ceiling=$data['ceiling'];
        $inspection->roof=$data['roof'];
        $inspection->sectional_occupancy=$data['sectional_occupancy'];
          //classification
        $inspection->occupancy_classification=$data['occupancy_classification'];
        $inspection->other_classification=$data['other_classification'];
        $inspection->occupant_load=$data['occupant_load'];
        $inspection->any_renoviation=$data['any_renoviation'];
        $inspection->other_renoviation=$data['other_renoviation'];
        $inspection->under_ground=$data['under_ground'];
        $inspection->windowless=$data['windowless'];
          //exit details
        $inspection->horizontal_exit=$data['horizontal_exit'];
        $inspection->capcity_exit_stair=$data['capcity_exit_stair'];
        $inspection->no_exits=$data['no_exits'];
        $inspection->remote=$data['remote'];
        $inspection->location_exit=$data['location_exit'];
        $inspection->enclosure_provided=$data['enclosure_provided'];
          //means of egress
        $inspection->ready_accessible=$data['ready_accessible'];
        $inspection->travel_distance=$data['travel_distance'];
        $inspection->adequete_illumination=$data['adequete_illumination'];
        $inspection->panic_hardware=$data['panic_hardware'];
        $inspection->doors_open_easily=$data['doors_open_easily'];
        $inspection->bldg_with_mezzanine=$data['bldg_with_mezzanine'];
        $inspection->corridors=$data['corridors'];
        $inspection->obstructed=$data['obstructed'];
        $inspection->dead_ends=$data['dead_ends'];
        $inspection->proper_rating_illumination=$data['proper_rating_illumination'];
        $inspection->door_swing=$data['door_swing'];
        $inspection->self_closure=$data['self_closure'];
        $inspection->mezzanne_with_proper_exit=$data['mezzanne_with_proper_exit'];
          //fire protection equipement
        $inspection->emergency_lights=$data['emergency_lights'];
        $inspection->illuminated_signs=$data['illuminated_signs'];
        $inspection->no_stinguisher=$data['no_stinguisher'];
        $inspection->type=$data['type'];
        $inspection->capacity=$data['capacity'];
        $inspection->accessible=$data['accessible'];
        $inspection->fire_alarm=$data['fire_alarm'];
        $inspection->detectors=$data['detectors'];
        $inspection->location_panel=$data['location_panel'];
        $inspection->functional=$data['functional'];
          //flammables
        $inspection->hazardous_materials=$data['hazardous_materials'];
        $inspection->store_handled=$data['store_handled'];
        $inspection->bfp_permnit=$data['bfp_permnit'];
        $inspection->stocks_ceiling=$data['stocks_ceiling'];
        $inspection->sign_provide=$data['sign_provide'];
        $inspection->smoking_permitted=$data['smoking_permitted'];
        $inspection->smoking_where=$data['smoking_where'];
        $inspection->stoved_used=$data['stoved_used'];
        $inspection->kind_fuel=$data['kind_fuel'];
        $inspection->smoke_hood=$data['smoke_hood'];
        $inspection->spark_arrester=$data['spark_arrester'];
        $inspection->partition_construction=$data['partition_construction'];
        //operating features
        $inspection->brigade_organization=$data['brigade_organization'];
        $inspection->brigade_organization_date=$data['brigade_organization_date'];
        $inspection->safety_seminar=$data['safety_seminar'];
        $inspection->safety_seminar_date=$data['safety_seminar_date'];
        $inspection->emergency_procedures=$data['emergency_procedures'];
        $inspection->emergency_procedures_date=$data['emergency_procedures_date'];
        $inspection->evacuation_drill=$data['evacuation_drill'];
        $inspection->evacuation_drill_date=$data['evacuation_drill_date'];
        $inspection->defects=$data['defects'];
        $inspection->recommendation=$data['recommendation'];
        $inspection->status=$data['status'];
      $query=  $inspection->save();
}
if($query){
    return response()->json([
        'msg'=>'Inspection Updated'
     ]);
}else{
    return response()->json([
        'msg'=>'no changes'
     ]);
}

}
public function deleteInspectionDetails(Request $request){
    $inspection_id = $request->inspectionId;
    $applicationId = $request->applicationId;

    $data= inspection_details::where('inspection_id',$inspection_id)->delete();
    $data2 = schedule::where('applicationId',$applicationId);
    $data2->update([
        'inspected'=>null
    ]);
    return response()->json([
        'msg'=>'Inspection Deleted'
    ]);
}
public function getProfileInspector(Request $request){
    $inspectorId= $request->inspectorId;
    $data =inspector::where('inspectorId',$inspectorId )->get();

    return response()->json($data);
}
public function updateInspectorProfile(Request $request){
    $Fname=  $request->item['Fname'];
    $Lname=  $request->item['Lname'];
    $Position=  $request->item['Position'];
    $username=  $request->item['username'];
    $password=  $request->item['password'];
    $inspectorId=  $request->item['inspectorId'];

    $data= inspector::where('inspectorId',$inspectorId );
  $query=  $data->update([
        'Fname'=>$Fname,
        'Lname'=>$Lname,
        'Position'=>$Position,
        'username'=>$username,
        'password'=>$password,
    ]);

    if($query){
        return response()->json([
            'msg'=>'Successfully Updated'
        ]);
    }else{
        return response()->json([
            'msg'=>'No Changes'
        ]);
    }
}
public function searchApplicationForInspection(Request $request){
    $inspectorId = $request->inspectorId;
    $data = application:: join('schedule','schedule.applicationId','=','application.applicationId')
    ->join('applicant','applicant.applicantId','=','application.applicantId')
    ->join('address','address.applicationId','=','application.applicationId')
    ->where('application.type_application','LIKE','%'.$request->typeApplication.'%')
    ->where('schedule.inspectorId',$inspectorId)
    ->where('schedule.inspected',null)
    ->where('schedule.deleted_at',null)
    ->get();
    return $data;
}
public function searchApplicationInspectionHistory(Request $request){
    $data = application::where('type_application','LIKE','%'.$request->typeApplication)
            ->where('inpector_id',$request->inspectorId)->get();
    return $data;
}

}
