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
        'middleware' => 'auth:api-applicant'
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
Route::prefix('/inspector')->group(function(){
    Route::post('/login',[loginController::class,'loginInspector']);
    Route::group([
        'middleware' => 'auth:api-applicant'
    ],function(){
        Route::get('logout', [loginController::class,'logoutInspector']);
        Route::post('getProfile', [applicantAppController::class,'getProfileInspector']);
        Route::post('updateInspectorProfile', [applicantAppController::class,'updateInspectorProfile']);
        Route::post('getApplication', [applicantAppController::class,'getApplicationInspector']);
        Route::post('getInspectionHistory', [applicantAppController::class,'getInspectionHistory']);
        Route::post('getReinspection', [applicantAppController::class,'getReinspection']);
        // Route::post('getNoticeToComply', [applicantAppController::class,'getNoticeToComply']);
        Route::post('getInspectionDetails', [applicantAppController::class,'getInspectionDetails']);
        Route::post('getCorrectViolation', [applicantAppController::class,'getCorrectViolation']);
        // Route::post('getComplied', [applicantAppController::class,'getComplied']);
        Route::post('compliedAction', [applicantAppController::class,'compliedAction']);
        Route::post('compliedCorrectViolation', [applicantAppController::class,'compliedCorrectViolation']);
        Route::post('removeCorrectViolation', [applicantAppController::class,'removeCorrectViolation']);
        Route::post('removeComplied', [applicantAppController::class,'removeComplied']);
        Route::post('getInspectionHistoryDetails', [applicantAppController::class,'getInspectionHistoryDetails']);
        Route::post('updateInspectionDetails', [applicantAppController::class,'updateInspectionDetails']);
        Route::post('deleteInspectionDetails', [applicantAppController::class,'deleteInspectionDetails']);
        Route::post('viewApplication', [applicantAppController::class,'viewApplicationInspector']);
        Route::post('addNoticeToCorrect', [applicantAppController::class,'addNoticeToCorrect']);
        Route::post('updateNoticeToComplyApproved', [applicantAppController::class,'updateNoticeToComplyApproved']);
        Route::post('updateCorrectViolation', [applicantAppController::class,'updateCorrectViolation']);
        Route::post('inspectionReport', [applicantAppController::class,'inspectionReport']);
        Route::post('searchApplicationForInspection', [applicantAppController::class,'searchApplicationForInspection']);
        Route::post('searchApplicationInspectionHistory', [applicantAppController::class,'searchApplicationInspectionHistory']);

    });
});
Route::apiResource('applicantAcountDetails',loginController::class);
