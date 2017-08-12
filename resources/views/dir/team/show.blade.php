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
    <div class="row" id="team_show">
        <div class="col-md-2">
            <div class="row no-margin">
                @include('dir.team.partials.team', ['standing' => $model->standing])
            </div>
            <div class="row no-margin">
                @include('dir.team.partials.info', ['matchups' => $model->standing->matchups])
            </div>
        </div>
        <div class="col-md-10">
            @if($model->roster->team->id == team()->id)
                <div class="row no-margin">
                    @component('components.bars.action')
                        <div class="pull-left">
                            <a id="add_player_btn" href="#" class="btn btn-success">Add Player</a>
                            <button id="drop_player_btn" class="btn btn-danger" click="Roster.drop()">Drop</button>
                        </div>
                        <div class="pull-right">
                            <button id="cancel_roster_btn" class="btn btn-warning" style="padding: 6px 50px;" onclick="Roster.cancel()">Cancel</button>
                            <button id="save_roster_btn" class="btn btn-primary" style="padding: 6px 50px;" onclick="Roster.save()">Save</button>
                        </div>
                    @endcomponent
                </div>
            @endif
            <div class="row no-margin">
                @include('dir.team.partials.roster', ['roster' => $model->roster])
            </div>
        </div>
    </div>
@endsection