<form action="{{$action or '#'}}" method="post">
    <div class="input-group">
        <input type="text" name="{{$name}}" placeholder="{{$placeholder}}" class="form-control">
        <span class="input-group-btn">
            <button type="submit" class="btn {{$color_class or 'btn-primary'}} btn-flat">Send</button>
        </span>
    </div>
</form>