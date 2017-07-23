<?php $type_class = ($multi) ? "checkbox" : "radio"; ?>
<div class="questions {{$type_class}} {{$class or ''}}">
    @foreach($questions as $question)
        <div class="{{$type_class}}">
            <label>
                <input type="{{$type_class}}" value="{{$question->id}}">
                {{$question->description}}
            </label>
        </div>
        <div class="row no-margin">
            <div class="col-xs-9 progress progress-xs" style="padding: 0;">
                <?php $width = ($total == 0) ? 0 : ($question->responses()->count() / $total) * 100; ?>
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="{{$width}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$width}}%"></div>
            </div>
            <div class="col-xs-3">
                <span>{{$question->responses()->count()}} votes</span>
            </div>
        </div>
    @endforeach
</div>

