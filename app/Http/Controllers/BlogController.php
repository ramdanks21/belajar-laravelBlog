<?php

namespace App\Http\Controllers;

use App\Models\Slide;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index')->with([
            'title' => 'Beranda',
            'slides' => Slide::all(),
            // 'slides' => Slide::all()
        ]);
    }
}
