<div id="newsletter">
    @component('components.box.default', ['title' => 'Newsletter', 'collapse' => true])
        @slot('buttons')
            @component('components.box.dropdown')
                @if($newsletter)
                    <li><a href="{{$newsletter->routeto()}}">View in Full</a></li>
                    <li><a href="{{$newsletter->routeto()}}#reply">Reply</a></li>
                    <li class="divider"></li>
                @endif
                <li><a href="{{route('message.create', ['type' => '2'])}}">New</a></li>
                @if($newsletter)
                    <li><a href="#">Edit</a></li>
                    <li><a href="#">Delete</a></li>
                @endif
            @endcomponent
        @endslot
        @slot('body')
            @if($newsletter)
                <div class="message message-NEWSLETTER">
                    <div class="message-header">
                        <h2>{{$newsletter->subject}} <small>Newsletter</small></h2>
                    </div>
                    <div class="message-body">
                        {!! $newsletter->content !!}
                    </div>
                </div>
            @else
                <p>No Newsletter at this time.</p>
            @endif
        @endslot
        @slot('footer')
            @if($newsletter)
                @include('inserts.line.author', ['who' => $newsletter->author(), 'class' => 'pull-left'])
                @include('inserts.line.posted', ['when' => $newsletter->created_at, 'class' => 'pull-right'])
            @endif
        @endslot
    @endcomponent
</div>