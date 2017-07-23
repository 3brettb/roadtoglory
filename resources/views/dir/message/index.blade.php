@extends('layout.app')

@push('on_ready')
  $("#messages").addClass('active');
@endpush

@section('title')
    | Messages
@endsection

@section('pagetitle')
    <h1>Messages <small>{{league()->name}}</small></h1>
@endsection

@section('breadcrumb')
    <li class="active">Messages</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.bars.action')
                <a href="#" class="btn btn-primary">New Message</a>
                {!! Form::select('type', $type_select, null, ['class="action-control pull-right"']) !!}
                <span class="pull-right">{{$messages->links()}}</span>
            @endcomponent
        </div>
        <div class="messages">
            @foreach($messages as $message)
                <div class="col-md-6">
                    <div class="messages messages-message">
                        @include('partials.resources.message', ['message' => $message])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection