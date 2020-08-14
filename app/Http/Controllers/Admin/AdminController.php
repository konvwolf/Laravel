<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCreateNews;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function login() {
        return view('admin.login');
    }

    public function addNews() {
        AdminCreateNews::createNews();
        return view('admin.add-news');
    }
}
