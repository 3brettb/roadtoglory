<div class="player-overview">
    @component('components.box.default', ['title' => 'Season Overview', 'collapse' => true])
        @slot('body')
            <table style="width: 100%;">
                <thead>
                    <th>Week</th>
                    <th>Opp</th>
                    <th>Result</th>
                    <th>Score</th>
                </thead>
                <tbody>
                    @if($player->weeks)
                        @foreach($player->weeks as $week)
                            <tr>
                                <td>{{$week->number}}</td>
                                <td>{{$week->opponent or 'BYE'}}</td>
                                <td>{{$week->result or '-'}}</td>
                                <td>{{$week->points or '-'}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        @endslot
    @endcomponent
</div>