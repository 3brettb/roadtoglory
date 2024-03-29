<div id="pttoolbar"></div>
<table id="playertable"
    data-toolbar="#{{$toolbar or 'pttoolbar'}}"
    data-search="true"
    data-pagination="true"
    data-show-columns="true"
    data-page-list="[10, 25, 50, 100, ALL]">
</table>

@push('on_ready')
    $('#playertable').bootstrapTable({
        columns: [{
            field: 'checked',
            checkbox: true,
            align: 'center',
            valign: 'middle',
        }, {
            field: 'firstname',
            title: 'First',
            sortable: true,
        }, {
            field: 'lastname',
            title: 'Last',
            sortable: true,
        }, {
            field: 'position',
            title: 'POS',
            sortable: true,
        }, {
            field: 'teamAbbr',
            title: 'NFL',
            sortable: true,
        }, {
            field: 'owner',
            title: 'Team',
            sortable: true,
        }, {
            field: 'status',
            title: 'Status',
            sortable: true,
        }],
        data: [
            @foreach($players as $player)
                <?php echo json_encode($player); ?>,
            @endforeach
        ]
    });

    function userActionFormatter(value, row, index){
        return [
            '<a class="actionbtn btn btn-primary" href="javascript:void(0)">',
            'Action',
            '</a>'
        ].join('');
    }
@endpush

@push('scripts')
    <script src="{{ URL::asset('plugins/bootstrap-table/src/bootstrap-table.js') }}"></script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap-table/src/bootstrap-table.css') }}">
@endpush