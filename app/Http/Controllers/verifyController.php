<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\admin;
use App\Models\applicant_account;
use App\Models\inspector;
use App\Models\application;
use App\Models\emergency;


use Session;
use DataTables;

class verifyController extends Controller
{
    //
    public function login(Request $req){
       $req->validate([
        'username'=>'required',
        'password'=>'required'
       ]);
        $admin=admin::where(['username'=>$req->username])->first();
       $applicant=applicant_account::where(['username'=>$req->username])->first();
       $inspector=inspector::where(['username'=>$req->username])->first();
       
       if($admin){
            if($req->password===$admin['password']){
                $req->session()->put('adminID',$admin);
                return redirect("DashboardAdmin");
            }else{
                 return back()->with('error',"Invalid Inputs");
            }
         }
         if($inspector){
            if($req->password===$inspector['password']){
                $req->session()->put('inspectorId',$inspector);
                return redirect("dashboard_inspector");
            }else{
                 return back()->with('error',"Invalid Inputs");
            }
         }
         if($applicant){
            if($req->password===$applicant['password']){
                $req->session()->put('accountId',$applicant);
                return redirect("dashboard");
            }else{
                 return back()->with('error',"Invalid Inputs");
            }
         }
         else{
        return back()->with('error',"Invalid Inputs");
       }
    }
    
    // public function dashboard(){
    //     $data=array();
    //     if(Session::has('adminID')){
    //         $data=admin::where('adminID','=',Session::get('adminID'))->first();
    //     }
    //     return view('Dashboard',compact('data'));
    // }
   
    public function logout(){
        if(Session::has('adminID')){
            Session::pull('adminID');
            return redirect('/');
        }
    }
    public function logoutInspector(){
        if(Session::has('inspectorId')){
            Session::pull('inspectorId');
            return redirect('/');
        }
    }
    
    public function logoutApplicant(){
        if(Session::has('accountId')){
            Session::pull('accountId');
            return redirect('/');
        }
    }

    public function fetch_dashboard(){

        $application = application::get();
        $applicationCount= count($application);
        
        $approved = application::where('status','=','approved')->get();
        $approvedCount= count($approved);

        $reinspection = application::where('status','=','reinspection')->get();
        $reinspectionCount =count($reinspection);

        $renewal = application::where('status','=','renewal')->get();
        $renewalCount =count($renewal);

        return response()->json([
            'applicationCount'=> $applicationCount,
            'approvedCount'=> $approvedCount,
            'reinspectionCount'=> $reinspectionCount,
            'renewalCount'=> $renewalCount,
        ]);

    }

    public function fetch_emergency(){
      
        $count = 0;
        $data = emergency::where('count',$count)->get();
        $dataCount = count($data);

        return response()->json([
            'dataCount'=>$dataCount
        ]);

    }

    public function emergency_view(Request $request){
        $count = 0;
        $count2 =1;
        $data = emergency::where('count',$count);
        $data->update([
            'count'=>$count2
        ]);

        // return dd($data);

        return view('admin/emergency_page');
    }

   
    public function get_emergency(Request $request){
        if(request()->ajax())
        {
           if($request->from_date !='' )
            {
                $data = emergency::join('application','application.applicationId','=','emergency.application_id')
                ->join('address','address.applicationId','=','application.applicationId')
                ->join('applicant','applicant.applicantId','=','application.applicationId')
                ->whereBetween('emergency_date', array($request->from_date, $request->to_date))
                ->orderBy('application.applicationId','desc')
                ->get();
            }else{
                $data = emergency::join('application','application.applicationId','=','emergency.application_id')
                ->join('address','address.applicationId','=','application.applicationId')
                ->join('applicant','applicant.applicantId','=','application.applicationId')
                ->orderBy('application.applicationId','desc')
                ->get();
            }
        
    }
       
     
    return DataTables::of($data)
    // return DataTables::of($data)
    ->addIndexColumn()
    // ->addColumn('name', function($row){
    //   return $row['Fname'].' '.$row['Mname'].'.  '.$row['Lname'];
    //  })
     ->addColumn('address', function($row){
        return $row['purok'].' '.$row['barangay'].'.  '.$row['city'];
       })
    
    ->addColumn('actions', function($row){
        return " <button type='button'  class='btn cancel_schedule actionButton' data-toggle='tooltip' data-placement='bottom' title='Archive' id='".$row['applicationId']."'><i class='fa fa-archive'></i></button>  
  <button type='button' name='viewApplicant' class='btn view_emergency actionButton'  data-toggle='tooltip' data-placement='bottom' title='View' id='".$row['applicationId']."'><i class='fa fa-eye'></i></button>
  ";
       })
       ->rawColumns(['actions'])
    ->make(true);
    
  }
  public function view_emergency(Request $request){
      $applicationId = $request->applicationId;

      $data = emergency::join('application','application.applicationId','=','emergency.application_id')
                ->join('address','address.applicationId','=','application.applicationId')
                ->join('applicant','applicant.applicantId','=','application.applicationId')
                ->where('application.applicationId', $applicationId)
                ->get();

    return response()->json([
        'data'=>$data
    ]);
  }

  public function return_fallback(){
      return redirect()->back();
  }

}
