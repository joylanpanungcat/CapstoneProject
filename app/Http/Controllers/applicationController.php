<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
use App\Models\applicant;
use App\Models\address;
use App\Models\fileUpload;
use Storage;
use DataTables;

use Illuminate\Support\Facades\validator;
class applicationController extends Controller
{
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
      $account_details=application::find($account_id);

      return view('application_profile')->with('account_details',$account_details);
 
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

            $address2 = new address;
            $address2->applicationId = $user_id;
            $address2->purok = $purokAddBus;
            $address2->barangay = $barangayBus;
            $address2->city = $cityBus;

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
        $type_application =$request->type_application;




        if($request->file('file')){

            $img = $request->file('file');

            //here we are geeting userid alogn with an image
            $userid = $request->userid;

            $files=[];
            $path = public_path().'/files/';
       // $path= mkdir(public_path().'/files/'.$Fname.'-'.$Lname.'/'.$type_application);

 
 
        foreach($img as $file){
                    $name=time().rand(1,100).'.'.$file->extension();
               // $imageName = strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
                   $file->move($path.$Fname.' '.$Mname.' '.$Lname.'/'.$type_application,$name);
                    $files[]=$name;     
$filesUpload= new  fileUpload;
        $filesUpload->applicationId=$userid;
       $filesUpload->filename=$name;
       $filesUpload->save();
                }
    $path2=$Fname.' '.$Mname.' '.$Lname.'/'.$type_application;

     $application = new application;
       $application->where('applicationId', $userid)->update(['filenames'=>$path2]);   

      


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
}
