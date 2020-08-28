<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\NewsCategories;
use App\News;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index')->with('news', News::paginate(10));
    }

    public function create() {
        return view('admin.add-news')->with('categories', NewsCategories::all());
    }

    public function store(Request $request) {
        if ($request->isMethod('post')) {
            $news = new News;
            $image = 'public/images/test_image.jpg';
            if ($request->hasFile('newsImage')) {
                $path   = Storage::putFile('public/images', $request->file('newsImage'));
                $image  = Storage::url($path);
            }

            $news->title       = $request->input('news-name');
            $news->text        = $request->input('news-text');
            $news->category_id = $request->input('category');
            $news->is_private  = $request->input('isPrivate') ? 1 : 0;
            $news->image       = $image;

            $request->validate(News::rules(), [], News::formNames());

            $result = $news->save();

            if($result) {
                $message = 'Новость успешно добавлена';
                return view('admin.add-news', ['news' => News::find($news->id), 'categories' => NewsCategories::all(), 'success' => $message]);
            } else {
                $message = 'Новость не добавлена';
                return view('admin.add-news', ['categories' => NewsCategories::all(), 'error' => $message]);
            }
        }
    }

    public function edit($id) {
        return view('admin.add-news', ['news' => News::find($id), 'categories' => NewsCategories::all()]);
    }

    public function update(Request $request) {
        $news = News::find($request->input('news-id'));
        if ($request->hasFile('newsImage')) {
            $path   = Storage::putFile('public/images', $request->file('newsImage'));
            $image  = Storage::url($path);
            $news->image = $image;
        }

        $news->title       = $request->input('news-name');
        $news->text        = $request->input('news-text');
        $news->category_id = $request->input('category');
        $news->is_private  = $request->input('isPrivate') ? 1 : 0;
        $result = $news->save();

        if($result) {
            $message = 'Новость отредактирована успешно';
            
        } else {
            $message = 'Изменения не сохранены';
        }
        return view('admin.add-news', ['news' => $news, 'categories' => NewsCategories::all(), 'success' => $message]);
    }

    public function destroy($id) {
        $news = News::find($id)->delete();
        return redirect()->route('admin.index');
    }
}