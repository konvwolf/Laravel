<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\NewsCategories;
use App\News;
use Carbon\Carbon;

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

            $news = new News;
            $image = '';
            if ($request->hasFile('newsImage')) {
                $path   = Storage::putFile('public/images', $request->file('newsImage'));
                $image  = Storage::url($path);
            }

            $news->title      = $request->input('news-name');
            $news->text       = $request->input('news-text');
            $news->category   = $request->input('category');
            $news->isPrivate  = $request->input('isPrivate') ? 1 : 0;
            $news->image      = $image;
            $news->created_at = Carbon::now();
            $news->save();

            return redirect()->route('news.News');
        }

        return view('admin.add-news')->with('categories', NewsCategories::all());
    }

    public function read() {
        return view('admin.news-actions')->with('news', News::paginate(10));
    }

    public function update(Request $request, $id) {
        if ($request->isMethod('post')) {
            if (empty($request->input('news-name')) || empty($request->input('news-text'))) {
                $request->flash();
                return redirect()->route('admin.Add-News');
            }

            $news = News::find($id);
            $image = '';
            if ($request->hasFile('newsImage')) {
                $path   = Storage::putFile('public/images', $request->file('newsImage'));
                $image  = Storage::url($path);
                $news->image = $image;
            }

            $news->title      = $request->input('news-name');
            $news->text       = $request->input('news-text');
            $news->category   = $request->input('category');
            $news->isPrivate  = $request->input('isPrivate') ? 1 : 0;
            $news->updated_at = Carbon::now();
            $news->save();

            return redirect()->route('news.News');
        }

        return view('admin.add-news', ['news' => News::find($id), 'categories' => NewsCategories::all()]);
    }

    public function delete($id) {
        $news = News::find($id)->delete();
        return redirect()->route('admin.Read-News');
    }
}
