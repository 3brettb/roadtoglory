<div class="panel-group" id="roster_accordian">
  @foreach(teams() as $team)
    @php
        $collapse = "collapse-$team->id";
    @endphp
    <div class="panel panel-primary">
        <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#roster_accordian" href="#{{$collapse}}">{{$team->displayname()}} Roster</a>
        </h4>
        </div>
        @if($loop->first)
            <div id="{{$collapse}}" class="panel-collapse collapse in">
        @else
            <div id="{{$collapse}}" class="panel-collapse collapse">
        @endif
                <div class="panel-body">
                    <ol style="margin:0; padding-left:10px;">
                        @foreach($team->roster as $player)
                            <li><a href="{{url('/players')}}/{{$player->playerid()}}">{{$player->fulldisplay()}}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div>
    </div>
  @endforeach
</div>