<div id="people" class="player-list container">
    @component('components.box.default', ['title' => 'Players'])
        @slot('body')
            <v-client-table :data="tableData" :columns="columns" :options="options"></v-client-table>
        @endslot
    @endcomponent
</div> 

@push('style')
    #people {
        text-align: center;
        width: 95%;
        margin: 0 auto;
    }

    h2 {
        margin-bottom: 30px;
    }

    th,
    td {
        text-align: left;
    }

    th:nth-child(n+2),
    td:nth-child(n+2) {
        text-align: center;
    }

    thead tr:nth-child(2) th {
        font-weight: normal;
    }

    .VueTables__sort-icon {
        margin-left: 10px;
    }

    .VueTables__dropdown-pagination {
        margin-left: 10px;
    }

    .VueTables__highlight {
        background: yellow;
        font-weight: normal;
    }

    .VueTables__sortable {
        cursor: pointer;
    }

    .VueTables__date-filter {
        border: 1px solid #ccc;
        padding: 6px;
        border-radius: 4px;
        cursor: pointer;
    }

    .VueTables__filter-placeholder {
        color: #aaa;
    }

    .VueTables__list-filter {
        width: 120px;
    }
@endpush

@push('vue_model')
    vue_model['players'] = [
        @foreach($players as $player)
            {!!json_encode($player) !!},
        @endforeach
    ];
@endpush

@push('vue')
    <script src="{{URL::asset('vue/views/player/datatable.js')}}"></script>
@endpush