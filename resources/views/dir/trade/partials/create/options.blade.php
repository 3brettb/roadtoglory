<div class="trade trade-options">
    @component('components.box.default', ['title' => "Trade Controls", 'collapse' => true])
        @slot('body')
            <form id="tradeoptions">
                <div class="form-group">
                    <label for="team">Team</label>
                    {!! Form::select('team', league()->teams->pluck('select_name', 'id'), null, ['class="form-control" autofocus id="team_select"']) !!}
                </div>

                <div class="form-group">
                    <label for="item">Item</label>
                    {!! Form::select('item', [], null, ['class="form-control" autofocus id="item_select"']) !!}
                </div>
                
                <div class="form-group">
                    <label for="to">Item</label>
                    {!! Form::select('to', league()->teams->pluck('select_name', 'id'), null, ['class="form-control" autofocus id="sendto_select"']) !!}
                </div>

                <div class="form-group">
                    <a href="" class="btn btn-primary">Add To Trade</a>
                </div>
            </form>
        @endslot
    @endcomponent
</div>

@push('on_ready')

    $()

@endpush