@extends('layout.admin')

@push('on_ready')
    $("#yourhome").addClass('active');
@endpush

@section('title')
    | Admin Portal
@endsection

@section('content')
    <div class="row">
        <img class="centered" src="{{URL::asset('img/common/admin/locked.svg')}}" height="20%">
    </div>
@endsection