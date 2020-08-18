<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class News extends Model
{
    private static function news() {
        return json_decode(File::get(base_path('files/news.json')), true);
    }

    public static function getNews() {
        return static::news();
    }

    public static function getNewsId($title) {
        // Пришлось отказаться от функции array_search, поскольку в случае false она возвращает 0, который соответствует массиву с ключом 0
        $newsId = Str::before($title, '---');
        foreach(static::news() as $item) {
            if($item['id'] == $newsId) {
                return $item;
            };
        }
    }
}