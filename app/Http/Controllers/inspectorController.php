<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inspector;
use DataTables;
class inspectorController extends Controller
{
    //

      public function inspector_fetch(Request $request){

        $data=inspector::get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('name', function($row){
          return $row['Fname'].' '.$row['Mname'].'.  '.$row['Lname'];
         })
        ->addColumn('actions', function($row){
              return "
              <button type='button'  class='btn btn-defualt btn-xs actionButton archived' id='".$row['inspectorId']."'><i class='fa fa-archive'></i></button>
              <button type='button' name='update' class='btn btn-defualt actionButton  btn-xs update' id='".$row['inspectorId']."' ><i class='fa fa-eye'></i></button>
              " ;
          })
          ->rawColumns(['actions'])
        ->make(true);
        
      }

    public function view_inspector(Request $request){
        $inspectorId=$request->inspectorId;

        $data= inspector::where('inspectorId',$inspectorId)->get();

        return response()->json([
            'data'=>$data
        ]);
    }
    public function update_inspector(Request $request){
        $inspectorId =$request->inpectorId;
        $Fname =$request->Fname;
        $Lname =$request->Lname;
        $Position =$request->Position;
        $username =$request->username;
        $password =$request->password;

        $data= inspector::where('inspectorId',$inspectorId);
        $data->update([
            'Fname'=>$Fname,
            'Lname'=>$Lname,
            'Position'=>$Position,
            'username'=>$username,
            'password'=>$password,
        ]);

        return response()->json([
            'msg'=>'Updated Successfully '
        ]);
    }

public function add_inspector(Request $request){


    $inspector = new inspector;
    $inspector->Fname =$request->Fname;
    $inspector->Lname =$request->Lname;
    $inspector->Position =$request->Position;
    $inspector->username =$request->username;
   $inspector->password =$request->password;
   $query= $inspector->save();

   if($query){
       return response()->json([
           'msg'=>'Inspector Successfully Addedd!'
       ]);
   }
}

public function archive_inspector(Request $request){
    $inspectorId =$request->inspectorId;
    $query= inspector::find($inspectorId)->delete();
   
    if($query){
           return response()->json([
              'status'=>1,
              'msg'=>'data archived' 
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
