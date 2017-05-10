<li id="{{$id}}" class="treeview">
    <a href="{{url($link)}}">
        <i class="fa {{$class}}"></i> <span>{{$name}}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        {{$slot}}
    </ul>
</li>