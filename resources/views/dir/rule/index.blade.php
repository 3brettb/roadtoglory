@extends('layout.app')

@push('on_ready')
  $("#other").addClass('active');
  $("#rules").addClass('active');
@endpush

@section('title')
    | League Rules
@endsection

@section('pagetitle')
    <h1>League Rules <small>{{league()->name}}</small></h1>
@endsection

@section('breadcrumb')
    <li class="active">League Rules</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.bars.action')
                
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('dir.rule.partials.contents', ['rules' => $model->rules])
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            @include('dir.rule.partials.lists.sections', ['sections' => $model->rules->sections])
        </div>
    </div>
@endsection