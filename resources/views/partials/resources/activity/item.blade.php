<div class="activity {{$class or ''}}" data-id="{{$activity->id}}">
    <div class="col-xs-2">
        <i class="{{$icon or 'fa fa-bullhorn fa-large'}}"></i>
    </div>
    <div class="col-xs-8">
        <a href="{{$activity->routeto()}}">
            <p><b>{{$activity->subject}}:</b> {{$activity->description}}</p>
        </a>
    </div>
    <div class="col-xs-2">
        <small><i class="fa fa-clock-o"></i> {{$activity->created_at->format('diffForHumans')}}</small>
    </div>
</div>