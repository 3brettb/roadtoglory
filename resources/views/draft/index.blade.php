@extends('layouts.app')

@section('title')
    | Draft | {{user()->league()->name}}
@endsection

@section('pagetitle')
    <h1>{{user()->league()->name}}: Draft Central - <span class="text-red">Offline</span></h1>
@endsection

@section('breadcrumb')
    <li class="active">Draft</li>
@endsection

@section('content')
    <section class="content">
      <div class="row">
        <div class="col-md-3">
            @include('draft.partials.teams_box')
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    @include('draft.partials.controls')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('draft.partials.ticker')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @php
                        $x = \App\Managers\PlayerManager::instance()->views();
                        dd("$x views");
                    @endphp
                    @include('players.partials.datatable', ['players' => user()->league()->players])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('draft.partials.message')
                </div>
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection