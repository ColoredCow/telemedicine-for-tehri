           <div class="panel panel-default" id="call_ambulance_section" style="display:none">
                <div class="panel-heading"> <h3><strong>Call Ambulance</strong></h3></div>

                <div class="panel-body">
                    <table class="table" style="font-size:1.2em">
                        <thead>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Area</th>
                            <th>Action</th>
                        </thead>
                        @foreach($ambulances as $ambulance)
                        <tr>
                            <th>{{ $ambulance->name }}</th>
                            <th>{{ $ambulance->phone }}</th>
                            <th>{{ $ambulance->area }}</th>
                            <th>
                                <span class="glyphicon glyphicon-earphone text-success " aria-hidden="true"></span>
                                &nbsp;&nbsp;&nbsp;
                                <span class="glyphicon glyphicon-envelope text-info" aria-hidden="true"></span>
                            </th>
                        </tr>
                        @endforeach
                    </table> 
                </div>
            </div>
