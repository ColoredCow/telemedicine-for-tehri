<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Services\TwilioMessaging;


trait SendsSMSNotification {


	  public function sendSMSNotificationToDoctor($prescription, $phone) {
        $message = "You have a new prescription to approve from 555. \n\n";
        $message .= "Prescription:\n".$prescription . "\n\n";
        $message .= "Please reply APPROVE or DECLINE";
        TwilioMessaging::send([
          'from' => env('TWILIO_FROM'),
          'to' => $phone,
        ], $message);
    }

}
