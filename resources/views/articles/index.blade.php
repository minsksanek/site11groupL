@extends('layouts.app')

@section('content')

    @if (Auth::check())
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('article.create') }}">добавить новость</a>
            </div>
        </div>
    @endif
    @forelse($articles as $article)
        <article>
            <h2>
                {{ $article->title }}
                <small>{{ $article->date  }}</small>,
                    @if(count($article->user)>0)
                        <small> Пользователь {{ $article->user->email }}</small>
                    @endif
            </h2>
            <p>{{ $article->short_description }}</p>
            @if(count($article->tag)>0)
                  <p>Теги:

                                 @foreach($article->tag as $tag)
                                       <a href="{{ route('tag.show', ['slug' => $tag->slug]) }}" >{{$tag->title}}</a>,
                                 @endforeach
                  </p>
             @endif

            <p>
            <a href="{{ route('article.show', ['id' => $article->slug]) }}">глянуть</a>
            </p>


        </article>
    @empty
        <h4>Нету новостей</h4>
    @endforelse

    {{ $articles->render() }}
@endsection