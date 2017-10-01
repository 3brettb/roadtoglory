<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">AP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Admin Portal</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        
        <!-- Sidebar toggle button-->
        @if(auth()->user())
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        @endif
        
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if(auth()->user())

                    <!-- User Account: style can be found in dropdown.less -->
                    @include('menu.header.user')

                @else
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span class="hidden-xs">Login/Register</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="btn-flat"><a href="{{url('/login')}}">Login</a></li>
                            <li class="btn-flat"><a href="{{url('/register')}}">Register</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>

    </nav>
</header>