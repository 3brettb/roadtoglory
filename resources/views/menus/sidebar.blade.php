<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
            <img src='{{ URL::asset("img/default_user.jpg") }}' class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Team Name Here</p>
            <a><i class="fa fa-circle bg-green"></i> {{auth()->user()->status}}</a>
        </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li id="inbox" class="treeview">
                <a href="#">
                <i class="fa fa-briefcase"></i>
                <span>INBOX</span>
                <span class="pull-right-container">
                    <span class="pull-right-container">
                        <span class="label label-info pull-right">14</span>
                    </span>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class="treeview">
                    <a href="{{url('/alert')}}">
                    <i class="fa fa-flag"></i>
                    <span>Alerts</span>
                    <span class="pull-right-container">
                        <span class="label label-danger pull-right">3</span>
                    </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{url('/message')}}">
                    <i class="fa fa-envelope"></i>
                    <span>Messages</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right">9</span>
                    </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{url('/notification')}}">
                    <i class="fa fa-bell"></i>
                    <span>Notifications</span>
                    <span class="pull-right-container">
                        <span class="label label-warning pull-right">1</span>
                    </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{url('/trade')}}">
                    <i class="fa fa-exchange"></i>
                    <span>Trades</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">1</span>
                    </span>
                    </a>
                </li>
                </ul>
            </li>
            <li id="chat" class="treeview">
                <a href="{{url('/chat')}}">
                <i class="fa fa-commenting"></i>
                <span>Chat</span>
                <span class="pull-right-container">
                    <span class="pull-right-container">
                        <span class="label label-info pull-right">4</span>
                    </span>
                </span>
                </a>
            </li>
            <li class="header">MAIN NAVIGATION</li>
            <li id="dashboard" class="treeview">
                <a href="{{url('/home')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li id="schedule" class="treeview">
                <a href="{{url('/schedule')}}">
                <i class="fa fa-calendar"></i> <span>Scores & Schedules</span>
                </a>
            </li>
            <li id="teams" class="treeview">
                <a href="{{url('/team')}}">
                <i class="fa fa-group"></i>
                <span>Teams</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <!-- begin teamlist -->
                <li><a href='#'><i class="fa fa-user"></i>Team Name (Owner)</a></li>
                {{--@foreach($teams as $team)
                    <li><a href='{{url("/team/$team->id")}}'><i class="fa fa-user"></i>{{$team->name}} {{$team->mascot}} ({{$team->owner->firstname}})</a></li>
                @endforeach--}}
                <!-- end teamlist -->
                </ul>
            </li>
            <li id="players" class="treeview">
                <a href="{{url('/player')}}">
                <i class="fa fa-male"></i>
                <span>Players</span>
                </a>
            </li>
            <li id="standings" class="treeview">
                <a href="{{url('/standing')}}">
                <i class="fa fa-line-chart"></i>
                <span>Standings</span>
                </a>
            </li>
            <li id="rankings" class="treeview">
                <a href="{{url('/ranking')}}">
                <i class="fa fa-sort-numeric-asc"></i>
                <span>Rankings</span>
                </a>
            </li>
            <li id="trading" class="treeview">
                <a href="#">
                <i class="fa fa-exchange"></i>
                <span>Trading</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href='{{url("/trade/initiate")}}'><i class="fa fa-exchange"></i>Make a Trade</a></li>
                    <li><a href='{{url("/trade/tradingblock")}}'><i class="fa fa-exchange"></i>Trading Block</a></li>
                </ul>
            </li>
            <li id="draft" class="treeview">
                <a href="{{url('/draft')}}">
                <i class="fa  fa-user-plus"></i>
                <span>Draft</span>
                </a>
            </li>
            <li id="playoffs" class="treeview">
                <a href="{{url('/playoff')}}">
                <i class="fa  fa-flag-checkered"></i>
                <span>Playoffs</span>
                </a>
            </li>
            <li id="calendar" class="treeview">
                <a href="{{url('/calendar')}}">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <span class="pull-right-container">
                    <small class="label label-info pull-right">5</small>
                </span>
                </a>
            </li>
            <li id="other" class="treeview">
                <a href="#">
                <i class="fa fa-th-list"></i>
                <span>Other</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/nfltoday')}}"><i class="fa fa-th-list"></i>NFL Today</a></li>
                    <li><a href="{{url('/poll')}}"><i class="fa fa-th-list"></i>Polls</a></li>
                    <li><a href="{{url('/activity')}}"><i class="fa fa-th-list"></i>League Activity</a></li>
                    <li><a href="{{url('/settings')}}"><i class="fa fa-th-list"></i>League Settings</a></li>
                    <li><a href="{{url('/rules')}}"><i class="fa fa-th-list"></i>League Rules</a></li>
                    <li><a href="{{url('/rules/changes')}}"><i class="fa fa-th-list"></i>Proposed Rule Changes</a></li>
                    <li><a href="{{url('/history')}}"><i class="fa fa-th-list"></i>League History</a></li>
                    <li><a href="{{url('/money')}}"><i class="fa fa-th-list"></i>Money, Dues and Payment</a></li>
                    <li><a href="{{url('/issue')}}"><i class="fa fa-th-list"></i>Website Issues</a></li>
                    <li><a href="{{url('/rules/change')}}"><i class="fa fa-th-list"></i>Request a Rule Change</a></li>
                    <li><a href="{{url('/issue/create')}}"><i class="fa fa-th-list"></i>Report a Website Issue</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>