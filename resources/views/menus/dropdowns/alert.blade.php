<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-warning"></i>
        @if($inbox->alerts->activeAlerts != 0)
        <span class="label label-danger">{{$inbox->alerts->activeAlerts}}</span>
        @endif
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have {{$inbox->alerts->activeAlerts}} active alerts</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <!-- start alerts -->
                @forelse($inbox->alerts as $alert)
                    <li class="active">
                        <a href="#">
                            <h3>
                            <i class="fa fa-warning {{$alert->iconClass}}"></i> description
                            <small class="pull-right"><i class="fa fa-clock-o"></i> time ago</small>
                            </h3>
                        </a>
                    </li>
                @empty
                    <li>No Alerts</li>
                @endforelse
                <!-- end alerts -->
            </ul>
        </li>
        <li class="footer">
            <a href="{{url('/alert')}}">View all Alerts</a>
        </li>
    </ul>
</li>