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
use DataTables;

class scheduleController extends Controller
{
    //
    public function scheduleList(Request $request){
     

            $data = schedule::join('application','application.applicationId','=','schedule.applicationId')
                ->join('applicant','applicant.applicantId','=','schedule.applicantId')
                ->join('address','address.applicantId','applicant.applicantId') 
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

}
