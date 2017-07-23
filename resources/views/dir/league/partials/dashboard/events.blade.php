<div id="events">
    @component('components.box.default', ['title' => 'Calendar Events', 'collapse' => true])
        @slot('buttons')
            @if(isset($events))
                @if(count($events) > 0)
                    @include('inserts.status.bubble', [
                        'status' => count($events)." Events This Week",
                        'color' => 'Green'
                    ])
                @endif
            @endif
        @endslot
        @slot('body')
            @if(isset($events))
                @include('partials.resources.events.list', ['events' => $events])
            @else
                <p>There are no League events to display at this time.</p>
            @endif
        @endslot
        @slot('footer')
            <div class="text-center">
                <a href="url('/calendar')" class="uppercase">View Calendar</a>
            </div>
        @endslot
    @endcomponent
</div>