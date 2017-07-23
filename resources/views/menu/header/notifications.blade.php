<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-danger">4</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 4 new notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <!-- start notifications -->
                @if($notifications)
                    @foreach($notifications as $notification)
                        <li class="active">
                            <a href='{{url("$notification->reference_uri")}}'>
                                <i class="fa fa-bell-o text-primary"></i> {{$notification->description}}
                                <small class="pull-right"><i class="fa fa-clock-o"></i> {{$notification->created_at->format('diffForHumans')}}</small>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li>There are no notifications to display.</li>
                @endif
                <!-- end notifications -->
            </ul>
        </li>
        <li class="footer"><a href="{{ url('/notifications')}}">View all</a></li>
    </ul>
</li>