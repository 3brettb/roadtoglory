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
            <p>{{team()->displayname()}}</p>
            <a><i class="fa fa-circle {{(user()->status == 'Online') ? 'text-green' : 'text-red'}}"></i> {{user()->status}}</a>
        </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            
            @include('menus.dropdowns.inbox')

            @component('components.sidebar_badge', ['id' => 'chat', 'link' => '/chat', 'class' => 'fa fa-commenting', 'name' => 'Chat'])
                <span class="label label-info pull-right">4</span>
            @endcomponent
            
            <li class="header">MAIN NAVIGATION</li>

            @component('components.sidebar_item', ['id' => 'dashboard', 'link' => '/home'])
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            @endcomponent

            @component('components.sidebar_item', ['id' => 'schedule', 'link' => '/schedule'])
                <i class="fa fa-calendar"></i> <span>Scores & Schedules</span>
            @endcomponent

            @include('menus.dropdowns.teams', ['teams' => teams()])
            
            @component('components.sidebar_item', ['id' => 'players', 'link' => '/players'])
                <i class="fa fa-male"></i> <span>Players</span>
            @endcomponent

            @component('components.sidebar_item', ['id' => 'standings', 'link' => '/standing'])
                <i class="fa fa-line-chart"></i> <span>Standings</span>
            @endcomponent

            @component('components.sidebar_item', ['id' => 'rankings', 'link' => '/ranking'])
                <i class="fa fa-sort-numeric-asc"></i> <span>Rankings</span>
            @endcomponent

            @component('components.sidebar_dropdown', ['id' => 'trading', 'link' => '/trade', 'class' => 'fa fa-exchange', 'name' => 'Trading'])
                <li><a href='{{url("/trade/initiate")}}'><i class="fa fa-exchange"></i>Make a Trade</a></li>
                <li><a href='{{url("/trade/tradingblock")}}'><i class="fa fa-exchange"></i>Trading Block</a></li>
            @endcomponent

            @component('components.sidebar_item', ['id' => 'draft', 'link' => '/draft'])
                <i class="fa fa-user-plus"></i> <span>Draft</span>
            @endcomponent

            @component('components.sidebar_item', ['id' => 'playoffs', 'link' => '/playoff'])
                <i class="fa fa-flag-checkered"></i> <span>Playoffs</span>
            @endcomponent

            @component('components.sidebar_badge', ['id' => 'calendar', 'link' => '/calendar', 'class' => 'fa fa-calendar', 'name' => 'Calendar'])
                <small class="label label-info pull-right">5</small>
            @endcomponent

            @component('components.sidebar_dropdown', ['id' => 'other', 'link' => '/other', 'class' => 'fa fa-th-list', 'name' => 'Other'])
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
            @endcomponent

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>