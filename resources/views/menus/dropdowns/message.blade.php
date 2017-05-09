<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-envelope-o"></i>
        <span class="label label-success">{{sizeof($inbox->messages)}}</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have {{sizeof($inbox->messages)}} messages</li>
        <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            <!-- start messages -->
            @forelse($inbox->messages as $message)
                <li>
                    <a href='{{ url("/message/$message->id") }}'>
                        <div class="pull-left">
                        <img src='{{ URL::asset($message->userPicture) }}' class="img-circle" alt="User Image">
                        </div>
                        <h4>
                        {{$message->fromName}}
                        <small><i class="fa fa-clock-o"></i> {{$message->timeAgo}}</small>
                        </h4>
                        <p>{{$message->subject}}</p>
                    </a>
                </li>
            @empty
                <li>No Messages</li>
            @endforelse
            <!-- end messages -->
        </ul>
        </li>
        <li class="footer"><a href="{{ url('/message')}}">See All Messages</a></li>
    </ul>
</li>