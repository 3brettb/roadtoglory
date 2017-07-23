<div class="gamebox">
    <a href="$matchup->routeto()">
        @foreach($matchup->teams as $team)
            <div class="col-xs-{{12/count($matchup->teams)}}">
                @include('partials.resources.game.team', ['team' => $team, 'matchup' => $matchup])
            </div>
        @endforeach
        <div style="width:100%; text-align: center;">
            @include('inserts.status.bubble', ['status' => $matchup->status])
        </div>
    </a>
</div>