<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src='{{ URL::asset("img/default_user.jpg") }}' class="user-image" alt="User Image">
        <span class="hidden-xs">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src='{{ URL::asset("img/default_user.jpg") }}' class="img-circle" alt="User Image">
            <p>
                {{auth()->user()->displayname()}} - {{auth()->user()->team->displayname()}}
                <small>[Season] | [Record] | [Standing]</small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-12 text-center">
                <a href=''>[Team Name] Team Page</a>
                </div>
            </div>
            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="btn-group">
                <a href="{{url('/profile')}}" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Settings</a>
                <a href="{{url('/lock')}}" class="btn btn-default btn-flat"><i class="fa fa-lock"></i> Lock</a>
                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Sign out
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </a>
            </div>
        </li>
    </ul>
</li>