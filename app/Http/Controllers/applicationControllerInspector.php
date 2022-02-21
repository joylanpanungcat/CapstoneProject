<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
use App\Models\inspection_details;
use App\Models\schedule;

class applicationControllerInspector extends Controller
{
    //

    public function viewApplication(Request $request){
        $applicationId = $request->id;

        $data=application::
        join('applicant','applicant.applicantId','=','application.applicantId')
        ->join('address','address.applicationId','application.applicationId')
        ->where('application.applicationId',$applicationId)->get();


        return view('application_profile',['data'=>$data]);

    }

    public function inspection_inspected_view(Request $request){
        $applicationId = $request->id;
        $verify='verify';
        $data=application::
        join('applicant','applicant.applicantId','=','application.applicantId')
        ->join('address','address.applicationId','application.applicationId')
        ->join('inspection_details','inspection_details.applicationId','=','application.applicationId')
        ->where('application.applicationId',$applicationId)
    
        ->get();


        return view('inspector/application_inspected_profile',['data'=>$data]);
        
    }

    public function inspection_history_view(Request $request){
        $applicationId = $request->id;
        $verify='verify';
        $data=application::
        join('applicant','applicant.applicantId','=','application.applicantId')
        ->join('address','address.applicationId','application.applicationId')
        ->join('inspection_details','inspection_details.applicationId','=','application.applicationId')
        ->where('application.applicationId',$applicationId)
    
        ->get();


        return view('application_history_profile',['data'=>$data]);
    }
    

    public function inspect_application(Request $request){
        $applicationId =$request->id;

        $data =application::where('applicationId',$applicationId)->get();

        return view('inspect_application',['data'=>$data]);
    }

    public function inspect_application_record(Request $request){
        $applicationId = $request->applicationId;
        $inspectorId = session()->get('adminID')['inspectorId'];
        $date_inspect= date('y-m-d');
        $beams = $request->beams;
        $exterior = $request->exterior;
        $main_stair = $request->main_stair;
        $main_door = $request->main_door;
        $colums = $request->colums;
        $corridor_walls = $request->corridor_walls;
        $windows = $request->windows;
        $trussess = $request->trussess;
        $flooring = $request->flooring;
        $room_partitions = $request->room_partitions;
        $ceiling = $request->ceiling;
        $roof = $request->roof;
        $sectional_occupancy = $request->sectional_occupancy;
        $emergency_lights = $request->emergency_lights;
        $no_stinguisher = $request->no_stinguisher;
        $fire_alarm = $request->fire_alarm;
        $location_panel = $request->location_panel;
        $defects = $request->defects;
        $recommendation = $request->recommendation;
        $status = $request->status;
        $inspected='true';

        $inspection = new inspection_details;
        $inspection->inspectorId =$inspectorId;
        $inspection->applicationId =$applicationId;
        $inspection->date_inspect =$date_inspect;
        $inspection->beams =$beams;
        $inspection->exterior =$exterior;
        $inspection->main_stair =$main_stair;
        $inspection->main_door =$main_door;
        $inspection->colums =$colums;
        $inspection->corridor_walls =$corridor_walls;
        $inspection->windows =$windows;
        $inspection->trussess =$trussess;
        $inspection->flooring =$flooring;
        $inspection->room_partitions =$room_partitions;
        $inspection->ceiling =$ceiling;
        $inspection->roof =$roof;
        $inspection->sectional_occupancy =$sectional_occupancy;
        $inspection->emergency_lights =$emergency_lights;
        $inspection->no_stinguisher =$no_stinguisher;
        $inspection->fire_alarm =$fire_alarm;
        $inspection->location_panel =$location_panel;
        $inspection->defects =$defects;
        $inspection->recommendation =$recommendation;
        $inspection->status=$status;
        $inspection->save();

        $application = application::where('applicationId',$applicationId);
        $application->update([
            'inpector_id'=> $inspectorId
        ]);

        $schedule = schedule::where('inspectorId',$inspectorId)->where('applicationId',$applicationId);
        $schedule->update([
            'inspected'=>$inspected
        ]);


        return response()->json([
            'msg'=>'Inspection Successfully Recorded'
        ]);


    }

    public function update_inspected_application(Request $request){
        $applicationId= $request->applicationId;
        $beams = $request->beams;
        $exterior = $request->exterior;
        $main_stair = $request->main_stair;
        $main_door = $request->main_door;
        $colums = $request->colums;
        $corridor_walls = $request->corridor_walls;
        $windows = $request->windows;
        $trussess = $request->trussess;
        $flooring = $request->flooring;
        $room_partitions = $request->room_partitions;
        $ceiling = $request->ceiling;
        $roof = $request->roof;
        $sectional_occupancy = $request->sectional_occupancy;
        $emergency_lights = $request->emergency_lights;
        $no_stinguisher = $request->no_stinguisher;
        $fire_alarm = $request->fire_alarm;
        $location_panel = $request->location_panel;
        $defects = $request->defects;
        $recommendation = $request->recommendation;
        $status = $request->status;
        $status= $request->status;


        $data = inspection_details::where('applicationId',$applicationId);
        $data->update([
            'beams'=>$beams,
            'exterior'=>$exterior,
            'main_stair'=>$main_stair,
            'main_stair'=>$main_stair,
            'colums'=>$colums,
            'corridor_walls'=>$corridor_walls,
            'corridor_walls'=>$corridor_walls,
            'corridor_walls'=>$corridor_walls,
            'flooring'=>$flooring,
            'room_partitions'=>$room_partitions,
            'ceiling'=>$ceiling,
            'roof'=>$roof,
            'sectional_occupancy'=>$sectional_occupancy,
            'emergency_lights'=>$emergency_lights,
            'no_stinguisher'=>$no_stinguisher,
            'fire_alarm'=>$fire_alarm,
            'status'=>$status,
            'location_panel'=>$location_panel,
            'defects'=>$defects,
            'recommendation'=>$recommendation,
            'status'=>$status,
        ]);

        return response()->json([
            'msg'=>'Updated Successfully'
        ]);

    }

    public function profile_inspect(Request $request){
        $applicationId = $request->id;

        return view('inspect_application_page',['applicationId'=>$applicationId]);
    }


}
