<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicant_account;
use DataTables;
class archivedController extends Controller
{
   public function archivedFetch(){
       $data = applicant_account::onlyTrashed()->get();
             
        return DataTables::of($data)
                          ->addIndexColumn()
                          ->addColumn('actions', function($row){
                                  return "
                                  

                                  <button type='button'  class='btn btn-defualt btn-xs sendArchive' id='".$row['accountId']."'><i class='fa fa-archive'></i></button>
                            
       

                 
                ";
                              })
                             ->rawColumns(['actions'])

                          ->make(true);
    }
    
}
