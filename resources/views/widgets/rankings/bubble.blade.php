<div class="rankings bubble">
    @foreach($rankings as $item)
        <a class="btn btn-sm btn-block btn-danger" style="contain: content;" href="{{$item->team->routeto()}}">
            <span class="pull-left">#{{$item->rank}}</span>
            <span class="center"><b>{{$item->team->display('{N} {M}')}}</b> ({{$item->team->record()}})</span>
                <?php $change = $item->team->previous()->rank - $item->rank; ?>
                @if($change > 0)
                    <span class="pull-right">{{$change}}<i class="fa fa-long-arrow-up"></i></span>
                @elseif($change < 0)
                    <span class="pull-right">{{$change}}<i class="fa fa-long-arrow-down"></i></span>
                @else
                    <span class="pull-right"><i class="fa fa-arrows-h"></i></span>
                @endif
            </span>
        </a>
    @endforeach
</div>