<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Patient;
use App\Pharmacy;
use App\Prescription;
use App\User;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{

    use SendsPushNotification;
    use SendsSMSNotification;

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

        $doctor = Doctor::find($request->input('doctor_id'));
        if ($doctor != null) {
            $user = User::where('email', $doctor->phone)->first(['app_token']);
            if ($user['app_token'] != null && $user['app_token'] != '') {
                $this->sendDoctorNotification($user['app_token']);
            }
            $this->sendSMSNotificationToDoctor($prescription->prescription, $doctor->phone);
        }

        return json_encode($prescription->id ? true : false);
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

    public function getByPharmacy($phone)
    {
        return json_encode([
            'name' => Pharmacy::getName($phone),
            'prescriptions' => Prescription::getByPharmacy($phone),
        ]);
    }

    public function approval(Request $request)
    {
        $prescription = Prescription::find($request->input('id'));

        if ($prescription == null) {
            return json_encode(['response' => false]);
        }

        $prescription->doctor_approval = $request->input('approval');
        $prescription->save();

        return json_encode(['response' => true]);
    }

    public function smsReceived(Request $request) {
        $from = trim($request->input('From'));
        $message = strtolower(trim($request->input('Body')));
        echo $message . ' ' . $from; die();
        if($message == 'approve')
        {
            $this->doctorApproval($id);
        } elseif ($message == 'decline') {
            $this->doctorDecline($id);
        }
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

    public function pharmacyApproval($id)
    {
        $prescription = Prescription::find($id);

        if ($prescription == null) {
            return;
        }

        $prescription->pharmacy_approval = 1;
        $prescription->save();

        return;

    }

    public function pharmacyDecline($id)
    {
        $prescription = Prescription::find($id);

        if ($prescription == null) {
            return;
        }

        $prescription->pharmacy_approval = 0;
        $prescription->save();

        return;

    }

    public function doctorApproval($id)
    {
        $prescription = Prescription::find($id);

        if ($prescription == null) {
            return;
        }

        $prescription->doctor_approval = 1;
        $prescription->save();
        $pharmacy = Pharmacy::find($prescription->pharmacy_id);
        if ($pharmacy != null) {

            $user = User::where('email', $pharmacy->phone)->first(['app_token']);
            $patient = Patient::find($prescription->patient_id);

            if ($user['app_token'] != null && $user['app_token'] != '') {
                $this->sendDoctorNotification($user['app_token']);
            }

            $this->sendSMSNotificationToPharmacy([
                'prescription' => $prescription->prescription,
                'phone' => $pharmacy->phone,
                'address' => $patient->address,
                'name' => $patient->name
              ]);
        }

        return;

    }

    public function doctorDecline($id)
    {
        $prescription = Prescription::find($id);

        if ($prescription == null) {
            return;
        }

        $prescription->doctor_approval = 0;
        $prescription->save();

        return;

    }

    public function updatePharmacy(Request $request)
    {
        $prescription = Prescription::find($request->input('prescription_id'));

        if ($prescription != null) {
            $prescription->pharmacy_id = $request->input('pharmacy_id');
            $prescription->pharmacy_approval = null;
            $prescription->save();

            $pharmacy = Pharmacy::find($prescription->pharmacy_id);
            if ($pharmacy != null) {
                $user = User::where('email', $pharmacy->phone)->first(['app_token']);
                if ($user['app_token'] != null && $user['app_token'] != '') {
                    $this->sendDoctorNotification($user['app_token']);
                }
            }

            return 'true';
        }
        return 'false';
    }

    public function editPrescription(Request $request)
    {
        $prescription = Prescription::find($request->input('prescription_id'));
        if ($prescription != null) {
            $prescription->prescription = $request->input('prescription');
            $prescription->doctor_approval = null;
            $prescription->save();

            $doctor = Doctor::find($prescription->doctor_id);
            if ($doctor != null) {
                $user = User::where('email', $doctor->phone)->first(['app_token']);
                if ($user['app_token'] != null && $user['app_token'] != '') {
                    $this->sendDoctorNotification($user['app_token']);
                }
            }

            return 'true';
        }
        return 'false';
    }

    public function report(Request $request)
    {
        $prescribedpatients = Prescription::getPatientDetails();
        $delivery = 0;
        $countrow = 0;
        foreach ($prescribedpatients as $prescribed) {
            $countrow++;
            if (($prescribed->doctor_approval == null) && ($prescribed->pharmacy_approval == null)) {
                $data[] = [
                    'name' => $prescribed->patient,
                    'id' => $prescribed->prescription_id,
                    'phone' => $prescribed->phone,
                    'date' => $prescribed->date,
                    'label' => 'danger',
                    'indicator' => 'pending doctor approval',
                ];
            } else if (($prescribed->doctor_approval == 0) && ($prescribed->pharmacy_approval == null)) {
                $data[] = [
                    'name' => $prescribed->patient,
                    'id' => $prescribed->prescription_id,
                    'phone' => $prescribed->phone,
                    'date' => $prescribed->date,
                    'label' => 'warning',
                    'indicator' => 'declined by doctor',
                ];
            } else if (($prescribed->doctor_approval == 1) && ($prescribed->pharmacy_approval == null)) {
                $data[] = [
                    'name' => $prescribed->patient,
                    'id' => $prescribed->prescription_id,
                    'phone' => $prescribed->phone,
                    'date' => $prescribed->date,
                    'label' => 'info',
                    'indicator' => 'approved by doctor',
                ];
            } else if (($prescribed->doctor_approval == 1) && ($prescribed->pharmacy_approval == 1)) {
                $data[] = [
                    'name' => $prescribed->patient,
                    'id' => $prescribed->prescription_id,
                    'phone' => $prescribed->phone,
                    'date' => $prescribed->date,
                    'label' => 'success',
                    'indicator' => 'delivered by pharmacy',
                ];
                $delivery++;
            }

        }
        return view('prescriptions.reports')->with(compact('data', 'delivery', 'countrow'));
    }
}
