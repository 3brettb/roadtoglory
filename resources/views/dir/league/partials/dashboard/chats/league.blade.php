<div id="chat-league">
    @component('components.box.default', ['title' => league()->name." Chat", 'collapse' => true])
        @slot('body')
            @include('widgets.chat', ['chat' => league()->chat(), 'style' => 'max-height: 300px; min-height: 300px; overflow-y: scroll;'])
        @endslot
        @slot('footer')
            @include('partials.resources.chat.entry', [
                'action' => '#',
                'name' => 'league_chat',
                'placeholder' => 'Type Message ...',
                'color_class' => 'btn-primary'
            ])
        @endslot
    @endcomponent
</div>