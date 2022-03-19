<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
class mapController extends Controller
{
    //
    function fetch_application_map(Request $request){
        $output = '';
        
        if($request->business_name !=''){
            $data= application::where('business_name','LIKE','%'.$request->business_name.'%')->get();
        }else{
            $data = application::get();
        }

       if($data->count()>0){
        foreach($data as $data){
            $output .='
            <div class="item">
                              <h5 id="text">'.$data['business_name'].'</h5>
                              <input type="hidden" class="long" value='.$data['long'].' />
                              <input type="hidden" class="lat" value='.$data['lat'].' />
                              <i class="fa fa-caret-right"></i>
                          </div>';
        }
       }else{
        $output .='
        <div class="">
                          <p>No data found</p>
                       
                      </div>';
       }

    return response()->json([
        'output'=>$output
    ]);
    }
}
