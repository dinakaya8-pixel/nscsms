<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use App\Models\Program;

class HomeController extends Controller
{
    public function index()
    {
        return view('landing', [ // or 'welcome', depending on what your view file is named
            'programs' => Program::all(),
            'featuredNews' => NewsItem::where('is_featured', true)->latest()->first(),
            'newsList' => NewsItem::where('is_featured', false)->latest()->take(3)->get(),
        ]);
    }
}
