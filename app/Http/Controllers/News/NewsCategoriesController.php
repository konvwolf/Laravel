<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\NewsCategories;
use Illuminate\Http\Request;
use App\News;

class NewsCategoriesController extends Controller
{
    public function index() {
        return view('news.newsCategories')->with('categories', NewsCategories::all());
    }

    public function show($name) {
        $category   = NewsCategories::where('slug', $name)->first();
        $news       = News::where('category_id', $category->id)->paginate(10);
        return view('news.newsCategory', ['category' => $category, 'newsList' => $news]);
    }
}