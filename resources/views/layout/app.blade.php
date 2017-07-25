<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>RoadToGlory @yield('title')</title>
        
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ URL::asset('css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ URL::asset('css/skins/_all-skins.min.css') }}">

        @stack('style')

        <!-- Site Override CSS -->
        <link rel="stylesheet" href="{{ URL::asset('css/roadtoglory.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Scripts -->

        @stack('head_script')
    </head>

    @if(auth()->user())
        <body class="hold-transition skin-blue sidebar-mini">
    @else
        <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
    @endif
        <div id="app" class="wrapper">
            @include('layout.header')

            @if(auth()->user())
                <!-- Display Menu Sidebar -->
                @include('menu.sidebar')
            @endif

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('modal')
        
                @if(auth()->user())
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                
                        <!-- Dynamic Page Title -->
                        @yield('pagetitle')

                        <ol class="breadcrumb">
                            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                            
                            <!-- Dynamic BreadCrumb List -->
                            @yield('breadcrumb')
                        </ol>
                    </section>
                @endif

                <!-- Dynamic Page Content --> 
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->

            </div>
            <!-- /.content-wrapper -->

            <!-- Display Footer -->
            @include('layout.footer', ['version' => '1.0.0'])
        
        </div>
        <!-- ./wrapper -->

        
        <script>
            window.Laravel = {!! json_encode([ 'csrfToken' => csrf_token(), ]) !!}
        </script>
        <!-- jQuery 2.2.3 -->
        <script src="{{ URL::asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ URL::asset('plugins/fastclick/fastclick.js') }}"></script>

        @stack('scripts')
        
        <!-- AdminLTE App -->
        <script>
            var AdminLTEOptions = {
                //Enable sidebar expand on hover effect for sidebar mini
                //This option is forced to true if both the fixed layout and sidebar mini
                //are used together
                sidebarExpandOnHover: true,
                //BoxRefresh Plugin
                enableBoxRefresh: true,
                //Bootstrap.js tooltip
                enableBSToppltip: true
            };
        </script>
        <!--<script src="{{ URL::asset('js/manifest.min.js') }}"></script>-->
        <!--<script src="{{ URL::asset('js/vendor.min.js') }}"></script>-->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script src="{{ URL::asset('js/app.min.js') }}"></script>

        <script>

            // For consuming own api with axios
            window.axios.defaults.headers.common = {   
                'X-CSRF-TOKEN': '{{csrf_token()}}',   
                'X-Requested-With': 'XMLHttpRequest' 
            };

            function set_activemenu(id){
                $("#"+id).addClass('active');
            }

            // Stack of javascript commands when document is loaded
            $(document).ready(function(){

                @stack('on_ready')

            });

        </script>
    </body>
</html>
