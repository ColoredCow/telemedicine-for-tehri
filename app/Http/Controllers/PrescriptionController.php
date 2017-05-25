<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Prescription;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prescription = Prescription::create($request->only(['doctor_id', 'pharmacy_id', 'prescription', 'patient_id']));

        $doctor = Doctor::find('doctor_id');

        if($doctor != null ) {
            if($doctor->app_token != null && $doctor->app_token != ''){
                sendNotification($doctor->app_token);
            }
        }
        
        return json_encode($prescription->id ? true : false);
    }

    public function sendNotification($token) {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Prescription::getPatientHistory($id); 
    }

    public function getByDoctor($phone)
    {
        return json_encode([
            'name' => Doctor::getName($phone),
            'prescriptions' => Prescription::getByDoctor($phone),
        ]);
    }

    public function approval(Request $request)
    {
        $prescription = Prescription::find($request->input('id'));

        if ($prescription == null)
        {
            return json_encode(['response' => false]);
        } 

        $prescription->doctor_approval = $request->input('approval');
        $prescription->save();

        return json_encode(['response' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
