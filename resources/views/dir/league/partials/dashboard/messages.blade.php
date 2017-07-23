<div id="{{$id}}">
    @component('components.box.default', ['title' => $title, 'collapse' => true])
        @slot('buttons')
            @component('components.box.dropdown')
                <li><a href="{{$routes['create']}}">New</a></li>
            @endcomponent
        @endslot
        @slot('body')
            @if($messages)
                <ul class="message-list">
                @foreach($messages as $message)
                    <li>
                        <a href="{{$message->routeto()}}">
                            <h4>
                                {{$message->subject}}
                                <small class="pull-right"><i class="fa fa-clock-o"></i> {{$message->created_at->diffForHumans()}}</small>
                            </h4>
                            <div class="message-content">{{strip_tags($message->content)}}</div>
                        </a>
                    </li>
                @endforeach
                </ul>
            @else
                <p>There are no messages to display at this time.</p>
            @endif
        @endslot
        @slot('footer')
            <div class="text-center" style="width:100%;">
                <a href="{{$routes['index']}}" class="uppercase">View All Messages</a>
            </div>
        @endslot
    @endcomponent
</div>