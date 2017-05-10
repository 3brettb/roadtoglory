@extends('layouts.app')

@section('title')
    | Players
@endsection

@section('pagetitle')
    <h1>Players</h1>
@endsection

@section('breadcrumb')
    <li class="active">Players</li>
@endsection

@section('content')
    <table id="players-table" class="table table-bordered">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection

@push('bottom-scripts')
    $(document).ready(function(){
        $("#players-table").datatable({
            pageSize: 50,
            sort: [true],
            filters: [true],
            filterText: 'Type to filter...',
            data: [
                @foreach($players as $player)
                    ['{{$player->firstname}}', '{{$player->lastname}}'],
                @endforeach
            ]
        });
    });
@endpush

@section('head-script')
    <!-- If you are using bootstrap: -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/datatable/css/datatable-bootstrap.min.css') }}" media="screen">
                            
    <!-- JS files -->
    <script type="text/javascript" src="{{ URL::asset('plugins/datatable/js/datatable.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/datatable/js/datatable.jquery.min.js') }}"></script>
@endsection

