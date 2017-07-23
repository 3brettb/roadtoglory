<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">    
    <!-- sidebar: style can be found in sidebar.less -->  
    <section class="sidebar">
        
        <!-- <Sidebar></Sidebar> user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src='{{ user()->image() }}' class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{team()->name}} {{team()->mascot}}</p>
                @include('inserts.status.bullet', ['status' => user()->status])
            </div>
        </div>
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @component('menu.treeview.dropdown', [
                'id' => 'inbox',
                'icon' => 'fa fa-briefcase',
                'name' => 'INBOX',
                'badge' => '12'
            ])
                @include('menu.treeview.default', [  
                    'icon' => 'fa fa-flag', 
                    'name' => 'Alerts',
                    'badge' => '1',
                    'link' => url('/alert')
                ])
                @include('menu.treeview.default', [  
                    'icon' => 'fa fa-envelope', 
                    'name' => 'Emails',
                    'badge' => '2',
                    'link' => url('/message/email')
                ])
                @include('menu.treeview.default', [  
                    'icon' => 'fa fa-bell', 
                    'name' => 'Notifications',
                    'badge' => '3',
                    'link' => url('/notification')
                ])
                @include('menu.treeview.default', [  
                    'icon' => 'fa fa-exchange', 
                    'name' => 'Trades',
                    'badge' => '4',
                    'link' => url('/trade')
                ])
            @endcomponent  
            @include('menu.treeview.default', [
                'id' => 'chat',  
                'icon' => 'fa fa-commenting', 
                'name' => 'Chat',
                'badge' => '7',
                'link' => url('/chat')
            ])
            
            <li class="header">MAIN NAVIGATION</li>
            
            @include('menu.treeview.default', [
                'id' => 'dashboard',  
                'icon' => 'fa fa-dashboard', 
                'name' => 'Dashboard',
                'link' => url('/dashboard')
            ])
            @include('menu.treeview.default', [
                'id' => 'matchup',  
                'icon' => 'fa fa-gamepad', 
                'name' => 'Matchup',
                'link' => route('matchup.find', ['team' => team()->id])
            ])
            @include('menu.treeview.default', [
                'id' => 'schedule',  
                'icon' => 'fa fa-calendar', 
                'name' => 'Scores & Schedules',
                'link' => url('/schedule')
            ])
            @include('menu.dropdown.teams', [
                'name' => 'Teams',
                'icon' => 'fa fa-group',
                'sub_icon' => 'fa fa-user',
                'teams' => league()->teams
            ])
            @include('menu.treeview.default', [
                'id' => 'players',  
                'icon' => 'fa fa-male', 
                'name' => 'Players',
                'link' => url('/player')
            ])
            @include('menu.treeview.default', [
                'id' => 'standings',  
                'icon' => 'fa fa-line-chart', 
                'name' => 'Standings',
                'link' => url('/standings')
            ])    
            @include('menu.treeview.default', [
                'id' => 'rankings',  
                'icon' => 'fa fa-sort-numeric-asc', 
                'name' => 'Rankings',
                'link' => url('/rankings')
            ])
            @component('menu.treeview.dropdown', [
                'id' => 'trading',
                'icon' => 'fa fa-exchange',
                'name' => 'Trading'
            ])
                @include('menu.treeview.default', [ 
                    'id' => 'trades', 
                    'icon' => 'fa fa-exchange', 
                    'name' => 'Trades',
                    'link' => url('/trade')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'tradeblock',
                    'icon' => 'fa fa-exchange', 
                    'name' => 'Trading Block',
                    'link' => '#'
                ])
            @endcomponent    
            @include('menu.treeview.default', [
                'id' => 'draft',  
                'icon' => 'fa fa-user-plus', 
                'name' => 'Draft',
                'link' => url('/draft')
            ])
            @include('menu.treeview.default', [
                'id' => 'messages',  
                'icon' => 'fa fa-envelope', 
                'name' => 'Messages',
                'link' => route('message.index')
            ])
            @include('menu.treeview.default', [
                'id' => 'playoffs',  
                'icon' => 'fa fa-flag-checkered', 
                'name' => 'Playoffs',
                'link' => url('/playoffs')
            ])
            @include('menu.treeview.default', [
                'id' => 'calendar',  
                'icon' => 'fa fa-calendar', 
                'name' => 'Calendar',
                'badge' => '6',
                'link' => url('/calendar')
            ])

            <?php $icon_other = 'fa fa-th-list'; ?>
            @component('menu.treeview.dropdown', [
                'id' => 'other',
                'icon' => $icon_other,
                'name' => 'Other'
            ])
                @include('menu.treeview.default', [  
                    'id' => 'nfltoday',
                    'icon' => $icon_other, 
                    'name' => 'NFL Today',
                    'link' => url('/nfltoday')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'polls',
                    'icon' => $icon_other, 
                    'name' => 'Polls',
                    'link' => url('/poll')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'activity',
                    'icon' => $icon_other, 
                    'name' => 'League Activity',
                    'link' => url('/activity')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'settings',
                    'icon' => $icon_other, 
                    'name' => 'League Settings',
                    'link' => url('/settings')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'rules',
                    'icon' => $icon_other, 
                    'name' => 'League Rules',
                    'link' => url('/rules')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'rule_changes',
                    'icon' => $icon_other, 
                    'name' => 'Proposed Rule Changes',
                    'link' => url('/rules/changes')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'history',
                    'icon' => $icon_other, 
                    'name' => 'League History',
                    'link' => url('/history')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'money',
                    'icon' => $icon_other, 
                    'name' => 'Money, Dues, Payments',
                    'link' => url('/money')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'issues',
                    'icon' => $icon_other, 
                    'name' => 'Website Issues',
                    'link' => url('/issues')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'rule_change',
                    'icon' => $icon_other, 
                    'name' => 'Request a Rule Change',
                    'link' => url('/rules/change')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'issue_create',
                    'icon' => $icon_other, 
                    'name' => 'Report a Website Issue',
                    'link' => url('/issue/create')
                ])
            @endcomponent
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>