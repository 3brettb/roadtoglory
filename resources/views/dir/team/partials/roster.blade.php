<div class="team-roster {{$class or ""}}">
    @component('components.box.default', ['title' => 'Starters', 'collapse' => true, 'style' => ['body' => "padding-bottom: 0px;"]])
        @slot('body')
            @include('inserts.table.roster', ['slots' => $roster->starter, 'table' => 'starter'])
        @endslot
    @endcomponent
    @component('components.box.default', ['title' => 'Bench', 'collapse' => true])
        @slot('body')
        @include('inserts.table.roster', ['slots' => $roster->bench, 'hasExtra' => true, 'table' => 'bench'])
        @endslot
    @endcomponent
    @component('components.box.default', ['title' => 'Injury Reserve', 'collapse' => true])
        @slot('body')
            @include('inserts.table.roster', ['slots' => $roster->ir, 'table' => 'ir'])
        @endslot
    @endcomponent
</div>

@push('scripts')
    <script src="{{URL::asset('js/resources/roster.js')}}"></script>
    <script>

        $("a.handle").on('click', function(event){
            handleOnClick(this, event);
        });

        function handleOnClick(handle, event){
            if($(handle).hasClass('open')){
                Roster.onPlayerSelect(handle, event);
            } else if ($(handle).hasClass('target') && $(handle).hasClass('visible')) {
                Roster.onTargetSelect(handle, event);
            }
            updateView();
        }

        function sendUpdate(roster){
            console.log(roster);
        }

        function updateView(){
            $("#save_roster_btn, #cancel_roster_btn").prop('disabled', !Roster.hasChange);
            $("#drop_player_btn").prop('disabled', !Roster.hasSelected);
        }
        updateView();

    </script>
@endpush