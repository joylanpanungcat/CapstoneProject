<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\verifyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/welcome', function () {
    return view('welcome');
});



Route::get("logout",[verifyController::class,"logout"]);




//Group middleware page auth
Route::group(['middleware'=>['accessPage']],function(){
Route::get("dashboard",[verifyController::class,"dashboard"]);
Route::get("account",[verifyController::class,"account"]);

});
Route::group(['middleware'=>['alreadyLog']],function(){
    Route::get('/', function () {
    return view('login');
});
Route::post("verify",[verifyController::class,"login"]);

});


