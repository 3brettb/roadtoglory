<div class="trade trade-accordian">
    <div class="panel-group" id="trade-accordion">
        @foreach($trades as $trade)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#trade-accordion" href="#collapse{{$trade->id}}">
                            <span>{{$trade->title()}}</span>
                            <span class="pull-right">
                                @include('inserts.status.bubble', ['status' => $trade->status()])
                                @include('inserts.line.updated', ['when' => $trade->updated_at])
                            </span>
                        </a>
                    </h4>
                    </div>
                    <div id="collapse{{$trade->id}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        @include('partials.resources.trades.details', ['trade' => $trade])
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>