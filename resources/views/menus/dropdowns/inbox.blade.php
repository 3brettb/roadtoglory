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

        @component('components.sidebar_badge', ['id' => '', 'link' => '/alert', 'class' => 'fa fa-flag', 'name' => 'Alerts'])
            <span class="label label-danger pull-right">3</span>
        @endcomponent

        @component('components.sidebar_badge', ['id' => '', 'link' => '/message', 'class' => 'fa fa-envelope', 'name' => 'Messages'])
            <span class="label label-success pull-right">9</span>
        @endcomponent

        @component('components.sidebar_badge', ['id' => '', 'link' => '/notification', 'class' => 'fa fa-bell', 'name' => 'Notifications'])
            <span class="label label-warning pull-right">1</span>
        @endcomponent

        @component('components.sidebar_badge', ['id' => '', 'link' => '/trade', 'class' => 'fa fa-exchange', 'name' => 'Trades'])
            <span class="label label-primary pull-right">1</span>
        @endcomponent

    </ul>
</li>