@extends('layout.app')

@push('on_ready')
  $("#other").addClass('active');
  $("#settings").addClass('active');
@endpush

@section('title')
    | League Settings
@endsection

@section('pagetitle')
    <h1>League Settings <small>{{league()->name}}</small></h1>
@endsection

@section('breadcrumb')
    <li class="active">Settings</li>
@endsection

@section('content')
    
@endsection