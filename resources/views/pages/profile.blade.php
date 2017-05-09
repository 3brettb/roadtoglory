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
    <div class="container" style="padding-top: 20px;">
        <div class="row">
            <div class="col-sm-3" style="border-right: 1px solid lightgrey;">
                <div class="list-group">
                    <a href="#" data-fill="overview" class="list-group-item active">Overview</a>
                    <a href="#" data-fill="account_settings" class="list-group-item list-group-item-action">Account Settings</a>
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

@endsection

@push('bottom-scripts')
    $(document).ready(function() {
        fill();
    });

    function fill(){
        content = $("#dynamic-page-content")[0];
        active = getactive();
        data_id = $(active).data('fill');
        new_data = $(getdata(data_id)).html();
        $(content).html(new_data);
    }

    function getactive(){
        return $(".list-group-item.active")[0];
    }

    function getdata(id){
        return $("#"+id)[0];
    }
    
    $("a.list-group-item").on('click', function(item){
        $(getactive()).removeClass("active");
        $(this).addClass("active");
        fill();
    });

@endpush