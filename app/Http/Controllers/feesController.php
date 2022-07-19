<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee;
use App\Models\applicant;
use App\Models\defaultFee;
use App\Models\assessment;
use App\Models\subAssessment;
use NumConvert;
use Carbon\Carbon;
class feesController extends Controller
{
    //
    public function load_fees(Request $req){

      if($req->search !=''){
        $data=fee::where('natureof_payment','LIKE','%'.$req->search.'%')->where('category','=','main')->get();
        $data2=fee::where('natureof_payment','LIKE','%'.$req->search.'%')->where('category','=','other_fees')->get();

      }else{
        $data2=fee::where('category','=','other_fees')->get();
        $data= fee::where('category','=','main')->get();


      }
        $output='';
        $others="  <button type='button' class='collapsible collapsible2'><b>Others</b></button>";
        $custom='';

        foreach($data as $item){
            $output .="<tr >
            <td ><input type='checkbox' name='optradio' class='payment_checkbox checkbox' value=".$item['fees_id']."></td>
             <td>
               <button type='button' class='collapsible'  id='".$item['fees_id']."' ><b>".$item['natureof_payment']."</b></button>
            <div class='content2".$item['fees_id']."'style='display:none;'>
                <p>".$item['description']."</p>
                </div>
            </td>
            </tr>";
        }



        foreach($data2 as $item2){
            $others .= "

            <div class='content' style='display:none;'>
              <table >
            <tr >
              <td ><input type='checkbox' name='optradio' class='payment_checkbox checkbox' value=".$item2['fees_id']."></td>
               <td>
                 <p>".$item2['natureof_payment']."
              </p>

             </td>
           </tr>
          </table>
          </div>";
        }
    //     if(count($data3)<1){
    //       $custom .="<tr><td></td>
    //        <td>
    //       <button type='button' class='collapsible collapsible3'><b>Custom Fee</b></button>
    //       <div class='content3' style='display:none;'>
    //        <input type='text' name='' class='custom_fee' placeholder='Nature of payment'>

    //       </div>
    //   </td>
    //   </tr>";
    //     }else{
    //   foreach($data3 as $item3){
    //     $custom .=" <tr>
    //     <td>
    //     <button type='button' class='collapsible collapsible3'><b>Custom Fee</b></button>
    //     <div class='content3' style='display:none;'>
    //      <input type='text' name='' class='custom_fee' placeholder='Nature of payment'>

    //     </div>
    // </td> </tr>";
    //   }
    // }


        return response()->json([
           'data'=>$output,
           'others'=>$others,
        ]);
    }

  public function search_applicant_fetch(Request $req){
    $search = $req->search;
    $applicationId = 0;
    $output = '';
    $name = $req->search;
    $finalname= preg_replace('/\s+/', '', $name);
    $nameRequest =strtolower($finalname);

    $getdata = applicant::get();

    foreach($getdata as $item){
        $name2 = $item['Fname'].$item['Lname'];
        $finalname2=  preg_replace('/\s+/', '', $name2);
        $nameData =strtolower($finalname2);

        $Fname = $item['Fname'];
        $Lname = $item['Lname'];
        if( $nameRequest  === $nameData){
            $data = applicant::join('application','application.applicantId','=','applicant.applicantId')
            ->where('Fname',$Fname)->where('Lname',$Lname)
            ->get();
          }
    }
   if($data->count()<1){
     $output .= "<tr><td rowspan='2'><center><p>Nothing's found</p></center> </td></tr>";
   }else{
    foreach($data as $data2){
        $data[0]->assessment = assessment::where('applicationId',$data2['applicationId'])->get();
    }
    for($i = 0; $i< $data->count(); $i++){
        if($data[0]->assessment->count()>0){
          if($data[0]['status']!== 'renewal'){
            for($j =0; $j < $data[0]->assessment->count();$j++){
                if($data[0]->assessment[$j]['total_amount_words'] == ''){
                    $output .=  "<tr>
                    <td><input type='hidden' value=".$data[0]['applicationId']." id='applicationIdSelect' /></td>
                    <td><input type='radio' name='optradio' class='optradio'  id=".$data[0]['applicantId']."></td>
                    <td>".$data[0]['Fname']."  ".$data[0]['Mname']."  ".$data[0]['Lname']." ( ".$data[0]['type_application']." ) - ".$data[0]['status']."   </td>
                    </tr>";
                }else{
                    if($data[0]->assessment[0]['payment_status'] !==null){
                        $output .=  "<tr>
                        <td></td>
                        <td style='color:grey'>".$data[0]['Fname']."  ".$data[0]['Mname']."  ".$data[0]['Lname']." ( ".$data[0]['type_application']." ) <badge class='badge badge-success badge-sm'>paid</badge> </td>
                        </tr>";
                    }else{
                        $output .=  "<tr>
                        <td></td>
                        <td style='color:grey'>".$data[0]['Fname']."  ".$data[0]['Mname']."  ".$data[0]['Lname']." ( ".$data[0]['type_application']." ) <button class='btn btn-danger btn-sm deleteAssessment' id=".$data[0]->assessment[$j]['assessmentId'].">Delete</button<</td>
                        </tr>";
                    }

                }
            }
          }else{
            for($j =0; $j < $data[0]->assessment->count();$j++){
                if($data[0]->assessment[$j]['type_payment'] == 'application'){
                    $output .=  "<tr>
                    <td><input type='hidden' value=".$data[0]['applicationId']." id='applicationIdSelect' /></td>
                    <td><input type='radio' name='optradio' class='optradio'  id=".$data[0]['applicantId']."></td>
                    <td>".$data[0]['Fname']."  ".$data[0]['Mname']."  ".$data[0]['Lname']." ( ".$data[0]['type_application']." ) - ".$data[0]['status']."   </td>
                    </tr>";
                }else{
                    $output .=  "<tr>
                    <td></td>
                    <td style='color:grey'>".$data[0]['Fname']."  ".$data[0]['Mname']."  ".$data[0]['Lname']." ( ".$data[0]['type_application']." ) - ".$data[0]->assessment[$j]['type_payment']." </td>
                    </tr>";
                }
            }
          }
        }else{
            $output .=  "<tr>
            <td><input type='hidden' value=".$data[0]['applicationId']." id='applicationIdSelect' /></td>
            <td><input type='radio' name='optradio' class='optradio'  id=".$data[0]['applicantId']."></td>
            <td>".$data[0]['Fname']."  ".$data[0]['Mname']."  ".$data[0]['Lname']." ( ".$data[0]['type_application']." ) - ".$data[0]['status']."   </td>
            </tr>";
        }
    }

   }


    return response()->json([
      'output'=>$output,
      'applicationId'=>$applicationId
    ]);

  }
  public function select_applicant_fetch(Request $req){
    $id = $req->id;

    $data=applicant::with('address')->where('applicantId',$id)->get();
    $data2=defaultFee::all();

    return response()->json([
      'data'=>$data,
      'data2'=>$data2
    ]);

  }

  public function select_fees(Request $req){

    $ids = $req->checkbox_value;
    $output="";
    $total = 0;

    $data = fee::whereIn('fees_id',$ids)->get();
    // <td><input type='text' class='assessment_input' value='".$item['account_code']."' id='".$item['fees_id']."' /></td>
    foreach($data as $item){
      $output .= "<tr><td>".$item['natureof_payment']."</td>
      <td> <input type='number' class='assessment_total' id='".$item['fees_id']."'  value=".$item['assessment_total']."  />
      </td></tr>";
      $total += $item['assessment_total'];
    }

    return response()->json([
      'output' => $output,
      'total'=>$total
    ]);
  }
  public function save_assessment(Request $request){
    $ids = $request->checkbox_value;
    $applicantid =$request->id;
    $applicationId =$request->applicationId;
    $total_amount_words =$request->total_amount_words;
    $receipt_no = Carbon::now()->format('Y-mdH').rand(1,100);
    $defaultId =$request->defaultId;
    $total_amount =$request->total_amount;

    $assessment =  assessment::where('applicationId',$applicationId);
    $assessment->update([
        'applicantId'=>$applicantid,
        'applicationId'=>$applicationId,
        'total_amount_words'=>$total_amount_words,
        'receipt_no'=>$receipt_no,
        'defaultId'=>$defaultId,
        'total_amount'=>$total_amount,
    ]);

 $assessmentId= assessment::select('assessmentId')->where('applicationId',$applicationId)->first();
    foreach($ids as $id){
        $sub_assessment= new subAssessment();
        $sub_assessment->assessmentId=$assessmentId['assessmentId'];
        $sub_assessment->fees_id = $id;
        $sub_assessment->save();
    }

    if($assessment){
      return response()->json([
        'msg'=>'Assessment Saved'
      ]);
    }


  }

public function udpate_account_code(Request $request){
  $id =$request->id;
  $account_code=$request->account_code;

  $fees = fee::where('fees_id',$id);
  $fees->update([
    'account_code'=>$account_code
  ]);
}
public function assessment_total(Request $request){
  $id =$request->id;
  $assessment_total=$request->assessment_total;

  $fees = fee::where('fees_id',$id);
  $fees->update([
    'assessment_total'=>$assessment_total
  ]);
}

public function numberTowords(Request $req)
{
  $num = $req->num;
$data =(NumConvert::word($num));

return response()->json([
  'data'=>$data
]);
}
public function search_assessment(Request $request){
  $search = $request->search;
  $output ='';
  $name = $request->search;
  $finalname= preg_replace('/\s+/', '', $name);
  $nameRequest =strtolower($finalname);
  $getdata = applicant::get();


      foreach($getdata as $item){
        $name2 = $item['Fname'].$item['Lname'];
        $finalname2=  preg_replace('/\s+/', '', $name2);
        $nameData =strtolower($finalname2);

        $Fname = $item['Fname'];
        $Lname = $item['Lname'];
        if( $nameRequest  === $nameData){
            $data = applicant::join('application','application.applicantId','=','applicant.applicantId')
            ->where('Fname',$Fname)->where('Lname',$Lname)
            ->get();
          }
    }
    foreach($data as $item){
        $data[0]->assessment = assessment::where('applicationId',$item['applicationId'])->get();
    }
    if($data->count()<1){
    $output .= "<tr><td rowspan='2'><center><p>Nothing's found</p></center> </td></tr>";
    }else{
    for($i = 0; $i< $data->count(); $i++){
      if($data[0]->assessment->count()>0){
        for($j =0; $j <$data[0]->assessment->count();$j++){
          if($data[0]->assessment[$j]['total_amount_words'] !== '' && $data[0]->assessment[$j]['payment_date'] !== null ){
            $output .=  "<tr>
            <td></td>
            <td style='color:grey'>".$data[0]['Fname']."  ".$data[0]['Mname']."  ".$data[0]['Lname']." ( ".$data[0]['type_application']." ) <badge class='badge badge-success badge-sm'>paid</badge> </td>
            </tr>";
          }else{
            $output .=  "<tr>
            <input type='text' value=".$data[0]['applicationId']." />
            <td><input type='radio' name='optradio' class='optradio'  id=".$data[0]['applicantId']."></td>
            <td>".$data[0]['Fname']."  ".$data[0]['Mname']."  ".$data[0]['Lname']." ( ".$data[0]['type_application']." ) - ".$data[0]['status']."   </td>
            </tr>";
          }
        }
      }
    }
 }
 return response()->json([
    'output'=>$output,
    'data'=>$data,
  ]);
}

public function select_assessment(Request $req){
  $id = $req->id;

  $output ='';
  $data2=defaultFee::all();

  $data3 =applicant::join('assessment','assessment.applicantId','=','applicant.applicantId')
  ->join('address','applicant.applicantId','=','address.applicantId')
  ->join('application','application.applicantId','=','applicant.applicantId')
  ->join('sub_assessment','assessment.assessmentId','=','sub_assessment.assessmentId')
  ->join('fees','fees.fees_id','=','sub_assessment.fees_id')
  ->where('applicant.applicantId',$id)
  ->whereNull('assessment.payment_date')
  ->get();

  // foreach ($data3 as $item){
  //   $fees_id=$item['fees_id'];
  //   $list_fees= subAssessment::join('fees','fees.fees_id','=','sub_assessment.fees_id')
  //   ->where('sub_assessment.fees_id',$fees_id)->get();
  // }
  // <td><input type='text' class='assessment_input' value='".$item['account_code']."' id='".$item['fees_id']."' readonly='' /></td>
  foreach($data3 as $item){
    $output .= "<tr><td>".$item['natureof_payment']."</td><td> <input type='number' class='assessment_total' id='".$item['fees_id']."'  value=".$item['assessment_total']."  readonly=''/></td></tr>
    ";
    $total_amount= $item['total_amount'];
  }
  $output.="<tr> <td></td><td></td> </tr>";

  return response()->json([
    'data'=>$output,
    'data2'=>$data2,
    // 'list_fees'=>$list_fees,
    'data3'=> $data3,
    'total_amount'=>$total_amount
  ]);
}
public function save_payment(Request $request){
    $assessmentId = $request->assessmentId;
    $type_payment = '';
    $data = assessment::join('application','application.applicationId','=','assessment.applicationId')
    ->where('assessment.assessmentId',$assessmentId)->get();

    foreach($data as $data){
        if($data['status'] !== 'renewal'){
            $type_payment = 'application';
        }else{
            $type_payment = 'renewal';
        }
    }

    $amount_paid = $request->amount_paid;
    $change = $request->change;
    $date_paid = Carbon::now()->format('Y-m-d');
    $payment_status='paid';
    $assessment =assessment::where('assessmentId',$assessmentId);
    $assessment->update([
    'amount_paid'=> $amount_paid,
    'payment_date'=> $date_paid,
    'payment_status'=> $payment_status,
    'type_payment'=> $type_payment,
    'change'=> $change,
    ]);

    return response()->json([
    'msg'=>'Payment Successfully Added!'
    ]);
    }
    public function deleteAssessment(Request $request){
        $data = assessment::where('assessmentId',$request->assessmentId);
        $data->update([
            'applicantId'=> null,
            'total_amount'=> null,
            'total_amount_words'=> null,
            'receipt_no'=> null,
            'defaultId'=> null,
        ]);
        return response()->json([
            'msg'=>'Assessment Successfully Deleted'
        ]);

    }
}
