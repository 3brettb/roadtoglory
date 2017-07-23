@extends('layout.app')

@section('content')
    @include('partials.forms.message.create', ["type_id" => request()->type])
@endsection