@extends('layout.app')

@push('on_ready')
  $("#players").addClass('active');
@endpush

@section('title')
    | Players
@endsection

@section('pagetitle')
    <h1>Players <small>{{league()->name}}</small></h1>
@endsection

@section('breadcrumb')
    <li class="active">Players</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2">
            <div class="row no-margin">
                @include('dir.player.partials.search')
            </div>
        </div>
        <div class="col-md-10">
            <div class="row no-margin">
                @component('components.bars.action')
                    <div class="pull-left">
                        <a id="add_player_btn" href="#" class="btn btn-success" disabled>Add</a>
                        <a id="trade_player_btn" href="#" class="btn btn-warning" disabled>Trade</a>
                        <a id="drop_player_btn" href="#" class="btn btn-danger" disabled>Drop</a>
                        <a id="show_player_btn" href="#" class="btn btn-default" disabled>Player Information</a>
                    </div>
                @endcomponent
            </div>
            <div class="row no-margin">
                @include('dir.player.partials.list')
            </div>
        </div>
    </div>
@endsection