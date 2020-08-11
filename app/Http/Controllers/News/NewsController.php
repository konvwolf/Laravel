<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('news')->with('news', News::getNews());
    }

    public function show($title) {
        return view('newsText')->with('newsText', News::getNewsId($title));
    }
}
