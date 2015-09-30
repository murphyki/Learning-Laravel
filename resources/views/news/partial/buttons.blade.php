<div class="btn-group btn-group-lg">
    <a class="btn btn-info" href="{{ route('news.index') }}">Cancel</a>
    {!! Form::submit($submitText, ['class' => "btn ${btnClass}"]) !!}
    @if(isset($slug))
        @role('super.admin')
            <a class="btn btn-danger" href="{{ route('news.delete', $slug) }}">Delete</a>
        @endrole
    @endif
</div>