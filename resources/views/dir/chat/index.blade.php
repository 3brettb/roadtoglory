@extends('layout.app')

@push('on_ready')
    $("#chat").addClass('active');
@endpush

@section('title')
    | Chat
@endsection

@section('pagetitle')
    <h1>Chat</small></h1>
@endsection

@section('breadcrumb')
    <li class="active">Chats</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.bars.action')      
                {!! Form::select('chat', $chatselect, $chat->id, ["class='action-control'"]) !!}          
            @endcomponent
        </div>
        <div class="col-md-offset-3 col-md-6">
            @component('components.box.default', ['title' => $chat->name])
                @slot('body')
                    <div id="chat-content" class="chat-content-container" style="min-height: 200px; max-height: 600px; overflow-y: scroll;">
                        @include('widgets.chat', ['chat' => $chat])
                    </div>
                @endslot
                @slot('footer')
                    <div class="row">
                        <div class="col-sm-10">
                            <form>
                                <textarea id="chatinput" style="width: 100%; height: 100px; resize: none;" placeholder="Enter your message here..."></textarea>
                            </form>
                        </div>
                        <div class="col-sm-2">
                            <a href="#" class="btn btn-primary" style="width: 100%; height: 100px; line-height: 6;">Send</a>
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

@push('on_ready')
    // Scroll to bottom on load
    $('#chat-content').scrollTop($('#chat-content')[0].scrollHeight);
@endpush