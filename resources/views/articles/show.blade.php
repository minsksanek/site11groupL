@extends('layouts.app')

@section('content')
    @if(isset($user['0']->id)&&$user['0']->id>0 && $user['0']->id==Auth::user()->id)
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('article.edit', ['slug' => $article->slug]) }}">Клац</a>
            </div>
        </div>
    @endif
    <h1>
        {{ $article->title }}
        <hr>
        <small>новость создана {{ $article->updated_at->diffForHumans() }}</small>
         @if (isset($user) && count($user)>0)
                <small>, пользователь  {{  $user['0']->name }}</small>
         @endif
    </h1>

    <p>{{ $article->description }}</p>


     @if (isset($tags) && count($tags)>0)
          <div>
              @foreach($tags as $tag)
                 <a href="{{ route('tag.show', ['slug' => $tag->slug]) }}" >{{$tag->title}}</a>,
              @endforeach
          </div>
     @endif


@endsection