<div id="standings">
    @component('components.box.default', ['title' => 'Standings', 'collapse' => true])
        @slot('buttons')
            @if($standings)
                @component('components.box.dropdown')
                    <li><a href="{{route('league.standings')}}">View Detailed</a></li>
                @endcomponent
            @endif
        @endslot
        @slot('body')
            @if($standings)
                @include('partials.resources.standings.standard', ['teams' => league()->teams])
            @else
                <p>There are no league standings to display at this time.</p>
            @endif
        @endslot
        @slot('footer')
            @if($standings)
                @include('inserts.line.updated', ['when' => \Carbon\Carbon::now(), 'class' => 'pull-left'])
            @endif
        @endslot
    @endcomponent
</div>