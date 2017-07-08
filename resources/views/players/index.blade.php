@extends('layouts.app')

@section('title')
    | Players
@endsection

@section('pagetitle')
    <h1>Players</h1>
@endsection

@section('breadcrumb')
    <li class="active">Players</li>
@endsection

@section('content')
    <section class="content">
        @include('players.partials.datatable')
    </section>
@endsection

