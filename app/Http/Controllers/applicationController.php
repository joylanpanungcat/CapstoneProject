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
                                            ->where('application.applicationId',$applicationId2)->orderBy('application.applicationId','desc')->get();
                // $assessment[0]->assessment= assessment::where('applicationId',$item['applicationId'])->get();
            }else{
                 $assessment[0]->assessment = application::join('assessment','assessment.applicationId','=','application.applicationId')
                 -> join('applicant','applicant.applicantId','=','application.applicantId')
                ->where('application.accountId',$assessmentItem['accountId'])
                ->orderBy('application.applicationId','desc')->get();
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

  $inspection_details = application::join('inspector','inspector.inspectorId','=','application.inpector_id')
  ->join('inspection_details','inspection_details.applicationId','=','application.applicationId')
  ->where('application.applicationId',$applicationId)
  ->get();

  return response()->json([
    'data'=>$inspection_details
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

public function print_certificate(Request $request){
  $applicationId = $request->applicationId;
  $output = '';
  $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
  ->join('address','address.applicationId','=','application.applicationId')
  ->join('assessment','assessment.applicationId','=','application.applicationId')
  ->where('application.applicationId',$applicationId)
  ->get();

  $default = defaultFee::all();

  foreach($data as $data){
    $business_name= $data['business_name'];
    $address= $data['prk'].' '.$data['barangay'].' '.$data['city'] ;
    $applicant= $data['Fname'].' '.$data['Mname'].' '.$data['Lname'] ;
    $amount_paid = $data['amount_paid'];
    $OR_num= $data['OR_num'];
    $payment_date=$data['payment_date'];
  }
  foreach($default as $default){
    $marshal = $default['authority_of'];
    $chief = $default['chief'];
  }

  return response()->json([
    'business_name'=>$business_name,
    'address'=>$address,
    'applicant'=>$applicant,
    'amount_paid'=>$amount_paid,
    'OR_num'=>$OR_num,
    'payment_date'=>$payment_date,
    'marshal'=>$marshal,
    'chief'=>$chief,
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
            id='.$data['applicationId'].'>Generate Receipt</button></td>
        </tr>';
    }

    return response()->json([
        'output'=>$output
    ]);
}

}
