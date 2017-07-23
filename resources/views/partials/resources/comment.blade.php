<div class="comment {{$class or ''}}">
    <h4>{{$comment->user->display('{F} {L}')}}</h4>
    <span class="time pull-right">{{$comment->created_at->format('diffForHumans')}}</span>
    <p>{{$comment->content}}</p>
</div>