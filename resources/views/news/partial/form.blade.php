<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content']) !!}
    <script>
        CKEDITOR.replace( 'content' );
    </script>
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Published On:') !!}
    {!! Form::input('date', 'published_at', $publishedAt, ['class' => 'form-control']) !!}
</div>