@extends('layout.app')

@section('title')
    | 404 Error
@endsection

@section('pagetitle')
    <h1>404 Error - Page is Down for Maintenance</h1>
@endsection

@section('breadcrumb')
    <li>404 Error</li>
    <li class="active">Page Maintenance</li>
@endsection

@section('content')

    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page is Down for Maintenance.</h3>

          <p>
            The page you are looking for exists. However, this page is currently unavailable due to maintenance.
            Please return at a later time.
            Meanwhile, you may <a href="{{url('/home')}}">return to dashboard</a>, or go <a href="{{ URL::previous() }}">back</a>.
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->

@endsection