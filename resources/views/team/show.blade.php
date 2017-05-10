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
            @include('team.partials.player_box', [
                    'team' => $team, 
                    'title' => 'Starters', 
                    'tableid' => 
                    'starterstable', 
                    'players' => null, 
                    'slots' => get_starter_slots(), 
                    'offset' => get_starter_offset()
            ])
            @include('team.partials.player_box', [
                    'team' => $team, 
                    'title' => 'Bench', 
                    'tableid' => 'benchtable', 
                    'players' => null, 
                    'slots' => get_bench_slots(), 
                    'offset' => get_bench_offset()
            ])
            @include('team.partials.player_box', [
                    'team' => $team, 
                    'title' => 'Injury Reserve', 
                    'tableid' => 'irtable', 
                    'players' => null, 
                    'slots' => get_ir_slots(), 
                    'offset' => get_ir_offset()
            ])
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection