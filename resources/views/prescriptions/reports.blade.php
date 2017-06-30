@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"> <h3><strong>Reports</strong></h3></div>
                <div class="panel-body">
                <div class=row>
                <div class=col-md-6>
                <p style="font-size : 30px">Calls Recieved : <b>{{ $countrow }}</b></p>
                </div>
                <div class=col-md-6> 
                <p style="font-size: 30px">Medicines Delivered : <b>{{ $delivery }}</b></p>
                </div>
                </div>

                        <table class="table">
                            <thead>
                                <th>Date</th>
                                <th>Patient Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </thead>
                            @foreach($data as $detail)
                            <tr class = "clickable_row" data-toggle="modal" data-target="#ShowDetails" >
                                <th>{{ date_format(date_create($detail['date']),"d/m/Y") }}</th>
                             <th>{{ $detail['name']}}</th>
                             <th>{{ $detail['phone']}}</th>
                             <th style="text-transform: capitalize;"><span class="label label-{{$detail['label']}}">{{ $detail['indicator'] }}</span></th>
                             </tr>
                            @endforeach 
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
                            
@endsection