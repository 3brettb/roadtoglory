@extends('layouts.app')

@section('title')
    | User Profile/Settings
@endsection

@section('pagetitle')
    <h1>Profile & Settings</h1>
@endsection

@section('breadcrumb')
    <li class="active">Profile & Settings</li>
@endsection

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" style="border-right: 1px solid lightgrey;">
                    <div class="list-group">
                        <a href="#overview" class="list-group-item">Overview</a>
                        <a href="#account_settings" class="list-group-item list-group-item-action">Account Settings</a>
                    </div>
                </div>
                <div id="dynamic-page-content" class="col-sm-9"></div>
            </div>
        </div>

        <div id="overview" hidden>
            @include('pages.profile.overview')
        </div>

        <div id="account_settings" hidden>
            @include('pages.profile.account')
        </div>
    </section>
@endsection

@push('bottom-scripts')
    $(document).ready(function() {
        loc = (window.location.hash == "") ? "#overview" : window.location.hash;
        window.location.hash = loc;
        $(loc).addClass('active');
        fill();
    });
    
    $("a.list-group-item").on('click', function(item){
        $("a.list-group-item.active").removeClass("active");
        $(this).addClass("active");
    });

    $(window).on('hashchange', function(){
        fill();
    });

    function fill(){
        $($("#dynamic-page-content")[0]).html($(window.location.hash).html());
    }

@endpush