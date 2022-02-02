<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee;
use App\Models\applicant;
use App\Models\defaultFee;
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
    
    $output = '';

    $data = applicant::where('Fname','LIKE','%'.$search.'%')->ORwhere('Lname','LIKE','%'.$search.'%')->get();

   if($data->count()<1){
     $output .= "<tr><td rowspan='2'><center><p>Nothing's found</p></center> </td></tr>";
   }else{
    foreach($data as $item){
      $output .=  "<tr>
      <td><input type='radio' name='optradio' class='optradio'  id=".$item['applicantId']."></td>
      <td>".$item['Fname']."  ".$item['Mname']."  ".$item['Lname']." </td>
       </tr>";
    }
   }


    return response()->json([
      'output'=>$output
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
    
    $data = fee::whereIn('fees_id',$ids)->get();
    
    foreach($data as $item){
      $output .= "<tr><td>".$item['natureof_payment']."</td><td><input type='text' class='assessment_input' /></td><td><input type='number' class='assessment_total' /></td></tr>";
    }

    return response()->json([
      'output' => $output
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
}
