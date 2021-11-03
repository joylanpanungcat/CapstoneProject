<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\application;
use App\Models\applicant;
use App\Models\address;
use App\Models\fileUpload;
use App\Models\folderUpload;
// use Storage;
use DataTables;

use Illuminate\Support\Facades\validator;
class applicationController extends Controller
{
      private $count = 0;
    //
  public function applicationFetch(){
       $data = applicant::join('application','application.applicantId','=','applicant.applicantId')
             ->orderBy('applicationId','desc')
             ->get();
        return DataTables::of($data)
                          ->addIndexColumn()
                          ->addColumn('actions', function($row){

                                  return '
                                  <button type="button"  class="btn   btn-sm  sendArchive actionButton" data-toggle="tooltip" data-placement="bottom" title="Archive"><i class="fa fa-archive"></i>
                                </button>   || 
                            
             
                
                 <a type="button" name="viewApplicant" class="btn  btn-sm actionButton" href="application_profile/'.$row['applicationId'].'" target="_blank" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye"></i></a>
                ';
                              })
              ->addColumn('name', function($row){
            return $row->Fname.' '.$row->Mname.'.  '.$row->Lname;
                         })
                             ->rawColumns(['actions'])
                          ->make(true);
    }
    public function viewApplication(Request $request){
    $account_id= $request->id;
      // $account_details=application::join('applicant','applicant.applicantId','=','application.applicantId')
      //   ->where('application.applicationId','=',$account_id)
      //   ->get();

      // return view('application_profile',compact('account_details'));


        $account_details = applicant::find($account_id);
        $applicantAdd=address::where('applicantId','=',$account_id)->first();
         $applicationId=address::where('applicationId','=',$account_id)->first();

    
       return view('application_profile',compact('account_details','applicantAdd','applicationId'));
        
  

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
      $folder->parentId= null;
      $folder->lastModified=date('m/d/y h:i:s A');
      $folder->save();
      $folderParent = $folder->folderId;


      $folder2= new folderUpload;
      $folder2->applicationId= $applicationId;
      $folder2->folderName= $type_application;
      $folder2->parentId= $folderParent;
      $folder2->lastModified=date('m/d/y h:i:s A');
      $folder2->save();
      $folderParent2 = $folder2->folderId;

      foreach($files as $name){
                 $filesUpload= new  fileUpload;
                $filesUpload->applicationId=$userid;
               $filesUpload->filename=$name;
               $filesUpload->folderId=$folderParent2;
             $filesUpload->lastModified=date('m/d/y h:i:s A');

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
            <th> Application
            </th>
            <th>  Folder Id
            </th>
            <th>  Parent Folder
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
            <tr class="file-folder">
               
                <td>
            
                            <div class="folder"> 
                            <a type="button" class="btn viewFolder" id="'.$name["folderId"].'">
                           
                            <span><i class="fa fa-folder"></i></span>
                            '.$name["folderName"].'
                             </a>
                             </div>
                      
                  
                </td>
                 <td>'.$name["folderId"].'
                </td>
                 <td>'.$name["parentId"].'
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
        $output.='<tr>   
                <td >No Folder Found
                </td>
        </tr>';
     }
     
        
       return response()->json(['status'=>200,'data'=>$output,'folderFetch'=>$folderFetch, 'parentId'=>$parentId,'folderId'=>$folderId]);
     
    }
  public  function formatFileSize($bytes) {
        $s = ['bytes', 'KB','MB','GB','TB','PB','EB'];

        for($pos = 0;$bytes >= 1000; $pos++,$bytes /= 1024);
        $d = round($bytes*10);
        return $d.$s[$pos];
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
            <th>Files/Folder
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
                 $output.='<tr  class="file-folder">   
                        <td > <div class="folder"> 
                            <a type="button" class="btn viewFolder actionButton" id="'.$file["folderId"].'">
                            
                            <span><i class="fa fa-folder"></i></span>
                            '.$file["folderName"].'
                             </a>
                             </div>
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
                    // $i=$path.$file['filename'];
                    // $formatSize = filesize($i);
              
                 $output.='<tr class="file-item">   
                        <td >'.pathinfo($file["filename"], PATHINFO_FILENAME).'
                        </td>
                     
                        <td>
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

             
             

            return response()->json(['status'=>200,'data'=>$output,'fileFetch'=>$fileFetch,'folderParentId'=>$folderParentId,'folderName'=>$folderName]);
     
    }


 


public function formatTree($rootFolder){
$path=array();
    $path[]=$rootFolder->pluck('folderName');
   
    // foreach($rootFolder as $folder){
    //         $path=array();

    //         $path[]=$folder->folderName;
    if($folder->parent->isNotEmpty()){
        
          self::formatTree($folder->parent);
 
     }

    // }
return $path;
}




public function addFolder(Request $request ){
    $parentId= $request->parentFolderId;
    $folderName= $request->folderName;
    $Fname= $request->Fname;
    $Lname= $request->Lname;
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
        $folderUpload->lastModified=date('m/d/y h:i:s A');
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
             $filesUpload->lastModified=date('m/d/y h:i:s A');

                 $filesUpload->save();
      }

        return response()->json(['status'=>"success",'imgdata'=>$files,'userid'=>$userid]);
        }

    }
}
