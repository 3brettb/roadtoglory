<div class="rankings rankings-small">
    <ul>
        @if($rankings)
            @foreach($rankings as $ranking)
                <li>
                    <div class="row no-spacing">
                        <div class="col-xs-2"><span class="ranking-rank">{{$ranking->rank->current}}</span></div>
                        <div class="col-xs-8"><span class="ranking-team">{{$ranking->team->display('{N} {M}')}} ({{$ranking->team->record}})</span></div>
                        <div class="col-xs-2"><span class="ranking-change">{{$ranking->change->value}} <i class="{{$ranking->change->icon}}"></i></span></div>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>