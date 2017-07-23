<div id="polls">
    @component('components.box.default', ['title' => 'Polls', 'collapse' => true])
        @slot('buttons')
            @component('components.box.dropdown')
                <li><a href="#">New</a></li>
            @endcomponent
        @endslot
        @slot('body')
            @if($poll)
                @include('widgets.poll', ['poll' => $poll])
            @else
                <p>There are no polls to display at this time.</p>
            @endif
        @endslot
        @slot('footer')
            <div class="text-center">
                <a href="{{route('poll.index')}}" class="uppercase">View All Polls</a>
            </div>
        @endslot
    @endcomponent
</div>
