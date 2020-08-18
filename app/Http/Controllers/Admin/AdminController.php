<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\NewsCategories;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function create(Request $request) {
        if ($request->isMethod('post')) {
            if (empty($request->input('news-name')) || empty($request->input('news-text'))) {
                $request->flash();
                return redirect()->route('admin.Add-News');
            }

            $news = json_decode(File::get(storage_path('app/public/news.json')), true);
            $news[] = [
                        'id'        => random_int(1000, 9999),
                        'title'     => $request->input('news-name'),
                        'text'      => $request->input('news-text'),
                        'category'  => $request->input('category')
                      ];
            File::put(storage_path('app/public/news.json'), json_encode($news));
            return redirect()->route('news.News');
        }

        return view('admin.add-news')->with('categories', NewsCategories::getCategories());
    }
}
