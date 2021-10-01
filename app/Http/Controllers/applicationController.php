<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
use Storage;
use Illuminate\Support\Facades\validator;
class applicationController extends Controller
{
    //
    public function filesUpload(Request $request){
        // $files=$request->file('filenames');
        // if(!empty($files)){
        //     foreach($files as $file){
        //         // $name=time().rand(1,100).'.'.$file->extension();
        //         // $file->move(public_path('files'),$name);

        //     Storage::put($file->getClientOriginalName(),file_get_contents($file));
           

        //     }
        // }
$files=[];
      $files=$request->file('filenames');
    foreach($files as $file){
                $name=time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('files'),$name);
                $files[]=$name;
            }
        return response()->json([
            'data'=>$files
        ]);
        // print_r($request->all());
      // $validator= Validator::make($request->all(),[
      //       'filenames'=>'required',
      //       'filename.*'=>'required'
      //   ]);

        // $files=[];
            
            // foreach($request->file('filenames') as $file){
            //     $name=time().rand(1,100).'.'.$file->extension();
            //     $file->move(public_path('files'),$name);
            //     $files[]=$name;
            // }
    
        //  return response()->json([
        //     'status'=>1,
        //     'msg'=>$request->files
        // ]);
    
    // if($validator->fails())
    //   {
    //     return response()->json([
    //         'status'=>400,
    //         'errors'=>$validator->messages()
    //     ]);
    //   }else{
    //     $file = new application;
    //     $file->filenames=$files;
    //     $file->type_application='FSEC';
    //    $query= $file->save();

    //     if(!$query){
    //        return response()->json([
    //         'status'=>400,
    //         'msg'=>"Something went wrong!"
    //     ]);
    //     }else{
    //        return response()->json([
    //         'status'=>1,
    //         'msg'=>"Applicant successfully added!"
    //     ]);
    //     }
      

    //   }
        

    }
}
