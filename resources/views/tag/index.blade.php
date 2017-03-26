@extends('layouts.app')

@section('content')
    @forelse($tags as $tag)
        <article>
            <h2> {{ $tag->title }}  </h2>
            <a href="{{ route('tag.show', ['slug' => $tag->slug]) }}">Посмотреть новости по этому тегу </a>
        </article>
    @empty
        <h4>Нету тегов</h4>
    @endforelse
@endsection