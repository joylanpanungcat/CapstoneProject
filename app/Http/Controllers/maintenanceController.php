<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee;
use App\Models\defaultFee;


class maintenanceController extends Controller
{
    //

public function fetch_default_fees(){
    $category = 'main';
    $category2 = 'other_fees';
   $fees =fee::where('category',$category)->orderBy('fees_id','desc')->get();
   $defaultFee =fee::where('category',$category2)->orderBy('fees_id','desc')->get();
   $authority =defaultFee::all();
   
   $output ='';
   $output2 ='';
   $output3 ='';
   
   foreach($fees as $fee){
       $output .='
       <div class="form-group row ">
       <label class="control-label col-md-5 col-sm-5 ">'.$fee['natureof_payment'].'</label>
       <div class="col-md-3 col-sm-3 ">
           <input type="text" class="form-control" value='.$fee['assessment_total'].'>
       </div>
       <div class="col-md-4 col-sm-4">
       <button type="button"  class="btn btn-defualt btn-xs actionButton default_fee " id='.$fee['fees_id'].'><i class="fa fa-pencil"></i></button>
       <button type="button"  class="btn btn-defualt btn-xm actionButton other_fees_delete" id='.$fee['fees_id'].'><i class="fa fa-trash"></i></button>
       </div>
   </div>';
   }
   foreach($defaultFee as $fee){
    $output2 .='
    <div class="form-group row  col-md-12">
    <label class="control-label col-md-5  ">'.$fee['natureof_payment'].'</label>
    <div class="col-md-3  ">
        <input type="text" class="form-control" value='.$fee['assessment_total'].'>
    </div>
    <div class="col-md-4 ">
    <button type="button"  class="btn btn-defualt btn-xm actionButton other_fees" id='.$fee['fees_id'].'><i class="fa fa-pencil"></i></button>
    <button type="button"  class="btn btn-defualt btn-xm actionButton other_fees_delete" id='.$fee['fees_id'].'><i class="fa fa-trash"></i></button>
    </div>
</div>';
}
foreach($authority as $fee){
    $output3 .='
    <div class="form-group row ">
    <label class="col-md-5 col-sm-5 ">Municipality Fire Marshal :</label>
    <div class=" control-label col-md-5 col-sm-5 "><strong>'.$fee['authority_of'].'
    </div></strong>
    <div class="col-md-2 col-sm-2">
    <button type="button"  class="btn btn-defualt btn-xs actionButton authority_view" id='.$fee['id'].'><i class="fa fa-pencil"></i></button>
    </div>
</div>';
$output3 .='
<div class="form-group row ">
<label class="col-md-5 col-sm-5 ">Fee Assessor :</label>
<div class=" control-label col-md-5 col-sm-5 "><strong>'.$fee['fee_assessor'].'
</div></strong>
<div class="col-md-2 col-sm-2">
</div>
</div>'
;
}


    
    return response()->json([
        'output'=>$output,
        'output2'=>$output2,
        'output3'=>$output3,
    ]);
}

public function view_main_fees(Request $request){
    $fees_id =$request->fees_id;

    $data=fee::where('fees_id',$fees_id)->get();

    return response()->json([
        'data'=>$data
    ]);
}

public function update_main_fees(Request $request){
    $fees_id = $request->fees_id;
    $natureof_payment = $request->natureof_payment;
    $account_code = $request->account_code;
    $assessment_total = $request->assessment_total;
    $description = $request->description;

    $data= fee::where('fees_id',$fees_id);
    $data->update([
        'natureof_payment'=>$natureof_payment,
        'account_code'=>$account_code,
        'account_code'=>$account_code,
        'assessment_total'=>$assessment_total,
        'description'=>$description,
    ]);

    return response()->json([
        'msg'=>'Successfully Update'
    ]);

}

public function view_other_fees(Request $request){
    $fees_id = $request->fees_id;
    $data = fee::where('fees_id',$fees_id)->get();

    return response()->json([
        'data'=>$data
    ]);
}

public function update_other_fees(Request $request){
    $fees_id = $request->fees_id;
    $natureof_payment = $request->natureof_payment;
    $account_code = $request->account_code;
    $assessment_total = $request->assessment_total;
    $description = $request->description;

    $data= fee::where('fees_id',$fees_id);
    $data->update([
        'natureof_payment'=>$natureof_payment,
        'account_code'=>$account_code,
        'account_code'=>$account_code,
        'assessment_total'=>$assessment_total,
        'description'=>$description,
    ]);

    return response()->json([
        'msg'=>'Successfully Update'
    ]);
}
public function view_authority(Request $request){
    $id = $request->id;

    $data= defaultFee::where('id',$id )->get();

    return response()->json([
       'data'=>$data
    ]);
}

public function update_authority(Request $request){
    $id =$request->id;
    $authority_of =$request->authority_of;
    $fee_assessor =$request->fee_assessor;
   
    $data= defaultFee::where('id',$id );
    $data->update([
        'authority_of'=>$authority_of,
        'fee_assessor'=>$fee_assessor
    ]);
    return response()->json([
        'msg'=>'Successfully Update'
    ]);
}

public function add_main_fee(Request $request){
$natureof_payment =$request->natureof_payment;
$account_code =$request->account_code;
$assessment_total =$request->assessment_total;
$description =$request->description;
$category ='main';


$main_fees= new fee;
$main_fees->natureof_payment =$natureof_payment;
$main_fees->account_code =$account_code;
$main_fees->assessment_total =$assessment_total;
$main_fees->description =$description;
$main_fees->category =$category;
$sql = $main_fees->save();

if($sql){
    return response()->json([
        'msg'=>'Defualt Fee Added!'
    ]);
}
   
}
public function add_other_fee(Request $request){
    $natureof_payment =$request->natureof_payment;
    $account_code =$request->account_code;
    $assessment_total =$request->assessment_total;
    $description =$request->description;
    $category ='other_fees';
    
    
    $main_fees= new fee;
    $main_fees->natureof_payment =$natureof_payment;
    $main_fees->account_code =$account_code;
    $main_fees->assessment_total =$assessment_total;
    $main_fees->description =$description;
    $main_fees->category =$category;
    $sql = $main_fees->save();
    
    if($sql){
        return response()->json([
            'msg'=>'Defualt Fee Added!'
        ]);
    }
       
    }

public function delete_fees(Request $request){
    $fees_id = $request->fees_id;


    $query= fee::find($fees_id)->delete();
    if($query){
        return response()->json([
           'status'=>1,
           'msg'=>'Successfullu Archived' 
        ]);
      }else
      {
        return response()->json([
           'status'=>0,
           'msg'=>'something went wrong!' 
        ]);
      }
}

}
