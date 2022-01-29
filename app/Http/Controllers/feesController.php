<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee;

class feesController extends Controller
{
    //
    public function load_fees(Request $req){
        $data= fee::all();
        foreach($data as $item){
            
        }

        return response()->json([
           'data'=>$data
        ]);
    }
}
