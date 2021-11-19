<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\verifyController;
use App\Http\Controllers\applicantController;
use App\Http\Controllers\archivedController;
use App\Http\Controllers\applicationController;
use App\Http\Controllers\fileController;

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
    Route::post('getApplicantDetails',[applicantController::class,"getApplicantDetails"])->name('get.appplicant.details');
    Route::post('updateApplicant',[applicantController::class,"updateApplicant"])->name('update.appplicant');
  
    Route::get('applicant_profile/{id}',[applicantController::class,'viewApplicant'])->name('applicant_profile');

    // Applicant Profile
   Route::post('applicant_profile',[applicantController::class,'applicationRecord'])->name('application.record');

   //application
   Route::view('application','application');
   Route::post('/multi-uploads',[applicationController::class,'filesUpload'])->name('filesUpload');
   Route::get('/applicationFetch',[applicationController::class,'applicationFetch'])->name('applicationFetch');
Route::get('/application_profile/{id}',[applicationController::class,'viewApplication'])->name('application_profile');
   

    Route::post('/storeData',[applicationController::class,'storeData'])->name('storeData');
 
    Route::post('/storeimgae',[applicationController::class,'storeImage'])->name('storeimgae');
 //archive

 Route::post('swalert',[applicantController::class,'swalert'])->name('swalert');
 Route::view('account','account')->name('account');

 Route::post('account/restore/',[applicantController::class,'restore'])->name('restore');
 Route::view('archive','archive');
Route::get("archivedFetch",[archivedController::class,"archivedFetch"])->name('archivedFetch');


// file system
Route::post('fetch_file',[applicationController::class,"fetch_file"])->name('fetch_file');
Route::post('viewFolder',[applicationController::class,"viewFolder"])->name('viewFolder');
Route::post('addFolder',[applicationController::class,"addFolder"])->name('addFolder');

Route::post('addFile',[applicationController::class,"addFile"])->name('addFile');
Route::post('folderRename',[applicationController::class,"folderRename"])->name('folderRename');

Route::post('viewFolderDetails',[applicationController::class,"viewFolderDetails"])->name('viewFolderDetails');
Route::post('addDescription',[applicationController::class,"addDescription"])->name('addDescription');
Route::post('moveFolder',[applicationController::class,"moveFolder"])->name('moveFolder');

});





Route::group(['middleware'=>['alreadyLog']],function(){
    Route::get('/', function () {
    return view('login');
});
Route::post("verify",[verifyController::class,"login"]);

});


