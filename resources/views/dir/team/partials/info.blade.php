<div class="team-info {{$class or ""}}">
    @component('components.box.default', ['title' => 'Information', 'collapse' => true])
        @slot('body')
            <ul>
                @foreach($weeks as $week)
                    <li>
                        <span class="pull-left">Week {{$week->number}}({{$week->nflweek}})</span>
                        <span class="pull-right">{{$week->result}} {{$week->matchup->score}}</span>
                    </li>
                @endforeach
            </ul>
        @endslot
    @endcomponent
</div>