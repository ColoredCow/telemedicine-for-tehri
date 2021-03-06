<?php

namespace App;

use App\Doctor;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ['doctor_id', 'pharmacy_id', 'prescription', 'patient_id'];

    public static function getPatientHistory($id)
    {
        return self::where('patient_id', $id)
            ->leftJoin('doctors', 'prescriptions.doctor_id', '=', 'doctors.id')
            ->get(['doctors.name as doctor', 'prescriptions.prescription as prescription', 'prescriptions.created_at as date']);
    }

    public static function getByDoctor($phone)
    {
$prescriptionsRaw = Doctor::where('doctors.phone', $phone)
            ->leftJoin('prescriptions', 'doctors.id', '=', 'prescriptions.doctor_id')
            ->leftJoin('patients', 'prescriptions.patient_id', '=', 'patients.id')
            ->get(['patients.address as patient_address', 'patients.name as patient', 'prescriptions.prescription as prescription', 'prescriptions.created_at as date', 'prescriptions.id as prescription_id', 'prescriptions.doctor_approval as doctor_approval']);
        $prescriptions=[];
	foreach ($prescriptionsRaw as $prescription) {
            $prescription['date'] = substr($prescription['date'], 0, strpos($prescription['date'], ' ')); ;
            $prescriptions[] = $prescription;
        } 
        return $prescriptions;
	}
    public static function getByPharmacy($phone)			
    {
   $prescriptionsRaw = self::leftJoin('pharmacies', 'prescriptions.pharmacy_id', '=', 'pharmacies.id')
            ->leftJoin('patients', 'prescriptions.patient_id', '=', 'patients.id')
            ->where('pharmacies.phone', $phone)
            ->get(['patients.address as patient_address','patients.name as patient', 'prescriptions.prescription as prescription', 'prescriptions.created_at as date', 'prescriptions.id as prescription_id', 'prescriptions.pharmacy_approval as pharmacy_approval', 'prescriptions.doctor_approval as doctor_approval']);
        $prescriptions = [];
        foreach ($prescriptionsRaw as $prescription) {
            $prescription['date'] = substr($prescription['date'], 0, strpos($prescription['date'], ' ')); ;
            $prescriptions[] = $prescription;
        }
        return $prescriptions;} 

   public static function getPharmacyDeclined()
    {
        return self::where('pharmacy_approval', 0)
            ->leftJoin('patients', 'prescriptions.patient_id', '=', 'patients.id')
            ->get(['patients.name as patient', 'prescriptions.prescription as prescription', 'prescriptions.created_at as date', 'prescriptions.id as prescription_id', 'prescriptions.pharmacy_approval as pharmacy_approval', 'prescriptions.doctor_approval as doctor_approval']);
    }

    public static function getDoctorDeclined()
    {
        return self::where('doctor_approval', 0)
            ->leftJoin('doctors', 'prescriptions.doctor_id', '=', 'doctors.id')
            ->leftJoin('patients', 'prescriptions.patient_id', '=', 'patients.id')
            ->get(['patients.name as patient', 'doctors.name as doctor', 'doctors.name as phone', 'prescriptions.prescription as prescription', 'prescriptions.created_at as date', 'prescriptions.id as prescription_id', 'prescriptions.pharmacy_approval as pharmacy_approval', 'prescriptions.doctor_approval as doctor_approval']);
    }

    public static function getPatientDetails()
    {   
        return self::leftJoin('patients', 'prescriptions.patient_id', '=', 'patients.id')
            ->orderBy('prescriptions.created_at', 'desc')
            ->get(['patients.name as patient', 'patients.phone as phone', 'prescriptions.created_at as date', 'prescriptions.id as prescription_id', 'prescriptions.pharmacy_approval as pharmacy_approval', 'prescriptions.doctor_approval as doctor_approval']);
    }
}
