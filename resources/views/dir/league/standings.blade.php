@extends('layout.app')

@push('on_ready')
  $("#standings").addClass('active');
@endpush

@section('title')
    | Standings
@endsection

@section('pagetitle')
    <h1>Standings <small>{{league()->name}}</small></h1>
@endsection

@section('breadcrumb')
    <li class="active">Standings</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.box.default', ['title' => "League Standings"])
                @slot('body')
                    @include('partials.resources.standings.detailed', ['name' => league()->name, 'teams' => $teams])
                @endslot
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @component('components.box.default', ['title' => "Division Standings"])
                @slot('body')
                    <div class="row">
                        @foreach($divisions as $division)
                            <div class="col-md-6">
                                @include('partials.resources.standings.standard', ['name' => $division->name, 'teams' => $division->teams])
                            </div>
                        @endforeach
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection