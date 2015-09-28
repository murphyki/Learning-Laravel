<div class="btn-group btn-group-lg">
    <a class="btn btn-info" href="{{ route('users.index') }}">Cancel</a>
    @role('super.admin')
        {!! Form::submit($submitText, ['class' => "btn ${btnClass}"]) !!}
        @if(isset($id))
            <a class="btn btn-danger" href="{{ route('users.delete', $id) }}">Delete</a>
        @endif
    @endrole
</div>