<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src='{{ user()->image() }}' class="user-image" alt="User Image">
        <span class="hidden-xs">{{user()->display('{F} {L}')}}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src='{{ user()->image()}}' class="img-circle" alt="User Image">
            <p>
                {{user()->display('{F} {L}')}} - {{team()->name}} {{team()->mascot}}
                <small>2017 | 4-1 | 1/10</small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href='{{url("/team/team()->id")}}'>{{team()->name}} {{team()->mascot}} Team Page</a>
                </div>
            </div>
            <!-- /.row -->
        </li>

        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="{{url('/profile')}}" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profile</a>
            </div>
            <div class="col-md-3">
                <a href="{{url('/lock')}}" class="btn btn-default btn-flat"><i class="fa fa-lock"></i> Lock</a>
            </div>
            <div class="pull-right">
                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Sign out
                </a>
                @include('partials.forms.logout')
            </div>
        </li>
    </ul>
</li>