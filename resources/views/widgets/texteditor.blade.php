<div class="texteditor">
    <div id="summernote" name="{{$id or 'content'}}"></div>
    <textarea id="{{$id or 'content'}}" name="{{$id or 'content'}}" hidden></textarea>
</div>

@push('scripts')
    <script type="text/javascript" src="{{ URL::asset('plugins/summernote/js/summernote.js') }}"></script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ URL::asset('plugins/summernote/css/summernote.css') }}">
@endpush

@push('on_ready')
    $('#summernote').summernote({
        height: 300,
        minHeight: 300,
        focus: true,
        callbacks: {
            onInit: function(){
                $("#summernote").summernote('code',);
                //$("#summernote").summernote('code', '{{$content or ""}}');
            },
            onChange: function(contents, $editable) {
                $("#{{$id or 'content'}}").val(contents);
                $("#{{$id or 'content'}}").html(contents);
            }
        }
    });
@endpush