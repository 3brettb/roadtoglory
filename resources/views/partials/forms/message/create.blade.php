<?php
    use \App\Models\Types\MessageType;
    $type = (isset($type_id)) ? MessageType::find($type_id) : null;
    $set_type = (isset($type)) ? (isset($set_type)) ? $set_type : false : false;
    $type_name = (isset($type)) ? $type->name : "Message";
?>
<div class="form form-message form-create">
    <div class="panel panel-default">
        <div class="panel-heading">New {{$type_name}}</div>
        <div class="panel-body">
            @if(isset($type_id))
                <form class="form-horizontal" role="form" method="POST" action="{{ route('message.store', ['type' => $type_id]) }}">
            @else
                <form class="form-horizontal" role="form" method="POST" action="{{ route('message.store') }}">
            @endif
                {{ csrf_field() }}

                @component('components.form.group', ['name' => 'subject', 'label' => 'Subject'])
                    {!! Form::text('subject', old('subject'), ['class="form-control" required autofocus']) !!}
                @endcomponent

                @component('components.form.group', ['name' => 'content', 'label' => 'Content'])
                    @include('widgets.texteditor', ['id' => "content", 'name' => 'content'])
                @endcomponent

                @if(isset($set_type) && $set_type)
                    @component('components.form.group', ['name' => 'type', 'label' => "Message Type"])
                        {!! Form::select('type', MessageType::pluck('name', 'id'), old('type'), ['class="form-control" autofocus']) !!}
                    @endcomponent
                @endif

                @if(isset($reply) && $reply)
                    @component('components.form.group', ['name' => 'reply', 'label' => "Parent Message"])
                        {!! Form::select('reply', Message::pluck('subject', 'id'), old('reply'), ['class="form-control" autofocus']) !!}
                    @endcomponent
                @endif

                @if(isset($set_commentable) && $set_commentable)
                    @component('components.form.group', ['name' => 'commentable', 'label' => "Commentable"])
                        {!! Form::select('commentable', [
                            'true' => 'Yes',
                            'false' => 'No',
                        ], old('commentable'), ['class="form-control" autofocus']) !!}
                    @endcomponent
                @endif

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>