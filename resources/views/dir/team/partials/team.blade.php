<div class="team-team {{$class or ""}}">
    @component('components.box.default', ['title' => 'Team', 'collapse' => true])
        @slot('body')
            <div style="text-align: center;">
                <img src='{{$team->image()}}' class="img-circle center-block center-player-img" alt="{{$team->display('{N} {M}')}}">
                <h4>{{$team->display('{N} {M}')}}</h4>
                <h5>League Record: {{$standing->league->wins}} - {{$standing->league->losses}}</h5>
                <h5>Division Record: {{$standing->division->wins}} - {{$standing->division->losses}}</span></h5>
                <h5>Rank: @{{$standing->rank}} | Points: {{$standing->league->points->for}}</span></h5>
                @if($team->owner == user())
                    <div class="btn btn-warning"><a class="text-white" href="#">Trading Block</a></div>
                @else
                    <div class="btn btn-warning"><a class="text-white" href="{{url('/trade/create')}}?teamid={{$team->id}}">Trade</a></div>
                @endif
            </div>
        @endslot
    @endcomponent
</div>