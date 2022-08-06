<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee;
use App\Models\applicant;
use App\Models\defaultFee;
use App\Models\assessment;
use App\Models\subAssessment;
use App\Models\application;
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
    $output2 = '';
    $name = $req->search;
    $finalname= preg_replace('/\s+/', '', $name);
    $nameRequest =strtolower($finalname);
    $data = [];
    $getdata = applicant::get();

    foreach($getdata as $item){
        $name2 = $item['Fname'].$item['Lname'];
        $finalname2=  preg_replace('/\s+/', '', $name2);
        $nameData =strtolower($finalname2);

        $Fname = $item['Fname'];
        $Lname = $item['Lname'];
        $data2=defaultFee::all();
        if( $nameRequest  === $nameData){
            $data = applicant::join('application','application.applicantId','=','applicant.applicantId')
            ->where('Fname',$Fname)->where('Lname',$Lname)
            ->get();
          }
    }
   if(count($data)>0){
    return response()->json([
        'data'=>$data,
        'data2'=>$data2
      ]);
   }else{
    return response()->json([
        'msg'=>'no data found',
        'code'=>400
     ]);
   }

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
    $applicantId =$request->id;
     $applicationId =$request->applicationId;
    $total_amount_words =$request->total_amount_words;
    $receipt_no = Carbon::now()->format('Y-mdH').rand(1,100);
    $defaultId =$request->defaultId;
    $total_amount =$request->total_amount;
    $type_payment = $request->assessmentType;
     $assessment =  assessment::where('applicationId',$applicationId)->get();
    $addAssessment = false;
    if(count($assessment)>0){
        foreach($assessment as $assessmentItem){
            if($type_payment==='application'){
                if($assessmentItem['payment_status']===null && $assessmentItem['total_amount_words'] ===null){
                    $assessment2 =  assessment::where('applicationId',$applicationId);
                    $assessment2->update([
                        'applicantId'=>$applicantId,
                        'applicationId'=>$applicationId,
                        'total_amount_words'=>$total_amount_words,
                        'receipt_no'=>$receipt_no,
                        'defaultId'=>$defaultId,
                        'total_amount'=>$total_amount,
                        'type_payment'=>$type_payment
                    ]);
                    $assessmentIdData= assessment::select('assessmentId')->where('applicationId',$applicationId)->first();
                    $assessmentId = $assessmentIdData['assessmentId'];
                }else{
                    return response()->json([
                        'code'=>400,
                        'msg'=>'Application fee already assess'
                    ]);
                }

            }else{
                $addAssessment = true;
            }
        }
        if($addAssessment === true){
            $assessment2 =  new assessment;
            $assessment2->applicantId = $applicantId;
            $assessment2->applicationId = $applicationId;
            $assessment2->total_amount_words = $total_amount_words;
            $assessment2->receipt_no = $receipt_no;
            $assessment2->defaultId = $defaultId;
            $assessment2->total_amount = $total_amount;
            $assessment2->type_payment = $type_payment;
            $assessment2->save();
            $assessmentId = $assessment2->assessmentId;
        }
    }



    foreach($ids as $id){
        $sub_assessment= new subAssessment();
        $sub_assessment->assessmentId= $assessmentId;
        $sub_assessment->fees_id = $id;
        $sub_assessment->save();
    }

    if($assessment){
      return response()->json([
        'msg'=>'Assessment Saved',
        'assessmentId'=>$assessmentId
      ]);
    }


  }
public function redirectPayment(Request $request, $data){

     return view('admin/payment',compact('data'));
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
            $output .=  "";
          }else{
            $output .=  "<tr>
            <td><input type='radio' name='optradio' class='optradio'  id=".$data[0]['applicationId']." value='".$data[0]->assessment[$j]["type_payment"]."'></td>
            <td>".$data[0]['Fname']."  ".$data[0]['Mname']."  ".$data[0]['Lname']." ( ".$data[0]['type_application']." ) - ".$data[0]->assessment[$j]["type_payment"]."   </td>
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
      $applicationId = $req->id;
       $type_payment = $req->type_payment;
         $assessmentId =$req->assessmentId;

  $output ='';
  $data2=defaultFee::all();

  if($assessmentId == null){
   $data3 =applicant::join('assessment','assessment.applicantId','=','applicant.applicantId')
  ->join('address','applicant.applicantId','=','address.applicantId')
  ->join('application','application.applicantId','=','applicant.applicantId')
  ->join('sub_assessment','assessment.assessmentId','=','sub_assessment.assessmentId')
  ->join('fees','fees.fees_id','=','sub_assessment.fees_id')
  ->where('application.applicationId',$applicationId)
  ->where('assessment.type_payment',$type_payment)
  ->whereNull('assessment.payment_date')
  ->get();
}else{
    $data3 =applicant::join('assessment','assessment.applicantId','=','applicant.applicantId')
    ->join('address','applicant.applicantId','=','address.applicantId')
    ->join('application','application.applicantId','=','applicant.applicantId')
    ->join('sub_assessment','assessment.assessmentId','=','sub_assessment.assessmentId')
    ->join('fees','fees.fees_id','=','sub_assessment.fees_id')
    ->where('assessment.assessmentId',$assessmentId)
    ->whereNull('assessment.payment_date')
    ->get();
}
if($data3->count()>0){
  foreach($data3 as $item){
    $output .= "<tr><td>".$item['natureof_payment']."</td><td> <input type='number' class='assessment_total' id='".$item['fees_id']."'  value=".$item['assessment_total']."  readonly=''/></td></tr>
    ";
    $total_amount= $item['total_amount'];
  }
}else{
    return response()->json([
        'code'=>400
    ]);
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
public function printPayment(Request $request){
    $assessmentId =$request->assessmentId ;
    $output = '';
    $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
    ->join('assessment','assessment.applicationId','=','application.applicationId')
    ->join('address','address.applicantId','=','applicant.applicantId')
    ->where('assessment.assessmentId',$assessmentId)
    ->get();

  foreach($data as $item){
      $applicantName = $item['Fname']." ".$item['Mname']." ".$item['Lname'];
      $businessAddres = $item['purok']."  ".$item['barangay']." ".$item['city'];
      $data[0]->assessment= assessment::join('sub_assessment','sub_assessment.assessmentId','=','assessment.assessmentId')
      ->join('fees','fees.fees_id','=','sub_assessment.fees_id')
      ->where('assessment.assessmentId',$assessmentId)
      ->get();

    $output .= '
    <input type="hidden" value='.$assessmentId.'  id="applicationIdReciept" />
    <div class="row">
     <div class="col-md-12" id="receipt">
    <div class="panel panel-default">
        <div class="title_payment">
        <center><h5><strong>ORDER OF PAYMENT</strong></h5>
            <p>(NOT VALID AS OFFICIAL RECEIPT UNLESS MACHINE VALIDATED)</p>
        </center>
        </div>
    <div class="panel-heading"><h5>NAME: <span  ><input type="text" class="underline"  id="applicant_name_payment" name=""  value="'.$applicantName.'" readonly></span></h5></div>

    <div class="panel-heading"><h5>ADDRESS: <span  ><input type="text" class="underline"  id="applicant_address" name="" value="'.$businessAddres.'"  readonly></span></h5></div>
    <div class="panel-body" id="panel-body">

        <table class="table table-striped table-bordered" id="data"  style="width:100%;">
            <thead>
                <tr>
          <th>NATURE OF PAYMENT </th>
          <th >TOTAL</th>
        </tr>
      </thead>
      <tbody id="nature_payment_body">
      ';
      foreach($data[0]->assessment as $item){
          $output .= "<tr><td>".$item['natureof_payment']."</td><td> <input type='number' class='assessment_total' id='".$item['fees_id']."'  value=".$item['assessment_total']."  readonly=''/></td></tr>";
          $total = $item['total_amount'];
        }
      $output .='</tbody>

          </table>
          <h7><b>TOTAL AMOUNT (IN WORDS):</b></h7>
          <input type="text" name="" class="total_amount_inwords" id="total_amount_inwords" value="'.$item['total_amount_words'].'" readonly>
          <br><br><br>

        <div class="form-group group2">
          <label>Offical Receipt No: </label>
          <input type="text" name="" class="group1" id="receipt_no" value="'.$item['receipt_no'].'" readonly><br>
          <input type="hidden" id="assessmentId">
          <label>Amount Paid:</label>
          <input type="text" name="" class="group1" id="amount_paid_payment" value="'.$item['amount_paid'].'" readonly><br>
          <label>Change:</label>
          <input type="text" name="" class="group1" id="change" value="'.$item['change'].'" readonly><br>
            <label>Payment Date:</label>
          <input type="input" name="" class="group1" id="date_paid" value="'.$item['payment_date'].'" readonly><br><br>
          <div class="copy">
            <label><b>Original</b>/ (Applicant/Owners Copy)</label><br>
            <label><b>Duplicate</b>/ (GSB/Collecting Agent copy)</label><br>
            <label><b>Triplicate</b>/ (BFP copy)</label><br>

          </div>

        </div>

          <div class="form-group group2" style="float:right;margin-top: 30px;">
            <h5><b>BY AUTHORITY OF </b><span><input type="text" name="" class="authority_name" id="authority_of" value="'.$item["fire_marshal"].'"></span></h5>
            <label style="float: right;">(Name of City/Municipal Fire Marshal)</label><br><br><br><br>


            <input type="text" name="" class="authority_name" id="fee_assessor" value="'.$item["fee_assessor"].'">
           <h5 style="margin-left:10%">Fire Code Fee Assesor</h5>


        </div>
    </div>
  </div>
  </div>
  </div>
  <br>
  <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6 ">
            <div class="button-group total_body2 ">
              <div id="updateReceipt"></div>
              <button type="button" class="btn btn-secondary " data-dismiss="modal" id="" style="display: inline-block;"  ><i class="fa fa-arrow-left" ></i>  Close</button>
                <button type="button" class="btn btn-success print_payment_button"  id="print_payment_button"><i class="fa fa-print" ></i>  Print</button>
            </div>
          </div>
        </div>';
      }

    return response()->json([
      'output'=>$output,
    ]);
  }
public function updateReceiptDetailsPayment(Request $request){
    $assessmentId = $request->assessmentId;
    $fire_marshal = $request->authority_of;
    $fee_assessor = $request->fee_assessor;

    $data = assessment::where('assessmentId',$assessmentId);
    $data->update([
        'fire_marshal'=>$fire_marshal,
        'fee_assessor'=>$fee_assessor,
    ]);

    return response()->json([
        'msg'=>'Assessment Updated'
    ]);
}
public function save_payment(Request $request){
    $assessmentId = $request->assessmentId;
    $type_payment = $request->type_payment;

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
