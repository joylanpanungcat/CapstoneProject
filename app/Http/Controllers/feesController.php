<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee;
use App\Models\applicant;
use App\Models\defaultFee;
use App\Models\assessment;
use App\Models\subAssessment;
use NumConvert;
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

    $data = applicant::join('application','application.applicantId','=','applicant.applicantId')
        ->with('assessment')
        ->where('Fname','LIKE','%'.$search.'%')->ORwhere('Lname','LIKE','%'.$search.'%')
        ->get();

   if($data->count()<1){
     $output .= "<tr><td rowspan='2'><center><p>Nothing's found</p></center> </td></tr>";
   }else{
    foreach($data as $item){
      $applicationId  = $item['applicationId'];
      if($item['assessment']->count()<1){
        $output .=  "<tr>
        <td><input type='radio' name='optradio' class='optradio'  id=".$item['applicantId']."></td>
        <td>".$item['Fname']."  ".$item['Mname']."  ".$item['Lname']." ( ".$item['type_application']." ) </td>
         </tr>";
      }else{
        $output .=  "<tr>
        <td></td>
        <td style='color:grey'>".$item['Fname']."  ".$item['Mname']."  ".$item['Lname']." ( ".$item['type_application']." ) </td>
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
    $receipt_no =$request->receipt_no;
    $defaultId =$request->defaultId;
    $total_amount =$request->total_amount;
    
        $assessment = new assessment();
        $assessment->applicantId=$applicantid;
        $assessment->applicationId=$applicationId;
        $assessment->total_amount_words=$total_amount_words;
        $assessment->receipt_no=$receipt_no;
        $assessment->defaultId=$defaultId;
        $assessment->total_amount=$total_amount;
        $assessment->save();
        $assessmentId= $assessment->assessmentId;
        
        foreach($ids as $id){
          $sub_assessment= new subAssessment();
          $sub_assessment->assessmentId=$assessmentId;
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
  $name = $request->search;
  $output ='';
  $data = applicant::join('application','application.applicantId','=','applicant.applicantId')
  ->with('assessment')
  ->where('Fname','LIKE','%'.$name.'%')->ORwhere('Lname','LIKE','%'.$name.'%')
  ->get();
  if($data->count()<1){
    $output .= "<tr><td rowspan='2'><center><p>Nothing's found</p></center> </td></tr>";
  }else{
   foreach($data as $item){
    if($item['assessment']->count() > 0 ){
      $output .=  "<tr>
      <td><input type='radio' name='optradio' class='optradio'  id=".$item['applicantId']."></td>
      <td>".$item['Fname']."  ".$item['Mname']."  ".$item['Lname']." </td>
       </tr>";
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
$amount_paid = $request->amount_paid;
$change = $request->change;
$date_paid = date('y-m-d');

$payment_status='paid';
  $assessment =assessment::where('assessmentId',$assessmentId);
  $assessment->update([
    'amount_paid'=> $amount_paid,
    'payment_date'=> $date_paid,
    'payment_status'=> $payment_status,
    'change'=> $change,
  ]);

  return response()->json([
    'msg'=>'Payment Successfully Added!'
  ]);
}
}
