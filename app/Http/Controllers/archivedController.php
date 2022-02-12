<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicant_account;
use App\Models\application;
use App\Models\inspector;


use DataTables;
class archivedController extends Controller
{
   public function archivedFetch(){
       $data = applicant_account::onlyTrashed()->get();
             
        return DataTables::of($data)
                          ->addIndexColumn()
                          ->addColumn('actions', function($row){
                                  return "
                                  <button type='button'  class='btn btn-defualt btn-xs view_account actionButton' id='".$row['accountId']."'><i class='fa fa-eye'></i></button>
                ";
                              })
                             ->rawColumns(['actions'])

                          ->make(true);
    }

    public function view_account_archived(Request $request){
        $accountId = $request->accountId;

        $data = applicant_account::onlyTrashed()->where('accountId',$accountId)->get();
        return response()->json([
            'data'=>$data
        ]);

    }

    public function restore_account_user(Request $request){
        $applicationId =$request->accountId;
        $query=applicant_account::withTrashed()->find($applicationId )->restore();
       if($query){
                return response()->json([
                   'status'=>1,
                   'msg'=>'data undone' 
                ]);
              }else
              {
                return response()->json([
                   'status'=>0,
                   'msg'=>'something went wrong!' 
                ]);
              }
       
      }

public function fetchApplication(){
    $data = application::onlyTrashed()->get();
             
    return DataTables::of($data)
                      ->addIndexColumn()
                      ->addColumn('actions', function($row){
                              return "
                              <button type='button'  class='btn btn-defualt btn-xs view_application actionButton2' id='".$row['applicationId']."'><i class='fa fa-eye'></i></button>
            ";
                          })
                          ->addColumn('name', function($row){
                            return $row->applicant['Fname'].' '.$row->applicant['Mname'].'.  '.$row->applicant['Lname'];
                           })
                         ->rawColumns(['actions'])

                      ->make(true);

}
public function view_application(Request $request){
    $applicationId = $request->applicationId;
    $data = application::onlyTrashed()->where('applicationId',$applicationId)->get();
    return response()->json([
        'data'=>$data
    ]);
    

}
public function restoreApplication(Request $request){
    $applicationId = $request->applicationId;

    $query=application::withTrashed()->find($applicationId)->restore();
    if($query){
             return response()->json([
                'status'=>1,
                'msg'=>'data undone' 
             ]);
           }else
           {
             return response()->json([
                'status'=>0,
                'msg'=>'something went wrong!' 
             ]);
           }
}
public function inspector_fetch_achived(){
  $data = inspector::onlyTrashed()->get();
             
  return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                            return "
                            <button type='button'  class='btn btn-defualt btn-xs view_inspector actionButton2' id='".$row['inspectorId']."'><i class='fa fa-eye'></i></button>
          ";
                        })
                        ->addColumn('name', function($row){
                          return $row['Fname'].' '.$row['Mname'];
                         })
                       ->rawColumns(['actions'])

                    ->make(true);
}

public function view_inspector_arhived(Request $request){
  $inspectorId = $request->inspectorId;
  $data = inspector::onlyTrashed()->where('inspectorId',$inspectorId)->get();
  return response()->json([
      'data'=>$data
  ]);
  
}
public function restorInspector(Request $request){
  $inspectorId =$request->inspectorId;
  $query=inspector::withTrashed()->find($inspectorId )->restore();
 if($query){
          return response()->json([
             'status'=>1,
             'msg'=>'data undone' 
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
