<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\NewsCategories;
use Illuminate\Http\Request;

class NewsCategoriesController extends Controller
{
    public function index() {
        return view('news.newsCategories')->with('categories', NewsCategories::getCategories());
    }

    public function show($name) {
        return view('news.newsCategory', ['category' => NewsCategories::getCategoryName($name), 'newsList' => NewsCategories::getNewsInCategory($name)]);
    }
}
