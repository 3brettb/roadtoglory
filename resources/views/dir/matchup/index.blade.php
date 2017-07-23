@extends('layout.app')

@push('on_ready')
    $("#schedule").addClass('active');
@endpush

@section('title')
    | Schedule
@endsection

@section('pagetitle')
    <h1>Scores & Schedules <small>{{league()->name}}</small></h1>
@endsection

@section('breadcrumb')
    <li class="active">Scores & Schedules</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.bars.action')
                 <div class="pull-left">
                    <a href="#" id="sort_btn" class="btn btn-primary">Apply</a>
                    {!! Form::select('week', $weeks, null, ['class="action-control"']) !!}
                    {!! Form::select('season', $seasons, null, ['class="action-control"']) !!}
                    {!! Form::select('team', $teams, null, ['class="action-control"']) !!}
                </div>
                <div class="pull-right">
                    @if(isset($matchups) && $matchups->count() > 0)
                        {{ $matchups->links() }}
                    @endif
                </div>
            @endcomponent
        </div>
    </div>
    <div class="row">
        @foreach($matchups as $matchup)
            <div class="col-md-3">
                @include('partials.resources.game.box', ['matchup' => $matchup]);
            </div>
        @endforeach
    </div>
@endsection