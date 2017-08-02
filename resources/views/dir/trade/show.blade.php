@extends('layout.app')

@push('on_ready')
  $("#trading").addClass('active');
  $("#trades").addClass('active');
@endpush

@section('title')
    | View Trade
@endsection

@section('pagetitle')
    <h1>View Trade <small>{{league()->name}}</small></h1>
@endsection

@section('breadcrumb')
    <li><a href="{{route('trade.index')}}">Trading</a>s</li>
    <li><a href="{{route('trade.index')}}">Trades</a></li>
    <li class="active">View Trade</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.bars.action')
                @if($model->hasResponse)
                    <div class="pull-left">
                        You have responded to this trade: @include('inserts.status.bubble', ['status' => $model->response])
                    </div>
                @endif
                <div class="pull-left">
                    Trade Status: @include('inserts.status.bubble', ['status' => $trade->status()])
                </div>
                <div class="pull-right">
                    @if($model->isOwner)
                        <a onclick="revoke()" class="btn btn-danger">Revoke</a>
                    @elseif($model->isRecipient)    
                        <a onclick="accept()" class="btn btn-success">Accept</a>
                        <a onclick="reject()" class="btn btn-danger">Reject</a>
                    @endif
                </div>
            @endcomponent
        </div>
    </div>
    <div class="row">
        @foreach($trade->teams as $team)
            <div class="col-md-6">
                @component('components.box.default', ['title' => $team->display("{N} {M}"), 'collapse' => true])
                    @slot('body')
                        @foreach($team->tradeItems($trade) as $item)
                            <span style="margin-right: 10px;">{{$item->toString()}}</span> 
                            <i class="fa fa-long-arrow-left"></i>
                            <span style="margin-left: 10px;">FROM {{$item->owner->display('{N} {M}')}}</span>
                        @endforeach
                    @endslot
                @endcomponent
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script>

        function revoke(){
            if (confirm("Are you sure you want to revoke this trade?") == true) {
                axios.delete("{{route('trade.destroy', [$trade])}}").then(response => {
                    window.methods.axiosOnResponse(response.data);
                });
            }
        }
        function accept(){
            if (confirm("Are you sure you want to accept this trade?") == true) {
                axios.post("{{route('trade.accept', [$trade])}}").then(response => {
                    window.methods.axiosOnResponse(response.data);
                });
            }
        }
        function reject(){
            if (confirm("Are you sure you want to reject this trade?") == true) {
                axios.post("{{route('trade.reject', [$trade])}}").then(response => {
                    window.methods.axiosOnResponse(response.data);
                });
            }
        }

    </script>
@endpush