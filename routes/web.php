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
use App\Http\Controllers\inspectorController;
use App\Http\Controllers\Fallback;

//applicant Controller
use App\Http\Controllers\registerController;
use App\Http\Controllers\fetchController;
use App\Http\Controllers\applicationControllerApplicant;

//inspector Controller
use App\Http\Controllers\inspectionController;
use App\Http\Controllers\applicationControllerInspector;
use App\Http\Controllers\loginController;

//notification
use App\Http\Controllers\NotificationController;

use App\Http\Controllers\dashboardController;
//Map

use App\Http\Controllers\mapController;
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

Route::view('fallback','admin.fallback')->name('fallback');
Route::get('return_fallback',[Fallback::class,'return_fallback'])->name('return_fallback');

//Group middleware page auth
Route::group(['middleware'=>['accessPage']],function(){
// Route::get("dashboard",[verifyController::class,"dashboard"]);
    Route::view('DashboardAdmin','admin/Dashboard')->name('DashboardAdmin');
    Route::get('getDashboard',[dashboardController::class,'dashboard'])->name('getDashboard');
    Route::get('fetch_dashboard',[verifyController::class,'fetch_dashboard'])->name('fetch_dashboard');
        //emergency
    Route::get('fetch_emergency',[verifyController::class,'fetch_emergency'])->name('fetch_emergency');
    Route::view('emergency_page','admin/emergency_page')->name('emergency_page');
    Route::get('emergency_view',[verifyController::class, 'emergency_view'])->name('emergency_view');
    Route::get('get_emergency',[verifyController::class,'get_emergency'])->name('get_emergency');
    Route::post('view_emergency',[verifyController::class,'view_emergency'])->name('view_emergency');
    Route::post('view_map_get_details',[verifyController::class,'view_map_get_details'])->name('view_map_get_details');

    Route::get("account",[applicantController::class,"account"]);
    Route::get("accountFetch",[applicantController::class,"accountFetch"])->name('accountFetch');
    Route::get("logoutAdmin",[verifyController::class,"logout"])->name('logoutAdmin');
    Route::post('addApplicant',[applicantController::class,"add"])->name('add.applicant');
    Route::post('loginApplicant',[applicantController::class,'loginApplicant']);
    Route::post('getApplicantDetails',[applicantController::class,"getApplicantDetails"])->name('get.appplicant.details');
    Route::post('updateApplicant',[applicantController::class,"updateApplicant"])->name('update.appplicant');

    Route::get('applicant_profile/{id}',[applicantController::class,'viewApplicant'])->name('applicant_profile');
    //fallback
    // Route::view('fallback','admin.fallback')->name('fallback');

    // Applicant Profile
   Route::post('applicant_profile',[applicantController::class,'applicationRecord'])->name('application.record');
   Route::post('update_info',[applicantController::class,'update_info'])->name('update_info');
   Route::post('view_business_info',[applicantController::class,'view_business_info'])->name('view_business_info');
   Route::post('update_business_info',[applicantController::class,'update_business_info'])->name('update_business_info');
   Route::post('set_schedule',[applicantController::class,'set_schedule'])->name('set_schedule');
   Route::post('payment_view',[applicantController::class,'payment_view'])->name('payment_view');
   Route::get('get_mobile_account',[applicantController::class,'get_mobile_account'])->name('get_mobile_account');
   Route::post('connect_mobile_account',[applicantController::class,'connect_mobile_account'])->name('connect_mobile_account');


   //application
   Route::view('admin/application','admin/application')->name('applicationAdmin');
   Route::post('/multi-uploads',[applicationController::class,'filesUpload'])->name('filesUpload');
   Route::get('/applicationFetch',[applicationController::class,'applicationFetch'])->name('applicationFetch');
    Route::get('admin/application_profile/{id}',[applicationController::class,'viewApplication'])->name('application_profile');
    Route::post('/storeData',[applicationController::class,'storeData'])->name('storeData');

    Route::post('/storeimgae',[applicationController::class,'storeImage'])->name('storeimgae');
    Route::post('/archieve_application',[applicationController::class,'archieve_application'])->name('archieve_application');
    Route::post('restore_application',[applicationController::class,'restore_application'])->name('restore_application');
    Route::post('view_inspection_report',[applicationController::class,'view_inspection_report'])->name('view_inspection_report');
    Route::post('view_inspection_report_single',[applicationController::class,'view_inspection_report_single'])->name('view_inspection_report_single');
    Route::post('udpateInspectionDetials',[applicationController::class,'udpateInspectionDetials'])->name('udpateInspectionDetials');
    Route::post('updateCertDetails',[applicationController::class,'updateCertDetails'])->name('updateCertDetails');
    Route::post('updateReceiptDetails',[applicationController::class,'updateReceiptDetails'])->name('updateReceiptDetails');
    Route::post('verify_inspection_report',[applicationController::class,'verify_inspection_report'])->name('verify_inspection_report');
    Route::post('print_certificate',[applicationController::class,'print_certificate'])->name('print_certificate');
    Route::get('applicationUpdateStatus',[applicationController::class,'applicationUpdateStatus'])->name('applicationUpdateStatus');
    Route::post('view_payment_history',[applicationController::class,'view_payment_history'])->name('view_payment_history');


    //Map
    Route::view('map','admin/map')->name('map');
    Route::get('fetch_application_map',[mapController::class,'fetch_application_map'])->name('fetch_application_map');
    //
    Route::view('schedule','admin/schedule')->name('schedule');

    //payment
    // Route::view('payment','admin/payment')->name('payment');
    Route::get('payment/{data}',[feesController::class, 'redirectPayment'])->name('payment');

    //schedule
    Route::get('scheduleList',[scheduleController::class,'scheduleList'])->name('scheduleList');
    Route::post('view_schedule',[scheduleController::class,'view_schedule'])->name('view_schedule');
    Route::post('cancel_schedule',[scheduleController::class,'cancel_schedule'])->name('cancel_schedule');
    Route::post('update_schedule',[scheduleController::class,'update_schedule'])->name('update_schedule');
    Route::post('search_scheduel',[scheduleController::class,'search_scheduel'])->name('search_scheduel');
    Route::post('select_schedule',[scheduleController::class,'select_schedule'])->name('select_schedule');
    Route::post('add_schedule_action',[scheduleController::class,'add_schedule_action'])->name('add_schedule_action');

    //assessment
    Route::view('assessment','admin/assessment')->name('assessment');
    Route::get('assessmentSearch/{name}',[applicationController::class,'assessmentSearch'])->name('assessmentSearch');
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
    Route::post('printPayment',[feesController::class,'printPayment'])->name('printPayment');
    Route::post('deleteAssessment',[feesController::class,'deleteAssessment'])->name('deleteAssessment');
    Route::post('updateReceiptDetailsPayment',[feesController::class,'updateReceiptDetailsPayment'])->name('updateReceiptDetailsPayment');



 //archive
 Route::post('swalert',[applicantController::class,'swalert'])->name('swalert');
 Route::view('account','admin/account')->name('account');

 Route::post('account/restore/',[applicantController::class,'restore'])->name('restore');
 Route::view('archive','admin/archive')->name('archive');
Route::get("archivedFetch",[archivedController::class,"archivedFetch"])->name('archivedFetch');
Route::post("view_account_archived",[archivedController::class,"view_account_archived"])->name('view_account_archived');
Route::post("restore_account_user",[archivedController::class,"restore_account_user"])->name('restore_account_user');
Route::get("fetchApplication",[archivedController::class,"fetchApplication"])->name('fetchApplication');
Route::post("view_applicationAdmin",[archivedController::class,"view_application"])->name('view_applicationAdmin');
Route::post("restoreApplication",[archivedController::class,"restoreApplication"])->name('restoreApplication');
Route::get("inspector_fetch_achived",[archivedController::class,"inspector_fetch_achived"])->name('inspector_fetch_achived');
Route::get("schedule_fetch_archived",[archivedController::class,"schedule_fetch_archived"])->name('schedule_fetch_archived');
Route::post("restore_schedule",[archivedController::class,"restore_schedule"])->name('restore_schedule');

Route::post("view_inspector_arhived",[archivedController::class,"view_inspector_arhived"])->name('view_inspector_arhived');
Route::post("restorInspector",[archivedController::class,"restorInspector"])->name('restorInspector');
Route::get('fees_fetch_archived',[archivedController::class,'fees_fetch_archived'])->name('fees_fetch_archived');
Route::post("restoreFee",[archivedController::class,"restoreFee"])->name('restoreFee');


//renewal

Route::view('renewal_application_main','admin/renewal_application_main')->name('renewal_application_main');
Route::get("renewalController",[renewalController::class,"renewal_application_fetch"])->name('renewalController');
Route::post("view_renewal_application",[renewalController::class,"view_renewal_application"])->name('view_renewal_application');
Route::post("application_notif",[renewalController::class,"application_notif"])->name('application_notif');
Route::post("renewal_notif",[renewalController::class,"renewal_notif"])->name('renewal_notif');
Route::post("renew_application_action",[renewalController::class,"renew_application_action"])->name('renew_application_action');

//inspector
Route::view('inspector','admin/inspector')->name('inspector');
Route::get('inspector_fetch',[inspectorController::class,'inspector_fetch'])->name('inspector_fetch');
Route::post('view_inspector',[inspectorController::class,'view_inspector'])->name('view_inspector');
Route::post('update_inspector',[inspectorController::class,'update_inspector'])->name('update_inspector');
Route::post('add_inspectoradd_inspector',[inspectorController::class,'add_inspector'])->name('add_inspector');
Route::post('archive_inspector',[inspectorController::class,'archive_inspector'])->name('archive_inspector');

//maintenance
Route::view('maintenance','admin/maintenance')->name('maintenance');
Route::get('fetch_default_fees',[maintenanceController::class,'fetch_default_fees'])->name('fetch_default_fees');
Route::post('view_main_fees',[maintenanceController::class,'view_main_fees'])->name('view_main_fees');
Route::post('update_main_fees',[maintenanceController::class,'update_main_fees'])->name('update_main_fees');
Route::post('view_other_fees',[maintenanceController::class,'view_other_fees'])->name('view_other_fees');
Route::post('update_other_fees',[maintenanceController::class,'update_other_fees'])->name('update_other_fees');
Route::post('view_authority',[maintenanceController::class,'view_authority'])->name('view_authority');
Route::post('update_authority',[maintenanceController::class,'update_authority'])->name('update_authority');
Route::post('add_main_fee',[maintenanceController::class,'add_main_fee'])->name('add_main_fee');
Route::post('add_other_fee',[maintenanceController::class,'add_other_fee'])->name('add_other_fee');
Route::post('delete_fees',[maintenanceController::class,'delete_fees'])->name('delete_fees');


// file system
Route::post('fetch_file',[applicationController::class,"fetch_file"])->name('fetch_file');
Route::post('viewFolder',[applicationController::class,"viewFolder"])->name('viewFolder');
Route::post('addFolder',[applicationController::class,"addFolder"])->name('addFolder');
Route::post('verifiedFile',[applicationController::class,"verifiedFile"])->name('verifiedFile');
Route::post('declineFile',[applicationController::class,"declineFile"])->name('declineFile');
Route::post('downloadFile',[applicationController::class,"downloadFile"])->name('downloadFile');

Route::post('addFile',[applicationController::class,"addFile"])->name('addFile');
Route::post('folderRename',[applicationController::class,"folderRename"])->name('folderRename');

Route::post('viewFolderDetails',[applicationController::class,"viewFolderDetails"])->name('viewFolderDetails');
Route::post('addDescription',[applicationController::class,"addDescription"])->name('addDescription');
Route::post('moveFolder',[applicationController::class,"moveFolder"])->name('moveFolder');
Route::post('moveToFolder',[applicationController::class,"moveToFolder"])->name('moveToFolder');
Route::post('moveFolderToSelected',[applicationController::class,"moveFolderToSelected"])->name('moveFolderToSelected');

Route::post('moveViewParentFolderId',[applicationController::class,"moveViewParentFolderId"])->name('moveViewParentFolderId');

//list

Route::view('approved_application','admin/approved_application')->name('approved_application');
Route::view('rejected_application','admin/rejected_application')->name('rejected_application');
Route::view('renewal_application','admin/renewal_application')->name('renewal_application');


//reports
Route::get('reports',[reportsController::class,'reports'])->name('reports');
Route::get('rejected_reports',[reportsController::class,'rejected_reports'])->name('rejected_reports');
Route::get('renewal_reports',[reportsController::class,'renewal_reports'])->name('renewal_reports');

Route::view('fsic_occupancy_report','admin/fsic_occupancy_report')->name('fsic_occupancy_report');
Route::view('fsic_business_report','admin/fsic_business_report')->name('fsic_business_report');
Route::view('fsec_report','admin/fsec_report')->name('fsec_report');
//notification
Route::view('notification','admin/notification')->name('notification');
Route::get('get_application_notification',[NotificationController::class,'get_application_notification' ])->name('get_application_notification');
Route::post('get_sms_details',[NotificationController::class,'get_sms_details' ])->name('get_sms_details');
Route::post('send_notification',[NotificationController::class,'send_notification' ]);
Route::get('verify_phone',[NotificationController::class,'verify_phone' ]);
Route::get('request_verify',[NotificationController::class,'request_verify' ]);

//certificate
Route::view('certificate','admin/certificate')->name('certificate');

//autocomplete search
Route::get('getApplicant',[applicantController::class,'getApplicant'])->name('getApplicant');
Route::get('getDefault',[applicantController::class,'getDefault'])->name('getDefault');
});

//applicant Middleware
Route::group(['middleware'=>['accessPageApplicant']],function(){
    Route::get("logoutApplicant",[verifyController::class,"logoutApplicant"]);
    // Route::get("dashboard",[verifyController::class,"dashboard"]);
    Route::view('dashboard','applicant.Dashboard')->name('Dashboard');
    Route::get("logout",[verifyController::class,"logoutApplicant"])->name('logout');
    // register

    //application
    Route::view('application','applicant.application')->name('application');
    Route::get('fetch_application',[fetchController::class,'fetch_application'])->name('fetch_application');
    Route::view('add_application','applicant.add_application')->name('add_application');
    Route::post('add_appllication_action',[applicationControllerApplicant::class,'add_appllication_action'])->name('add_appllication_action');
    Route::post('update_application',[applicationControllerApplicant::class,'update_application'])->name('update_application');
    Route::post('delete_application',[applicationControllerApplicant::class,'delete_application'])->name('delete_application');

    //profile
    Route::get('profile',[fetchController::class,'profile_fetch'])->name('profile');
    Route::post('update_profile',[applicationControllerApplicant::class,'update_profile'])->name('update_profile');
    Route::get('application/view/{id}',[applicationControllerApplicant::class,'view_application'])->name('view_application');

    //dashboard
    Route::get('Dashboard_fetch',[fetchController::class,'Dashboard_fetch'])->name('Dashboard_fetch');
    // Route::get('Dashboard_fetch',[fetchController::class,'Dashboard_fetch'])->name('Dashboard_fetch');
    Route::post('connect_account',[applicationControllerApplicant::class,'connect_account'])->name('connect_account');
    //renewal
    Route::view('renewal','applicant.renewal')->name('renewal');
    Route::get('fetch_renewal',[fetchController::class,'fetch_renewal'])->name('fetch_renewal');
    Route::get('renewal/view/{id}',[applicationControllerApplicant::class,'view_renewal'])->name('view_application');
    Route::post('send_emergency',[applicationControllerApplicant::class,'send_emergency'])->name('send_emergency');
});

//inspector Middleware
Route::group(['middleware'=>['accessPageInspector']],function(){
    Route::view('dashboard_inspector','inspector.Dashboard')->name('dashboard_inspector');
    Route::get("logoutInspector",[verifyController::class,"logoutInspector"])->name('logoutInspector');
    // Route::get("dashboard",[verifyController::class,"dashboard"]);
    //dashboard
    Route::get('Dashboard_fetch_Inspector',[inspectionController::class,'Dashboard_fetch'])->name('Dashboard_fetch_Inspector');
    //for inspection
        Route::view('for_inspection','inspector/for_inspection')->name('for_inspection');
        Route::get('fetch_inspection',[inspectionController::class,'fetch_inspection'])->name('fetch_inspection');
    //application profile
    Route::get('/application_profile_inspector/{id}',[applicationControllerInspector::class,'viewApplication'])->name('application_profile');
    Route::post('inspect_application_record',[applicationControllerInspector::class,'inspect_application_record'])->name('inspect_application_record');
    // inspection history
    Route::view('inspection_history','inspector/inspection_history')->name('inspection_history');
    Route::get('fetch_history_application',[inspectionController::class,'fetch_history_application'])->name('fetch_history_application');
    Route::get('/inspection_history/application/{id}',[applicationControllerInspector::class,'inspection_history_view']);

    //inspected application
    Route::view('inspected_application','inspector/inspected_application')->name('inspected_application');
    Route::get('fetch_inspected_application',[inspectionController::class,'fetch_inspected_application'])->name('fetch_inspected_application');
    Route::get('/inspected/application/{id}',[applicationControllerInspector::class,'inspection_inspected_view']);
    Route::post('update_inspected_application',[applicationControllerInspector::class,'update_inspected_application'])->name('update_inspected_application');
    Route::get('application_profile_inspector/inspect/{id}',[applicationControllerInspector::class,'profile_inspect']);
    //profile
    Route::get('profile_view',[inspectionController::class,'profile_view'])->name('profile_view');
    Route::post('update_inspector',[inspectionController::class,'update_inspector'])->name('update_inspector');

});

Route::group(['middleware'=>['alreadyLog']],function(){
    Route::get('/', function () {
        return view('login');
        });
    Route::post("verify",[verifyController::class,"login"]);
    Route::post('verify_username',[registerController::class,'verify_username']);
    Route::post('register_applicant',[registerController::class,'register_applicant']);
    Route::view('register','applicant.register')->name('register');
});





