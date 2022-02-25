<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
use App\Models\applicant;
use App\Models\address;
use App\Models\fileUpload;
use App\Models\folderUpload;
use App\Models\activity;
use App\Models\schedule;
use App\Models\inspector;

use DataTables;

class scheduleController extends Controller
{
    //
    public function scheduleList(Request $request){
     

            $data = schedule::join('application','application.applicationId','=','schedule.applicationId')
                ->join('applicant','applicant.applicantId','=','schedule.applicantId')
                ->join('address','address.applicantId','applicant.applicantId') 
                ->orderBy('schedule.applicantId','desc')
                ->whereNull('schedule.inspected')
                ->whereNull('schedule.deleted_at')
                ->get();
           
         
        return DataTables::of($data)
        // return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('name', function($row){
          return $row['Fname'].' '.$row['Mname'].'.  '.$row['Lname'];
         })
         ->addColumn('address', function($row){
            return $row['purok'].' '.$row['barangay'].'.  '.$row['city'];
           })
        
        ->addColumn('actions', function($row){
            return " <button type='button'  class='btn cancel_schedule actionButton' data-toggle='tooltip' data-placement='bottom' title='Archive' id='".$row['scheduleId']."'><i class='fa fa-archive'></i></button>  
      <button type='button' name='viewApplicant' class='btn view_schedule actionButton'  data-toggle='tooltip' data-placement='bottom' title='View' id='".$row['scheduleId']."'><i class='fa fa-eye'></i></button>
      ";
           })
           ->rawColumns(['actions'])
        ->make(true);
        
      }
    public function cancel_schedule(Request $request){
        $scheduleId = $request->scheduleId;

        $query= schedule::find($scheduleId)->delete();
        if($query){
            return response()->json([
               'status'=>1,
               'msg'=>'Schedule Canceled' 
            ]);
          }else
          {
            return response()->json([
               'status'=>0,
               'msg'=>'something went wrong!' 
            ]);
          }

    }
public function view_schedule(Request $request){
    $scheduleId = $request->scheduleId;

    $data = schedule::join('application','application.applicationId','=','schedule.applicationId')
    ->join('applicant','applicant.applicantId','=','schedule.applicantId')
    ->join('address','address.applicantId','applicant.applicantId') 
    ->where('schedule.scheduleId',$scheduleId)
    ->get();

    $data2=schedule::join('inspector','inspector.inspectorId','=','schedule.inspectorId')
    ->where('schedule.scheduleId',$scheduleId)->get();

    return response()->json([
        'data'=>$data,
        'data2'=>$data2
    ]);

}

public function update_schedule(Request $request){
    $scheduleId =$request->scheduleId;
    $date_inspection =$request->date_inspection;

    $data= schedule::where('scheduleId',$scheduleId);
    $data->update([
        'date_inspection'=>$date_inspection
    ]);

    return response()->json([
        'msg'=>'Schedule Successfully Updated!'
    ]);
}

public function search_scheduel(Request $req){
    $name = $req->search_applicant;
    $output = '';

       $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
    ->whereNotIn('application.applicationId',schedule::get(['applicationId'])->toArray())
    ->where('applicant.Fname','LIKE','%'.$name.'%')
    // ->ORwhere('applicant.Lname','LIKE','%'.$name.'%')
    ->get();

    if($data->count()> 0)
    foreach($data as $data){
        $output .= " 
        <tr>
        <td><input type='radio' class='form-control' id='select_search' value=".$data['applicationId']." ></td>
        <td>".$data['Fname']." ".$data['Lname']."</td>
        <td>".$data['type_application']."</td>
      </tr>";
    }else{
        $output .= "
        <tr>
        <td colspan='3'>0 data</td>
      </tr>";
    }

    return response()->json([
        'output'=>$output
    ]);
}

public function select_schedule(Request $request){
    $applicationId = $request->applicationId;

    $data= application::join('applicant','applicant.applicantId','=','application.applicantId')
    ->where('applicationId',$applicationId)->get();
    $type_application = '';
    $inspectorId = '';
    $applicantId='';
    $output=' <label for="">Select Inspector</label><select class="form-control " id="inspectorId_select" >';

    $data2= inspector::get();

    foreach($data as $data){
        $type_application= $data['type_application'];
        $applicantId= $data['applicantId'];
    }

    foreach($data2 as $inspector){
        $output .= '<option value='.$inspector['inspectorId'].'> '.$inspector['Fname'].' '.$inspector['Lname'].'</option>';
    }
    $output.='</select>';

    return response()->json([
        'output'=> $output,
        'applicantId'=>$applicantId,
        'type_application'=>$type_application
    ]);
}
public function add_schedule_action(Request $request){
    $applicationId = $request->applicationId;
    $inspectorId = $request->inspectorId;
    $date_inspection = $request->date_inspection;
    $applicantId = $request->applicantId;
   
   $schedule = new schedule;
   $schedule->applicationId = $applicationId;
   $schedule->inspectorId = $inspectorId;
   $schedule->date_inspection = $date_inspection;
   $schedule->applicantId = $applicantId;
   $schedule->save();

   return response()->json([
       'msg'=>"Schedule Addedd Successfully"
   ]);
}

}
