<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\applicantController;
use App\Http\Controllers\api\loginController;
use App\Http\Controllers\api\register;
use App\Http\Controllers\api\applicantAppController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::apiResource('applicant',applicantController::class);

Route::prefix('/user')->group(function(){
    Route::post('/login',[loginController::class,'login']);
    Route::post('/register',[register::class,'register_applicant']);

    Route::group([
        'middleware' => 'auth:api'
      ], function() {
          Route::get('getUser', [loginController::class,'user']);
          Route::post('updateUser', [applicantAppController::class,'updateUser']);
          Route::post('addApplication', [applicantAppController::class,'addApplication']);
          Route::get('getApplication', [applicantAppController::class,'getApplication']);
          Route::post('getApplicationRenewal', [applicantAppController::class,'getApplicationRenewal']);
          Route::post('checkApplication', [applicantAppController::class,'checkApplication']);
          Route::post('sendEmergency', [applicantAppController::class,'sendEmergency']);

          Route::post('viewApplication', [applicantAppController::class,'viewApplication']);
          Route::post('updateApplication', [applicantAppController::class,'updateApplication']);
          Route::post('deleteApplication', [applicantAppController::class,'deleteApplication']);
          Route::post('searchApplication', [applicantAppController::class,'searchApplication']);
          Route::post('connectAccount', [applicantAppController::class,'connectAccount']);

          Route::get('logout', [loginController::class,'logout']);

      });
});

Route::apiResource('applicantAcountDetails',loginController::class);
