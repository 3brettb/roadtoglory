<div class="{{$class or 'form-group'}} {{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="{{$name}}" class="{{$label_size or 'col-md-4'}} {{$label_class or 'control-label'}}">{{$label}}</label>

    <div class="{{$content_size or 'col-md-6'}} {{$content_class or ''}}">
        {{$slot}}

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>