<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest('updated_at')->paginate();
        
        return view('articles.index', compact('articles'));
    }

    public function view(Article $article)
    {
        $user=$article->user()->get();
        return view('articles.show', compact('article','user'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $data=$request->all();
        $data['users_id']=Auth::user()->id;
        Article::create($data);

        return redirect()->route('article.index');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $data=$request->all();
        $data['users_id']=Auth::user()->id;
        $article->update($data);

        return redirect()->route('article.show', ['slug' => $article->slug]);
    }
}
