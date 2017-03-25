<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    protected $exceptAlias = [
        'article.update'
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|min:5|max:200|unique:articles',
            'short_description' => 'required',
            'description' => 'required',
        ];

        $routeAlias = array_get($this->route()->action, 'as');

        if( in_array($routeAlias, $this->exceptAlias) ){
            $rules['title'] = 'required|min:5|max:200|unique:articles,title,' . $this->route()->article->id;
        }

        return $rules;
    }
}
