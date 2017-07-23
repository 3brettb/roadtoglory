@extends('layout.app')

@section('title')
    | 503 Error
@endsection

@section('pagetitle')
    <h1>503 Error</h1>
@endsection

@section('breadcrumb')
    <li class="active">503 Error</li>
@endsection

@section('content')

    <section class="content">
      <div class="error-page">
        <h2 class="headline text-red"> 503</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Service Unavailable.</h3>

          <p>
            There was an issue with the service you are trying to request.
            Meanwhile, you may <a href="{{url('/home')}}">return to dashboard</a>, or go <a href="{{ URL::previous() }}">back</a>.
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->

@endsection