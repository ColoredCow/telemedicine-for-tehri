<?php

namespace App\Http\Controllers;

use App\Ambulance;
use App\DiseaseType;
use App\Doctor;
use App\Medicine;
use App\Pharmacy;
use App\Prescription;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambulances = Ambulance::all();
        $medicines = Medicine::all();
        $doctors = Doctor::orderBy('area')->get();

        foreach ($doctors as $doctor) {
            $doctorCategories[$doctor->type][] = $doctor;
        }

        $diseaseTypes = DiseaseType::all(['name']);
        $pharmacys = Pharmacy::orderBy('area')->get();
        $specialisationsRaw = Doctor::orderBy('area')->get(['specialisation']);
        $prescriptionsPharmacyDeclined = Prescription::getPharmacyDeclined();
        $prescriptionsDoctorDeclined = Prescription::getDoctorDeclined();
        foreach ($specialisationsRaw as $specialisation) {
            $specialisations[] = $specialisation->specialisation;
        }

        $areasRaw = Doctor::orderBy('area')->get(['area']);

        foreach ($areasRaw as $area) {
            $areas[] = $area->area;
        }

        $specialisations = array_unique($specialisations);
        $areas = array_unique($areas);
        return view('home')->with(compact('ambulances', 'doctorCategories', 'specialisations', 'diseaseTypes', 'pharmacys', 'medicines', 'areas', 'prescriptionsPharmacyDeclined', 'prescriptionsDoctorDeclined'));
    }

}
