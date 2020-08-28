<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategories extends Model
{
    protected $table = 'categories';

    public function news() {
        $this->hasMany(News::class, 'category_id');
    }
}