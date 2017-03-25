@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('article.create') }}">добавить новость</a>
        </div>
    </div>

    @forelse($articles as $article)
        <article>
            <h2>
                {{ $article->title }}
                <small>{{ $article->date  }}</small>
            </h2>
            <p>{{ $article->short_description }}</p>
            <a href="{{ route('article.show', ['id' => $article->slug]) }}">глянуть</a>
        </article>
    @empty
        <h4>Нету новостей</h4>
    @endforelse

    {{ $articles->render() }}
@endsection