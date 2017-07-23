<div class="standings detailed {{$class or ''}}">
    <h4>{{$name or league()->name}} Standings <small>detailed</small></h4>
    <table class="table">
        <thead>
            <th>Rank</th>
            <th class="divider">Team</th>
            <th class="divider">GP</th>
            <th>W</th>
            <th>L</th>
            <th class="divider">T</th>
            <th>Win %</th>
            <th>Points For</th>
            <th>Points Against</th>
        </thead>
        <tbody>
            @foreach($teams as $team)
                <tr>
                    <td>{{$team->record()->rank}}</td>
                    <td class="divider">{{$team->display('{N} {M}')}}</td>
                    <td class="divider">{{$team->record()->played}}</td>
                    <td>{{$team->record()->wins}}</td>
                    <td>{{$team->record()->losses}}</td>
                    <td class="divider">{{$team->record()->ties}}</td>
                    <td>{{$team->record()->percent}}%</td>
                    <td>{{$team->record()->points->for}}</td>
                    <td>{{$team->record()->points->against}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>