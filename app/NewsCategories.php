<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategories extends Model
{
    private static $newsCategories = [
        [
            'id'    => 1,
            'name'  => 'Велоспорт'
        ],
        [
            'id'    => 2,
            'name'  => 'Здоровье'
        ]
    ];

    public static function getCategories() {
        return static::$newsCategories;
    }

    public static function getCategoryName($name) {
        return static::$newsCategories[array_search(transliterator_transliterate('Russian/BGN; Title', $name), array_column(static::$newsCategories, 'name'))];
    }
}