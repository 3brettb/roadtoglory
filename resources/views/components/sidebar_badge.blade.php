<li id="{{$id}}" class="treeview">
    <a href="{{url($link)}}">
    <i class="fa {{$class}}"></i> <span>{{$name}}</span>
    <span class="pull-right-container">
        {{$slot}}
    </span>
    </a>
</li>