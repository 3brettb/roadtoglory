<div id="trades">
    @component('components.box.default', ['title' => 'Trades', 'collapse' => true])
        @slot('buttons')
            @component('components.box.dropdown')
                <li><a href="#">New</a></li>
            @endcomponent
        @endslot
        @slot('body')
            @if($trades)
                @include('partials.resources.trades.list', ['trades' => $trades])
            @else
                <p>There are no trades to display at this time.</p>
            @endif
        @endslot
        @slot('footer')
            <div class="text-center" style="width:100%;">
                <a href="{{url('/trades')}}" class="uppercase">View All Trades</a>
            </div>
        @endslot
    @endcomponent
</div>