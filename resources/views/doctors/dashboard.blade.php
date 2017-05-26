@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"> <h3><strong>Doctor's Dashboard</strong></h3></div>
                <div class="panel-body">
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">Doctor Name</label>

                        <div class="col-md-6">
                            <p>{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <br>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">Doctor's Phone</label>

                        <div class="col-md-6">
                            <p>{{ Auth::user()->email }}</p>
                            <input type="hidden" id="doctor_phone" value="{{ Auth::user()->email }}">
                            <script>
                            searchPrescriptions();
                            </script>
                        </div>
                    </div>
                    
                    
                    <div id="">
                    <div class="row"><hr>
                        <div class="col-xs-12">
                            <h4 class="text-info">Prescription Confirmations</h4>
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
                                @if($prescription->doctor_approval == null)
                                <div class="row">
                                    <div class="col-xs-2">{{ $prescription->patient }}</div>
                                    <div class="col-xs-6">{{ $prescription->prescription }}</div>
                                    <div class="col-xs-2">{{  date_format(date_create($prescription->date),"d/m/Y") }}</div>
                                    <div class="col-xs-2">
                                        <span style="cursor: pointer" data-url="/prescription/doctorapprove/{{ $prescription->prescription_id }}" class="label ajax_action label-success">Approve</span>
                                        <span style="cursor: pointer" data-url="/prescription/doctordecline/{{ $prescription->prescription_id }}" class="label ajax_action label-danger">Decline</span>
                                    </div>
                                    <hr>
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
