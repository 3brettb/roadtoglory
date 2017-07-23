<a class="clickable" data-toggle="collapse" data-target="#poll-results-{{$id}}">Results</a>

<div id="poll-results-{{$id}}" class="collapse">
    @if($results->open)
        <div>Poll is still open.</div>
    @else
        @if($results->tie)
            <div><u>There was a tie</u></div>
        @endif
        @foreach($results->final->winners as $winner)
            <div>Winner: {{$winner->description}} - {{$results->final->count}} votes</div>
        @endforeach
    @endif
    <ul style="padding-left: 0px; list-style-type: none;">
        <hr class="no-margin">
        <div><b><u>Full Results</u></b></div>
        @foreach($results->all as $item)
            <li>{{$item->question->description}}: {{$item->number}} votes</li>
        @endforeach
    </ul>
</div>