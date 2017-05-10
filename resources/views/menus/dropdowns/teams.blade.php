<li id="teams" class="treeview">
    <a href="{{url('/team')}}">
    <i class="fa fa-group"></i>
    <span>Teams</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        @foreach($teams as $team)
            <li><a href='{{url("/team/$team->id")}}'><i class="fa fa-user"></i>{{$team->displayname()}} ({{$team->owner->firstname}})</a></li>
        @endforeach
    </ul>
</li>