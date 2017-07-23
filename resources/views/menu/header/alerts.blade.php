<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-warning"></i>
        <span class="label label-danger">2</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">There are 2 active alerts</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <!-- start alerts -->
                @if($alerts)
                    @foreach($alerts as $alert)
                        <li class="{{($alert->active) ? 'active' : ''}}">
                            <a href="{{ url('/alert/$alert->id')}}">
                                <h3>
                                    <i class="fa fa-warning text-warning"></i> {{$alert->description}}
                                    <small class="pull-right"><i class="fa fa-clock-o"></i> {{$alert->created_at->format('diffForHumans')}}</small>
                                </h3>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li>There are no alerts to display.</li>
                @endif
                <!-- end alerts -->
            </ul>
        </li>
        <li class="footer">
            <a href="{{url('/alert')}}">View all Alerts</a>
        </li>
    </ul>
</li>