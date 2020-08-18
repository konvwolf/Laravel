<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        // Пришлось отказаться от функции array_search, поскольку в случае false она возвращает 0, который при соответствует массиву с ключом 0
        $newsId = Str::before($title, '---');
        foreach(static::$news as $item) {
            if($item['id'] == $newsId) {
                return $item;
            };
        }
    }
}
