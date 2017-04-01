<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Auth;

class ArticleController extends Controller
{

    public function __construct(){
        $this->middleware('authuser',['only' => [
            'create',
            'edit'
        ]]);//используем routeMiddleware только для определённых методов
    }

    public function index()
    {
        $articles =Article::With('user','tag')->latest('updated_at')->paginate(); //жаданя загрузка
        return view('articles.index', compact('articles'));
    }

    public function view(Article $article)
    {
        $user=$article->user()->get();
        $tags=$article->tag()->get();
        return view('articles.show', compact('article','user','tags'));
    }

    public function create()
    {
        $tags=array_pluck(Tag::all()->toArray(), 'title','id');
        $select_tags=[];
        return view('articles.create',compact('tags','select_tags'));
    }

    public function store(ArticleRequest $request)
    {
        $article=auth()->user()->article()->create($request->all());
        $article->tag()->attach($request->all()['tags']);
        return redirect()->route('article.index');
    }

    public function edit(Article $article)
    {
        $tags=array_pluck(Tag::all()->toArray(), 'title','id');
        $select_tags=array_pluck($article->tag()->get()->toArray(),'id');
        return view('articles.edit', compact('article','tags','select_tags'));
    }


    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        $article->tag()->detach();
        $article->tag()->attach($request->all()['tags']);
        return redirect()->route('article.show', ['slug' => $article->slug]);
    }






}
