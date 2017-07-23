<div class="chat {{$class or ''}}" style="{{$style or ''}}">
    @if($chat)
        @if(count($chat->comments) == 0)
            <span>No Messages</span>
        @else
            @foreach($chat->comments as $comment)
                @if($comment->user_id == user()->id)
                    @include('partials.resources.chat.message.self', ['comment' => $comment])
                @else
                    @include('partials.resources.chat.message.other', ['comment' => $comment])
                @endif
            @endforeach
        @endif
    @else
        <span>No Messages</span>
    @endif
</div>