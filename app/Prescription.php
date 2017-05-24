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
    	return Doctor::where('doctors.phone', $phone)
            ->leftJoin('prescriptions', 'doctors.id', '=', 'prescriptions.doctor_id')
            ->leftJoin('patients', 'prescriptions.patient_id', '=', 'patients.id')
            ->get(['patients.name as patient', 'prescriptions.prescription as prescription', 'prescriptions.created_at as date', 'prescriptions.id as prescription_id']);
    }
}
