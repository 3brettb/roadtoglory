@extends('layout.admin')

@push('on_ready')
    $("#users").addClass('active');
    $("#user_create").addClass('active');
@endpush

@section('title')
    | Admin Portal | Add User
@endsection

@section('pagetitle')
    <h1>Add User <small>{{league()->name}}</small></h1>
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

            @component('components.box.default', ['title' => 'Create a User'])
                @slot('body')
                    
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.users.store') }}">
                        @include('partials.forms.user.create')
                    </form>
                    
                @endslot
            @endcomponent
        
        </div>
    </div>

@endsection