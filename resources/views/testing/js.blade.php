@extends('layout.app')

@section('content')
    Testing JS

    <div id="testjs">@{{myvar}}</div>

    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>
    
@endsection

@push('on_ready')

    

    axios.get("{{route('action.league.teams')}}")
    .then(response => {
        console.log(response.data);
    });

@endpush