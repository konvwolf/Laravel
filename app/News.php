<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'category', 'isPrivate', 'image', 'created_at'];

    public function newscategories() {
        return $this->belongsTo(NewsCategories::class, 'id');
    }
    
    public static function rules()
    {
        $categoryTable = (new NewsCategories)->getTable();
        return [
                'category'  => "required|exists:{$categoryTable},id",
                'news-name' => 'required|min:3',
                'news-text' => 'required|min:3',
                'newsImage' => 'mimes:jpeg,bmp,png|max:1000'
                ];

    }

    public static function formNames() {
        return [
            'category'  => '"Категория новости"',
            'news-name' => '"Заголовок новости"',
            'news-text' => '"Текст новости"',
            'newsImage' => "Изображение"
        ];
    }
}    