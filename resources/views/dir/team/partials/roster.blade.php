<div class="team-roster {{$class or ""}}">
    @component('components.box.default', ['title' => 'Starters', 'collapse' => true, 'style' => ['body' => "padding-bottom: 0px;"]])
        @slot('body')
            @include('inserts.table.roster', ['slots' => $roster->starter, 'type' => 'starter'])
        @endslot
    @endcomponent
    @component('components.box.default', ['title' => 'Bench', 'collapse' => true])
        @slot('body')
        @include('inserts.table.roster', ['slots' => $roster->bench, 'type' => 'bench'])
        @endslot
    @endcomponent
    @component('components.box.default', ['title' => 'Injury Reserve', 'collapse' => true])
        @slot('body')
            @include('inserts.table.roster', ['slots' => $roster->ir, 'type' => 'ir'])
        @endslot
    @endcomponent
</div>

@push('scripts')
    <script src="{{URL::asset('js/resources/roster.js')}}"></script>
    <script>

        $("a.handle").on('click', function(event){
            if($(this).hasClass('open')){
                Roster.onPlayerSelect(this, event);
            } else if ($(this).hasClass('target') && $(this).hasClass('visible')) {
                Roster.onTargetSelect(this, event);
            }
        });

    </script>
@endpush