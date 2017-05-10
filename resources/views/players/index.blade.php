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
    <section class="content">
        <table id="table"></table>
    </section>
@endsection

@push('bottom-script-list')
    <script src="{{ URL::asset('plugins/bootstrap-table/src/bootstrap-table.js') }}"></script>
@endpush

@push('bottom-scripts')
    $('#table').bootstrapTable({
        columns: [{
            field: 'firstname',
            title: 'First'
        }, {
            field: 'lastname',
            title: 'Last'
        }, {
            field: 'position',
            title: 'POS'
        }, {
            field: 'teamAbbr',
            title: 'NFL'
        }, {
            field: 'owner',
            title: 'Team'
        }, {
            field: 'status',
            title: 'Status'
        }],
        data: [
            @foreach($players as $player)
                <?php echo json_encode($player); ?>,
            @endforeach
        ]
    });
@endpush

@section('head-script')
    <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap-table/src/bootstrap-table.css') }}">
@endsection

