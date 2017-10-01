@extends('layout.admin')

@push('on_ready')
    $("#season").addClass('active');
    $("#season_generate").addClass('active');
@endpush

@section('title')
    | Admin Portal | Generate Season
@endsection

@section('pagetitle')
    <h1>Generate a Season <small>{{league()->name}}</small></h1>
@endsection

@section('content')

@endsection