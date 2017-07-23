<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-envelope-o"></i>
        <span class="label label-danger">6</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 6 unread messages</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <!-- start messages -->
                @if($messages)
                    @foreach($messages as $message)
                        <li>
                            <a href='{{ url("/inbox/$message->id") }}'>
                                <div class="pull-left">
                                    <img src='{{ $user->image() }}' class="img-circle" alt="User Image">
                                </div>
                                <h4>
                                    {{$message->user->display('{F} {L}')}}
                                    <small><i class="fa fa-clock-o"></i> {{$message->created_at->format('diffForHumans')}}</small>
                                </h4>
                                <p>{{$message->subject}}</p>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li>There are no messages to display.</li>
                @endif
                <!-- end messages -->
            </ul>
        </li>
        <li class="footer"><a href="{{ url('/inbox')}}">See All Messages</a></li>
    </ul>
</li>