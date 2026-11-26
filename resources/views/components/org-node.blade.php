@props(['node'])

<div x-data="{ expanded: true }" class="flex flex-col items-center">
    <!-- Member Card: Photo Above Name & Role -->
    <div class="w-48 sm:w-56 bg-white rounded-2xl border border-slate-200 shadow-xs hover:border-[#0b381b]/40 hover:shadow-md transition-all duration-200 p-4 text-center">
        @if($node->photo)
            <img
                src="{{ asset($node->photo) }}"
                alt="{{ $node->name }}"
                class="w-20 h-20 rounded-full object-cover object-top mx-auto mb-3 border-2 border-[#0b381b]/20 shadow-2xs"
            >
        @else
            <div class="w-20 h-20 rounded-full bg-emerald-50 text-[#0b381b] font-extrabold text-lg flex items-center justify-center mx-auto mb-3 border-2 border-[#0b381b]/20">
                {{ collect(explode(' ', $node->name))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->implode('') }}
            </div>
        @endif

        <div class="text-sm font-bold text-slate-900 leading-snug">{{ $node->name }}</div>
        <div class="text-xs font-semibold text-[#0b381b] mt-0.5">{{ $node->role }}</div>
        @if($node->department)
            <div class="text-[11px] text-slate-500 mt-1">{{ $node->department }}</div>
        @endif

        @if($node->children->isNotEmpty())
            <button
                type="button"
                @click="expanded = !expanded"
                class="mt-3 inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-slate-100 hover:bg-emerald-50 text-[10px] font-bold text-slate-600 hover:text-[#0b381b] transition cursor-pointer"
            >
                <span x-text="expanded ? 'Hide Team' : 'Show Team ({{ $node->children->count() }})'"></span>
            </button>
        @endif
    </div>

    <!-- Recursive Children Branch (Grouped by Umbrella / Category Label) -->
    @if($node->children->isNotEmpty())
        @php
            $groupedChildren = $node->children->groupBy(fn($child) => trim((string) $child->group_label));
        @endphp

        <div x-show="expanded" x-transition class="flex flex-col items-center">
            <!-- Stem down from parent -->
            <div class="w-px h-6 bg-slate-300"></div>

            <!-- Umbrella Groups Row -->
            <div class="flex items-start justify-center gap-6 sm:gap-8">
                @foreach($groupedChildren as $label => $members)
                    <div class="relative flex flex-col items-center pt-5">
                        <!-- Top horizontal connector across umbrella groups -->
                        @if($groupedChildren->count() > 1)
                            <div class="absolute top-0 h-px bg-slate-300
                                {{ $loop->first ? 'left-1/2 right-0' : ($loop->last ? 'left-0 right-1/2' : 'left-0 right-0') }}">
                            </div>
                        @endif

                        <!-- Vertical drop into this umbrella group -->
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-px h-5 bg-slate-300"></div>

                        @if($label !== '')
                            <!-- Labeled Umbrella Container -->
                            <div class="relative flex flex-col items-center rounded-3xl border border-dashed border-[#0b381b]/35 bg-emerald-50/40 px-4 sm:px-5 pt-6 pb-4">
                                <!-- Category Pill Badge -->
                                <span class="absolute -top-3 px-3 py-0.5 rounded-full bg-[#0b381b] text-white text-[10px] font-bold uppercase tracking-wider shadow-2xs whitespace-nowrap">
                                    {{ $label }}
                                </span>

                                <div class="flex items-start justify-center gap-4 sm:gap-5">
                                    @foreach($members as $child)
                                        <div class="relative flex flex-col items-center {{ $members->count() > 1 ? 'pt-4' : '' }}">
                                            @if($members->count() > 1)
                                                <div class="absolute top-0 h-px bg-[#0b381b]/25
                                                    {{ $loop->first ? 'left-1/2 right-0' : ($loop->last ? 'left-0 right-1/2' : 'left-0 right-0') }}">
                                                </div>
                                                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-px h-4 bg-[#0b381b]/25"></div>
                                            @endif

                                            <x-org-node :node="$child" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <!-- Unlabeled Direct Subordinates -->
                            <div class="flex items-start justify-center gap-4 sm:gap-6">
                                @foreach($members as $child)
                                    <div class="relative flex flex-col items-center {{ $members->count() > 1 ? 'pt-5' : '' }}">
                                        @if($members->count() > 1)
                                            <div class="absolute top-0 h-px bg-slate-300
                                                {{ $loop->first ? 'left-1/2 right-0' : ($loop->last ? 'left-0 right-1/2' : 'left-0 right-0') }}">
                                            </div>
                                            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-px h-5 bg-slate-300"></div>
                                        @endif

                                        <x-org-node :node="$child" />
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>