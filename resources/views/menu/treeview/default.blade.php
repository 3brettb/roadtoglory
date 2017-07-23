<!-- Include -->
<li id="{{$id or ''}}" class="treeview {{$class or ''}}">
    <a href="{{$link or '#'}}">
        <i class="{{$icon or 'fa fa-icon'}}"></i>
        <span>{{$name}}</span>
        @if(isset($badge))
            <span class="pull-right-container">
                <small class="label {{$badge_class or 'label-info'}} pull-right">{{$badge}}</small>
            </span>
        @endif
    </a>
</li>