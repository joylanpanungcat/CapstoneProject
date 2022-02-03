<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\application;
use App\Models\applicant;
use App\Models\address;
use App\Models\fileUpload;
use App\Models\folderUpload;
use App\Models\activity;

// use Storage;
use DataTables;
class reportsController extends Controller
{
    public function reports(Request $request){
        if(request()->ajax())
        {
         if($request->category != '' && empty($request->from_date) )
         {
            $data = application::with('applicant')
                     ->where('type_application','=',$request->category)
                     ->where('status','=','approved')
                     ->orderBy('applicationId','desc')
                     ->get();
                
         }
         elseif($request->from_date !='' && $request->category == '')
         {
          $data = application::with('applicant')
            ->whereBetween('date_apply', array($request->from_date, $request->to_date))
            ->where('status','=','approved')
            ->get();
         }
         elseif($request->category != '' && !empty($request->from_date))
         {
          $data = application::with('applicant')
          ->where('type_application','=',$request->category)
          ->where('status','=','approved')
          ->whereBetween('date_apply', array($request->from_date, $request->to_date))
          ->get();
         }
         else
         {
          $data = application::with('applicant')
                ->orderBy('applicationId','desc')
                ->where('status','=','approved')
                ->get();
         }
      
        }
        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
        
      }
}
