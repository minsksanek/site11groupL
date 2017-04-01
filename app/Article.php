<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'short_description', 'description','users_id'];


    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getDateAttribute()
    {
        $month = iconv('windows-1251', 'utf-8', $this->updated_at->formatLocalized('%B'));

        $month = $this->prepareMonth($month);

        $dateAndDays = 'в ' . iconv('windows-1251', 'utf-8', $this->updated_at->formatLocalized('%A %d'));
        $year = date('Y') . ' года';
        // iconv('windows-1251', 'utf-8', $article->updated_at->formatLocalized('%A %d %B %Y')) года
        return sprintf(
            '%s %s %s',
            $dateAndDays,
            $month,
            $year
        );
    }

    private function prepareMonth($month)
    {
        $month = mb_strtolower($month);

        $mon = [
          'январь' => 'января',
          'февраль' => 'февраля',
          'март' => 'марта',
          'апрель' => 'апреля',
          'май' => 'мая',
          'июнь' => 'июня',
          'июль' => 'июля',
          'август' => 'августа',
          'сентябрь' => 'сентября',
          'октябрь' => 'октября',
          'ноябрь' => 'ноября',
          'декабрь' => 'декабря',
        ];

        return array_get($mon, $month, $month);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id'); // User -HasMany
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tag()
    {
       return $this->belongsToMany('App\Tag')->withTimestamps();
    }








}
