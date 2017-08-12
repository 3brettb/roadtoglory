<div class="roster-table">
    <table class="table" style="margin-bottom: 0px;">
        @if($roster->team->id == team()->id)
            <col>
        @endif
        <colgroup span="2"></colgroup>
        <colgroup span="3"></colgroup>
        <colgroup span="3"></colgroup>
        <tr>
            <th></th>
            <th colspan=2 scope="colgroup" class="center divider">Player</th>
            <th colspan=3 scope="colgroup" class="center divider">Week</th>
            <th colspan=3 scope="colgroup" class="center">Season</th>
        </tr>
        <tr>
            @if($roster->team->id == team()->id)
                <th class="center" style="width: 88px;">Action</th>
            @endif
            <th class="left">Slot</th>
            <th class="left divider">Last, First Team POS</th>
            <th class="center">Current</th>
            <th class="center" style="width: 80px;">Score</th>
            <th class="center divider"  style="width: 80px;">Projected</th>
            <th class="right">Points</th>
            <th class="right">Average</th>
            <th class="right">Projection</th>
        </tr>
        @foreach($slots as $slot)
            @if($slot->hasPlayer())
                <tr class="roster-row filled" data-requirements="{{$slot->requirements}}" data-playerid="{{$slot->player->id}}" data-position="{{$slot->player->position}}" data-table="{{$table or ''}}">
                    @if($roster->team->id == team()->id)
                        <td class="center">
                            <a class="btn btn-default handle visible open" style="padding: 2px 7px;">Move/Select</a>
                        </td>
                    @endif
                    <td class="left slot">{{$slot->name}}</td>
                    <td class="left divider">{{$slot->player->display('{L}, {F} {N} {P}')}}</td>
                    <td class="center">{{$slot->current or ''}}</td>
                    <td class="center">{{$slot->score or ''}}</td>
                    <td class="center divider">{{$slot->projected->week or ''}}</td>
                    <td class="right">{{$slot->season or ''}}</td>
                    <td class="right">{{$slot->average or ''}}</td>
                    <td class="right">{{$slot->projected->season or ''}}</td>
                </tr>
            @else
                <tr class="roster-row empty" data-requirements="{{$slot->requirements}}" data-playerid="" data-position="" data-table="{{$table or ''}}">
                    @if($roster->team->id == team()->id)
                        <td class="center">
                            <a class="btn btn-success handle" style="padding: 2px 7px;">Here</a>
                        </td>
                    @endif
                    <td class="left slot">{{$slot->name}}</td>
                </tr>
            @endif
        @endforeach
        @if($roster->team->id == team()->id && isset($hasExtra))
            <tr class="roster-row extra" data-requirements="" data-playerid="" data-position="" data-table="{{$table or ''}}">
                <td class="center">
                    <a class="btn btn-success handle" style="padding: 2px 7px; display: block">Here</a>
                </td>
                <td class="left slot">{{strtoupper($table)}}</td>
            </tr>
        @endif
    </table>
</div>