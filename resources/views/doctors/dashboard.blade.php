@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"> <h3><strong>Doctor's Dashboard</strong></h3></div>
                <div class="panel-body">
                    
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">Doctor's Phone</label>

                        <div class="col-md-6">
                            <input id="doctor_phone" type="text" class="form-control" placeholder="Enter your Phone" name="phone" required autofocus >

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br><br>
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" id="search_doctor">Search</button>
                        </div>
                        
                    <br><br>
                    <br><br>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">Doctor Name</label>

                        <div class="col-md-6">
                            <p id="doctor_name">-</p>
                        </div>
                    </div>
                    <div id="prescription_history" style="display:none">
                    <div class="row"><hr></div>
                        <div class="row text-info" style="margin:0;">
                            <div class="col-xs-3"><strong>Patient</strong></div>
                            <div class="col-xs-6"><strong>Prescription</strong></div>
                            <div class="col-xs-3"><strong>Date</strong></div>
                        </div>
                        <div id="prescription_history_list">
                            
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
