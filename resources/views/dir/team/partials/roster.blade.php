<div class="team-roster {{$class or ""}}">
    @component('components.box.default', ['title' => 'Starters', 'collapse' => true, 'style' => ['body' => "padding-bottom: 0px;"]])
        @slot('body')
            @include('inserts.table.roster', ['players' => $roster->starter])
        @endslot
    @endcomponent
    @component('components.box.default', ['title' => 'Bench', 'collapse' => true])
        @slot('body')
        @include('inserts.table.roster', ['players' => $roster->bench])
        @endslot
    @endcomponent
    @component('components.box.default', ['title' => 'Injury Reserve', 'collapse' => true])
        @slot('body')
            @include('inserts.table.roster', ['players' => $roster->ir])
        @endslot
    @endcomponent
</div>