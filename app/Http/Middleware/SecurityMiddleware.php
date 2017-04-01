<?php

namespace App\Http\Middleware;

use Closure;


class SecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //разрешаем создавать только зарегистрированным пользователям
        if($request->route()->action['as'] == 'article.create'){
           if(is_null($request->user())){
               abort(403);
           }
        }
        //редактировать и изменяеть может только "автор" статьи
        if($request->route()->action['as'] == 'article.edit' && $request->route()->parameters()['article']->users_id !=$request->user()->id ){
                abort(403);
        }

       //update не даст сделать VerifyCsrfToken

        return $next($request);
    }
}
