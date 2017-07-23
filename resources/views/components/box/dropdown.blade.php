<div class="btn-group">
    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <i class="fa {{$icon or 'fa-navicon'}}"></i>
    </button>
    <ul class="dropdown-menu" role="menu">
        {{$slot}}
    </ul>
</div>