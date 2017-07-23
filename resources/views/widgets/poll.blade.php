<div class="poll clearfix {{$class or ''}}">
    <h3>
        <a href='{{$poll->routeto()}}'>
            {{$poll->subject}}
            @if(!$poll->open())
                <small>Closed</small>
            @endif
        </a>
        <span class="pull-right">
            @if($poll->hasUserResponse or !$poll->open())
                <a href="#" class="btn btn-primary" disabled>Respond</a>
            @else
                <a href="#" class="btn btn-primary">Respond</a>
            @endif
        </span>
    </h3>
    <p>{{$poll->description}}</p>
    <hr>
    @include('partials.resources.polls.questions', [
        'multi' => $poll->multi, 
        'questions' => $poll->questions,
        'total' => $poll->responses()->count()
    ])
    @include('partials.resources.polls.results', ['results' => $poll->results(), 'id' => $poll->id])
    <hr class="no-margin">
    @include('inserts.line.author', ['class' => 'pull-right', 'who' => $poll->user->display('{F} {L}')])
</div>