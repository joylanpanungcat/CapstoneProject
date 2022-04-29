<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\application;
use App\Models\applicant_account;

class fetchController extends Controller
{
    //


    public function fetch_application(){
        $accountId   = session()->get('accountId')['accountId'];
        $count = 1;
        $output = '';

        $data2 = application::where('accountId',$accountId )->get();


        if($data2->count()>0){
            foreach($data2 as $data){
                $output .='  <tr>
                            <td>'.$count++.'</td>
                            <td>'.$data['type_application'].'</td>
                            <td>'.$data['status'].'</td>
                            <td><a type="button" name="viewApplicant" class="btn  actionButton" href="application/view/'.$data['applicationId'].'" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye"></i></a></td>
                        </tr>';
            }

        }else{
            $output.='<tr><td colspan="4">No Application</td></tr>';

        }


        return response()->json([
            'output'=>$output
        ]);
    }

    public function profile_fetch(){
          $accountId   = session()->get('accountId')['accountId'];

             $data = applicant_account::where('applicant_account.accountId', $accountId)
        ->join('address','address.accountId','=','applicant_account.accountId')
        ->get();

        return view('applicant.profile',['data'=>$data]);
    }


    public function Dashboard_fetch(){
        $accountId = session()->get('accountId')['accountId'];
        $status ='renewal';
        $approved ='approved';
        $output = '';

        $data=application::where('accountId',$accountId)->get();
        $dataCount=count($data);

        $data2=application::where('accountId',$accountId)->get();
        $data2Count=count($data2);

        $emergency=application::join('applicant_account','applicant_account.accountId','=','application.accountId')
        ->where('application.accountId',$accountId)->where('application.status',$status)
        ->ORwhere('application.status',$approved)->get();
        $emergencyCount= count($emergency);

        $data3=application::where('accountId',$accountId)->where('status',$status)
       ->get();
        $data3Count=count($data3);

        foreach($emergency as $data){
            $output.= '<option val='.$data['business_name'].'> '.$data['business_name'].' </option>';
        }


        return response()->json([
            'data'=>$dataCount,
            'data2'=>$data2Count,
            'data3'=>$data3Count,
            'accountId'=>$accountId,
            'output'=>$output,
            'emergencyCount'=>$emergencyCount
        ]);
    }

    public function fetch_renewal(){
        $accountId   = session()->get('accountId')['accountId'];
        $count = 1;
        $output = '';
        $status = 'renewal';

        $data2 = application::where('accountId',$accountId )
        ->where('status',$status)->get();


        if($data2->count()>0){
            foreach($data2 as $data){
                $output .='  <tr>
                            <td>'.$count++.'</td>
                            <td>'.$data['type_application'].'</td>
                            <td>'.$data['status'].'</td>
                            <td><a type="button" name="viewApplicant" class="btn  actionButton" href="renewal/view/'.$data['applicationId'].'" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye"></i></a></td>
                        </tr>';
            }

        }else{
            $output.='<tr><td colspan="4">No Application</td></tr>';

        }


        return response()->json([
            'output'=>$output
        ]);
    }
}
