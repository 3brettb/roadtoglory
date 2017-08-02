<div class="player-info">
    @component('components.box.default', ['title' => 'Player Info', 'collapse' => true])
        @slot('body')
            <div class="text-center">
                <img src='{{$player->image()}}' class="img-circle center-block center-player-img" alt="Player Image">
                <h4>{{$player->display('{F} {L} - {P} {N}')}}</h4>
                <h5>Owner: {{($player->owner != null) ? $player->owner->display('{N} {M}') : "Free Agent"}}</h5>
                <h5>
                    Status: @include('inserts.status.bubble', ['status' => $player->status])
                </h5>
                <h5>
                    Injury: @include('inserts.status.bubble', ['status' => ($player->injuryGameStatus) ? $player->injuryGameStatus : 'Healthy'])
                </h5>
                <h6><a href="{{$player->profile()}}" target="_blank">NFL.com Profile</a></h6>
            </div>
        @endslot
    @endcomponent
</div>