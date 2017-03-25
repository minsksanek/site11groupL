<div class="form-group">
    {!! Form::label('title', 'Заголовок') !!}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {!! Form::label('short_description', 'Короткое описание') !!}
    {{ Form::textarea('short_description', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {!! Form::label('description', 'Короткое описание') !!}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>


<button class="btn btn-default">{{ $btnText }}</button>