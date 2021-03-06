<?php

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'articles'], function($route){
    $route->name('article.index')->get('/', 'ArticleController@index');
    $route->name('article.create')->get('create', 'ArticleController@create');
    $route->name('article.show')->get('/{article}', 'ArticleController@view');
    $route->name('article.edit')->get('/{article}/edit', 'ArticleController@edit');
    $route->name('article.update')->put('/{article}/update', 'ArticleController@update');
    $route->name('article.store')->post('create', 'ArticleController@store');
});


Route::group(['prefix' => 'tag'], function($route){
    $route->name('tag.index')->get('/', 'TagController@index');
    $route->name('tag.show')->get('/{tag}', 'TagController@show');
});







Auth::routes();