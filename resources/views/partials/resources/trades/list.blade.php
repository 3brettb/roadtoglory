<div class="trade-list">
    <table class="table no-margin trades">
        <thead>
            <tr>
                <th>Date</th>
                <th>Teams Involved</th>
                <th>Players</th>
                <th>Picks</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trades as $trade)
                <tr>
                    <td>{{$trade->updated_at->format('diffForHumans')}}</td>
                    <td>
                        <ul>
                            @foreach($trade->teams as $team)
                                <li>{{$team->display('{N} {M}')}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($trade->players as $player)
                                <li>
                                    {{$player->display('{F} {L}')}} ({{$player->team->display('{N} {M}')}})
                                    <span> <i class="fa fa-long-arrow-right"></i> </span>
                                    {{$player->pivot->team->display('{N} {M}')}}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($trade->picks as $pick)
                                <li>
                                    {{$pick->display('{Y} #{R}')}} ({{$pick->team->display('{N} {M}')}})
                                    <span> <i class="fa fa-long-arrow-right"></i> </span>
                                    {{$pick->pivot->team->display('{N} {M}')}}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @include('inserts.status.bubble', ['status' => $trade->status()])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>