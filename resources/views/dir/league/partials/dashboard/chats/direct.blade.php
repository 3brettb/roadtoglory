<div id="chat-direct">
    @component('components.box.default', ['title' => "Direct Chat - Null", 'collapse' => true])
        @slot('body')
            @include('widgets.chat', ['chat' => null, 'style' => 'max-height: 300px; min-height: 300px; overflow-y: scroll;'])
            @include('partials.resources.chat.contacts', ['contacts' => null])
        @endslot
        @slot('footer')
            @include('partials.resources.chat.entry', [
                'action' => '#',
                'name' => 'direct_chat',
                'placeholder' => 'Type Message ...',
                'color_class' => 'btn-primary'
            ])
        @endslot
    @endcomponent
</div>