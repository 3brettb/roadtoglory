<div class="event list">
    <ul class="products-list product-list-in-box">
        @if(count($events) == 0)
            There are no events this week.
        @else
            @foreach($events as $event)
                @include('inserts.list.item', ['icon' => 'fa fa-bullhorn fa-large', 'item' => $event])
            @endforeach
        @endif
    </ul>
</div>