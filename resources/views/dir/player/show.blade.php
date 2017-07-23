@extends('layout.app')

@push('on_ready')
  $("#players").addClass('active');
@endpush

@section('title')
    | Players | {{$player->display('{F} {L}')}}
@endsection

@section('pagetitle')
    <h1>{{$player->display('{F} {L}')}} <small>Player Page</small></h1>
@endsection

@section('breadcrumb')
    <li><a href="{{route('player.index')}}">Players</a></li>
    <li class="active">{{$player->display('{F} {L}')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('dir.player.partials.info', ['player' => $player])
            @include('dir.player.partials.overview', ['player' => $player])
        </div>
        <div class="col-md-10">
            @component('components.bars.action')
                <a href='#' class="btn btn-success">Add Player</a>
                <a href='#' class="btn btn-danger">Drop Player</a>
                <a href='#' class="btn btn-warning">Trade Player</a>
            @endcomponent
            @include('dir.player.partials.stats.season', ['player' => $player])
            @include('dir.player.partials.stats.games', ['player' => $player])
            @include('dir.player.partials.notes', ['player' => $player])
            @include('dir.player.partials.history', ['player' => $player])
        </div>
    </div>
@endsection