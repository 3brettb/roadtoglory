<li class="{{$class or ''}}">
    <a href="{{$link or '#'}}">
        <div class="pull-left">
            <img src="{{$image}}" class="img-circle" alt="User Image">
        </div>
        <h4>
            {{$title}}
            <small><i class="fa fa-clock-o"></i> {{$time->diffForHumans()}}</small>
        </h4>
        <p>{{$slot}}</p>
    </a>
</li>