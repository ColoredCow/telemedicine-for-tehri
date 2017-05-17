@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"> <h3><strong>Registered Ambulance Services</strong></h3></div>

                <div class="panel-body">
                    <table class="table" style="font-size:1.2em">
                        <thead>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Area</th>
                            <th>Action</th>
                        </thead>
                        <tr>
                            <th>Podi Health Center</th>
                            <th>+9891919191</th>
                            <th>Podi</th>
                            <th>
                                <span class="glyphicon glyphicon-earphone text-success " aria-hidden="true"></span>
                                &nbsp;&nbsp;&nbsp;
                                <span class="glyphicon glyphicon-envelope text-info" aria-hidden="true"></span>
                            </th>
                        </tr>
                        <tr>
                            <th>B. Puram Medical Center</th>
                            <th>+9891919191</th>
                            <th>B. Puram</th>
                            <th>
                                <span class="glyphicon glyphicon-earphone text-success " aria-hidden="true"></span>
                                &nbsp;&nbsp;&nbsp;
                                <span class="glyphicon glyphicon-envelope text-info" aria-hidden="true"></span>
                            </th>
                        </tr>
                    </table> 
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
