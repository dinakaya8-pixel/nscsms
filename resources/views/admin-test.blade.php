<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NSC-SMS | Admin Sandbox</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
                        <input type="text" name="code" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Full Program Title</label>
                        <input type="text" name="title" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Short Description</label>
                        <textarea name="description" rows="3" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]"></textarea>
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
                        <input type="text" name="title" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Category</label>
                            <select name="category" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                                <option value="Announcement">Announcement</option>
                                <option value="News">News</option>
                                <option value="Community Updates">Community Updates</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Publish Date</label>
                            <input type="date" name="published_date" value="{{ date('Y-m-d') }}" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Excerpt / Summary</label>
                        <textarea name="excerpt" rows="3" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]"></textarea>
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

        <hr class="border-slate-300">

        <!-- ========================================== -->
        <!-- SECTION 3: MANAGE ADMINISTRATION & BOARD   -->
        <!-- ========================================== -->
        <section
            x-data="{
                editingId: null,
                actionUrl: '{{ route('board-members.store') }}',
                parentId: '',
                name: '',
                role: '',
                department: '',
                groupLabel: '',
                sortOrder: 0,
                startEdit(member) {
                    this.editingId = member.id;
                    this.actionUrl = '/board-members/' + member.id;
                    this.parentId = member.parent_id ?? '';
                    this.name = member.name;
                    this.role = member.role;
                    this.department = member.department ?? '';
                    this.groupLabel = member.group_label ?? '';
                    this.sortOrder = member.sort_order ?? 0;
                    window.scrollTo({ top: this.$el.offsetTop - 24, behavior: 'smooth' });
                },
                resetForm() {
                    this.editingId = null;
                    this.actionUrl = '{{ route('board-members.store') }}';
                    this.parentId = '';
                    this.name = '';
                    this.role = '';
                    this.department = '';
                    this.groupLabel = '';
                    this.sortOrder = 0;
                }
            }"
            class="space-y-8"
        >
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Add / Edit Form -->
                <div class="lg:col-span-5 bg-white p-6 rounded-2xl shadow-xs border border-slate-200 h-fit">
                    <div class="flex items-center justify-between mb-1">
                        <h2 class="text-xl font-bold text-slate-900" x-text="editingId ? 'Edit Board Member' : 'Add Board Member'"></h2>
                        <button
                            type="button"
                            x-show="editingId"
                            @click="resetForm()"
                            class="text-xs font-semibold text-slate-500 hover:text-slate-800 cursor-pointer"
                        >
                            Cancel Edit
                        </button>
                    </div>
                    <p class="text-xs text-slate-500 mb-5">Build or adjust the Administration &amp; Board hierarchy.</p>

                    <form action="{{ route('board-members.store') }}" :action="actionUrl" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <template x-if="editingId">
                            <input type="hidden" name="_method" value="PUT">
                        </template>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Reports To (Parent Position)</label>
                            <select name="parent_id" x-model="parentId" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                                <option value="">— Top Level (Root Node) —</option>
                                @foreach($allBoardMembers as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->role }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Full Name</label>
                            <input type="text" name="name" x-model="name" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Position / Role</label>
                            <input type="text" name="role" x-model="role" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                        </div>

                        <div class="grid grid-cols-3 gap-3">
                            <div class="col-span-2">
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Office / Unit (Optional)</label>
                                <input type="text" name="department" x-model="department" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Order</label>
                                <input type="number" name="sort_order" x-model="sortOrder" min="0" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">
                                Umbrella / Category Label <span class="text-slate-400 font-normal">(Optional)</span>
                            </label>
                            <input
                                type="text"
                                name="group_label"
                                x-model="groupLabel"
                                list="group-label-suggestions"
                                placeholder="e.g. Board of Trustees, Academic Deans"
                                class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]"
                            >
                            <datalist id="group-label-suggestions">
                                @foreach($allBoardMembers->pluck('group_label')->filter()->unique() as $existingLabel)
                                    <option value="{{ $existingLabel }}">
                                @endforeach
                            </datalist>
                            <p class="text-[11px] text-slate-400 mt-1">Members under the same parent with the same label are grouped together.</p>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Portrait Photo</label>
                            <input type="file" name="photo" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-[#0b381b] hover:file:bg-emerald-100">
                        </div>

                        <button type="submit" class="w-full py-2.5 bg-[#0b381b] text-white text-sm font-semibold rounded-lg hover:bg-emerald-900 transition cursor-pointer">
                            <span x-text="editingId ? 'Save Changes' : '+ Add Board Member'"></span>
                        </button>
                    </form>
                </div>

                <!-- Member Directory List -->
                <div class="lg:col-span-7 bg-white p-6 rounded-2xl shadow-xs border border-slate-200">
                    <h2 class="text-xl font-bold text-slate-900 mb-4">Board &amp; Administration Members ({{ $allBoardMembers->count() }})</h2>
                    <div class="space-y-3">
                        @forelse($allBoardMembers as $member)
                            <div class="flex items-center justify-between p-3 border border-slate-200 rounded-xl hover:bg-slate-50">
                                <div class="flex items-center space-x-3">
                                    @if($member->photo)
                                        <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" class="w-12 h-12 rounded-full object-cover object-top bg-slate-200">
                                    @else
                                        <div class="w-12 h-12 rounded-full bg-emerald-100 text-[#0b381b] font-bold text-xs flex items-center justify-center">
                                            {{ collect(explode(' ', $member->name))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->implode('') }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="flex items-center space-x-2">
                                            <span class="text-[10px] font-bold uppercase px-2 py-0.5 bg-emerald-100 text-[#0b381b] rounded">{{ $member->role }}</span>
                                            @if($member->parent)
                                                <span class="text-[10px] text-slate-500">Reports to: {{ $member->parent->name }}</span>
                                            @else
                                                <span class="text-[10px] font-semibold text-amber-700">Top Level</span>
                                            @endif
                                        </div>
                                        <h3 class="text-sm font-bold text-slate-900 mt-0.5">{{ $member->name }}</h3>
                                        @if($member->department)
                                            <p class="text-xs text-slate-500">{{ $member->department }}</p>
                                        @endif
                                        @if($member->group_label)
                                            <span class="inline-block mt-1 text-[10px] font-bold uppercase px-2 py-0.5 bg-amber-100 text-amber-900 rounded">
                                                {{ $member->group_label }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <button
                                        type="button"
                                        @click='startEdit(@json($member))'
                                        class="text-xs font-semibold text-[#0b381b] hover:text-emerald-900 px-3 py-1.5 rounded-lg hover:bg-emerald-50 transition cursor-pointer"
                                    >
                                        Edit
                                    </button>
                                    <form action="{{ route('board-members.destroy', $member) }}" method="POST" onsubmit="return confirm('Delete this member?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-semibold text-red-600 hover:text-red-800 px-3 py-1.5 rounded-lg hover:bg-red-50 transition cursor-pointer">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-slate-500 py-4 text-center">No board members found in the database.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Live Tree Preview in Sandbox -->
            <div class="bg-white p-6 rounded-2xl shadow-xs border border-slate-200">
                <h3 class="text-base font-bold text-slate-900 mb-4">Live Tree Preview</h3>
                <div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 overflow-x-auto">
                    @if($boardRoots->isEmpty())
                        <p class="text-xs text-slate-500 text-center py-6">Add a board member above to preview the tree.</p>
                    @else
                        <div class="min-w-max flex items-start justify-center gap-10 mx-auto">
                            @foreach($boardRoots as $root)
                                <x-org-node :node="$root" />
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <hr class="border-slate-300">

        <!-- ========================================== -->
        <!-- SECTION 4: ACCREDITATION & RECOGNITION     -->
        <!-- ========================================== -->
        <section
            x-data="{
                editingId: null,
                actionUrl: '{{ route('accreditations.store') }}',
                badgeNumber: '01',
                title: '',
                subtitle: '',
                description: '',
                theme: 'forest',
                icon: 'award',
                sortOrder: 0,
                startEdit(card) {
                    this.editingId = card.id;
                    this.actionUrl = '/accreditations/' + card.id;
                    this.badgeNumber = card.badge_number ?? '01';
                    this.title = card.title;
                    this.subtitle = card.subtitle ?? '';
                    this.description = card.description;
                    this.theme = card.theme ?? 'forest';
                    this.icon = card.icon ?? 'award';
                    this.sortOrder = card.sort_order ?? 0;
                    window.scrollTo({ top: this.$el.offsetTop - 24, behavior: 'smooth' });
                },
                resetForm() {
                    this.editingId = null;
                    this.actionUrl = '{{ route('accreditations.store') }}';
                    this.badgeNumber = '01';
                    this.title = '';
                    this.subtitle = '';
                    this.description = '';
                    this.theme = 'forest';
                    this.icon = 'award';
                    this.sortOrder = 0;
                }
            }"
            class="space-y-8"
        >
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Add / Edit Form -->
                <div class="lg:col-span-5 bg-white p-6 rounded-2xl shadow-xs border border-slate-200 h-fit">
                    <div class="flex items-center justify-between mb-1">
                        <h2 class="text-xl font-bold text-slate-900" x-text="editingId ? 'Edit Recognition Card' : 'Add Recognition Card'"></h2>
                        <button
                            type="button"
                            x-show="editingId"
                            @click="resetForm()"
                            class="text-xs font-semibold text-slate-500 hover:text-slate-800 cursor-pointer"
                        >
                            Cancel Edit
                        </button>
                    </div>
                    <p class="text-xs text-slate-500 mb-5">Customize accreditation and recognition tiles for the About Us page.</p>

                    <form action="{{ route('accreditations.store') }}" :action="actionUrl" method="POST" class="space-y-4">
                        @csrf
                        <template x-if="editingId">
                            <input type="hidden" name="_method" value="PUT">
                        </template>

                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Number</label>
                                <input type="text" name="badge_number" x-model="badgeNumber" maxlength="10" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Card Title</label>
                                <input type="text" name="title" x-model="title" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Subtitle / Body (Optional)</label>
                            <input type="text" name="subtitle" x-model="subtitle" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Details / Description</label>
                            <textarea name="description" x-model="description" rows="3" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]"></textarea>
                        </div>

                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Palette Shade</label>
                                <select name="theme" x-model="theme" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                                    <option value="forest">Forest Green</option>
                                    <option value="gold">Warm Gold</option>
                                    <option value="emerald">Emerald</option>
                                    <option value="pine">Deep Pine</option>
                                    <option value="amber">Rich Amber</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Icon</label>
                                <select name="icon" x-model="icon" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                                    <option value="award">Shield Check</option>
                                    <option value="book">Book</option>
                                    <option value="chart">Growth Bars</option>
                                    <option value="check">Check Circle</option>
                                    <option value="bulb">Lightbulb</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Order</label>
                                <input type="number" name="sort_order" x-model="sortOrder" min="0" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:border-[#0b381b] focus:ring-[#0b381b]">
                            </div>
                        </div>

                        <button type="submit" class="w-full py-2.5 bg-[#0b381b] text-white text-sm font-semibold rounded-lg hover:bg-emerald-900 transition cursor-pointer">
                            <span x-text="editingId ? 'Save Card Changes' : '+ Add Recognition Card'"></span>
                        </button>
                    </form>
                </div>

                <!-- Saved Cards List -->
                <div class="lg:col-span-7 bg-white p-6 rounded-2xl shadow-xs border border-slate-200">
                    <h2 class="text-xl font-bold text-slate-900 mb-4">Configured Cards ({{ $accreditations->count() }})</h2>
                    <div class="space-y-3">
                        @forelse($accreditations as $card)
                            <div class="flex items-center justify-between gap-4 p-3 border border-slate-200 rounded-xl hover:bg-slate-50">
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-bold uppercase px-2 py-0.5 bg-emerald-100 text-[#0b381b] rounded">#{{ $card->badge_number }}</span>
                                        <span class="text-[10px] font-semibold uppercase px-2 py-0.5 bg-slate-100 text-slate-700 rounded">{{ $card->theme }}</span>
                                        <span class="text-[10px] text-slate-400">Order: {{ $card->sort_order }}</span>
                                    </div>
                                    <h3 class="text-sm font-bold text-slate-900 mt-1">{{ $card->title }}</h3>
                                    <p class="text-xs text-slate-500 line-clamp-1">{{ $card->description }}</p>
                                </div>

                                <div class="flex items-center gap-2 shrink-0">
                                    <button
                                        type="button"
                                        @click='startEdit(@json($card))'
                                        class="text-xs font-semibold text-[#0b381b] hover:text-emerald-900 px-3 py-1.5 rounded-lg hover:bg-emerald-50 transition cursor-pointer"
                                    >
                                        Edit
                                    </button>
                                    <form action="{{ route('accreditations.destroy', $card) }}" method="POST" onsubmit="return confirm('Delete this card?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-semibold text-red-600 hover:text-red-800 px-3 py-1.5 rounded-lg hover:bg-red-50 transition cursor-pointer">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-slate-500 py-4 text-center">No cards in the database yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Live Grid Preview -->
            <div class="bg-white p-6 rounded-2xl shadow-xs border border-slate-200">
                <h3 class="text-base font-bold text-slate-900 mb-4">Live Grid Preview</h3>
                <x-accreditation-grid :items="$accreditations" />
            </div>
        </section>

    </main>
</body>
</html>