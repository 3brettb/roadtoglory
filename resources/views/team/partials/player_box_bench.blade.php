<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Bench</h3>
        
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <table id="benctable" class="display" cellspacing="0" width="100%">
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
                @foreach($team->bench as $r_player)
                    <tr>
                        <td></td>
                        <td>Bench</td>
                        <td><a href="{{url('/players/'.$r_player->player_id)}}">{{$r_player->fulldisplay()}}</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>