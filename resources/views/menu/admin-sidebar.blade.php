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
                <p>{{user()->firstname}} {{user()->lastname}}</p>
                @include('inserts.status.bullet', ['status' => user()->status])
            </div>
        </div>
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @include('menu.treeview.default', [
                'id' => 'home',  
                'icon' => 'fa fa-arrow-left', 
                'name' => 'RETURN TO LEAGUE HOME',
                'link' => url('/home')
            ]) 
            @include('menu.treeview.default', [
                'id' => 'yourhome',  
                'icon' => 'fa fa-user', 
                'name' => 'Your Admin Home',
                'link' => url('/admin/home')
            ])
            
            <li class="header">ADMIN ACTIONS</li>
            
            @include('menu.treeview.default', [
                'id' => 'settings',  
                'icon' => 'fa fa-users', 
                'name' => 'League Settings'
            ])
            @component('menu.treeview.dropdown', [
                'id' => 'users',
                'icon' => 'fa fa-lock',
                'name' => 'Users'
            ])
                @include('menu.treeview.default', [ 
                    'id' => 'user_create', 
                    'icon' => 'fa fa-lock', 
                    'name' => 'Create User',
                    'link' => url('/admin/users/create')
                ])
                @include('menu.treeview.default', [ 
                    'id' => 'permissions', 
                    'icon' => 'fa fa-lock', 
                    'name' => 'User Permissions',
                    'link' => url('/admin/users/permissions')
                ])
            @endcomponent 
            @component('menu.treeview.dropdown', [
                'id' => 'season',
                'icon' => 'fa fa-calendar',
                'name' => 'Season'
            ])
                <li class="dropdown-header">GENERATE</li>
                @include('menu.treeview.default', [ 
                    'id' => 'season_generate', 
                    'icon' => 'fa fa-cogs', 
                    'name' => 'Generate Season',
                    'link' => url('/admin/season/generate')
                ])
                <li class="dropdown-header">EDIT</li>
                @include('menu.treeview.default', [ 
                    'id' => 'schedule', 
                    'icon' => 'fa fa-wrench', 
                    'name' => 'Edit Schedule',
                    'link' => url('/admin/schedule/edit')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'points',
                    'icon' => 'fa fa-wrench', 
                    'name' => 'Edit Player Points',
                    'link' => url('/admin/schedule/points')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'scores',
                    'icon' => 'fa fa-wrench', 
                    'name' => 'Edit Team Score/Win',
                    'link' => url('/admin/schedule/scores')
                ])
            @endcomponent  
            @component('menu.treeview.dropdown', [
                'id' => 'teams',
                'icon' => 'fa fa-group',
                'name' => 'Teams'
            ])
                <li class="dropdown-header">CREATE</li>
                @include('menu.treeview.default', [ 
                    'id' => 'team_create', 
                    'icon' => 'fa fa-plus', 
                    'name' => 'Create Team',
                    'link' => url('/admin/teams/create')
                ])
                <li class="dropdown-header">EDIT</li>
                @include('menu.treeview.default', [ 
                    'id' => 'team_rosters', 
                    'icon' => 'fa fa-wrench', 
                    'name' => 'Edit Rosters',
                    'link' => url('/admin/teams/rosters')
                ])
                @include('menu.treeview.default', [ 
                    'id' => 'team_keepers', 
                    'icon' => 'fa fa-wrench', 
                    'name' => 'Edit Keepers',
                    'link' => url('/admin/teams/keepers')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'team_details',
                    'icon' => 'fa fa-wrench', 
                    'name' => 'Edit Team Details',
                    'link' => url('/admin/teams/details')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'team_divisions',
                    'icon' => 'fa fa-wrench', 
                    'name' => 'Edit Divisions',
                    'link' => url('/admin/teams/divisions')
                ])
            @endcomponent  
            @component('menu.treeview.dropdown', [
                'id' => 'draft',
                'icon' => 'fa fa-user-plus',
                'name' => 'Draft'
            ])
                <li class="dropdown-header">GENERATE</li>
                @include('menu.treeview.default', [ 
                    'id' => 'gen_draft', 
                    'icon' => 'fa fa-cogs', 
                    'name' => 'Generate Draft',
                    'link' => url('/admin/draft/generate')
                ])
                <li class="dropdown-header">EDIT</li>
                @include('menu.treeview.default', [  
                    'id' => 'draft_order',
                    'icon' => 'fa fa-wrench', 
                    'name' => 'Edit Draft Order',
                    'link' => url('/admin/draft/order')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'draft_picks',
                    'icon' => 'fa fa-wrench', 
                    'name' => 'Edit Draft Picks',
                    'link' => url('/admin/draft/picks')
                ])
            @endcomponent  
            @component('menu.treeview.dropdown', [
                'id' => 'trade',
                'icon' => 'fa fa-arrows-h',
                'name' => 'Trades'
            ])
                @include('menu.treeview.default', [  
                    'id' => 'trade_create',
                    'icon' => 'fa fa-wrench', 
                    'name' => 'Create Trade',
                    'link' => url('/admin/trade/create')
                ])
                @include('menu.treeview.default', [  
                    'id' => 'trade_manage',
                    'icon' => 'fa fa-wrench', 
                    'name' => 'Manage Trades',
                    'link' => url('/admin/trade/manage')
                ])
            @endcomponent  
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>