<li class="item">
    <div class="col-xs-2">
        <i class="{{$icon}}"></i>
    </div>
    <div class="col-xs-10">
        <a href="{{$item->routeto()}}">
            <span>
                <b>{{$item->subject}}</b>: {{ $item->description }}
            </span>
        </a>
    </div>
</li>