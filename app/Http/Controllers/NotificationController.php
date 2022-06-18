<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\address;
use App\Models\applicant;
use App\Models\application;
use App\Models\notification;
use Illuminate\Support\Facades\DB;

use DataTables;
use Carbon\Carbon;
class NotificationController extends Controller
{
    //
    public function verify_phone(){
        $basic  = new \Vonage\Client\Credentials\Basic("eb74c35e", "0NLSlXZ50dX5KTQP");
        $client = new \Vonage\Client(new \Vonage\Client\Credentials\Container($basic));
        $request = new \Vonage\Verify\Request('+639759720703', "Vonage");
        $response = $client->verify()->start($request);
    echo "Started verification, `request_id` is " . $response->getRequestId();
    }
    public function request_verify(){
        $basic  = new \Vonage\Client\Credentials\Basic("eb74c35e", "0NLSlXZ50dX5KTQP");
        $client = new \Vonage\Client(new \Vonage\Client\Credentials\Container($basic));
        $result = $client->verify()->check('aefb21d75a0d4f2b9cb56021eae990dd', '9731');
        var_dump($result->getResponseData());
    }
    public function send_notification(Request $request){
        $applicationId = $request->applicationId;
        $contact_num = $request->contact_num;
        $message_body_sms = $request->message_body_sms;

        $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
                    ->where('application.applicationId',$applicationId)
                    ->where('contact_num',$contact_num)
                    ->count();
        if($data > 0){
           $number_code= "63";
           $trim_number = substr($contact_num, 1);
           $receiverNumber = $number_code.$trim_number;

           $basic  = new \Vonage\Client\Credentials\Basic("eb74c35e", "0NLSlXZ50dX5KTQP");
            $client = new \Vonage\Client($basic);
            $response = $client->sms()->send(
                    new \Vonage\SMS\Message\SMS($receiverNumber, 'BRAND_NAME',$message_body_sms)
                );

        $message = $response->current();
        $notifcation = new notification;
        $notifcation->application_id = $applicationId;
        $notifcation->message = $message_body_sms;
        $notifcation->date_send = Carbon::now()->format('Y-m-d H:i:s');
        $notifcation->save();


            if ($message->getStatus() == 0) {
                return response()->json([
                    'msg'=>'SMS Sent Successfully.'
                ]);
            } else {
                echo "The message failed with status: " . $message->getStatus() . "\n";
            }





                // try {
                //     $account_sid = getenv("TWILIO_SID");
                //     $auth_token = getenv("TWILIO_TOKEN");
                //     $twilio_number = getenv("TWILIO_FROM");

                //     $client = new Client($account_sid, $auth_token);
                //     $client->messages->create($receiverNumber, [
                //         'from' => $twilio_number,
                //         'body' => $message_body_sms]);

                //     $notifcation = new notification;
                //     $notifcation->application_id = $applicationId;
                //     $notifcation->message = $message_body_sms;
                //     $notifcation->date_send = Carbon::now()->format('Y-m-d H:i:s');
                //     $notifcation->save();


                //     return response()->json([
                //         'msg'=>'SMS Sent Successfully.'
                //     ]);

                //     } catch (Exception $e) {
                //         dd("Error: ". $e->getMessage());
                //     }
            }

    }

    public function get_application_notification(Request $request){
        $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
                ->join('address','address.applicationId','=','application.applicationId')
                ->select('application.applicationId','type_application','application.accountId','Fname','Mname','Lname','address.purok','address.barangay','address.city')
                ->get();

    return DataTables::of($data)
    // return DataTables::of($data)
    ->addIndexColumn()
    ->addColumn('name', function($row){
      return $row['Fname'].' '.$row['Mname'].'.  '.$row['Lname'];
     })
     ->addColumn('address', function($row){
        return $row['purok'].' '.$row['barangay'].'.  '.$row['city'];
       })

    ->addColumn('actions', function($row){
        return " <button type='button'  class='btn btn-success btn-sm send_sms'  id='".$row['applicationId']."'>Send SMS</button>
  ";
       })
       ->rawColumns(['actions'])
    ->make(true);

  }

  public function get_sms_details(Request $request){
     $applicationId = $request->applicationId;
     $to = '';
     $contact_num= '';
     $message = '';

     $data = application::join('applicant','applicant.applicantId','=','application.applicantId')
                    ->where('application.applicationId',$applicationId)
                    ->get();

    foreach($data as $data){
        $to= $data['Fname'].' '.$data['Mname'].' '.$data['Lname'];
        $contact_num=$data['contact_num'];
        $message ="You can check and monitor your BFP application/s. Connect your application using this passcode. ".$data['passCode']." ";
    }

    return response()->json([
        'to'=>$to,
        'contact_num'=>$contact_num,
        'message'=>$message
    ]);

  }
}
