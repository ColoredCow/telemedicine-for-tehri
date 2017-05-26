@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"> <h3><strong>Pharmacy Dashboard</strong></h3></div>
                <div class="panel-body">
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">Pharmacist Name</label>

                        <div class="col-md-6">
                            <p>{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <br>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">Pharmacist Phone</label>

                        <div class="col-md-6">
                            <p>{{ Auth::user()->email }}</p>
                            <input type="hidden" id="doctor_phone" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                    
                    
                    <div id="">
                    <div class="row"><hr>
                    <div class="col-xs-12">
                        <h4 class="text-info">Prescription Requests</h4>
                        <br>
                    </div>
                    </div>
                        <div class="row text-info" style="margin:0;">
                            <div class="col-xs-2"><strong>Patient</strong></div>
                            <div class="col-xs-6"><strong>Prescription</strong></div>
                            <div class="col-xs-2"><strong>Date</strong></div>
                            <div class="col-xs-2"><strong>Actions</strong></div>
                        </div>
                        
                            @foreach($prescriptions as $prescription)
                                @if($prescription->pharmacy_approval == null && $prescription->doctor_approval == 1)
                                <div class="row">
                                <div class="col-xs-2">{{ $prescription->patient }}</div>
                                <div class="col-xs-6">{{ $prescription->prescription }}</div>
                                <div class="col-xs-2">{{  date_format(date_create($prescription->date),"d/m/Y") }}</div>
                                <div class="col-xs-2">
                                    <span style="cursor: pointer" data-url="/prescription/pharmacyapprove/{{ $prescription->prescription_id }}" class="label ajax_action label-success">Accept</span>
                                    <span style="cursor: pointer" data-url="/prescription/pharmacydecline/{{ $prescription->prescription_id }}" class="label ajax_action label-danger">Deny</span>
                                </div>
                                </div>
                                @endif
                            @endforeach
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
