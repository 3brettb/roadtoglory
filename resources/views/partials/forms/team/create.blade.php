{{ csrf_field() }}

@component('components.form.group', ['name' => 'name', 'label' => 'Name'])
    {!! Form::text('name', old('name'), ['class="form-control" required autofocus']) !!}
@endcomponent

@component('components.form.group', ['name' => 'mascot', 'label' => 'Mascot'])
    {!! Form::text('mascot', old('mascot'), ['class="form-control" required autofocus']) !!}
@endcomponent

@component('components.form.group', ['name' => 'email', 'label' => 'User Email'])
    {!! Form::email('email', old('email'), ['class="form-control" required autofocus']) !!}
@endcomponent

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Create Team
        </button>
    </div>
</div>