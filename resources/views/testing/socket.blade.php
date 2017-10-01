@extends('layout.app')

@push('script')
    <script src="{{URL::asset('js/testing/socket.js')}}"></script>
@endpush

@section('content')
    Testing Sockets
@endsection