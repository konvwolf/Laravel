<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\News;
use App\NewsCategories;
use Illuminate\Http\Request;

class NewsCategoriesController extends Controller
{
    public function index() {
        return view('newsCategories')->with('categories', NewsCategories::getCategories());
    }

    public function show($name) {
        $category = NewsCategories::getCategoryName($name);

        foreach(News::getNews() as $news) {
            if ($news['category'] == $category['id']) {
                $newsList[] = [
                                $news['id'],
                                $news['title']
                              ];
            }
        }

        return view('newsCategory', ['category' => $category, 'newsList' => $newsList]);
    }
}
