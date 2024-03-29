<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
use App\Models\assessment;

use DataTables;

class renewalController extends Controller
{
    //

    public function renewal_application_fetch(Request $request){
        if(request()->ajax())
        {
         if($request->category != '' && empty($request->from_date) )
         {
            $data = application::with('applicant')
                     ->where('type_application','=',$request->category)
                     ->where('status','=','renewal')
                     ->orderBy('applicationId','desc')
                     ->get();
                
         }
         elseif($request->from_date !='' && $request->category == '')
         {
          $data = application::with('applicant')
            ->whereBetween('date_apply', array($request->from_date, $request->to_date))
            ->where('status','=','renewal')
            ->get();
         }
         elseif($request->category != '' && !empty($request->from_date))
         {
          $data = application::with('applicant')
          ->where('type_application','=',$request->category)
          ->where('status','=','renewal')
          ->whereBetween('date_apply', array($request->from_date, $request->to_date))
          ->get();
         }
         else
         {
          $data = application::with('applicant')
                ->orderBy('applicationId','desc')
                ->where('status','=','renewal')
                ->get();
         }
      
        }
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('name', function($row){
          return $row->applicant['Fname'].' '.$row->applicant['Mname'].'.  '.$row->applicant['Lname'];
         })
        ->addColumn('actions', function($row){
              return '
              <button type="button"  class="btn btn-defualt btn-xs view_renewal actionButton" id='.$row['applicationId'].'><i class="fa fa-refresh"></i></button>
              <a type="button" name="viewApplicant" class="btn  actionButton" href="application_profile/'.$row['applicationId'].'" target="_blank" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye"></i></a>
              ';
          })
          ->rawColumns(['actions'])

        ->make(true);
        
      }

public function view_renewal_application(Request $request){
  $applicationId =$request->applicationId;

  $data2 = assessment::where('applicationId',$applicationId)->get();

  return response()->json([
    'data2'=>$data2,
  ]);
}
public function renew_application_action(Request $request){
  $applicationId =$request->applicationId;
  $status =$request->status;
  $date = date('yy-mm-dd');

  $data = application::where('applicationId',$applicationId);
  $data->update([
    'status'=>$status,
    'date_apply'=>$date
  ]);

  return response()->json([
    'msg'=>'Successfully Renewed'
  ]);

}
}
