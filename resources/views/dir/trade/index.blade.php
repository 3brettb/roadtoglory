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
    <li>Trading</li>
    <li class="active">Trades</li>
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
                    @if($mytrades && count($mytrades) > 0)
                        @include('dir.trade.partials.tradeaccordian', ['trades' => $mytrades])
                    @else
                        <span>You have no active trades.</span>
                    @endif
                @endslot
            @endcomponent
            @component('components.box.default', ['title' => 'League Trades'])
                @slot('buttons')
                    @if($trades)
                        <div class="pull-right">{{$trades->links()}}</div>
                    @endif
                @endslot
                @slot('body')
                    @if($trades && count($trades) > 0)
                        @include('dir.trade.partials.tradeaccordian', ['trades' => $trades])
                    @else
                        <span>There are no trades to display.</span>
                    @endif
                @endslot
            @endcomponent
        </div>
    </div>
@endsection