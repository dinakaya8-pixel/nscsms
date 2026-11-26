<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Models\NewsItem;
use App\Models\Program;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('landing', [ // or 'welcome', depending on what your view file is named
            'programs' => Program::all(),
            'featuredNews' => NewsItem::where('is_featured', true)->latest()->first(),
            'newsList' => NewsItem::where('is_featured', false)->latest()->take(3)->get(),
            'accreditations' => Accreditation::query()->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }
}
