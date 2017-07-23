<div class="box {{$class or 'box-info'}}" style="{{$style['box'] or ''}}">
    <div class="box-header with-border">
        <h3 class="box-title">{{$title}}</h3>

        <div class="box-tools pull-right">
            {{$buttons or ''}}
            @if(isset($collapse) && $collapse)
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            @endif
        </div>
    </div>
    <div class="box-body" style="{{$style['body'] or ''}}">
        {{$body or ''}}
    </div>
    @if(!isset($noFooter))
        <div class="box-footer">
            {{$footer or ''}}
        </div>
    @endif
</div>