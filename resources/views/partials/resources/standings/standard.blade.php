<div class="standings standard {{$class or ''}}">
    <h4>{{$name or league()->name}} Standings <small>standard</small></h4>
    <table class="table">
        <thead>
            <th>Team</th>
            <th>GP</th>
            <th>W</th>
            <th>L</th>
            <th>T</th>
        </thead>
        <tbody>
            @foreach($teams as $team)
                <tr>
                    <td>{{$team->display('{N} {M}')}}</td>
                    <td>{{$team->record()->played}}</td>
                    <td>{{$team->record()->wins}}</td>
                    <td>{{$team->record()->losses}}</td>
                    <td>{{$team->record()->ties}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>