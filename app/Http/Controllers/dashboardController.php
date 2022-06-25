<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\application;
use DB;
use Carbon\Carbon;

class dashboardController extends Controller
{
    //
    public function dashboard(Request $request){
        $labels =["Approved Application","Rejected Applications","Renewal Application"];

        if($request->from_date == '' && $request->to_date == '' ){
            // ->whereBetween('date_apply', array($request->from_date, $request->to_date))
            $countApproved = application::where('status','=','approved')->orWhere('status','=','renewed')
            ->count();
            $countRejected =application::where('status','=','rejected')
            ->count();
            $countRenewal = application::where('status','=','renewal')
            ->count();
        }else{
            $countApproved = application::where(function($query){
                $query->where('status','=','approved')->orWhere('status','=','renewed');
            })
            ->whereBetween('date_apply', array($request->from_date, $request->to_date))
            ->count();
            $countRejected = application::where(function($query){
                $query->where('status','=','rejected');
            })
            ->whereBetween('date_apply', array($request->from_date, $request->to_date))
            ->count();
            $countRenewal = application::where(function($query){
                $query->where('status','=','renewal');
            })
            ->whereBetween('date_apply', array($request->from_date, $request->to_date))
            ->count();

        }
    return response()->json([
        'labels'=>$labels,
        'countApproved'=>$countApproved,
        'countRejected'=>$countRejected,
        'countRenewal'=>$countRenewal,
    ]);
    }
}
