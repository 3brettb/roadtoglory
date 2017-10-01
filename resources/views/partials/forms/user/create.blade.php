{{ csrf_field() }}

@component('components.form.group', ['name' => 'firstname', 'label' => 'First Name'])
    {!! Form::text('firstname', old('firstname'), ['class="form-control" required autofocus']) !!}
@endcomponent

@component('components.form.group', ['name' => 'lastname', 'label' => 'Last Name'])
    {!! Form::text('lastname', old('lastname'), ['class="form-control" required autofocus']) !!}
@endcomponent

@component('components.form.group', ['name' => 'email', 'label' => 'Email Address'])
    {!! Form::email('email', old('email'), ['class="form-control" required autofocus']) !!}
@endcomponent

@component('components.form.group', ['name' => 'phone', 'label' => 'Phone Number'])
    {!! Form::text('phone', old('phone'), ['class="form-control" autofocus']) !!}
@endcomponent

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Create User
        </button>
    </div>
</div>