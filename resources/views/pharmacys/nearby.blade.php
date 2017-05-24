
                <div class="panel panel-default" id="pharmacies_section" style="display:none">
                <div class="panel-heading"> <h3><strong>List of Nearby Pharmacies</strong></h3><button id="back_prescription" class="btn btn-danger pull-right" style="margin-top: -3em;">Back</button>
                </div>

                <div class="panel-body">
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
                                <span data-id="{{ $pharmacy->id }}" class="glyphicon glyphicon-envelope text-info select_pharmacy " style="cursor:pointer" aria-hidden="true"></span>
                            </th>
                        </tr>
                        @endforeach
                    </table> 
                </div>
            </div>
