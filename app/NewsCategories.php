<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\News;

class NewsCategories extends Model
{
    public static function categories() {
        return DB::table('categories')->get();
    }

    public static function getCategories() {
        return static::categories();
    }

    public static function getCategoryName($name) {
        foreach(static::categories() as $category) {
            if($category->slug == $name) {
                return $category;
            }
        }
    }

    public static function getNewsInCategory($name) {
        if(empty(static::getCategoryName($name))) {
            return [];
        }

        foreach(News::getNews() as $news) {
            if ($news->category == static::getCategoryName($name)->id) {
                $newsList[] = [
                                'id'    => $news->id,
                                'title' => $news->title
                            ];
            }
        }
        return $newsList;
    }
}