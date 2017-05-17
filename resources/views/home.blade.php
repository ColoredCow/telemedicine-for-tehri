@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @include('patients.create')
        </div>
    </div>
</div>
@endsection
