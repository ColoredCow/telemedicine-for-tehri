<?php

namespace App\Http\Controllers;

trait SendsPushNotification {
	
	
	    public function sendDoctorNotification($token) {
        $body = [
            "to" => $token,
            "notification" => [
                "title"=> "Hey ". 'user',
                "body"=>  "You have a Prescription to approve",
                "sound"=> "default",
                "click_action"=> "fcm.ACTION.HELLO",

            ],
            "data" => [
                "title"=> "Hey ". 'user',
                "body"=>  "You have a Prescription to approve",
                "click_action"=> "fcm.ACTION.HELLO",
                "remote"=> true,
                "fire_time" => time()

            ],
            "priority"=> "high"
        ];

        $dataData = json_encode($body, true);

        $headers = [
            "Authorization"=>"key= AIzaSyCmTzocKPoZtReExMsjUkFMp_7wEPeFwnI",
            "Content-Type"=>"application/json"
        ];

        $client = new Client([
            'base_uri' => "https://fcm.googleapis.com"
        ]);

        try {
            $response =  $client->request('POST', '/fcm/send', ['body' => $dataData, 'headers' => $headers]);
        } catch (\Exception $e) {
            return "fail";
        }
        return $response->getBody()." ff"; 
    }

}