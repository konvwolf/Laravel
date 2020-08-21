<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function about() {
        return view('about');
    }

    public function login(Request $request) {
        if ($request->isMethod('post')) {
            dump($request->all());
            return redirect()->route('admin.Admin');
        }

        return view('login');
    }
}
