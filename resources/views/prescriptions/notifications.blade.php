
                <div class="panel panel-default" id="pharmacies_section">
                <div class="panel-heading"> <h3><strong>Prescriptions</strong></h3>
                </div>

                <div class="panel-body">

                    <div class="row text-info" style="margin:0;">
                        <h4>Prescriptions Declined by Pharmacies</h4>
                        <div class="col-xs-2"><strong>Patient</strong></div>
                        <div class="col-xs-6"><strong>Prescription</strong></div>
                        <div class="col-xs-2"><strong>Date</strong></div>
                        <div class="col-xs-2"><strong>Actions</strong></div>
                    </div>
                    <div id="">
                        @foreach($prescriptionsPharmacyDeclined as $prescription)
                            <div class="col-xs-2">{{ $prescription->patient }}</div>
                            <div class="col-xs-6">{{ $prescription->prescription }}</div>
                            <div class="col-xs-2">{{  date_format(date_create($prescription->date),"d/m/Y") }}</div>
                            <div class="col-xs-2">
                                <span style="cursor: pointer" data-url="/prescription/pharmacyapprove/{{ $prescription->prescription_id }}" class="label ajax_action label-success">Accept</span>
                                <span style="cursor: pointer" data-url="/prescription/pharmacydecline/{{ $prescription->prescription_id }}" class="label ajax_action label-danger">Deny</span>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row text-info" style="margin:0;">
                        <h4>Prescriptions Declined by Doctors</h4>
                        <div class="col-xs-2"><strong>Patient</strong></div>
                        <div class="col-xs-6"><strong>Prescription</strong></div>
                        <div class="col-xs-2"><strong>Date</strong></div>
                        <div class="col-xs-2"><strong>Actions</strong></div>
                    </div>
                    <div id="">
                        @foreach($prescriptionsDoctorDeclined as $prescription)
                            <div class="col-xs-2">{{ $prescription->patient }}</div>
                            <div class="col-xs-6">{{ $prescription->prescription }}</div>
                            <div class="col-xs-2">{{  date_format(date_create($prescription->date),"d/m/Y") }}</div>
                            <div class="col-xs-2">
                                <span style="cursor: pointer" data-url="/prescription/pharmacyapprove/{{ $prescription->prescription_id }}" class="label ajax_action label-success">Accept</span>
                                <span style="cursor: pointer" data-url="/prescription/pharmacydecline/{{ $prescription->prescription_id }}" class="label ajax_action label-danger">Deny</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>