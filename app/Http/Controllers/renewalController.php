<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
use App\Models\assessment;
use App\Models\inspection_details;

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
              <a type="button" name="viewApplicant" class="btn  actionButton" href="admin/application_profile/'.$row['applicationId'].'" target="_blank" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye"></i></a>
              ';
          })
          ->rawColumns(['actions'])

        ->make(true);

      }

public function view_renewal_application(Request $request){
  $applicationId =$request->applicationId;
  $output ="";
  $outputButton = '';

  $data2 = application::where('applicationId',$applicationId)->get();
  $payment=assessment::where('applicationId',$applicationId)
  ->where('type_payment','=','renewal')->where('payment_status','=','paid')->count();

  $inspectionDetails= inspection_details::where('applicationId',$applicationId)
                     ->where('type_inspection','=','renewal')->get();
  foreach($data2 as $item){
    $output .="<tr>
        <td>Payments </td>";
   if($payment > 0 ){
    $output .="<td><span class='badge badge-success'>paid</span></td>";
   }else{
    $output .="<td><span class='badge badge-danger'>unpaid</span></td>";
   }
   if(count($inspectionDetails)> 0){
        foreach($inspectionDetails as $inspectionDetailsData){
            if($inspectionDetailsData['verify'] !== null){
                $output  .="</tr>
                <tr>
                <td>Inspection Report</td>
                <td><span class='badge badge-success'>verified</span></td></td>
                </tr>";
            }else{
                $output  .="</tr>
                <tr>
                <td>Inspection Report</td>
                <td><span class='badge badge-warning'>not verified</span></td></td>
                </tr>";
            }

        }
   }else{
    $output  .="</tr>
    <tr>
    <td>Inspection Report</td>
    <td><span class='badge badge-danger'>no inspection details</span></td></td>
    </tr>";
   }

  }
  if($payment > 0 && $inspectionDetails[0]['verify'] !== null){
        $outputButton .="<button class='renew_submit' id=".$applicationId.">Click to Renew </button>";

        }
  return response()->json([
    'output'=>$output,
    'outputButton'=>$outputButton
  ]);
}
public function renew_application_action(Request $request){
  $applicationId =$request->applicationId;
//   $status =$request->status;
$status = 'renewed';
  $date = date('Y-m-d');

  $data = application::where('applicationId',$applicationId);
  $data->update([
    'status'=>$status,
    'date_approved'=>$date
  ]);

  return response()->json([
    'msg'=>'Successfully Renewed'
  ]);

}
public function application_notif(Request $request){
$view = $request->view;
if($view == ''){
    $data = application::where('count',1)->where('status','!=','renewal')->count();
    return response()->json([
        'unseen_notification'=> $data
    ]);
}else{
    $data2 = application::where('count',1)->where('status','!=','renewal');
    $data2->update([
        'count'=> 0
    ]);
    return response()->json([
        'unseen_notification'=> 0
    ]);
}
}

public function renewal_notif(Request $request){
    $view = $request->view;
    if($view == ''){
        $data = application::where('count2',1)->where('status','=','renewal')->count();
        return response()->json([
            'unseen_notification'=> $data
        ]);
    }else{
        $data2 = application::where('count2',1)->where('status','=','renewal');
        $data2->update([
            'count2'=> 0
        ]);
        return response()->json([
            'unseen_notification'=> 0
        ]);
    }
}
}
