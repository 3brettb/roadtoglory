<div class="player-search">
    @component('components.box.default', ['title' => 'Search'])
        @slot('body')
            <form id="search_criteria">
                
                <div class="form-group">
                    <h5><u>Positions</u></h5>
                    <label class="checkbox-inline"><input type="checkbox" name="position" value="">QB</label>
                    <label class="checkbox-inline"><input type="checkbox" name="position" value="">RB</label>
                    <label class="checkbox-inline"><input type="checkbox" name="position" value="">WR</label>
                    <label class="checkbox-inline"><input type="checkbox" name="position" value="">TE</label>
                    <label class="checkbox-inline"><input type="checkbox" name="position" value="">K</label>
                    <label class="checkbox-inline"><input type="checkbox" name="position" value="">D/ST</label>
                </div>

                <div class="form-group">
                    <h5><u>Teams</u></h5>
                    <label class="checkbox-inline"><input type="checkbox" name="onteam" value="">On Roster</label>
                    {!! Form::select('team', league()->teams->pluck('select_name', 'id'), null, ['class="" autofocus']) !!}
                </div>

                <div class="form-group">
                    <h5><u>NFL Team</u></h5>
                    <label class="checkbox-inline"><input type="checkbox" name="onteam" value="">On NFL Team</label>
                    {!! Form::select('nflteam', [], null, ['class="" autofocus']) !!}
                </div>

                <div class="form-group">
                    <a class="btn btn-primary" href="#">Submit</a>
                </div>
            </form>
        @endslot
        @slot('footer')
            Progress Bar
        @endslot
    @endcomponent
</div>