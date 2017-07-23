@extends('layout.app')

@push('on_ready')
  $("#trading").addClass('active');
  $("#trades").addClass('active');
@endpush

@section('title')
    | New Trade
@endsection

@section('pagetitle')
    <h1>New Trade <small>{{league()->name}}</small></h1>
@endsection

@section('breadcrumb')
    <li>Trading</li>
    <li><a href="{{route('trade.index')}}">Trades</a></li>
    <li class="active">New</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('dir.trade.partials.create.options')
        </div>
        <div class="col-md-6">
            @component('components.bars.action')
                <a href="#" class="btn btn-success">Send Trade Request</a>
                <a href="{{url()->previous()}}" class="btn btn-warning">Undo</a>
                <a href="{{route('trade.index')}}" class="btn btn-danger pull-right">Cancel</a>
            @endcomponent
            @foreach($teams as $team)
                @include('dir.trade.partials.create.team', ['team' => $team])
            @endforeach
        </div>
    </div>
@endsection