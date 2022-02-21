<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\schedule;
use App\Models\application;
use App\Models\inspection_details;
use App\Models\inspector;
use App\Models\applicant;

use Session;
class inspectionController extends Controller
{
    //
    public function fetch_inspection(){
        $inspectorId = session()->get('inspectorId')['inspectorId'];
        $output='';
        $count = 1;
       $data = application:: join('schedule','schedule.applicationId','=','application.applicationId')
       ->join('applicant','applicant.applicantId','=','application.applicantId')
       ->join('address','address.applicationId','=','application.applicationId')
       ->where('schedule.inspectorId',$inspectorId)
       ->where('schedule.inspected',null)
       ->where('schedule.deleted_at',null)
       ->get();

        if($data->count()>0){
            // $data2= schedule::join('application','schedule.applicationId','=','application.applicationId')
            // ->join('applicant','applicant.applicantId','=','application.applicantId')
            // ->where('inspectorId',$inpsectorId)->get();

            foreach($data as $data){
                $output .='  <tr>
                            <td>'.$count++.'</td>
                            <td>'.$data['Fname']." ". $data['Lname'].'</td>
                            <td>'.$data['date_inspection'].'</td>
                            <td><a type="button" name="viewApplicant" class="btn  actionButton" href="application_profile/'.$data['applicationId'].'" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye"></i></a></td>
                        </tr>';
            }
           
        }else{
            $output.='<tr><td colspan="4">No inspection schedule</td></tr>';
          
        }

      
     
        return response()->json([
            'output'=>$output
        ]);
    }
    
    public function fetch_inspected_application(){
        $inspectorId = session()->get('inspectorId')['inspectorId'];
        $output='';
        $count = 1;
        $verify= null;
        

        // $data2= applicant::join('application','applicant.applicantId','=','application.applicantId')
        // ->join('applicant','applicant.applicantId','=','application.applicantId')
        // ->join('inspector','inspector.inspectorId','=','inspection_details.inspectorId')
        // ->where('inspection_details.inspectorId',$inpsectorId)
        // ->get();

        $data2 = application:: join('schedule','schedule.applicationId','=','application.applicationId')
        ->join('applicant','applicant.applicantId','=','application.applicantId')
        ->join('address','address.applicationId','=','application.applicationId')
        ->join('inspection_details','inspection_details.applicationId','=','inspection_details.applicationId')
        ->where('schedule.inspectorId',$inspectorId)
        ->where('schedule.inspected','=','true')
        ->get();
 

        if($data2->count()>0){
            foreach($data2 as $data){
                $output .='  <tr>
                            <td>'.$count++.'</td>
                            <td>'.$data['Fname']." ". $data['Lname'].'</td>
                            <td>'.$data['date_inspect'].'</td>
                            <td><a type="button" name="viewApplicant" class="btn  actionButton" href="inspected/application/'.$data['applicationId'].'" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye"></i></a></td>
                        </tr>';
            }
           
        }else{
            $output.='<tr><td colspan="4">No inspected details</td></tr>';

        }

      
     
        return response()->json([
            'output'=>$output
        ]);
    }


    public function fetch_history_application(){
        $inpsectorId = session()->get('inspectorId')['inspectorId'];
        $output='';
        $count = 1;
        $verify =true;
        $data= schedule::join('application','schedule.applicationId','=','application.applicationId')
        ->join('applicant','applicant.applicantId','=','application.applicantId')
        ->join('inspector','inspector.inspectorId','=','schedule.inspectorId')
        ->join('inspection_details','inspection_details.inspectorId','=','inspector.inspectorId')
        ->where('schedule.inspectorId',$inpsectorId)
        ->where('inspection_details.status',$verify)
        ->get();

        if($data->count()>0){
            foreach($data as $data){
                $output .='  <tr>
                            <td>'.$count++.'</td>
                            <td>'.$data['Fname']." ". $data['Lname'].'</td>
                            <td>'.$data['date_inspection'].'</td>
                            <td><a type="button" name="viewApplicant" class="btn  actionButton" href="inspection_history/application/'.$data['applicationId'].'" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye"></i></a></td>
                        </tr>';
            }
           
        }else{
            $output.='<tr><td colspan="4">No History Details</td></tr>';

        }

      
     
        return response()->json([
            'output'=>$output
        ]);
    }
    public function Dashboard_fetch(){
        $inspectorId = session()->get('inspectorId')['inspectorId'];
        $verify ='true';
        
        $data=schedule::where('inspectorId',$inspectorId)->where('inspected',null)->get();
        $dataCount=count($data);

        $data2=inspection_details::where('inspectorId',$inspectorId)->get();
        $data2Count=count($data2);

        $data3=inspection_details::where('inspectorId',$inspectorId)->where('verify',$verify)->get();
        $data3Count=count($data3);


        return response()->json([
            'data'=>$dataCount,
            'data2'=>$data2Count,
            'data3'=>$data3Count,
        ]);
    }

public function profile_view(){
    $inspectorId = session()->get('inspectorId')['inspectorId'];

    $data = inspector::where('inspectorId',$inspectorId )->get();

    return view('inspector/profile',['data'=>$data]);
    
}
public function update_inspector(Request $request){
    $inspectorId =$request->inspectorId;
    $Fname =$request->Fname;
    $Lname =$request->Lname;
    $Position =$request->Position;
    $username =$request->username;
    $password =$request->password;

    $data = inspector::where('inspectorId',$inspectorId);
    $data->update([
        'Fname'=>$Fname,
        'Lname'=>$Lname,
        'Position'=>$Position,
        'username'=>$username,
        'password'=>$password,
    ]);

    return response()->json([
        'msg'=>'Updated Successfully'
    ]);
}

    
}
