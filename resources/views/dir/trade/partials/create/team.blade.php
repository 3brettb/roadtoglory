<div class="trade trade-team">
    @component('components.box.default', ['title' => $team->display('{N} {M}'), 'collapse' => true])
        @slot('body')
            @foreach($team->items as $item)
                <div class="trade trade-item row">
                    <div class="col-xs-2 text-center">
                        <a href="#" class="label label-danger">
                            <i class="fa fa-close"></i>
                        </a>
                    </div>
                    <div class="col-xs-10">
                        <span style="margin-right: 10px;">{{$item->reference->toString()}}</span> 
                        <i class="fa fa-long-arrow-right"></i>
                        <span style="margin-left: 10px;">{{$item->team->display('{N} {M}')}}</span>
                    </div>
                </div>
            @endforeach
        @endslot
    @endcomponent
</div>