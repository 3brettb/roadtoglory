<div id="rankings">
    @component('components.box.default', ['title' => 'Rankings', 'collapse' => true])
        @slot('buttons')
            @if($rankings)
                <span><small>Week {{$rankings->week->number}}</small></span>
                @component('components.box.dropdown')
                    <li><a href="{{route('league.rankings', ['week' => $rankings->week->id])}}">View Details</a></li>
                    <li><a href="{{route('league.rankings', ['week' => $rankings->week->id])}}#reply">Reply</a></li>
                @endcomponent
            @endif
        @endslot
        @slot('body')
            @if($rankings)
                @include('widgets.rankings.small', ['rankings' => $rankings])
            @else
                <p>There are no rankings to display at this time.</p>
            @endif
        @endslot
        @slot('footer')
            @if($rankings)
                @include('inserts.line.updated', ['when' => $rankings->updated_at, 'class' => 'pull-left'])
            @endif
        @endslot
    @endcomponent
</div>