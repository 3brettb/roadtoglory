<ul class="dropdown-menu">
    @if(isset($header))
        <li class="header">{{$header}}</li>
    @endif
    <li>
        <ul class="menu">
            {{$slot}}
        </ul>
    </li>
    @if(isset($footer))
        <li class="footer">{{$footer}}</li>
    @endif
</ul>