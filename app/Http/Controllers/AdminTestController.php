<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminTestController extends Controller
{
    public function index(): View
    {
        return view('admin-test', [
            'programs' => Program::latest()->get(),
            'newsItems' => NewsItem::latest()->get(),
        ]);
    }

    public function storeProgram(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'code' => 'required|string|max:20',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $path = $validated['image']->store('programs', 'public');

        Program::create([
            'code' => $validated['code'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_path' => 'storage/'.$path,
        ]);

        return back()->with('success', 'Program added!');
    }

    public function destroyProgram(Program $program): RedirectResponse
    {
        if (str_starts_with($program->image_path, 'storage/')) {
            Storage::disk('public')->delete(substr($program->image_path, strlen('storage/')));
        }

        $program->delete();

        return back()->with('success', 'Program deleted!');
    }

    public function storeNews(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'category' => 'required|string',
            'published_date' => 'required|date',
            'image' => 'required|image|max:2048',
        ]);

        $isFeatured = $request->boolean('is_featured');

        if ($isFeatured) {
            NewsItem::where('is_featured', true)->update(['is_featured' => false]);
        }

        $path = $validated['image']->store('news', 'public');

        NewsItem::create([
            'title' => $validated['title'],
            'excerpt' => $validated['excerpt'],
            'category' => $validated['category'],
            'published_date' => $validated['published_date'],
            'is_featured' => $isFeatured,
            'image_path' => 'storage/'.$path,
        ]);

        return back()->with('success', 'News item published!');
    }

    public function destroyNews(NewsItem $newsItem): RedirectResponse
    {
        if (str_starts_with($newsItem->image_path, 'storage/')) {
            Storage::disk('public')->delete(substr($newsItem->image_path, strlen('storage/')));
        }

        $newsItem->delete();

        return back()->with('success', 'News item deleted!');
    }
}
