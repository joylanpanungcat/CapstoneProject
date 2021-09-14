<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Session;

class verifyController extends Controller
{
    //
    public function login(Request $req){
       $req->validate([
        'username'=>'required',
        'password'=>'required'
       ]);
       $admin=admin::where('username','=',$req->username)->first();

       if($admin){
            if($req->password==$admin->password){
                $req->session()->put('adminID',$admin->adminID);
                return redirect("dashboard");
            }else{
                 return back()->with('error',"Invalid Inputs");
            }
         }else{
        return back()->with('error',"Invalid Inputs");
       }
    }
    public function dashboard(){
        $data=array();
        if(Session::has('adminID')){
            $data=admin::where('adminID','=',Session::get('adminID'))->first();
        }
        return view('Dashboard',compact('data'));
    }
     public function account(){
        // $data=array();
        // if(Session::has('adminID')){
        //     $data=admin::where('adminID','=',Session::get('adminID'))->first();
        // }
        return view('account');
    }
    
    public function logout(){
        if(Session::has('adminID')){
            Session::pull('adminID');
            return redirect('/');
        }
    }
  

}
