<form class="form-horizontal" role="form" method="POST" action="{{ route('action.update.password') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('current') ? ' has-error' : '' }}">
        <label for="current" class="col-md-4 control-label">Current Password</label>

        <div class="col-md-6">
            <input id="current" type="password" class="form-control" name="current" required>

            @if ($errors->has('current'))
                <span class="help-block">
                    <strong>{{ $errors->first('current') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Change Password
            </button>
        </div>
    </div>
</form>