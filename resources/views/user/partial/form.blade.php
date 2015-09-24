<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm Password:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>
<div class="btn-group btn-group-lg">
    <a class="btn btn-info" href="{{ route('users.index') }}">Cancel</a>
    @role('super.admin')
        {!! Form::submit($submitText, ['class' => 'btn btn-primary']) !!}
        @if($id)
            <a class="btn btn-danger" href="{{ route('users.delete', $id) }}">Delete</a>
        @endif
    @endrole
</div>