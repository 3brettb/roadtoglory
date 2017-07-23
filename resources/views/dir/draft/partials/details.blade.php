<div class="draft draft-details">
    @component('components.box.default', ['title' => 'Draft Details', 'collapse' => true, 'noFooter' => true])
        @slot('body')
            <div class="row">
                <div class="col-md-2">Draft Season: <b>{{$draft->season->year}}</b></div>
                <div class="col-md-2">Draft Date: <b>{{($draft->date != null) ? $draft->date->format('d M g:i a') : "TBD"}}</b></div>
                <div class="col-md-2">Draft Type: <b>{{($draft->date != null) ? $draft->type : "TBD"}}</b></div>
                <div class="col-md-2">Number of Rounds: <b>{{$draft->rounds or 'TBD'}}</b></div>
                <div class="col-md-2">Seconds Per Pick: <b>{{$draft->time or 'TBD'}}</b></div>
                <div class="col-md-2">Completed: <b>{{($draft->comleted) ? "Yes" : "No"}}</b></div>
            </div>
        @endslot
    @endcomponent
</div>