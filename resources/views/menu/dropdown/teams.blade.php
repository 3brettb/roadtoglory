<li id="teams" class="treeview">
    <a href="{{url('/team')}}">
        <i class="{{$icon or 'fa fa-users'}}"></i>
        <span>{{$name or 'Teams'}}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @if(league()->teams)
            @foreach(league()->teams as $team)
                <li id="team-{{$team->id}}"><a href='{{url("/team/$team->id")}}'><i class="{{$sub_icon or 'fa fa-user'}}"></i>{{$team->display('{N} {M}')}} ({{$team->owner->firstname}})</a></li>
            @endforeach
        @endif
    </ul>
</li>