<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index() {
        return view('news.news')->with('news', News::paginate(10));
    }

    public function show($id) {
        $news = News::find(Str::before($id, '---'));
        return view('news.newsText')->with('newsText', $news);
    }
}
