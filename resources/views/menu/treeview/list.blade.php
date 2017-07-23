<!-- Include -->
<li id="{{$id or ''}}" class="treeview {{$class or ''}}">
    <a href="">
        <i class="{{$icon or 'fa fa-icon'}}"></i>
        <span>{{$name}}</span>
        @if(isset($badge))
            <span class="pull-right-container">
                <small class="label {{$badge_class or 'label-info'}} pull-right">{{$badge}}</small>
            </span>
        @else    
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        @endif
    </a>
    <ul class="treeview-menu">
        @foreach($list as $item)
            <li><a href='{{url($item->url)}}'><i class="{{$sub_icon}}"></i>{{$item->display}}</a></li>
        @endforeach
    </ul>
</li>