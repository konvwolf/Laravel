<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;

class NewsCategories extends Model
{
    private static $newsCategories = [
        [
            'id'    => 1,
            'name'  => 'Велоспорт',
            'slug'  => 'velosport'
        ],
        [
            'id'    => 2,
            'name'  => 'Здоровье',
            'slug'  => 'zdorovie'
        ]
    ];

    public static function getCategories() {
        return static::$newsCategories;
    }

    public static function getCategoryName($name) {
        foreach(static::$newsCategories as $category) {
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