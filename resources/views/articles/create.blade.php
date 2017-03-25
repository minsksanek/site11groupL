@extends('layouts.app')

@section('content')
    @include('part.errors')
    {!! Form::open(['route' => 'article.store']) !!}
    @include('articles.form_part', ['btnText' => 'Создать новость'])
    {!! Form::close() !!}
@endsection