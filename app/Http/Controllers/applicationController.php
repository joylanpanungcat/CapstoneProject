<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
use Storage;
use Illuminate\Support\Facades\validator;
class applicationController extends Controller
{
    //

    public function storeData(Request $request) {
        $Fname=$request->Fname;
        try {
            $user = new application;
            $user->Fname = $request->Fname;
            $user->filenames='';
            $user->save();
            $user_id = $user->applicationId; // this give us the last inserted record id
        }
        catch (\Exception $e) {
            return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
        }
        return response()->json(['status'=>"success", 'user_id'=>$user_id, 'Fname'=>$Fname]);
        
    }
    public function storeImage(Request $request)
    {
        $Fname =$request->Fname;
        if($request->file('file')){

            $img = $request->file('file');

            //here we are geeting userid alogn with an image
            $userid = $request->userid;

            $files=[];
       $path= mkdir(public_path().'/files/'.$Fname);
        foreach($img as $file){
                    $name=time().rand(1,100).'.'.$file->extension();
               // $imageName = strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
                   $file->move(public_path().'/files/'.$Fname,$name);
                    $files[]=$name;     
                }
 
         
            // $user_image = new application();
            // $original_name = $img->getClientOriginalName();
            // $user_image->filenames = $imageName;

            // if(!is_dir(public_path() . '/uploads/images/')){
            //     mkdir(public_path() . '/uploads/images/', 0777, true);
            // }

        // $request->file('file')->move(public_path() . '/uploads/images/', $imageName);

        // we are updating our image column with the help of user id
        // $user_image->where('applicationId', $userid)->update(['filenames'=>$imageName]);

        return response()->json(['status'=>"success",'imgdata'=>$files,'userid'=>$userid]);
        }
    }

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
