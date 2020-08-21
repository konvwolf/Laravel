<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use App\News;

class NewsCategories extends Model
{
    public static function categories() {
        return json_decode(File::get(base_path('files/categories.json')), true);
    }

    public static function getCategories() {
        return static::categories();
    }

    public static function getCategoryName($name) {
        foreach(static::categories() as $category) {
            if($category['slug'] == $name) {
                return $category;
            }
        }
    }

    public static function getNewsInCategory($name) {
        if(empty(static::getCategoryName($name))) {
            return [];
        } else {
            foreach(News::getNews() as $news) {
                if ($news['category'] == static::getCategoryName($name)['id']) {
                    $newsList[] = [
                                    $news['id'],
                                    $news['title']
                                ];
                }
            }
            return $newsList;
        }
    }
}