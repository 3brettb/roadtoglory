@extends('layout.app')

@push('on_ready')
  $("#other").addClass('active');
  $("#polls").addClass('active');
@endpush

@section('title')
    | Polls
@endsection

@section('pagetitle')
    <h1>Polls <small>{{league()->name}}</small></h1>
@endsection

@section('breadcrumb')
    <li class="active">Polls</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.bars.action')
                <a href="{{route('poll.create', ['type' => 1])}}" class="btn btn-primary">Create New Poll</a>
            @endcomponent
        </div>
        @if($polls && count($polls) > 0)
            @foreach($polls as $poll)
                <div class="col-md-4">
                    <div class="poll poll-box">
                        @include('widgets.poll', ['poll' => $poll])
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <div class="poll poll-box">
                    <span>No Polls To Display</span>
                </div>
            </div>
        @endif
    </div>
@endsection