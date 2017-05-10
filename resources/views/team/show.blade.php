@extends('layouts.app')

@section('title')
    | {{$team->displayname()}}
@endsection

@section('pagetitle')
    <h1>{{$team->displayname()}} Team Page</h1>
@endsection

@section('breadcrumb')
    <li class="active">{{$team->displayname()}}</li>
@endsection

@section('content')
    <section class="content">
      <div class="row">
        <div class="col-md-3">
            @include('team.partials.options_box', ['team' => $team])
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            @include('team.partials.player_box_starter', ['team' => $team])
            @include('team.partials.player_box_bench', ['team' => $team])
            @include('team.partials.player_box_ir', ['team' => $team])
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection