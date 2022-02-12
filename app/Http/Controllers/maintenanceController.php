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
   $fees =fee::where('category',$category)->get();
   $defaultFee =fee::where('category',$category2)->get();

   $output ='';
   $output2 ='';

   foreach($fees as $fee){
       $output .='
       <div class="form-group row ">
       <label class="control-label col-md-7 col-sm-7 ">'.$fee['natureof_payment'].'</label>
       <div class="col-md-3 col-sm-3 ">
           <input type="text" class="form-control" value='.$fee['assessment_total'].'>
       </div>
       <div class="col-md-2 col-sm-2">
       <button type="button"  class="btn btn-defualt btn-xs actionButton sendArchive" id='.$fee['fees_id'].'><i class="fa fa-pencil"></i></button>
       </div>
   </div>';
   }
   foreach($defaultFee as $fee){
    $output2 .='
    <div class="form-group row ">
    <label class="control-label col-md-7 col-sm-7 ">'.$fee['natureof_payment'].'</label>
    <div class="col-md-3 col-sm-3 ">
        <input type="text" class="form-control" value='.$fee['assessment_total'].'>
    </div>
    <div class="col-md-2 col-sm-2">
    <button type="button"  class="btn btn-defualt btn-xs actionButton sendArchive" id='.$fee['fees_id'].'><i class="fa fa-pencil"></i></button>
    </div>
</div>';
}


    
    return response()->json([
        'output'=>$output,
        'output2'=>$output2,
    ]);
}
}
