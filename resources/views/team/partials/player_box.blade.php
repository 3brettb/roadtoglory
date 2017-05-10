<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{$title}}</h3>
        
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
                @foreach($slots as $pos => $slot)
                    @for($i=0; $i<$slot['num']; $i++)
                        <tr>
                            <td></td>
                            <td>{{$pos}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endfor
                @endforeach
            </tbody>
        </table>
    </div>
</div>