@extends('layout.app')

@section('title')
    | 500 Error
@endsection

@section('pagetitle')
    <h1>500 Error</h1>
@endsection

@section('breadcrumb')
    <li class="active">500 Error</li>
@endsection

@section('content')

    <section class="content">
      <div class="error-page">
        <h2 class="headline text-red"> 500</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>

          <p>
            We will work on fixing that right away.
            Meanwhile, you may <a href="{{url('/home')}}">return to dashboard</a>, or go <a href="{{ URL::previous() }}">back</a>.
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->

@endsection