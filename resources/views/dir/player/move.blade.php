@extends('layout.app')

@push('on_ready')
  $("#players").addClass('active');
@endpush

@section('title')
    | Move Player
@endsection

@section('pagetitle')
    <h1>Move Player <small>{{team()->display('{N} {M}')}}</small></h1>
@endsection

@section('breadcrumb')
    <li><a href="{{route('player.index')}}">Players</a></li>
    <li class="active">Move</li>
@endsection

@section('content')
    <div class="row" id="vue">
        <div class="col-md-12">
            @include('inserts.message.default', ['message' => $model->message])
            @component('components.bars.action')
                @if($model->player->mine)
                    <button onclick="javascript:void(0);" @click="drop" class="btn btn-danger">Drop</button>
                @elseif($model->player->owner != null)
                    <button onclick="javascript:void(0);" @click="trade" class="btn btn-warning">Trade</button>
                @else
                    <button onclick="javascript:void(0);" @click="add" class="btn btn-success">Add</button>
                @endif
                <a href="{{route('player.index')}}" class="btn btn-primary pull-right">Cancel</a>
            @endcomponent
        </div>
        <div class="col-md-2">
            @include('dir.player.partials.info', ['player' => $model->player])
            @include('dir.player.partials.overview', ['player' => $model->player])
        </div>
        <div class="col-md-10">
            @include('dir.player.partials.roster', ['players' => $model->roster])
        </div>
    </div>
@endsection

@push('vue')
    <script src="{{URL::asset('vue/views/player/move.js')}}"></script>
@endpush

@push('vue_model')
    vue_model['player'] = JSON.parse('{!!json_encode($model->player)!!}');
@endpush

@push('js_routes')
    routes['action.player.add'] = "{{route('action.player.add')}}";
    {{--  routes['action.player.drop'] = "{{route('action.player.drop')}}";
    routes['action.player.trade'] = "{{route('action.player.trade')}}";  --}}
@endpush