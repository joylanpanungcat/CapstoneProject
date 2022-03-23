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
            $data = application::join('address','address.applicationId','=','application.applicationId')
                    ->join('applicant','applicant.applicantId','=','application.applicantId')->get();
        }

       if($data->count()>0){
        foreach($data as $data){
            $output .='
            <div id='.$data['applicationId'].' class="item">
                              <h5 id="text">'.$data['business_name'].'</h5>
                              <input type="hidden" class="long'.$data['applicationId'].'" value='.$data['long'].' />
                              <input type="hidden" class="lat'.$data['applicationId'].'" value='.$data['lat'].' />
                              <input type="hidden" class="business_name_map'.$data['applicationId'].'" value="'.$data['business_name'].'" />
                              <input type="hidden" class="address_map'.$data['applicationId'].'" value="'.$data['purok'].','.$data['barangay'].','.$data['city'].'" />
                              <input type="hidden" class="applicantName_map'.$data['applicationId'].'" value="'.$data['Fname'].' '.$data['Mname'].' '.$data['Lname'].'" />
                              <input type="hidden" class="contactNumber_map'.$data['applicationId'].'" value="'.$data['contact_num'].'" />
                              <input type="hidden" class="contactNumber_map'.$data['applicationId'].'" value="'.$data['alcontact'].'" />
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
