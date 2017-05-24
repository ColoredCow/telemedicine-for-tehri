@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
        	<div id="success_alert" class="alert alert-success" role="alert" style="display:none"><strong>Success!!</strong> Send prescription to selected Pharmacy</div>
            <div id="error_alert" class="alert alert-danger" role="alert" style="display:none"><strong>Error!!</strong> Contact System Administrator</div>
            @include('patients.create')
            @include('doctors.call')
            @include('ambulances.call')
            @include('pharmacys.prescription')
            @include('pharmacys.nearby')
        </div>
        <form id="prescription_submit" >
            <input type="hidden" id="submit_patient_id" name="patient_id">
            <input type="hidden" id="submit_doctor_id" name="doctor_id">
            <input type="hidden" id="submit_prescription" name="prescription">
            <input type="hidden" id="submit_pharmacy_id" name="pharmacy_id">
        </form>
    </div>
</div>

<div class="modal fade" tabindex="-1" id='gridSystemModal' role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Patient History</h4>
      </div>
      <div class="modal-body">
        <div class="row text-info" style="margin:0;">
            <div class="col-xs-3"><strong>Doctor</strong></div>
            <div class="col-xs-6"><strong>Prescription</strong></div>
            <div class="col-xs-3"><strong>Date</strong></div>
        </div>
        <div id="patient_history_list">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
