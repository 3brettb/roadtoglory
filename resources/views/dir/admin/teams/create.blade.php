@extends('layout.admin')

@push('on_ready')
    $("#teams").addClass('active');
    $("#teams_create").addClass('active');
@endpush

@section('title')
    | Admin Portal | Add Team
@endsection

@section('pagetitle')
    <h1>Add Team <small>{{league()->name}}</small></h1>
@endsection

@section('content')
    @if($errors->any())
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="well">
                    <span>{{$errors->first()}}</span>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            @component('components.box.default', ['title' => 'Add a Team'])
                @slot('body')
                    
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.teams.store') }}">
                        @include('partials.forms.team.create')
                    </form>
                    
                @endslot
            @endcomponent
        
        </div>
    </div>

@endsection