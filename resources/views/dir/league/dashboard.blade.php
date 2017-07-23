@extends('layout.app')

@push('on_ready')
  $("#dashboard").addClass('active');
@endpush

@section('title')
    | Dashboard
@endsection

@section('pagetitle')
    <h1>{{league()->name}}</h1>
@endsection

@section('breadcrumb')
    <li class="active">League Dashboard</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
        
            @include('dir.league.partials.dashboard.newsletter', ['newsletter' => $messages->newsletter])    

            @include('dir.league.partials.dashboard.standings', ['standings' => true])

            <div class="row">
                <div class="col-md-6">
                    @include('dir.league.partials.dashboard.messages', [
                        'id' => 'adminmessages',
                        'title' => 'Administrator Messages',
                        'messages' => $messages->admin,
                        'routes' => [
                            'index' => route('message.index', ['type' => 1]),
                            'create' => route('message.create', ['type' => 1])
                        ]
                    ])
                </div>
                <div class="col-md-6">
                    @include('dir.league.partials.dashboard.messages', [
                        'id' => 'leaguemessages',
                        'title' => 'League Messages',
                        'messages' => $messages->league,
                        'routes' => [
                            'index' => route('message.index', ['type' => 3]),
                            'create' => route('message.create', ['type' => 3])
                        ]
                    ])
                </div>
            </div>

            @include('dir.league.partials.dashboard.trades', ['trades' => $trades->visible])

        </div>
        
        <div class="col-md-4">

            @include('dir.league.partials.dashboard.rankings', ['rankings', $rankings])

            @include('dir.league.partials.dashboard.polls', ['poll', $poll])

            @include('dir.league.partials.dashboard.chats.league')

            @include('dir.league.partials.dashboard.chats.direct')

            @include('dir.league.partials.dashboard.activity', ['activity', $activity->recent])

            @include('dir.league.partials.dashboard.events', ['events', $week->events])

        </div>
    </div>
@endsection