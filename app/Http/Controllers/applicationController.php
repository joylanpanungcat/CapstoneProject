<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\application;
use App\Models\applicant;
use App\Models\address;
use App\Models\fileUpload;
use App\Models\folderUpload;
use App\Models\activity;
use App\Models\assessment;
use App\Models\subAssessment;
use App\Models\inspection_details;
use App\Models\defaultFee;
use App\Models\applicant_account;
use App\Models\notice;
use App\Models\noticeToCorrect;



use DB;

// use Storage;
use DataTables;
use Carbon\Carbon;
use Hash;

use Illuminate\Support\Facades\validator;
class applicationController extends Controller
{
      private $count = 0;
    //
  // public function applicationFetch(Request $req){
  //     //  $data = applicant::join('application','application.applicantId','=','applicant.applicantId')
  //      // $data = application::
  //     //  $data = application::join('applicant','application.applicantId','=','applicant.applicantId')
  //         $data = application::with('applicant')
  //           //  ->where('status','=','approved')
  //            ->orderBy('applicationId','desc')
  //            ->get();
  //       return DataTables::of($data)
  //                         ->addIndexColumn()
  //                         ->addColumn('actions', function($row){

  //                                 return '
  //                                 <button type="button"  class="btn   btn-sm  sendArchive actionButton" data-toggle="tooltip" data-placement="bottom" title="Archive" id="'.$row['applicationId'].'"><i class="fa fa-archive"></i>
  //                               </button>   ||

  //                        <a type="button" name="viewApplicant" class="btn  btn-sm actionButton" href="application_profile/'.$row['applicationId'].'" target="_blank" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye"></i></a>
  //               ';
  //                             })
  //             ->addColumn('name', function($row){
  //           return $row->applicant['Fname'].' '.$row->applicant['Mname'].'.  '.$row->applicant['Lname'];
  //                        })
  //                            ->rawColumns(['actions'])
  //                         ->make(true);
  //   }
public function applicationFetch(Request $request){
  if(request()->ajax())
  {
   if($request->category != '' && empty($request->from_date) )
   {
      $data = application::with('applicant')
               ->where('status','=',$request->category)
               ->orderBy('applicationId','desc')
               ->get();

   }
   elseif($request->from_date !='' && $request->category == '')
   {
    $data = application::with('applicant')
      ->whereBetween('date_apply', array($request->from_date, $request->to_date))
      ->get();
   }
   elseif($request->category != '' && !empty($request->from_date))
   {
    $data = application::with('applicant')
    ->where('status','=',$request->category)
    ->whereBetween('date_apply', array($request->from_date, $request->to_date))
    ->get();
   }
   else
   {
    $data = application::with('applicant')
          ->orderBy('applicationId','desc')
          ->get();
   }

  }
  return DataTables::of($data)
  ->addIndexColumn()
  ->addColumn('actions', function($row){

       return '
          <button type="button"  class="btn    sendArchive actionButton" data-toggle="tooltip" data-placement="bottom" title="Archive" id="'.$row['applicationId'].'"><i class="fa fa-archive"></i>
        </button>
 <a type="button" name="viewApplicant" class="btn  actionButton" href="application_profile/'.$row['applicantId'].'" target="_blank" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye"></i></a>
';
      })
->addColumn('name', function($row){
  return $row->applicant['Fname'].' '.$row->applicant['Mname'].'.  '.$row->applicant['Lname'];
 })
     ->rawColumns(['actions'])
    ->make(true);

}

public function viewApplication(Request $request){

    $account_id= $request->id;
    $applicantId= $request->id;
    $applicationId2= $request->id;

    // $applicant = applicant::where('applicantId',$applicantId)->get();

    $output ='';

    $account_details = applicant::find($account_id);
    $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
    ->where('application.applicantId',$applicationId2)->get();



    // $data =application::where('applicantId',$applicantId)->get();

    foreach($data as $data){
    $accountId =$data['accountId'];
    }
    $application = application::
    // join('address','address.applicationId','=','application.applicationId')
    where('application.applicantId',$applicantId)
    // ->ORwhere('application.accountId','=',$accountId)
  ->get();

    foreach($application as $item){
        if($item['accountId']===null){
            $application = application::join('address','address.applicationId','=','application.applicationId')
            ->where('application.applicantId',$applicantId)
            // ->ORwhere('application.accountId','=',$accountId)
            ->orderBy('application.applicationId','desc')->get();
        }else{
            $application = application::join('address','address.applicationId','=','application.applicationId')
            ->where('application.accountId','=',$item['accountId'])
            ->orderBy('application.applicationId','desc')->get();
        }
    }

    $applicant_account = application::
    join('address','address.applicantId','=','application.applicantId')
    ->join('applicant_account','applicant_account.accountId','=','application.accountId')
    ->where('application.applicationId',$applicationId2)
    ->get();

    $uploaded = application::where('applicantId',$applicantId)->get();
    foreach ($uploaded as $uploadedItem){
        if($uploadedItem['accountId'] === null){
            $uploaded = application::join('address','address.applicationId','=','application.applicationId')
            ->where('application.applicantId',$applicantId)
            ->orderBy('application.applicationId','desc')->get();
        }else{
            $uploaded = application::join('address','address.applicationId','=','application.applicationId')
            ->where('application.accountId','=',$uploadedItem['accountId'])
            ->orderBy('application.applicationId','desc')->get();
        }
    }


    $applicantAdd=address::where('applicantId','=',$account_id)->first();
    $applicationId=address::where('applicationId','=',$account_id)->first();

    // $assessment =assessment::join('application','application.applicationId','=','assessment.applicationId')
    // ->join('applicant','applicant.applicantId','=','application.applicantId')
    // ->where('application.applicantId',$account_id)
    // ->ORwhere('application.accountId','=',$accountId)
    // ->get();

     $assessment = application::
     join('applicant','applicant.applicantId','=','application.applicantId')
    ->where('application.applicationId',$applicationId2)->get();

    if($assessment->count()>0){
        foreach($assessment as $assessmentItem){
            if($assessmentItem['accountId'] === null){
                   $assessment[0]->assessment = application::join('assessment','assessment.applicationId','=','application.applicationId')
                                            ->join('applicant','applicant.applicantId','=','application.applicantId')
                                            ->where('application.applicationId',$applicationId2)->orderBy('application.applicationId','desc')
                                            ->limit(1)->get();
                // $assessment[0]->assessment= assessment::where('applicationId',$item['applicationId'])->get();
            }else{
                 $assessment[0]->assessment = application::join('assessment','assessment.applicationId','=','application.applicationId')
                 -> join('applicant','applicant.applicantId','=','application.applicantId')
                ->where('application.accountId',$assessmentItem['accountId'])
                ->orderBy('application.applicationId','desc')->limit(1)->get();
            }
        }
    }

 $inspection_details = application::where('applicationId',$applicationId2)->get();
   if($inspection_details->count()>0){
    foreach($inspection_details as $inspection_detailsItem){
        if($inspection_detailsItem['accountId'] === null){

            if($inspection_detailsItem['inpector_id'] ===null){
                $inspection_details[0]->inspection_details = application::join('inspection_details','inspection_details.applicationId','=','application.applicationId')
                ->join('inspector','inspector.inspectorId','=','application.inpector_id')
                  ->where('application.applicationId',$applicationId2)
                  ->orderBy('application.applicationId','desc')->get();
             }else{
                $inspection_details[0]->inspection_details = application::join('inspection_details','inspection_details.applicationId','=','application.applicationId')
                ->join('inspector','inspector.inspectorId','=','application.inpector_id')
                ->where('application.applicationId',$applicationId2)
                ->orderBy('application.applicationId','desc')->get();
             }
        }else{
            if($inspection_detailsItem['inpector_id'] ===null){
                     $inspection_details[0]->inspection_details = inspection_details::join('application','inspection_details.applicationId','=','application.applicationId')
                    ->join('inspector','inspector.inspectorId','=','application.inpector_id')
                    ->where('application.accountId',$inspection_detailsItem['accountId'])
                    ->orderBy('application.applicationId','desc')->get();


            }else{
                $inspection_details[0]->inspection_details = inspection_details::join('application','inspection_details.applicationId','=','application.applicationId')
                ->join('inspector','inspector.inspectorId','=','application.inpector_id')
                ->orderBy('application.applicationId','desc')->where('application.inpector_id',$inspection_detailsItem['inpector_id'])->get();

                 $inspection_details[0]->notice = inspection_details::join('application','inspection_details.applicationId','=','application.applicationId')
                ->join('notice','notice.inspection_id','=','inspection_details.inspection_id')
                ->join('defects','defects.notice_id','=','notice.notice_id')
                ->select(DB::raw('notice.*' ),DB::raw('defects.*' )  )
                ->where('application.accountId',$inspection_detailsItem['accountId'])
                ->orderBy('application.applicationId','desc')->get();

                $inspection_details[0]->noticeToCorrect = inspection_details::join('application','inspection_details.applicationId','=','application.applicationId')
                ->join('notice_to_correct','notice_to_correct.inspection_id','=','inspection_details.inspection_id')
                ->join('to_correct_defects','to_correct_defects.notice_id','=','notice_to_correct.notice_id')
                ->select(DB::raw('notice_to_correct.*' ),DB::raw('to_correct_defects.*' )  )
                ->where('application.accountId',$inspection_detailsItem['accountId'])
                ->orderBy('application.applicationId','desc')->get();
            }
        }
    }
}


$certificate = application::
where('application.applicantId',$applicantId)
->get();

foreach($certificate as $item){
    if($item['accountId']===null){
        $certificate = application::
        join('address','address.applicationId','=','application.applicationId')
        ->where('application.applicationId',$applicationId2)
        ->orderBy('application.applicationId','desc')->get();
    }else{
        $certificate = application::
            join('address','address.applicationId','=','application.applicationId')
            ->where('application.accountId','=',$item['accountId'])
            ->orderBy('application.applicationId','desc')->get();
    }
}

       return view('admin/application_profile',compact('application','applicant_account','account_details','assessment','applicantAdd','applicationId','inspection_details','certificate','uploaded'));

}
    public function storeData(Request $request) {
        $Fname=$request->Fname;
        $type_application2=$request->type_application2;
        $remarks=$request->remarks;
        $control_number=$request->control_number;
        $nature_business=$request->nature_business;
        $type_occupancy2=$request->type_occupancy2;
        $Lname=$request->Lname;
        $business_name=$request->business_name;
        $purok=$request->purok;
        $barangay=$request->barangay;
        $city=$request->city;
        $Bin=$request->Bin;
        $BP_num=$request->BP_num;
        $status=$request->status;
        $OR_num=$request->OR_num;
        $date_apply=$request->date_apply;
        $purokAddBus=$request->purokAddBus;
        $barangayBus=$request->barangayBus;
        $cityBus=$request->cityBus;

        $contact_num=$request->contact_num;
        $alcontactAdd=$request->alcontactAdd;
        $middleAdd=$request->middleAdd;
        $pass = Carbon::now()->format('Y-m-d H:i:s').rand(1,99);
        $passCode= Hash::make($pass);


        try {
            $applicant = new applicant;
            $applicant->Fname = $Fname;
            $applicant->Lname = $Lname;
            $applicant->Mname = $middleAdd;

            $applicant->contact_num = $contact_num;
            $applicant->alcontact = $alcontactAdd;
            $applicant->save();
            $applicantId=$applicant->applicantId;


            $user = new application;
            $user->applicantId = $applicantId;
            $user->type_application = $type_application2;
            $user->remarks = $remarks;
            $user->control_number = $control_number;
            $user->nature_business = $nature_business;
            $user->type_occupancy = $type_occupancy2;
            $user->business_name = $business_name;
            $user->Bin = $Bin;
            $user->BP_num = $BP_num;
            $user->status = $status;
            $user->OR_num = $OR_num;
            $user->date_apply = $date_apply;
            $user->passCode= $passCode;



            $user->filenames='';
            $user->save();
            $user_id = $user->applicationId; // this give us the last inserted record id

            $address = new address;
            $address->applicantId = $applicantId;
            $address->purok = $purok;
            $address->barangay = $barangay;
            $address->city = $city;
            $address->save();

            $address2 = new address;
            $address2->applicationId = $user_id;
            $address2->purok = $purokAddBus;
            $address2->barangay = $barangayBus;
            $address2->city = $cityBus;
             $address2->save();

            $assessment = new assessment;
            $assessment->applicationId = $user_id;
            $assessment->type_payment = 'application';
            $assessment->save();

            $inspection_details = new inspection_details;
            $inspection_details->applicationId = $user_id;
            $inspection_details->save();

        }
        catch (\Exception $e) {
            return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
        }
        return response()->json(['status'=>"success", 'user_id'=>$user_id, 'Fname'=>$Fname]);

    }
    public function storeImage(Request $request)
    {
        $Fname =$request->Fname;
        $Lname =$request->Lname;
        $Mname =$request->Mname;
        $admin =$request->admin;
        $applicationId =$request->userid;

        $type_application =$request->type_application;

        if($request->file('file')){

            $img = $request->file('file');

            //here we are geeting userid alogn with an image
            $userid = $request->userid;

            $files=[];
            $path = public_path().'/files/';
          // $path= mkdir(public_path().'/files/'.$Fname.'-'.$Lname.'/'.$type_application);
        foreach($img as $file){
                $name=$file->getClientOriginalName();
               // $imageName = strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
                $file->move($path.$Fname.$Lname.'/'.$type_application,$name);
                $files[]=$name;

                }
    $path2=$Fname.$Lname.'/'.$type_application;

     $application = new application;
      $application->where('applicationId', $userid)->update(['filenames'=>$path2]);

     $folder= new folderUpload;
      $folder->applicationId= $applicationId;
      $folder->folderName= $Fname.$Lname;
      $folder->uploader= $admin;
      $folder->parentId= null;
      $folder->created=date("F j, Y, g:i a");
      $folder->lastModified=date("F j, Y, g:i a");
      $folder->save();
      $folderParent = $folder->folderId;


      $folder2= new folderUpload;
      $folder2->applicationId= $applicationId;
      $folder2->folderName= $type_application;
      $folder2->parentId= $folderParent;
      $folder2->uploader= $admin;
      $folder2->lastModified=date("F j, Y, g:i a");
      $folder2->created=date("F j, Y, g:i a");
      $folder2->save();
      $folderParent2 = $folder2->folderId;

      foreach($files as $name){
                 $filesUpload= new  fileUpload;
                $filesUpload->applicationId=$userid;
                 $filesUpload->filename=$name;
                $filesUpload->folderId=$folderParent2;
                $filesUpload->lastModified=date("F j, Y, g:i a");
                 $filesUpload->save();
      }


        return response()->json(['status'=>"success",'imgdata'=>$files,'userid'=>$userid]);
        }
    }



    public function filesUpload(Request $request){
        // $files=$request->file('filenames');

$files=[];
      $files=$request->file('filenames');
    foreach($files as $file){
                $name=time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('files'),$name);
                $files[]=$name;
            }



    }

    // file system

    public function fetch_file(Request $request){
        $Fname = $request->Fname;
        $Lname = $request->Lname;
        $admin = $request->admin;
        $applicationId = $request->applicationId;
        $path=$Fname.$Lname;

    $folderGet= folderUpload::where('applicationId','=',$applicationId)
        ->whereNull('parentId')
        // ->whereRaw('folderId  = parentId')
        ->get();
    if($folderGet->count()>0){
        foreach($folderGet as $folder)
        $folderId=$folder['folderId'];
    }


    $folderFetch= folderUpload::where('applicationId','=',$applicationId)
        ->where('parentId','=',$folderId)
        ->orderBy('folderId','desc')
        ->get();

     $fileUpload= application::find($applicationId)->fileUpload;

       // $folder =array_filter(glob('files/'.$path.'/*'),'is_dir');

       $output="<table class='table folderItem'>
        <tr>
            <th> Name
            </th>
            <th> File Size
            </th>
            <th> Uploader
            </th>
            <th>  Last Modified
            </th>
        </tr>
        <tbody>
             ";
     if($folderFetch->count()>0){
        foreach($folderFetch as $name){

          if($name['folderName']!=$path){
            $output .='
            <tr class="file-folder " id='.$name['folderId'].' name="'.$name['folderName'].'" >

                <td>
                            <div class="folder">
                            <span><i class="fa fa-folder"></i></span>
                            '.$name["folderName"].'

                             </div>
                             <input type="text"
                               value="'.$name["folderName"].'"   id="folderNameOld" style="display:none">
                               <input type="text"  class="renameFolder2"
                               value="'.$name["folderName"].'"  id='.$name['folderId'].' style="display:none">


                </td>
                 <td>--
                </td>
                 <td>'.$admin.'
                </td>
                <td>'.$name['lastModified'] .'
                </td>

            </tr>
            ';
               $parentId =$name["parentId"];
         }

        }

     }
     else{
        $output .='<tr>
                <td >This folder is empty.
                </td>
        </tr>';
     }


       return response()->json(['status'=>200,'data'=>$output,'folderFetch'=>$folderFetch, 'parentId'=>$parentId,'folderId'=>$folderId]);

    }
    function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}

    public function viewFolder(Request $request){
        $Fname = $request->Fname;
        $Lname = $request->Lname;
        $folderId = $request->folderId;
        $applicationId = $request->applicationId;
        $parentId = $request->parentId;
        $folderParentId= 0;
         $path= public_path().'/files/';

    $rootFolder=folderUpload::tree($folderId,$applicationId);

     $path=$path.$rootFolder;


         $fileFetch= folderUpload::find($folderId)->fileUpload;
         $parentFolder=folderUpload::where('folderId','=',$folderId)->get();
         $folderFetch=folderUpload::where('parentId','=',$folderId)->get();



         $output="<table class='table folderItem' >
        <tr>
            <th>Name
            </th>
            <th> File Size
            </th>
            <th> File Type
            </th>
              <th> Remarks
            </th>
            <th>  Last Modified
            </th>
        </tr>
             ";

                if($folderFetch->count()>0){
                 foreach($folderFetch as $file){
                     if($file['folderName']!=$path){

                 $output.='<tr  class="file-folder" name="'.$file['folderName'].'" id='.$file['folderId'].' ">
                        <td > <div class="folder">
                            <span><i class="fa fa-folder"></i></span>
                            '.$file["folderName"].'

                             </div>
                              <input type="text" class="folderNameOld"
                               value="'.$file["folderName"].'"    id='.$file['folderId'].' style="display:none">
                                <input type="text"
                                class="renameFolder2"
                               value="'.$file["folderName"].'"  id='.$file['folderId'].' style="display:none">
                        </td>
                        <td> --
                        </td>
                        <td>Folder
                        </td>
                        <td>--
                        </td>
                           <td>'.$file['lastModified'] .'
                </td>
                </tr>';
                }

              }
             }
             if($parentFolder->count()>0){
                foreach($parentFolder as $folder){
                 $folderParentId =$folder['folderId'];

                $folderName =$folder['folderName'];
                 }
             }
                 if($fileFetch->count()>0){
                 foreach($fileFetch as $file){
                    $i=$path.$file['filename'];
                 $fileSize = filesize($i);
                 $output.='<tr class="file-item">
                        <td >'.pathinfo($file["filename"], PATHINFO_FILENAME).'
                        </td>

                        <td>'.self::FileSizeConvert($fileSize).'
                        </td>
                        <td>'.pathinfo($file["filename"], PATHINFO_EXTENSION).'
                        </td>
                        <td>verified
                        </td>
                        <td>'.$file['lastModified'].'
                        </td>
                </tr>';


              }
             }
             if($fileFetch->count()==0 && $folderFetch->count()==0 ){

        $output .='<tr >
                <td colspan="5" style="  text-align: center;">This folder is empty.
                </td>
        </tr>';

             }




            return response()->json(['status'=>200,'data'=>$output,'fileFetch'=>$fileFetch,'folderParentId'=>$folderParentId,'folderName'=>$folderName,'folderId'=>$folderId]);

    }
    public function addDescription(Request $request){
        $admin=$request->admin;
        $folderId=$request->folderId;
        $description2=$request->description;

        $lastModified= folderUpload::find($folderId);
        $lastModified->lastModified=date("F j, Y, g:i a");
        $lastModified->save();

        $description = new activity;
        $description->description=$description2;
        $description->folderId=$folderId;
        $description->modifiedBy=$admin;
        $description->save();


    return response()->json(['status'=>200]);

    }
    public function folderRename(Request $request){
        $folderName=$request->folderName;
        $folderId=$request->folderId2;
        $admin=$request->admin;
        $applicationId=$request->applicationId;
        $path= public_path().'/files/';



    $rootFolder=folderUpload::tree($folderId,$applicationId);
    $path=$path.$rootFolder;
    $oldpath=basename($path);

     if(is_dir( $path)){
        rename(dirname($path).'/'.$oldpath,dirname($path).'/'.$folderName );
     }

   $renameFolder= folderUpload::find($folderId);
   $renameFolder->folderName=$folderName;
   $renameFolder->lastModified=date("F j, Y, g:i a");
   $renameFolder->save();
   $folderNameOld= $renameFolder->folderName;

   $activity =new activity();
   $activity->folderId=$folderId;
   $activity->modifiedBy=$admin;
   $activity->renamed=$folderNameOld;
   $activity->save();

         return response()->json(['status'=>200]);
    }
public function viewFolderDetails(Request $request){
    $folderId =$request->folderId2;
    $output="";
    $folderDetails=folderUpload::where('folderId',$folderId)->get();

    $activityDetails=folderUpload::find($folderId);
    $description='';

    foreach($activityDetails->activity as $activity){
             $output.='<div class="container" style="margin-left:20px; ">
                <div class="col-md-10">
             <ul style="list-style-type: none;">';

               if($activity->count()>0){
                foreach($folderDetails as $folder){
                      if($activity['renamed']!=null){
                      $output .="<li><span><i class='fa fa-info-circle '></i></span>   <strong>".$activity['modifiedBy']."</strong> renamed this folder on ".$folder['lastModified']."</li>";
                      }
                      if($activity['description']!=null){
                        $output .="<li><span><i class='fa fa-info-circle '></i></span>   <strong>".$activity['modifiedBy']."</strong> edit folder description on ".$folder['lastModified']."</li>";
                        $description=$activity['description'];
                      }
                }


        }
             $output.='</ul></div></div>';
    }


    return response()->json(['status'=>200,'folderDetails'=>$folderDetails,'output'=>$output,'description'=>$description]);
}

function custom_copy($src, $dst) {

    // open the source directory
    $dir = opendir($src);

    // Make the destination directory if not exist
    @mkdir($dst);

    // Loop through the files in source directory
    while( $file = readdir($dir) ) {

        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) )
            {

                // Recursively calling custom copy function
                // for sub directory
                self::custom_copy($src . '/' . $file, $dst . '/' . $file);

            }
            else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }

    closedir($dir);
}
public function moveFolder(Request $request){
$ids=$request->ids;
$slotNumber=$request->slotNumber;
  $applicationId=$request->applicationId;

  $path= public_path().'/files/';
  $path2= public_path().'/files/';

  for($i=0 ; $i<count($ids) ; $i++){

        $rootFolder=folderUpload::tree($ids[$i],$applicationId);
        $slotFolder=folderUpload::tree($slotNumber,$applicationId);
        $path=$path.$rootFolder;
        $basement=basename($path);
        $path2=$path2.$slotFolder.$basement;

        // self::movetype("jpg,png,gif,pdf,jpeg", $path, $path2);
        // self::copy_directory($path,$path2);
        custom_copy($path,$path2);

          $move =folderUpload::find($ids[$i]);
        $move->parentId=$slotNumber;
        $move->save();

  }

      return response()->json(['code'=>200,'path'=>$path2]);

}

public function moveToFolder(Request $request){
    $folderId=$request->folderId;
    $applicationId=$request->applicationId;
    $parentId=$request->parentId;
      $selected=$request->selected;
      $Lname=$request->Lname;
      $Fname=$request->Fname;
      $name=$Lname.$Fname;

    $folders= folderUpload::where('applicationId',$applicationId)
    ->where('parentId',$parentId)
    ->orderBy('folderName','ASC')
    ->get();
    $getParent=folderUpload::where('folderId',$folderId)->get();
    $getAncestor=folderUpload::where('folderId',$parentId)->get();
    $output='';
    $folderName="";
    $button='';


     foreach($folders as $folder){

        if($folder['folderId']==$folderId ||$folder['folderId']==$selected){
            $output .= "<div class='col-md-12 moveFolderToClass2 moveFolderDisabled' data-toggle='tooltip' data-placement='bottom' title='Cannot move folder ".$folder['folderName']." on to itself' >
                <div class='col-md-2'><i class='fa fa-folder'></i> </div>
                  <div class='col-md-8'> ".$folder['folderName']."  </div>


                </div>";
            $selectedParentId=$folder['parentId'];
            $button .="<button class='btn btn-default moveButton' style='float:right;' disabled='' data-toggle='tooltip' data-placement='bottom' title='Item is already in this folder' id=".$folder['parentId'].">Move</button>";
        }else{
            $output .= "<div class='col-md-12 moveFolderToClass ' id=".$folder['folderId']." >
                <div class='col-md-2'><i class='fa fa-folder'></i> </div>
                  <div class='col-md-8 '> ".$folder['folderName']."  </div>
                 <div class='col-md-2 moveFolderView' id=".$folder['folderId']." style='display:none' data-toggle='tooltip' data-placement='bottom' title='Go to  ".$folder['folderName']."'> <i class='fa fa-chevron-right moveFolderViewIcon' id=".$folder['folderId']."></i></div>

                </div>";

        }
    }


   if($getParent->count()>0){
    foreach($getParent as $parent){
        foreach($getAncestor as $ancestor){
        $constantParentId =$ancestor['parentId'];
        $folderName=$ancestor['folderName'];

        }
    }
   }

    return response()->json(['code'=>200,'output'=>$output,'folderName'=>$folderName,'constantParentId'=>$constantParentId ,'button'=>$button,'selectedParentId'=>$selectedParentId]);
}
public function moveViewParentFolderId(Request $request){
      $folderId = $request->moveFolderViewId;
      $applicationId = $request->applicationId;
      $selected = $request->selected;
      $parentFolder=folderUpload::where('folderId',$folderId)
      ->where('applicationId',$applicationId)->get();

      foreach($parentFolder as $parent){
        $parentId=$parent['parentId'];

      }

       return response()->json(['code'=>200,'parentId'=>$parentId]);
}
public function moveFolderToSelected(Request $request){
        $folderId = $request->folderIdView;
        $applicationId = $request->applicationId;
        $parentId = $request->parentId;
         $selected=$request->selected;
         $Fname=$request->Fname;
         $Lname=$request->Lname;
         $name= $Fname.$Lname;

        $folderParentId=0;
         $path= public_path().'/files/';
         $output="";
         $folderName="";

         $folderFetch=folderUpload::where('parentId','=',$folderId)->orderBy('folderName','ASC')->get();
         $parentId=folderUpload::where('folderId','=',$folderId)->get();

        if($folderFetch->count()>0){
                 foreach($folderFetch as $folder){

        if($folder['folderId']==$folderId || $folder['folderId']==$selected){
            $output .= "<div class='col-md-12 moveFolderToClass2 moveFolderDisabled' data-toggle='tooltip' data-placement='bottom' title='Cannot move folder ".$folder['folderName']." on to itself' >
                <div class='col-md-2'><i class='fa fa-folder'></i> </div>
                  <div class='col-md-8'> ".$folder['folderName']."  </div>
                   <input type='text' value='".$folder['parentId']."' class='selectedParentId2'>
                  </div>

                </div>";

           }else{
             $output .= "<div class='col-md-12 moveFolderToClass' id=".$folder['folderId']." >
                <div class='col-md-2'><i class='fa fa-folder'></i> </div>
                  <div class='col-md-8'> ".$folder['folderName']."  </div>
                  <div class='col-md-2 moveFolderView' id=".$folder['folderId']." style='display:none' data-toggle='tooltip' data-placement='bottom' title='Go to  ".$folder['folderName']."'> <i class='fa fa-chevron-right moveFolderViewIcon' id=".$folder['folderId']."></i>
                  <input type='text' value='".$folder['parentId']."' class='selectedParentId2'>
                  </div>

                </div>";

             }


              }
              foreach($parentId as $parentFolderId){

                        $folderParentId =$parentFolderId['parentId'];
                        if($parentFolderId['folderName']==$name){
                                     $folderName = 'Files';
                             }else{
                               $folderName = $parentFolderId['folderName'];
                            }
                       if($parentFolderId['parentId'] ==null){
                              $folderParentId =$parentFolderId['folderId'];

                        }


              }
             }else{
                 $output="<div><center><h6>This folder is empty.</h6></center></div>";
                   foreach($parentId as $parentFolderId){
                        $folderParentId =$parentFolderId['parentId'];
                            $folderName .= $parentFolderId['folderName'];
                        if($parentFolderId['parentId'] ==null){
                              $folderParentId =$parentFolderId['folderId'];

                        }
                    }
             }


               return response()->json(['code'=>200,'output'=>$output,'folderParentId'=>$folderParentId,'folderName'=>$folderName]);
}



public function addFolder(Request $request ){
    $parentId= $request->parentFolderId;
    $folderName= $request->folderName;
    $Fname= $request->Fname;
    $Lname= $request->Lname;
    $admin= $request->admin;
    $name=$Fname.$Lname;
    $applicationId= $request->applicationId;
    $path= public_path().'/files/';

    $rootFolder=folderUpload::tree($parentId,$applicationId);
    $path=$path.$rootFolder.$folderName;


        if(!is_dir( $path))
            {

        $folderUpload = new folderUpload;
        $folderUpload->applicationId=$applicationId;
        $folderUpload->folderName=$folderName;
        $folderUpload->parentId=$parentId;
        $folderUpload->uploader=$admin;

        $folderUpload->lastModified=date("F j, Y, g:i a");
        $folderUpload->created=date("F j, Y, g:i a");
        $folderUpload->save();
        $folderId= $folderUpload->folderId;
         mkdir($path);
         return response()->json(['status'=>200,'parentId'=> $parentId ,'folderId'=>$folderId]);

        }else{
                $error="Folder Already Exist";
                 return response()->json(['error'=>$error]);
        };

    }

public function addFile(Request $request){


        $parentFolderId2 =$request->parentFolderId2;
        $applicationId =$request->applicationId;

        if($request->file('file')){
            $img = $request->file('file');
            $userid = $request->applicationId;
            $files=[];
            $path = public_path().'/files/';

            $rootFolder=folderUpload::tree($parentFolderId2,$applicationId);
             $path=$path.$rootFolder;



        foreach($img as $file){
                $name=$file->getClientOriginalName();
                $file->move($path,$name);
                $files[]=$name;
                }

      foreach($files as $name){
                 $filesUpload= new  fileUpload;
                $filesUpload->applicationId=$userid;
               $filesUpload->filename=$name;
               $filesUpload->folderId=$parentFolderId2;
             $filesUpload->lastModified=date("F j, Y, g:i a");
                 $filesUpload->save();
      }

        return response()->json(['status'=>"success",'imgdata'=>$files,'userid'=>$userid]);
        }

    }
public function archieve_application(Request $req){
    $accountId=$req->accountId;
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

public function restore_application(Request $request){
  $applicationId =$request->accountId;
  $query=application::withTrashed()->find($applicationId )->restore();
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

public function view_inspection_report(Request $request){
  $applicationId =$request->applicationId;
  $output = '';
  $inspection_details = inspection_details::
  join('application','application.applicationId','=','inspection_details.applicationId')
  ->join('inspector','inspector.inspectorId','=','application.inpector_id')
  ->where('application.applicationId',$applicationId)
  ->get();

  foreach($inspection_details as $data ){
    $output .="<tr>
        <td>".$data['business_name']."</td>
        <td>".$data['Fname'].' '.$data['Lname']."</td>
        <td>".$data['date_inspect']."</td>
        <td>".$data['date_inspect']."</td>
        <td>".$data['status']."</td>
        <td><button  name='view' class='btn btn-success viewInspectionReportSingle '
        id=".$data['applicationId']."><i class='fa fa-eye'></i></button></td>
    </tr>";
  }

  return response()->json([
    'output'=>$output
  ]);

}
public function view_inspection_report_single(Request $request){
  $noticeToComplyOutput = "";
  $outputNoticeToCorrectItem = "";
  $applicationId =$request->applicationId;
   $data = inspection_details::
  join('application','application.applicationId','=','inspection_details.applicationId')
  ->join('address','address.applicationId','=','application.applicationId')
  ->where('application.applicationId',$applicationId)
  ->get();

  foreach($data as $item){
    $data[0]->inspector = application::
    join('inspector','inspector.inspectorId','=','application.inpector_id')
    ->where('application.applicationId',$applicationId)
    ->get();

    $data[0]->applicant = application::
    join('applicant','applicant.applicantId','=','application.applicantId')
    ->where('application.applicationId',$applicationId)
    ->get();
  }

   $noticeToComply = notice::join('inspection_details','inspection_details.inspection_id','=','notice.inspection_id')
                            ->join('inspector','inspector.inspectorId','inspection_details.inspectorId')
                                ->where('inspection_details.applicationId',$applicationId)->get();

    foreach($noticeToComply as $noticeToComplyItem){
         $inspectorName = $noticeToComplyItem['Fname'].' '.$noticeToComplyItem['Lname'];

        $noticeToComply[0]->defects = notice::join('inspection_details','inspection_details.inspection_id','=','notice.inspection_id')
                                            ->join('defects','defects.notice_id','=','notice.notice_id')
                                            ->where('inspection_details.applicationId',$applicationId)->get();
        $noticeToComplyOutput .=" <section class='head'>
        <div class='letter-head'>
            <input type='text' placeholder='(FIRE STATION LETTER HEAD)' style='width: 56%;' id='noticeLetterHead' value=".$noticeToComplyItem['letter_head'].">
        </div>

        <div class='date'>
            <form><input type='date' id='dateNotice' value=".$noticeToComplyItem['date_issued']."></form>
            <label>Date</label>
        </div>

        <div class='side-texts'>
            <input>
            <input>
            <input>
            <input>
        </div>
    </section>

    <section >
        <div class='notice-comply'>
            <h1>Notice to Comply</h1>
            <br>
        </div>
        <div class='sir-madam'>
            <p>Sir/Madam:</p>
        </div>

        <div class='letter-body'>
            <p>This reference to the Fire Safety Inspection conducted by
                <span><input type='text' value='".$inspectorName."' readonly></span> and <span><input type='text'>
                </span> on <span><input type='text' value='".$noticeToComplyItem['date']."' readonly></span> within your premises
                located at the above address wherein inspector's report revealed
                the existence of the following defects/deficiencies, in violation
                of the Fire Code of the Philippines of 2008 (R.A. 9514).
            </p>
        </div>

    </section>

    <section >
        <table class='table table-bordered table-defects'>
            <thead>
              <th>Defects/Deficiencies</th>
              <th>Grace Period</th>
            </thead>
            <tbody>
         ";
    if(count($noticeToComply[0]->defects)> 0){
        foreach($noticeToComply[0]->defects as $defects){
            $noticeToComplyOutput .="
            <tr>
                <td class='deficiencies'>
                ";
            if($defects['status'] === 'complied'){
                $noticeToComplyOutput .="<span><input type='checkbox' checked disabled/></span>";
            }else{
                $noticeToComplyOutput .="<span><input type='checkbox' disabled /></span>";
            }
            $noticeToComplyOutput .="".$defects['defects']."</td>
                <td>".$defects['grace_period']."</td>
            </tr>
                  ";
        }
    }

       $noticeToComplyOutput .="  </tbody></table>

            <div class='letter-body'>
                <p>In this regard you are hereby advised to comply/correct the above
                    mentioned deficiencies within the above cited grace period otherwise
                    appropriate Notice to Correct Violation with corresponding order to
                    pay administrative fine shall be issued by this office.
                </p>
            </div>

    </section>


    <section class='truly-yours'>

        <div>
            <p>Very truly yours,</p>
           <form style='padding-top: 80px;'><div class='search_applicaintDiv3'><input type='text' id='chiefMarshal' value='".$noticeToComplyItem["city_marshal"]."'></div></form>
           <p style='font-weight: bold;'>City/Municipal Fire Marshal</p>
        </div>

    </section>

    <section id='finall'>
    <div class='final'>
        <div><span class='red'>Original</span>   (Applicant/Owner's copy)</div>
        <div><span  class='red'>Duplicate</span> (BO or BPLO, as the case maybe)</div>
        <div><span class='red'>Triplicate</span> (BFP Copy)</div>
    </div>
    </section>";
    }

    $noticeToCorrect = noticeToCorrect::join('inspection_details','inspection_details.inspection_id','=','notice_to_correct.inspection_id')
                                ->where('inspection_details.applicationId',$applicationId)->get();
    foreach($noticeToCorrect as $noticeToCorrectItem){

        $noticeToCorrect[0]->defects = noticeToCorrect::join('inspection_details','inspection_details.inspection_id','=','notice_to_correct.inspection_id')
        ->join('to_correct_defects','to_correct_defects.notice_id','=','notice_to_correct.notice_id')
        ->where('inspection_details.applicationId',$applicationId)->get();


        $outputNoticeToCorrectItem .='<section class="head">
        <div class="letter-head">
        <input type="text" placeholder="(FIRE STATION LETTER HEAD)" style="width: 56%" id="letter_headNoticeToCorrect" value='.$noticeToCorrectItem['letter_head'].' >
        </div>

        <div class="notice-comply">
            <h1>Notice to Correct Violation</h1>
            <br>
        </div>

        <div class="date">
            <form><input type="date" id="date_issuedToCorrect" value='.$noticeToCorrectItem['date_issued'].'></form>
            <label>Date</label>
        </div>

        <div class="side-texts">
            <input>
            <input>
            <input>
        </div>
    </section>

    <section >

        <div class="sir-madam">
            <p>Sir/Madam:</p>
        </div>

        <div class="letter-body">
            <p>This reference to the Notice to Comply issued by this office on
                <span><input type="text" style="width: 30px;" id="dateNoticeToCorrect" ></span> for compliance of establishment/building
                located at the above-cited address. Despite the length of time that has
                elapsed and the re-inspection report under Inspection Order No.<span>
                <input type="text" style="width: 30px;" id="orderNoToCorrect"></span>dated <span>
                <input type="text" style="width: 30px;" id="orderNoDateIssued"></span>
                fire safety requirements remain not complied.
            </p>
            <br>

            <p>
                In this regard, you are hereby imposed an Administrative Fine of
                <span><input type="text" style="width: 80px;"></span> (P<span><input type="text" style="width: 30px;"></span>)
                pursuant to Section 13.0.0.4 of IRR of RA 9514. Hence, you are given
                three (3) days to pay the fine at <span><input type="text" style="width: 28em;" id="servicing_bank" value='.$noticeToCorrectItem['servicing_bank'].'></span>.
            </p>
            <p style="font-size:13px; font-style: italic; ">(State name of Government Servicing Bank/Local Treasurer)</p>
            <br>

            <p>
               Hereto attached is the Order of Payment for your compliance.
            </p>
            <br>

            <p>
                Further, you are again directed to comply with the specific fire safety requirements in accordance
                with the provisions of RA 9514. The following vilations/deficiencies are
                hereby reiterated with its corresponding grace period:
            </p>
        </div>

    </section>

    <section >
        <table class="table table-bordered table-defects">
            <thead>
              <th>Defects/Deficiencies</th>
              <th>Grace Period</th>
            </thead>
            <tbody>';
        if(count($noticeToCorrect[0]->defects)> 0){
            foreach($noticeToCorrect[0]->defects as $defects){
                $outputNoticeToCorrectItem .="
                <tr>
                    <td class='deficiencies'>
                    ";
                if($defects['status'] === 'complied'){
                    $outputNoticeToCorrectItem .="<span><input type='checkbox' checked disabled/></span>";
                }else{
                    $outputNoticeToCorrectItem .="<span><input type='checkbox' disabled /></span>";
                }
                $outputNoticeToCorrectItem .="".$defects['defects']."</td>
                    <td>".$defects['grace_period']."</td>
                </tr>
                        ";
            }
        }
          $outputNoticeToCorrectItem .=  '</tbody>
          </table>

            <div class="letter-body">
                <p>
                    Failure on your part to pay the administrative fine and to Correct
                    the deficiencies within the prescribed period, this office shall be constrained
                    to recommend issuance of abatement order for your establishment.
                </p>
            </div>

    </section>


    <section class="truly-yours">

        <div>
            <p>Very truly yours,</p>
           <form style="padding-top: 30px;"><input type="text" id="truly_yours" value='.$noticeToCorrectItem['truly_yours'].'></form>

        </div>

    </section>

    <section id="finall">
    <div class="final">
        <div><span class="red">Original</span>   (Applicant/Owners copy)</div>
        <div><span  class="red">Duplicate</span> (BO or BPLO, as the case maybe)</div>
        <div><span class="red">Triplicate</span> (BFP Copy)</div>
    </div>
    </section>';
    }
  return response()->json([
    'data'=>$data,
    'noticeToComply'=>$noticeToComply,
    'noticeToComplyOutput'=>$noticeToComplyOutput,
    'outputNoticeToCorrectItem'=>$outputNoticeToCorrectItem,
    'noticeToCorrect'=>$noticeToCorrect
  ]);
}
public function udpateInspectionDetials(Request $request){
    $applicationId = $request->applicationId;
    $date_issued = $request->date_issued;
    $inspection_of = $request->inspection_of;
    $order_no = $request->order_no;
    $team_leader = $request->team_leader;
    $chief = $request->chief;

    $letter_head = $request->letter_head;
    $date_issuedNotice = $request->date_issuedNotice;
    $city_marshal = $request->city_marshal;

    $letter_headNoticeToCorrect =$request->letter_headNoticeToCorrect;
    $date_issuedToCorrect = $request->date_issuedToCorrect;
    $servicing_bank =$request->servicing_bank;
    $truly_yours =$request->truly_yours;



    $data = inspection_details::where('applicationId',$applicationId);
    $data->update([
        'date_issued'=> $date_issued,
        'inspection_of'=> $inspection_of,
        'order_no'=> $order_no,
        'team_leader'=> $team_leader,
        'chief'=> $chief,
    ]);
    $noticeToComply = inspection_details::join('notice','notice.inspection_id','inspection_details.inspection_id');
    $noticeToComply->update([
        'notice.date_issued'=> $date_issuedNotice,
        'notice.letter_head'=> $letter_head,
        'notice.city_marshal'=>$city_marshal
    ]);

    $noticeToCorrect = inspection_details::join('notice_to_correct','notice_to_correct.inspection_id','inspection_details.inspection_id');
    $noticeToCorrect->update([
        'notice_to_correct.letter_head'=>$letter_headNoticeToCorrect,
        'notice_to_correct.date_issued'=>$date_issuedToCorrect,
        'notice_to_correct.servicing_bank'=>$servicing_bank,
        'notice_to_correct.truly_yours'=>$truly_yours,
    ]);
    return response()->json([
        'msg'=> 'updated '
    ]);
}
public function verify_inspection_report(Request $request){
  $applicationId = $request->applicationId;
  $verify = true;

  $data = inspection_details::where('applicationId',$applicationId);
  $data->update([
    'verify'=>$verify
  ]);

  return response()->json([
    'msg'=>'Inspection report verified'
  ]);

}
public function updateCertDetails(Request $request){
    $applicationId = $request->applicationId;
    $fsec_noCert = $request->fsec_noCert;
    $date_issuedCert = $request->date_issuedCert;
    $issued_for = $request->issued_for;
    $chiefCert = $request->chiefCert;
    $marshalCert = $request->marshalCert;

}

// public function print_certificate(Request $request){
//   $applicationId = $request->applicationId;
//   $output = '';
//   $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
//   ->join('address','address.applicationId','=','application.applicationId')
//   ->join('assessment','assessment.applicationId','=','application.applicationId')
//   ->where('application.applicationId',$applicationId)
//   ->get();

//   $default = defaultFee::all();

//   foreach($data as $data){
//     $business_name= $data['business_name'];
//     $address= $data['prk'].' '.$data['barangay'].' '.$data['city'] ;
//     $applicant= $data['Fname'].' '.$data['Mname'].' '.$data['Lname'] ;
//     $amount_paid = $data['amount_paid'];
//     $OR_num= $data['OR_num'];
//     $payment_date=$data['payment_date'];
//   }
//   foreach($default as $default){
//     $marshal = $default['authority_of'];
//     $chief = $default['chief'];
//   }

//   return response()->json([
//     'business_name'=>$business_name,
//     'address'=>$address,
//     'applicant'=>$applicant,
//     'amount_paid'=>$amount_paid,
//     'OR_num'=>$OR_num,
//     'payment_date'=>$payment_date,
//     'marshal'=>$marshal,
//     'chief'=>$chief,
//   ]);
// }

public function print_certificate(Request $request){
    $applicationId = $request->applicationId;
    $output= "";
  $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
  ->join('address','address.applicationId','=','application.applicationId')
  ->join('assessment','assessment.applicationId','=','application.applicationId')
  ->where('application.applicationId',$applicationId)
  ->get();

  $default = defaultFee::all();

  foreach($data as $data){
    $middleName = $data['Mname'];
    $middleInitial= substr($middleName, 0, 1);
    $address= $data['prk'].' '.$data['barangay'].' '.$data['city'] ;
    $applicant= $data['Fname'].' '.$middleInitial.' '.$data['Lname'] ;
    $amount_paid = $data['amount_paid'];
    $OR_num= $data['receipt_no'];
    $payment_date=$data['payment_date'];
  }

    $output .='
    <div class="main-panel " id="main-panel">
    <div class="row certificate_content" >
    <div class=" col-md-12">
    <div class="col-md-2">
        <img src='.asset('images/dilg.png').' alt="" style="width: 100%">
    </div>
    <div class="col-md-8">
        <div class=" top">
            <p>Republic of the Philippines
            <br><strong>Department of the Interior and local Government</strong></p>
            <h2 style="color:#2A3F54">BUREAU OF FIRE PROTECTION</h2>
           <center>
            <input type="text" class="top-input" name="" id="" style="width:40%">
            <input type="text" class="top-input" name="" id=""  style="width:60%">
            <input type="text" class="top-input"name="" id=""  style="width:80%">
        </center>
        </div><br><br>
    </div>
    <div class="col-md-2">
        <img src='.asset("images/logo.png").' alt="" style="width: 100%">
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12">
    <div class="col-md-6 fsecn_no">
        <div class="col-md-6"><strong>FSEC NO . R</strong></div>
        <div class="col-md-4"><input type="text" id="fsec_noCert"></div>
        <div class="col-md-4"><input type="hidden" id="applicationIdCert"></div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12 fsec_mid">
    <h3><b>FIRE SAFETY EVALUATION CLEARANCE</b></h3>
</div>
</div>
<div class="row date_style">
<div class="col-md-8"></div>
<div class="col-md-4"><input type="date" id="date_issuedCert"><br><span>Date</span></div>
</div>
<div class="row to_whom">
        <h2><strong >TO WHOM IT MAY CONCERN</strong></h2>
<div class="row">
    <div class="col-md-12 middle_design">
    <p>By virtue of the provisions of RA 9514 otherwise known as the Fire Code of the Philippines of 2008 the application for</p>
            <strong >FIRE SAFETY EVALUATION CLEARANCE OF </strong><span><input type="text" name="" id="business_name_print" value="'.$business_name= $data['business_name'].'" readonly ></span>
            <div class="col-md-6"></div>
            <div class="col-md-6"><p>(Name of Building/ Structure Facility)</p></div>
        </p>
    </div>
    <div class="col-md-12 middle_design2">
        <div class="col-md-12">
            <input type="text" name="" id="address_print">
        </div>
        <div class="col-md-12">
            <p>to be constructed / renovated / altered / modified / change of occupancy located at</p>
        </div>
        <div class="col-md-12">
            <input type="text" name="" id="" value="'.$address.'" readonly>
        </div>
        <div class="col-md-12">
            <p>(Address)</p>
        </div>
    </div>
    <div class="col-md-12 owned">
        <div class="col-md-12">
            <div class="col-md-2">owned by</div>
            <div class="col-md-4"><input type="text" name="" id="applicant_name" value="'.$applicant.'" readonly></div>
            <div class="col-md-6"> <p>is hereby <strong>GRANTED</strong> after the building plans and</p></div>

            <div class="col-md-12 representative">
                <div class="col-md-6"><p>(Name of Owners/Representative)</p></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
            <p>other documents conform to the safety and life safety requirements of the Fire Code of the Philippines of 2008 and its IRR <br>
                and that the recommendations in the Fire Safety Checklist (FSC) will be adopted.</p>
            </div>
            </div>
    </div>
   <div class="row being_issued_for ">
        <div class="col-md-12">
            <div class="col-md-12">
                <p>This clearance is being issued for <span><input type="text" name="" id="" style="width: 350px" class="issued_for"></span></p>
            </div>
            <div class="col-md-12">
                <input type="text" name="" id="" style="width:100%" class="issued_for">
            </div>
            </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 violation">
                <p>Violation of Fire Code provisions shall ipso facto cause this certificate null and void, and shall hold the owner of the
                    building liable to the penalties provided for by the said Fire code.
                    </p>
            </div>
        </div>
    </div>
    <div class="row fire_code">
        <div class="col-md-12">
            <div class="col-md-4">
                <div class="col-md-12">
                    <label for=""><b>Fire Code Fees</b></label>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label for="">Amount Paid:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text"  style="width: 100%" id="amount_paid" value='.$amount_paid.' readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label for="">O.R. Number:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="OR_num_print" value='.$OR_num.' readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label for="">Date:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="payment_date" value='.$payment_date.' readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-5">
                <div class="col-md-12">
                    <p>RECOMMEND APPROVAL</p>
                </div>
                <div class="col-md-12">
                    <input type="text" id="chiefCert" style="font-size: 16px;text-align:center;font-weight:bold;width: 270px;"><br>
                    <p style="text-align: center">CHIEF, FSES</p>
                </div>
                <div class="col-md-12">
                    <p><strong>APPROVED :</strong></p>
                </div>
                <div class="col-md-12">
                    <input type="text" name="" id="marshalCert" style="font-size: 16px;text-align:center;font-weight:bold; width: 270px;"><br>
                    <p>CITY/MUNICIPAL FIRE MARSHAL</p>
                </div>
            </div>

            <div class="row note">
                <div class="col-md-12">
                <p><b>NOTE :  “This Clearance is accompanied by Fire safety Checklist and does not take the place of any license required by
                    law and is not transferable. Any change or alteration in the design and specification during construction shall require a
                    new clearance”</b></p>
                </div>
            </div>
            <div class="row paalala">
                <div class="col-md-12">
                <p>PAALALA: “MAHIGPIT NA IPINAGBABAWAL NG PAMUNUAN NG BUREAU OF FIRE PROTECTION SA MGA KAWANI NITO ANG
                    MAGBENTA O MAGREKOMENDA NG ANUMANG BRAND NG FIRE EXTINGUISHER”</p>
                </div>
            </div>
            <div class="row moto">
                <div class="col-md-12 ">
                <p><strong>"FIRE SAFETY IS OUR MAIN CONCERN"</strong></p>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>';

return response()->json([
    'output'=>$output
]);
}
public function applicationUpdateStatus(){
    $data = application::get();
   foreach($data as $item){
       $date= $item['date_approved'];

       if($date !== null){
            $year = Carbon::createFromFormat('Y-m-d', $date)->format('Y');
            $year2 = Carbon::now()->subMonth(11)->format('Y');
            if($year == $year2){
                $month = Carbon::createFromFormat('Y-m-d', $date)->format('m');
                $now = Carbon::now()->subMonth(11)->format('m');
                if((intval($now)-intval($month))==1){
                    $applicationId = $item['applicationId'];
                    $due_date = Carbon::createFromFormat('Y-m-d', $date)->addYear()->format('Y-m-d');
                    $data2= application::where('applicationId',$applicationId);
                    $data2->update([
                        'status'=>'renewal',
                        'due_date'=> $due_date,

                    ]);

                }
            }
        }

   }
}
public function assessmentSearch($name){
    $Fname = $name;
    return view('admin/assessment',compact('Fname'));
}

public function view_payment_history(Request $request){
    $applicationId  =$request->applicationId;
    $output = '';
    $data= assessment::join('application','application.applicationId','=','assessment.applicationId')
    ->where('application.applicationId',$applicationId)
    ->where('assessment.payment_date','!=',null)->get();

    foreach($data as $data){
        $output .='<tr>
            <td>'.$data['type_application'].'</td>
            <td>'.$data['total_amount'].'</td>
            <td>'.$data['payment_date'].'</td>
            <td>'.$data['type_payment'].'</td>
            <td>'.$data['payment_status'].'</td>
            <td><button type="button"  class="btn btn-success view_payment_info"
            id='.$data['applicationId'].' value="'.$data['type_payment'].'">Generate Receipt</button></td>
        </tr>';
    }

    return response()->json([
        'output'=>$output
    ]);
}

}
