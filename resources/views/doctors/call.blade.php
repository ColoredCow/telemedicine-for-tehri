           <div class="panel panel-default" id="call_doctor_section" style="display:none">
                <div class="panel-heading"> <h3><strong>List of Nearby Doctors</strong></h3>
                <button id="back_patients" class="btn btn-danger pull-right" style="margin-top: -3em;">Back</button>
                </div>
                <div class="panel-body">
                    @foreach($doctorCategories as $category => $doctors)

                        <h4 class="text-primary"> <strong> {{ $category }} Doctors</strong></h4>
                        <table class="table" style="font-size:1.2em">
                            <thead>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Specialisation</th>
                                <th>Area</th>
                                <th>Action</th>
                            </thead>
                            @foreach($doctors as $doctor)
                            <tr class="doctor_item" data-specialisation="{{ $doctor->specialisation }}" data-area="{{ $doctor->area }}">
                                <th>{{ $doctor->name }}</th>
                                <th>{{ $doctor->phone}}</th>
                                <th>{{ $doctor->specialisation}}</th>
                                <th>{{ $doctor->area }}</th>
                                <th>
                                    <span class="glyphicon glyphicon-earphone text-success request_medication" aria-hidden="true" data-id="{{ $doctor->id }}" style="cursor:pointer"></span>
                                </th>
                            </tr>
                            @endforeach
                        </table> 
                        @endforeach

                </div>
            </div>
