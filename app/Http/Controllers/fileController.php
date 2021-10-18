<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fileController extends Controller
{
    //

    function fetch_file(Request $request){

        $ouput= "<table> 
            <tr>
                <th>Nice ka one
                </th>
            </tr>

        </table>";

        return $ouput;
    }
}
