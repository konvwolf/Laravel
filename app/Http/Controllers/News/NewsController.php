<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('news.news')->with('news', News::getNews());
    }

    public function show($title) {
        return view('news.newsText')->with('newsText', News::getNewsId($title));
    }
}
