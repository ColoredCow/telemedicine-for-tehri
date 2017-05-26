
           <div class="panel panel-default" id="pending_prescriptions_section">
                <div class="panel-heading"> <h3><strong>Prescriptions</strong></h3>
                </div>

                <div class="panel-body">

                    <div class="row text-info" style="margin:0;">
                        <h4>Prescriptions Declined by Pharmacies</h4>
                        
                    </div>
                    <div class="row">
                    	<div class="col-xs-2"><strong>Patient</strong></div>
                        <div class="col-xs-6"><strong>Prescription</strong></div>
                        <div class="col-xs-2"><strong>Date</strong></div>
                        <div class="col-xs-2"><strong>Actions</strong></div>
                    </div>
                    
                        @foreach($prescriptionsPharmacyDeclined as $prescription)
                        <div class="row">
                            <div class="col-xs-2">{{ $prescription->patient }}</div>
                            <div class="col-xs-6">{{ $prescription->prescription }}</div>
                            <div class="col-xs-2">{{  date_format(date_create($prescription->date),"d/m/Y") }}</div>
                            <div class="col-xs-2">
                                <span data-toggle="modal" data-target="#NewPharma" style="cursor: pointer" data-id='{{ $prescription->prescription_id }}' class="label select_new_pharmacy label-info">Select Pharmacy</span>
                            </div>
                           </div>
                            <hr>
                        @endforeach
                    	
                    <div class="row">
                    	<hr>
                    </div>
                    <div class="row text-info" style="margin:0;">
                        <h4>Prescriptions Declined by Doctors</h4>
                        
                    </div>
                    <div class="row">
                    	<div class="col-xs-2"><strong>Patient</strong></div>
                        <div class="col-xs-6"><strong>Prescription</strong></div>
                        <div class="col-xs-2"><strong>Date</strong></div>
                        <div class="col-xs-2"><strong>Actions</strong></div>
                    </div>
                    
                        @foreach($prescriptionsDoctorDeclined as $prescription)
                        <div class="row">
                            <div class="col-xs-2">{{ $prescription->patient }}</div>
                            <div class="col-xs-6">{{ $prescription->prescription }}</div>
                            <div class="col-xs-2">{{  date_format(date_create($prescription->date),"d/m/Y") }}</div>
                            <div class="col-xs-2">
                                <span  data-id='{{ $prescription->prescription_id }}' style="cursor: pointer" class="label edit_prescription label-info" data-toggle="modal" data-target="#EditPrescription">Call Doctor</span>
                                
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    
                </div>
            </div>

<input type="hidden" id="update_prescription_id">

<div class="modal fade" tabindex="-1" id='EditPrescription' role="dialog" aria-labelledby="EditPrescriptionLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="EditPrescriptionLabel">Update Prescription</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="GET" action="">

            <div class="form-group{{ $errors->has('prescription') ? ' has-error' : '' }}">
                <label for="prescription" class="col-md-4 control-label">Enter Presription <br>(on Doctor's behalf)</label>

                <div class="col-md-6">
                    <textarea id="update_prescription" class="form-control" name="update_prescription" value="{{ old('update_prescription') }}" rows = '15' autofocus></textarea>

                    @if ($errors->has('update_prescription'))
                        <span class="help-block">
                            <strong>{{ $errors->first('update_prescription') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      	<button type="button" id="update_prescription_action" class="btn btn-primary">
            Update Prescription
        </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" tabindex="-1" id='NewPharma' role="dialog" aria-labelledby="NewPharmaLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="NewPharmaLabel">Update Prescription</h4>
      </div>
      <div class="modal-body">
        <table class="table" style="font-size:1.2em">
                        <thead>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Area</th>
                            <th>Action</th>
                        </thead>
                        @foreach($pharmacys as $pharmacy)
                        <tr>
                            <th>{{ $pharmacy->name }}</th>
                            <th>{{ $pharmacy->phone }}</th>
                            <th>{{ $pharmacy->area }}</th>
                            <th>
                                <span data-id="{{ $pharmacy->id }}" class="glyphicon glyphicon-envelope text-info update_pharmacy " style="cursor:pointer" aria-hidden="true"></span>
                            </th>
                        </tr>
                        @endforeach
                    </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
