@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @include('patients.create')
            @include('doctors.call')
            @include('ambulances.call')
        </div>
    </div>
</div>
@endsection
