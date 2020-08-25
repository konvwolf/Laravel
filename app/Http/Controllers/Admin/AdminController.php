<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
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

            $image = '';
            if ($request->hasFile('newsImage')) {
                $path = Storage::putFile('public/images', $request->file('newsImage'));
                $image = Storage::url($path);
            }

            $news[] = [
                        'title'     => $request->input('news-name'),
                        'text'      => $request->input('news-text'),
                        'category'  => $request->input('category'),
                        'image'     => $image
                      ];
            
            DB::table('news')->insert($news);

            return redirect()->route('news.News');
        }

        return view('admin.add-news')->with('categories', NewsCategories::getCategories());
    }
}
