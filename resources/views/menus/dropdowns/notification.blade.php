<li class="dropdown notifications-menu">
    <a onclick="saw_notifications();" href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        @if($inbox->notifications->new != 0)
        <span class="label label-warning">{{$inbox->notifications->new}}</span>
        @endif
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have {{$inbox->notifications->new}} new notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <!-- start notifications -->
                @forelse($inbox->notifications as $notification)
                    <li class="{{$notification->noticed}}">
                        <a href='{{url("$notification->referenceLink")}}'>
                            <i class="fa {{$notification->iconClass}}"></i> {{$notification->description}}
                        </a>
                    </li>
                @empty
                    <li>No Notifications</li>
                @endforelse
                <!-- end notifications -->
            </ul>
        </li>
        <li class="footer"><a href="{{ url('/notification')}}">View all</a></li>
    </ul>
</li>