@component('components.box.default', ['title' => 'Roster', 'collapse' => true])
    @slot('body')    
        <div class="roster-table">
            <table class="table" style="margin-bottom: 0px;">
                <tr>
                    <th class="center" style="width: 10px;">Action</th>
                    <th class="left">Last, First Team POS</th>
                </tr>
                @foreach($players as $player)
                    <tr>
                        <td class="center">
                            <a href="#" data-id="{{$player->id}}" class="btn btn-danger" style="padding: 2px 7px;">Drop</a>
                        </td>
                        <td class="left divider">{{$player->display('{L}, {F} {N} {P}')}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endslot
@endcomponent