<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private static $news = [
        [
            'id'        => 123,
            'title'     => 'Хорошая новость',
            'text'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                            ut labore et dolore magna aliqua. Mattis vulputate enim nulla aliquet porttitor lacus. 
                            Nunc eget lorem dolor sed viverra ipsum. Mi in nulla posuere sollicitudin aliquam ultrices 
                            sagittis orci. Habitant morbi tristique senectus et netus et.',
            'category'  => 2
        ],
        [
            'id'        => 654,
            'title'     => 'Еще одна хорошая новость',
            'text'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                            ut labore et dolore magna aliqua. Mattis vulputate enim nulla aliquet porttitor lacus. 
                            Nunc eget lorem dolor sed viverra ipsum. Mi in nulla posuere sollicitudin aliquam ultrices 
                            sagittis orci. Habitant morbi tristique senectus et netus et.',
            'category'  => 1
        ],
        [
            'id'        => 321,
            'title'     => 'Очень приятная новость',
            'text'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                            ut labore et dolore magna aliqua. Mattis vulputate enim nulla aliquet porttitor lacus. 
                            Nunc eget lorem dolor sed viverra ipsum. Mi in nulla posuere sollicitudin aliquam ultrices 
                            sagittis orci. Habitant morbi tristique senectus et netus et.',
            'category'  => 2
        ],
    ];

    public static function getNews() {
        return static::$news;
    }

    public static function getNewsId($title) {
        return static::$news[array_search(transliterator_transliterate('Russian/BGN', ucfirst(str_replace('_', ' ', $title))), array_column(static::$news, 'title'))];
    }
}
