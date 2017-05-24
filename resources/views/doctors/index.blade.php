@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"> <h3><strong>Registered Doctors</strong></h3></div>
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
                                    <span class="glyphicon glyphicon-earphone text-success request_medication" aria-hidden="true" style="cursor:pointer"></span>
                                </th>
                            </tr>
                            @endforeach
                        </table> 
                        @endforeach
                        
                        
                        
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
