<div class="rankings rankings-large">
    <ul>
        <li>
            <div class="row no-spacing" style="margin-bottom: 10px;">
                <div class="col-xs-1"><span class="ranking-title">Rank</span></div>
                <div class="col-xs-3"><span class="ranking-title">Team</span></div>
                <div class="col-xs-1"><span class="ranking-title">Last</span></div>
                <div class="col-xs-1"><span class="ranking-title">Change</span></div>
                <div class="col-xs-6"><span class="ranking-title">Notes</span></div>
            </div>
        </li>
        @if($rankings)
            @foreach($rankings as $ranking)
                <li>
                    <div class="row no-spacing">
                        <div class="col-xs-1"><span class="ranking-rank">{{$ranking->rank->current}}</span></div>
                        <div class="col-xs-3"><span class="ranking-team">{{$ranking->team->display('{N} {M}')}} ({{$ranking->team->record}})</span></div>
                        <div class="col-xs-1"><span class="ranking-last">{{$ranking->rank->last}}</span></div>
                        <div class="col-xs-1"><span class="ranking-change">{{$ranking->change->value}} <i class="{{$ranking->change->icon}}"></i></span></div>
                        <div class="col-xs-6"><span class="ranking-last">{{$ranking->comments}}</span></div>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>