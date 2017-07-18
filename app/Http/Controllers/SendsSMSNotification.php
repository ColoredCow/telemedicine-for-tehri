<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Services\TwilioMessaging;


trait SendsSMSNotification {


	  public function sendSMSNotificationToDoctor($prescription, $phone) {
        $message = "You have a new prescription to approve from 555. \n\n";
        $message .= "Prescription:\n".$prescription . "\n\n";
        $message .= "Please reply APPROVE or DECLINE to " . env('TWILIO_FROM');
        TwilioMessaging::send([
          'from' => env('TWILIO_FROM'),
          'to' => '+91' . '7838818823',
        ], $message);
    }

    public function sendSMSNotificationToPharmacy($attr) {
        $message = "You have a new medication from 555 to deliver to " . $attr['name'] . ". \n\n";
        $message .= "Prescription:\n". $attr['prescription'] . "\n\n";
        $message .= "Address:\n". $attr['address'] . "\n";
        TwilioMessaging::send([
          'from' => env('TWILIO_FROM'),
          'to' => '+91' . $attr['phone'],
        ], $message);
    }

}
