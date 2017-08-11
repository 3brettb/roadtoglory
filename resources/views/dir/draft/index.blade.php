@extends('layout.app')

@push('on_ready')
    $("#draft").addClass('active');
@endpush

@section('title')
    | Draft
@endsection

@section('pagetitle')
    <h1>{{league()->name}} Draft Board<small>{{$draft->season->year}}</small></h1>
@endsection

@section('breadcrumb')
    <li>Draft Board</li>
    <li class="active">{{$draft->season->year}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.bars.action')
                 <div class="pull-left">
                    {!! Form::select('season', league()->seasons->pluck('year', 'id'), season()->id, ['class="action-control"']) !!}
                    @if($draft->completed)
                        {!! Form::select('rounds', $draft->rounds, null, ['class="action-control"']) !!}
                        {!! Form::select('team', $draft->teams, null, ['class="action-control"']) !!}
                    @endif
                </div>
            @endcomponent
            @include('dir.draft.partials.details', ['draft' => $draft])
            @include('dir.draft.partials.board', ['draft' => $draft])
        </div>
    </div>
@endsection