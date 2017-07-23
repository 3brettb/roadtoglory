@extends('layout.app')

@section('title')
    | 404 Error
@endsection

@section('pagetitle')
    <h1>404 Error</h1>
@endsection

@section('breadcrumb')
    <li class="active">404 Error</li>
@endsection

@section('content')

    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="{{url('/home')}}">return to dashboard</a>, or go <a href="{{ URL::previous() }}">back</a>.
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->

@endsection