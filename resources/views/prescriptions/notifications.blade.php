
                <div class="panel panel-default" id="pharmacies_section">
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
                    <div class="row">
                        @foreach($prescriptionsPharmacyDeclined as $prescription)
                            <div class="col-xs-2">{{ $prescription->patient }}</div>
                            <div class="col-xs-6">{{ $prescription->prescription }}</div>
                            <div class="col-xs-2">{{  date_format(date_create($prescription->date),"d/m/Y") }}</div>
                            <div class="col-xs-2">
                                <span style="cursor: pointer" data-id='{{ $prescription->prescription_id }}' class="label select_pharmacy label-info">Select Pharmacy</span>
                            </div>
                        @endforeach
                    </div>
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
                                <span  data-id='{{ $prescription->prescription_id }}' style="cursor: pointer" class="label edit_prescription label-info">Call Doctor</span>
                                
                            </div>
                        </div>
                        @endforeach
                    
                </div>
            </div>

