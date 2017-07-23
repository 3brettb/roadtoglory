<div class="player-info">
    @component('components.box.default', ['title' => 'Player Info', 'collapse' => true])
        @slot('body')
            <div class="text-center">
                <img src='{{$player->image()}}' class="img-circle center-block center-player-img" alt="Player Image">
                <h4>{{$player->display('{F} {L} - {P} {N}')}}</h4>
                <h5>Owner Team Mascot</h5>
                <h5>Status: <span class="label label-success">Active</span></h5>
                <h6><a href="{{$player->profile()}}" target="_blank">NFL.com Profile</a></h6>
            </div>
        @endslot
    @endcomponent
</div>