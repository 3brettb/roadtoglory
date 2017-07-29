<div class="trade trade-details">
    <div>
        <ul>
            @foreach($trade->items() as $item)
                <li>
                    <span class="trade-item trade-item-name">{{$item->toString()}}</span>
                    <span class="trade-item arrow"><i class="fa fa-long-arrow-right"></i></span>
                    <span class="trade-item trade-item-team">{{\App\Models\Team::find($item->pivot->team_id)->display('{N} {M}')}}</span>
                    @if($item->pivot->accept == null)
                        
                    @elseif($item->pivot->accept)
                        <span class="trade-item trade-item-accept text-success"><i class="fa fa-check-circle"></i></span>
                    @else
                        <span class="trade-item trade-item-accept text-danger"><i class="fa fa-check-circle"></i></span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    @if(isset($view_btn) && $view_btn == true)
        <div class="pull-left">
            <a href="{{route('trade.show', ['trade' => $trade])}}" class="btn btn-primary">View</a>
        </div>
    @endif
    <div class="trade trade-votes pull-right">
        Votes
    </div>
</div>