<div class="chat-msg {{$color_class or 'default'}}">
    <div class="chat-info clearfix">
        <span class="chat-name pull-left">{{$comment->user->display('{F} {L}')}}</span>
        <span class="chat-timestamp pull-right">{{$comment->created_at->format('d M g:i a')}}</span>
    </div>
    <img class="chat-img" src="{{$comment->user->image()}}" alt="message user image">
    <div class="chat-text">
        {{$comment->content}}
    </div>
</div>