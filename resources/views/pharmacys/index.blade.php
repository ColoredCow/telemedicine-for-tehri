@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
                       <div class="panel panel-default">
                <div class="panel-heading"><h3><strong>Registered Pharmacies</strong></h3></div>

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
                                <span class="glyphicon glyphicon-envelope text-info show_success" style="cursor:pointer" aria-hidden="true"></span>
                            </th>
                        </tr>
                        @endforeach
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
