<div class="player-list">
    @component('components.box.default', ['title' => 'Players'])
        @slot('buttons')
            <div id="playersearchtoolbar"></div>
        @endslot
        @slot('body')
            @include('partials.resources.player.datatable', ['players' => $players, 'toolbar' => 'playersearchtoolbar'])
        @endslot
    @endcomponent
</div>