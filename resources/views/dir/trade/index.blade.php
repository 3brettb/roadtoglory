@extends('layout.app')

@push('on_ready')
  $("#trading").addClass('active');
  $("#trades").addClass('active');
@endpush

@section('title')
    | Trades
@endsection

@section('pagetitle')
    <h1>Trades <small>{{league()->name}}</small></h1>
@endsection

@section('breadcrumb')
    <li><a href="{{route(Route::currentRouteName())}}">Trading</a></li>
    <li class="active"><a href="{{route(Route::currentRouteName())}}">Trades</a></li> 
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.bars.action')
                <div class="pull-left">
                    <a href="{{route('trade.create')}}" class="btn btn-warning">New Trade</a>
                </div>
                <div class="pull-right">
                    {!! Form::select('season', ['' => 'Season'], null, ["class='action-control'"]) !!}
                    {!! Form::select('team', ['' => 'Team'], null, ["class='action-control'"]) !!}
                    {!! Form::select('type', ['' => 'Type'], null, ["class='action-control'"]) !!}
                </div>
            @endcomponent
            @component('components.box.default', ['title' => 'My Active Trades'])
                @slot('body')
                    @if($model->trades->active && count($model->trades->active) > 0)
                        @include('dir.trade.partials.tradeaccordian', ['trades' => $model->trades->active, 'id' => 'active'])
                    @else
                        <span>You have no active trades.</span>
                    @endif
                @endslot
            @endcomponent
            @component('components.box.default', ['title' => 'My Accepted Trades'])
                @slot('body')
                    @if($model->trades->accepted && count($model->trades->accepted) > 0)
                        @include('dir.trade.partials.tradeaccordian', ['trades' => $model->trades->accepted, 'id' => 'accepted'])
                    @else
                        <span>You have no accepted trades.</span>
                    @endif
                @endslot
            @endcomponent
            @component('components.box.default', ['title' => 'League Trades'])
                @slot('buttons')
                    @if($model->trades->league)
                        <div class="pull-right">{{$model->trades->league->links()}}</div>
                    @endif
                @endslot
                @slot('body')
                    @if($model->trades->league && count($model->trades->league) > 0)
                        @include('dir.trade.partials.tradeaccordian', ['trades' => $model->trades->league, 'id' => 'all'])
                    @else
                        <span>There are no trades to display.</span>
                    @endif
                @endslot
            @endcomponent
            @component('components.box.default', ['title' => 'My Rejected Trades'])
                @slot('body')
                    @if($model->trades->rejected && count($model->trades->rejected) > 0)
                        @include('dir.trade.partials.tradeaccordian', ['trades' => $model->trades->rejected, 'id' => 'rejected'])
                    @else
                        <span>You have no rejected trades.</span>
                    @endif
                @endslot
            @endcomponent
        </div>
    </div>
@endsection