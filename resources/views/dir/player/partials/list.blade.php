<div class="player-list">
    @component('components.box.default', ['title' => 'Players'])
        @slot('body')
            <v-client-table :data="playerData" :columns="columns" :options="options"></v-client-table>
        @endslot
    @endcomponent
</div>

@push('vue_model')
    
@endpush

@push('vue')
    <script src="{{URL::asset('vue/views/player/datatable.js')}}"></script>
@endpush