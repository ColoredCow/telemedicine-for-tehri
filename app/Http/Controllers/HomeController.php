<?php

namespace App\Http\Controllers;

use App\Ambulance;
use App\DiseaseType;
use App\Doctor;
use App\Medicine;
use App\Pharmacy;
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
        $doctors = Doctor::all();

        foreach ($doctors as $doctor) {
            $doctorCategories[$doctor->type][] = $doctor;
        }

        $diseaseTypes = DiseaseType::all(['name']);
        $pharmacys = Pharmacy::all();
        $specialisationsRaw = Doctor::all(['specialisation']);

        foreach ($specialisationsRaw as $specialisation) {
            $specialisations[] = $specialisation->specialisation;
        }
        $specialisations = array_unique($specialisations);
        return view('home')->with(compact('ambulances', 'doctorCategories', 'specialisations', 'diseaseTypes', 'pharmacys', 'medicines'));
    }
}
