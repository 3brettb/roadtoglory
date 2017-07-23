<div class="trade-team" data-id="{{$team->id}}">
    <h3>{{$team->display('{N} {M}')}} <small>{{$team->owner->display('{F} {L}')}}</small></h3>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <h4>Sending <small>(To)</small></h4>
            <ul>
                @foreach($sending as $item)
                    <li class="trade-item sending" data-id="{{$item->id}}">Item Name (To Who)<li>
                @endforeach
            </ul>
        </div>
        <div class="col-sm-6">
            <h4>Recieving <small>(From)</small></h4>
            <ul>
                @foreach($receiving as $item)
                    <li class="trade-item recieving" data-id="{{$item->id}}">Item Name (From Who)<li>
                @endforeach
            </ul>
        </div>
    </div>
</div>