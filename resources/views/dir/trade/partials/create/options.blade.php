<div class="trade trade-options">
    @component('components.box.default', ['title' => "Trade Controls", 'collapse' => true])
        @slot('body')
            <form id="tradeoptions">
                <div class="form-group">
                    <label for="team">Team</label>
                    <select class="form-control" required id="team" @change="selectTeam($event)">
                        <option value="-1">Select a Team</option>
                        <option v-for="team in teams" v-model="team" :value="team.id">@{{team.name}} @{{team.mascot}}</option>
                    </select>
                    {{--  {!! Form::select('team', league()->teams->pluck('select_name', 'id'), null, ['class="form-control" autofocus id="team_select"']) !!}  --}}
                </div> 

                <div class="form-group">
                    <label for="item">Item</label>
                    <select class="form-control" required id="item" @change="selectItem($event)" :disabled="items.length == 0">
                        <option value="-1">Select a Trade Item</option>
                        <option v-for="item in items" :value="getItemId(item)">@{{item.string}}</option>
                    </select>
                    {{--  {!! Form::select('item', [], null, ['class="form-control" autofocus id="item_select"']) !!}  --}}
                </div>
                
                <div class="form-group">
                    <label for="to">Send To</label>
                    <select class="form-control" required id="to" @change="selectTo($event)" :disabled="tos.length == 0">
                        <option value="-1">Select a Team</option>
                        <option v-for="to in tos" v-if="to != vue.selection.team" :value="to.id">@{{to.name}} @{{to.mascot}}</option>
                    </select>
                    {{--  {!! Form::select('to', league()->teams->pluck('select_name', 'id'), null, ['class="form-control" autofocus id="sendto_select"']) !!}  --}}
                </div>

                <div class="form-group">
                    <button onclick="javascript:void(0);" type="button" class="btn btn-primary" :disabled="!ready" v-on:click="addToTrade">Add To Trade</button>
                </div>
            </form>
        @endslot
    @endcomponent
</div>