@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
        	<div id="success_alert" class="alert alert-success" role="alert" style="display:none"><strong>Success!!</strong> Send prescription to selected Pharmacy</div>
            @include('patients.create')
            @include('doctors.call')
            @include('ambulances.call')
            @include('pharmacys.prescription')
            @include('pharmacys.nearby')
        </div>
    </div>
</div>
@endsection
