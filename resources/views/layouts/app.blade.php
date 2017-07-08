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

    @yield('head-style')

    <!-- Site Override CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/roadtoglory.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('head-script')

  </head>
  <body class="hold-transition skin-blue sidebar-mini {{(auth()->user()) ? '' : 'sidebar-collapse'}}">
    <div class="wrapper">
      @include('menus.menubar')

      @if(auth()->user())
          @include('menus.sidebar')
      @endif

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        @yield('modal')
        
        @if(auth()->user())
          <!-- Content Header (Page header) -->
          <section class="content-header">
            
              @yield('pagetitle')
            
            <ol class="breadcrumb">
              <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
              
              @yield('breadcrumb')
            
            </ol>
          </section>
        @endif
        
        @yield('content')
        
      </div>
      <!-- /.content-wrapper -->

      @include('layouts.footer')

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ URL::asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('plugins/fastclick/fastclick.js') }}"></script>
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
    <script src="{{ URL::asset('js/app.min.js') }}"></script>

    @stack('bottom-script-list')

    <script>
      @stack('bottom-scripts')
    </script>
    
  </body>
</html>
