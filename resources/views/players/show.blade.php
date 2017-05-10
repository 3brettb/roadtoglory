@extends('layouts.app')

@section('title')
    | Players | {{$player->displayname()}}
@endsection

@section('pagetitle')
    <h1>{{$player->displayname()}} Player Page</h1>
@endsection

@section('breadcrumb')
    <li><a href="{{route('players.index')}}">Players</a></li>
    <li class="active">{{$player->displayname()}}</li>
@endsection

@section('content')
    
@endsection