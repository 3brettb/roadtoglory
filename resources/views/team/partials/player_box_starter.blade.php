<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Starters</h3>
        
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <table id="startertable" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Slot</th>
                    <th>First, Last, POS Team</th>
                    <th>Status</th>
                    <th>Upcoming Week</th>
                    <th>Projected</th>
                    <th>Last</th>
                    <th>Season Total</th>
                    <th>Average</th>
                </tr>
            </thead>
            <tbody>
                <?php $slotpos = 1; ?>
                @foreach(get_starter_slots() as $pos => $slot)
                    @for($i=0; $i<$slot['num']; $i++)
                        <?php $player = get_slot_player($team, $slotpos, "STARTER"); ?>
                        <tr>
                            @if($player)
                                <td></td>
                                <td>{{$pos}}</td>
                                <td><a href="{{url('/players/'.$player->player_id)}}">{{$player->fulldisplay()}}</a></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @else
                                <td></td><td>{{$pos}}</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                            @endif
                        </tr>
                        <?php $slotpos++; ?>
                    @endfor
                @endforeach
            </tbody>
        </table>
    </div>
</div>