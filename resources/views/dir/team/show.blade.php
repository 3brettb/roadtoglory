@extends('layout.app')

@push('on_ready')
    $("#teams, #team-{{$team->id}}").addClass('active');
@endpush

@section('title')
    | {{$team->display('{N} {M}')}}
@endsection

@section('pagetitle')
    <h1>{{$team->display('{N} {M}')}} <small>Team Page</small></h1>
@endsection

@section('breadcrumb')
    <li><a href="{{route('team.index')}}">Teams</a></li>
    <li class="active">{{$team->display('{N} {M}')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2">
            <div class="row no-margin">
                @include('dir.team.partials.team', ['standing' => $model->standing])
            </div>
            <div class="row no-margin">
                @include('dir.team.partials.info', ['matchups' => $model->standing->matchups])
            </div>
        </div>
        <div class="col-md-10">
            <div class="row no-margin">
                @component('components.bars.action')
                    <div class="pull-left">
                        <a id="add_player_btn" href="#" class="btn btn-success">Add Player</a>
                        <a id="drop_player_btn" href="#" class="btn btn-danger" disabled>Drop Selected</a>
                    </div>
                    <div class="pull-right">
                        <a id="save_roster_btn" href="#" class="btn btn-primary" style="padding: 6px 50px;" disabled>Save</a>
                    </div>
                @endcomponent
            </div>
            <div class="row no-margin">
                @include('dir.team.partials.roster', ['roster' => $model->roster])
            </div>
        </div>
    </div>
@endsection