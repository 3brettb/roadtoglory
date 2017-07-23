<div class="activity-list">
    <ul class="products-list product-list-in-box">
        @if(count($list) == 0)
            <span>There is no recent league activity.</span>
        @else
            @foreach($list as $item)
                @include('inserts.list.item', ['icon' => 'fa fa-bullhorn fa-large', 'item' => $item])
            @endforeach
        @endif
    </ul>
</div>

