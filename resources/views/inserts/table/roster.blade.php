<div class="roster-table">
    <table class="table" style="margin-bottom: 0px;">
        <col>
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
            <th class="center" style="width: 10px;">Action</th>
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
            {{--  <tr class="{{($player->exists) ? 'filled' : 'empty'}}" data-requirements="{{$player->slot->requirements}}">
                <td class="center">
                    <a href="#" data-id="{{$player->id or '-1'}}" class="btn btn-default player-action" style="padding: 2px 7px;">Move/Select</a>
                </td>
                <td class="left">{{$player->slot->name}}</td>
                <td class="left divider">{{($player->exists) ? $player->display('{L}, {F} {N} {P}') : ''}}</td>
                <td class="center">{{$player->game or ''}}</td>
                <td class="center">{{$player->score or ''}}</td>
                <td class="center divider">{{$player->projected->week or ''}}</td>
                <td class="right">{{$player->season or ''}}</td>
                <td class="right">{{$player->average or ''}}</td>
                <td class="right">{{$player->projected->season or ''}}</td>
            </tr>  --}}
            @if($slot->hasPlayer())
                <tr class="filled" data-requirements="{{$slot->requirements}}">
                    <td class="center">
                        <a data-id="{{$slot->player->id}}" class="btn btn-default player-action" style="padding: 2px 7px;">Move/Select</a>
                    </td>
                    <td class="left">{{$slot->name}}</td>
                    <td class="left divider">{{$slot->player->display('{L}, {F} {N} {P}')}}</td>
                    <td class="center">{{$slot->current or ''}}</td>
                    <td class="center">{{$slot->score or ''}}</td>
                    <td class="center divider">{{$slot->projected->week or ''}}</td>
                    <td class="right">{{$slot->season or ''}}</td>
                    <td class="right">{{$slot->average or ''}}</td>
                    <td class="right">{{$slot->projected->season or ''}}</td>
                </tr>
            @else
                <tr class="empty" data-requirements="{{$slot->requirements}}">
                    <td class="center">
                        <a data-id="" class="btn btn-default player-action" style="padding: 2px 7px; visibility: hidden;">Here</a>
                    </td>
                    <td class="left">{{$slot->name}}</td>
                </tr>
            @endif
        @endforeach
    </table>
</div>

<script>

    $("a.player-action").on('click', function(tag){
        console.log(tag);
    });

    function getRow(tag)
    {
        
    }

</script>