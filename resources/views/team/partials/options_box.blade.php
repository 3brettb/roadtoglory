<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Team Options</h3>
        
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div style="text-align: center;">
            <img src='{{$team->picture}}' class="img-circle center-block center-player-img" alt="{{$team->displayname()}}">
            <h4>{{$team->displayname()}}</h4>
            <h5>League Record: [wins] - [losses]</h5>
            <h5>Division Record: [divisionwins] - [divisionlosses]</span></h5>
            <h5>Rank: [rank] | Points: [total points]</span></h5>
            @if($team->id == team()->id)
                <div class="btn btn-warning"><a class="text-white" href="#">Trading Block</a></div>
                <div class="btn btn-success"><a class="text-white" href="#">Save Roster</a></div>
            @else
                <div class="btn btn-warning"><a class="text-white" href="{{url('/trade/create')}}?teamid={{$team->id}}">Trade</a></div>
            @endif
        </div>
    </div>
</div>