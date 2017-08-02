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
    <div class="row" id="people">
        <div class="col-md-2">
            <div class="row no-margin">
                @include('dir.player.partials.search', ['collapse' => true])
            </div>
        </div>
        <div class="col-md-10">
            <div class="row no-margin">
                @component('components.bars.action')
                    <div class="pull-left">
                        <button @click="move" class="btn btn-success" :disabled="selected == null ? true : false">Add</button>
                        {{--  <button @click="trade" class="btn btn-warning" :disabled="selected == null ? true : false">Trade</button>  --}}
                        <button @click="move" class="btn btn-danger" :disabled="selected == null ? true : false">Drop</button>
                        <button @click="info" class="btn btn-default" :disabled="selected == null ? true : false">Player Information</button>
                    </div>
                @endcomponent
            </div>
            <div class="row no-margin">
                @include('dir.player.partials.list', ['players' => $model->players])
            </div>
        </div>
    </div>
@endsection