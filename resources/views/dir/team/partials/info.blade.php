<div class="team-info {{$class or ""}}">
    @component('components.box.default', ['title' => 'Information', 'collapse' => true])
        @slot('body')
            <ul>
                @foreach($matchups as $matchup)
                    <?php $week = $matchup->week; ?>
                    <li>
                        <span class="pull-left">Week {{$week->number}}({{$week->nflweek}})</span>
                        <span class="pull-right">{{$matchup->result}}</span>
                    </li>
                @endforeach
            </ul>
        @endslot
    @endcomponent
</div>