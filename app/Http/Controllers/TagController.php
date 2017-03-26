<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('tag.index', ['tags' => Tag::all()]);
    }

    public function show($slug)
    {
        $tag=Tag::whereSlug($slug)->firstOrFail();
        $articles =$tag->article()->With('user','tag')->latest('updated_at')->paginate(); //жаданя загрузка
        return view('articles.index', compact('articles'));

    }
}
