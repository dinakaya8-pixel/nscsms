<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NSC-SMS | Admin Sandbox</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 antialiased pb-20">

    <!-- Top Bar -->
    <header class="bg-[#0b381b] text-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <span class="font-bold text-lg tracking-wide">NSC-SMS</span>
                <span class="text-xs bg-amber-400 text-slate-900 font-bold px-2 py-0.5 rounded">Admin Sandbox</span>
            </div>
            <a href="/" target="_blank" class="text-xs sm:text-sm bg-white text-[#0b381b] font-semibold px-4 py-2 rounded-lg hover:bg-emerald-50 transition">
                View Live Landing Page &rarr;
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 space-y-10">

        <!-- Flash Notification -->
        @if(session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-900 px-4 py-3 rounded-xl text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-900 px-4 py-3 rounded-xl text-sm">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ========================================== -->
        <!-- SECTION 1: MANAGE PROGRAMS OFFERED         -->
        <!-- ========================================== -->
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Form -->
            <div class="lg:col-span-5 bg-white p-6 rounded-2xl shadow-xs border border-slate-200 h-fit">
                <h2 class="text-xl font-bold text-slate-900 mb-1">Add Program Card</h2>
                <p class="text-xs text-slate-500 mb-5">Creates a new sliding card in the Programs Offered section.</p>

                <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Program Code (e.g., BSCS)</label>
                        <input type="text" name="code" required class="w-full rounded-lg border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Full Program Title</label>
                        <input type="text" name="title" required class="w-full rounded-lg border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Short Description</label>
                        <textarea name="description" rows="3" required class="w-full rounded-lg border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]"></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Background Image</label>
                        <input type="file" name="image" accept="image/*" required class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-[#0b381b] hover:file:bg-emerald-100">
                    </div>
                    <button type="submit" class="w-full py-2.5 bg-[#0b381b] text-white text-sm font-semibold rounded-lg hover:bg-emerald-900 transition">
                        + Add Program
                    </button>
                </form>
            </div>

            <!-- List -->
            <div class="lg:col-span-7 bg-white p-6 rounded-2xl shadow-xs border border-slate-200">
                <h2 class="text-xl font-bold text-slate-900 mb-4">Current Programs ({{ $programs->count() }})</h2>
                <div class="space-y-3">
                    @forelse($programs as $program)
                        <div class="flex items-center justify-between p-3 border border-slate-200 rounded-xl hover:bg-slate-50">
                            <div class="flex items-center space-x-3">
                                <img src="{{ asset($program->image_path) }}" alt="{{ $program->code }}" class="w-14 h-14 rounded-lg object-cover bg-slate-200">
                                <div>
                                    <span class="text-[10px] font-bold uppercase px-2 py-0.5 bg-emerald-100 text-[#0b381b] rounded">{{ $program->code }}</span>
                                    <h3 class="text-sm font-bold text-slate-900 mt-0.5">{{ $program->title }}</h3>
                                    <p class="text-xs text-slate-500 line-clamp-1">{{ $program->description }}</p>
                                </div>
                            </div>
                            <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" onsubmit="return confirm('Delete this program?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-semibold text-red-600 hover:text-red-800 px-3 py-1.5 rounded-lg hover:bg-red-50 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500 py-4 text-center">No programs found in the database.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <hr class="border-slate-300">

        <!-- ========================================== -->
        <!-- SECTION 2: MANAGE NEWS & EVENTS            -->
        <!-- ========================================== -->
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Form -->
            <div class="lg:col-span-5 bg-white p-6 rounded-2xl shadow-xs border border-slate-200 h-fit">
                <h2 class="text-xl font-bold text-slate-900 mb-1">Publish News / Event</h2>
                <p class="text-xs text-slate-500 mb-5">Adds an article to the News & Events section.</p>

                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Headline / Title</label>
                        <input type="text" name="title" required class="w-full rounded-lg border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Category</label>
                            <select name="category" class="w-full rounded-lg border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                                <option value="Announcement">Announcement</option>
                                <option value="News">News</option>
                                <option value="Community Updates">Community Updates</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Publish Date</label>
                            <input type="date" name="published_date" value="{{ date('Y-m-d') }}" required class="w-full rounded-lg border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Excerpt / Summary</label>
                        <textarea name="excerpt" rows="3" required class="w-full rounded-lg border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]"></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Cover Image</label>
                        <input type="file" name="image" accept="image/*" required class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-[#0b381b] hover:file:bg-emerald-100">
                    </div>
                    <div class="flex items-center space-x-2 pt-1">
                        <input type="checkbox" name="is_featured" id="is_featured" class="rounded border-slate-300 text-[#0b381b] focus:ring-[#0b381b]">
                        <label for="is_featured" class="text-xs font-medium text-slate-700">Set as Main Featured Banner (Left Card)</label>
                    </div>
                    <button type="submit" class="w-full py-2.5 bg-[#0b381b] text-white text-sm font-semibold rounded-lg hover:bg-emerald-900 transition">
                        + Publish News
                    </button>
                </form>
            </div>

            <!-- List -->
            <div class="lg:col-span-7 bg-white p-6 rounded-2xl shadow-xs border border-slate-200">
                <h2 class="text-xl font-bold text-slate-900 mb-4">Published News ({{ $newsItems->count() }})</h2>
                <div class="space-y-3">
                    @forelse($newsItems as $news)
                        <div class="flex items-center justify-between p-3 border border-slate-200 rounded-xl hover:bg-slate-50">
                            <div class="flex items-center space-x-3">
                                <img src="{{ asset($news->image_path) }}" alt="Thumbnail" class="w-14 h-14 rounded-lg object-cover bg-slate-200">
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-[10px] font-bold uppercase px-2 py-0.5 bg-slate-200 text-slate-700 rounded">{{ $news->category }}</span>
                                        @if($news->is_featured)
                                            <span class="text-[10px] font-bold uppercase px-2 py-0.5 bg-amber-200 text-amber-900 rounded">Featured Banner</span>
                                        @endif
                                    </div>
                                    <h3 class="text-sm font-bold text-slate-900 mt-0.5">{{ $news->title }}</h3>
                                    <p class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($news->published_date)->format('M j, Y') }}</p>
                                </div>
                            </div>
                            <form action="{{ route('admin.news.destroy', $news) }}" method="POST" onsubmit="return confirm('Delete this news item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-semibold text-red-600 hover:text-red-800 px-3 py-1.5 rounded-lg hover:bg-red-50 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500 py-4 text-center">No news items found in the database.</p>
                    @endforelse
                </div>
            </div>
        </section>

    </main>
</body>
</html>