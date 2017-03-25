@extends('layouts.app')

@section('content')
    @include('part.errors')
    {!! Form::model($article, ['route' => ['article.update', 'slug' => $article->slug], 'method' => 'put' ]) !!}
    @include('articles.form_part', ['btnText' => 'Обновить'])
    {!! Form::close() !!}
@endsection