<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\verifyController;
use App\Http\Controllers\applicantController;
use App\Http\Controllers\archivedController;
use App\Http\Controllers\applicationController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\feesController;
use App\Http\Controllers\reportsController;
use App\Http\Controllers\scheduleController;
use App\Http\Controllers\renewalController;
use App\Http\Controllers\maintenanceController;


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

// Route::view('sample','sample');



//Group middleware page auth
Route::group(['middleware'=>['accessPage']],function(){
// Route::get("dashboard",[verifyController::class,"dashboard"]);
    Route::view('dashboard','Dashboard')->name('Dashboard');
    Route::get("account",[applicantController::class,"account"]);
    Route::get("accountFetch",[applicantController::class,"accountFetch"])->name('accountFetch');
    Route::get("logout",[verifyController::class,"logout"]);
    Route::post('addApplicant',[applicantController::class,"add"])->name('add.applicant');
    Route::post('loginApplicant',[applicantController::class,'loginApplicant']);
    Route::post('getApplicantDetails',[applicantController::class,"getApplicantDetails"])->name('get.appplicant.details');
    Route::post('updateApplicant',[applicantController::class,"updateApplicant"])->name('update.appplicant');
  
    Route::get('applicant_profile/{id}',[applicantController::class,'viewApplicant'])->name('applicant_profile');

    // Applicant Profile
   Route::post('applicant_profile',[applicantController::class,'applicationRecord'])->name('application.record');
   Route::post('update_info',[applicantController::class,'update_info'])->name('update_info');
   Route::post('view_business_info',[applicantController::class,'view_business_info'])->name('view_business_info');
   Route::post('update_business_info',[applicantController::class,'update_business_info'])->name('update_business_info');
   Route::post('set_schedule',[applicantController::class,'set_schedule'])->name('set_schedule');
   Route::post('payment_view',[applicantController::class,'payment_view'])->name('payment_view');
   
   
   //application
   Route::view('application','application')->name('application');
   Route::post('/multi-uploads',[applicationController::class,'filesUpload'])->name('filesUpload');
   Route::get('/applicationFetch',[applicationController::class,'applicationFetch'])->name('applicationFetch');
    Route::get('/application_profile/{id}',[applicationController::class,'viewApplication'])->name('application_profile');
    Route::post('/storeData',[applicationController::class,'storeData'])->name('storeData');
 
    Route::post('/storeimgae',[applicationController::class,'storeImage'])->name('storeimgae');
    Route::post('/archieve_application',[applicationController::class,'archieve_application'])->name('archieve_application');
    Route::post('restore_application',[applicationController::class,'restore_application'])->name('restore_application');
    //Map 
    Route::view('map','map')->name('map');
    //
    Route::view('schedule','schedule')->name('schedule');

    //payment
    Route::view('payment','payment')->name('payment');

    //schedule
    Route::get('scheduleList',[scheduleController::class,'scheduleList'])->name('scheduleList');
    Route::post('view_schedule',[scheduleController::class,'view_schedule'])->name('view_schedule');
    Route::post('cancel_schedule',[scheduleController::class,'cancel_schedule'])->name('cancel_schedule');
    Route::post('update_schedule',[scheduleController::class,'update_schedule'])->name('update_schedule');
    
    //assessment
    Route::view('assessment','assessment')->name('assessment');
    Route::post('load_fees',[feesController::class,'load_fees'])->name('load_fees');
    Route::post('search_applicant_fetch',[feesController::class,'search_applicant_fetch'])->name('search_applicant_fetch');
    Route::post('select_applicant_fetch',[feesController::class,'select_applicant_fetch'])->name('select_applicant_fetch');
    Route::post('select_fees',[feesController::class,'select_fees'])->name('select_fees');
    Route::post('numberTowords',[feesController::class,'numberTowords'])->name('numberTowords');
    Route::post('save_assessment',[feesController::class,'save_assessment'])->name('save_assessment');
    Route::post('udpate_account_code',[feesController::class,'udpate_account_code'])->name('udpate_account_code');
    Route::post('assessment_total',[feesController::class,'assessment_total'])->name('assessment_total');
    Route::post('search_assessment',[feesController::class,'search_assessment'])->name('search_assessment');
    Route::post('select_assessment',[feesController::class,'select_assessment'])->name('select_assessment');
    Route::post('save_payment',[feesController::class,'save_payment'])->name('save_payment');
    
    
    
 //archive
 Route::post('swalert',[applicantController::class,'swalert'])->name('swalert');
 Route::view('account','account')->name('account');

 Route::post('account/restore/',[applicantController::class,'restore'])->name('restore');
 Route::view('archive','archive')->name('archive');
Route::get("archivedFetch",[archivedController::class,"archivedFetch"])->name('archivedFetch');
Route::post("view_account_archived",[archivedController::class,"view_account_archived"])->name('view_account_archived');
Route::post("restore_account_user",[archivedController::class,"restore_account_user"])->name('restore_account_user');
Route::get("fetchApplication",[archivedController::class,"fetchApplication"])->name('fetchApplication');
Route::post("view_application",[archivedController::class,"view_application"])->name('view_application');
Route::post("restoreApplication",[archivedController::class,"restoreApplication"])->name('restoreApplication');

//renewal

Route::view('renewal_application_main','renewal_application_main')->name('renewal_application_main');
Route::get("renewalController",[renewalController::class,"renewal_application_fetch"])->name('renewalController');
Route::post("view_renewal_application",[renewalController::class,"view_renewal_application"])->name('view_renewal_application');
Route::post("renew_application_action",[renewalController::class,"renew_application_action"])->name('renew_application_action');

//maintenance
Route::view('maintenance','maintenance')->name('maintenance');
Route::get('fetch_default_fees',[maintenanceController::class,'fetch_default_fees'])->name('fetch_default_fees');
Route::post('view_main_fees',[maintenanceController::class,'view_main_fees'])->name('view_main_fees');
Route::post('update_main_fees',[maintenanceController::class,'update_main_fees'])->name('update_main_fees');
Route::post('view_other_fees',[maintenanceController::class,'view_other_fees'])->name('view_other_fees');
Route::post('update_other_fees',[maintenanceController::class,'update_other_fees'])->name('update_other_fees');
Route::post('view_authority',[maintenanceController::class,'view_authority'])->name('view_authority');
Route::post('update_authority',[maintenanceController::class,'update_authority'])->name('update_authority');
Route::post('add_main_fee',[maintenanceController::class,'add_main_fee'])->name('add_main_fee');
Route::post('add_other_fee',[maintenanceController::class,'add_other_fee'])->name('add_other_fee');


// file system
Route::post('fetch_file',[applicationController::class,"fetch_file"])->name('fetch_file');
Route::post('viewFolder',[applicationController::class,"viewFolder"])->name('viewFolder');
Route::post('addFolder',[applicationController::class,"addFolder"])->name('addFolder');

Route::post('addFile',[applicationController::class,"addFile"])->name('addFile');
Route::post('folderRename',[applicationController::class,"folderRename"])->name('folderRename');

Route::post('viewFolderDetails',[applicationController::class,"viewFolderDetails"])->name('viewFolderDetails');
Route::post('addDescription',[applicationController::class,"addDescription"])->name('addDescription');
Route::post('moveFolder',[applicationController::class,"moveFolder"])->name('moveFolder');
Route::post('moveToFolder',[applicationController::class,"moveToFolder"])->name('moveToFolder');
Route::post('moveFolderToSelected',[applicationController::class,"moveFolderToSelected"])->name('moveFolderToSelected');

Route::post('moveViewParentFolderId',[applicationController::class,"moveViewParentFolderId"])->name('moveViewParentFolderId');

//list 

Route::view('approved_application','approved_application')->name('approved_application');
Route::view('rejected_application','rejected_application')->name('rejected_application');
Route::view('renewal_application','renewal_application')->name('renewal_application');


//reports
Route::get('reports',[reportsController::class,'reports'])->name('reports');
Route::get('rejected_reports',[reportsController::class,'rejected_reports'])->name('rejected_reports');
Route::get('renewal_reports',[reportsController::class,'renewal_reports'])->name('renewal_reports');
});







Route::group(['middleware'=>['alreadyLog']],function(){
    Route::get('/', function () {
    return view('login');
});
Route::post("verify",[verifyController::class,"login"]);

});


