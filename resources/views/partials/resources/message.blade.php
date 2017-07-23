<div class="message message-{{$message->type->name}} {{$class or ''}}">
    <div class="message-header">
        <h2>{{$message->subject}} <small>{{$message->type->name}}</small></h2>
        <span class="pull-right">
            @include('inserts.line.posted', ['when' => $message->updated_at])
        </span>
    </div>
    <div class="message-body">
        {!! $message->content !!}
        <hr>
        @include('inserts.line.author', ['who' => $message->from->display('{F} {L}')])
    </div>
</div>