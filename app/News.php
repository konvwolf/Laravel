<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    private static function news() {
        return DB::table('news')->get();
    }

    public static function getNews() {
        return static::news();
    }

    public static function getNewsId($title) {
        $newsId = Str::before($title, '---');
        foreach(static::news() as $item) {
            if($item->id == $newsId) {
                return $item;
            };
        }
    }
}