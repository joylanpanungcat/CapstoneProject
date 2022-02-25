<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
class Fallback extends Controller
{
    //

    public function return_fallback(){
        return redirect()->back();
    }
}
