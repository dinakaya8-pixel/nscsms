@props(['items'])

@php
    $themes = [
        'forest'  => ['card' => 'bg-[#0b381b] text-white border-[#0b381b]', 'pill' => 'bg-white/15 text-amber-200'],
        'gold'    => ['card' => 'bg-[#9a7424] text-white border-[#9a7424]', 'pill' => 'bg-black/15 text-amber-100'],
        'emerald' => ['card' => 'bg-[#1f5c34] text-white border-[#1f5c34]', 'pill' => 'bg-white/15 text-emerald-100'],
        'pine'    => ['card' => 'bg-[#144726] text-white border-[#144726]', 'pill' => 'bg-amber-400/20 text-amber-200'],
        'amber'   => ['card' => 'bg-[#b4892c] text-white border-[#b4892c]', 'pill' => 'bg-black/15 text-white'],
    ];
@endphp

<div x-data="{ activeId: null }">
    @if($items->isEmpty())
        <div class="rounded-2xl border border-dashed border-slate-300 bg-white/70 p-8 text-center text-sm text-slate-500">
            No accreditation or recognition cards added yet.
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($items as $item)
                @php
                    $palette = $themes[$item->theme] ?? $themes['forest'];
                @endphp

                <div
                    @click="activeId = activeId === {{ $item->id }} ? null : {{ $item->id }}"
                    class="group relative aspect-square rounded-2xl border p-6 flex flex-col justify-between overflow-hidden shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer select-none {{ $palette['card'] }}"
                >
                    <div class="pointer-events-none absolute -right-8 -top-8 w-32 h-32 rounded-full bg-white/5 group-hover:scale-125 transition-transform duration-500"></div>

                    <!-- Top Row: Number + Title -->
                    <div class="relative z-10 flex items-start gap-3.5">
                        <span class="text-4xl sm:text-5xl font-black leading-none tracking-tight text-white/95 shrink-0">
                            {{ $item->badge_number }}
                        </span>
                        <div class="pt-0.5 min-w-0">
                            <h3 class="text-base sm:text-lg font-extrabold uppercase leading-tight tracking-wide text-white break-words">
                                {{ $item->title }}
                            </h3>
                            @if($item->subtitle)
                                <p class="text-[11px] leading-snug text-white/75 mt-1 line-clamp-2">
                                    {{ $item->subtitle }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Middle: Toggleable Description -->
                    <div class="relative z-10 my-auto py-2">
                        <p
                            x-show="activeId === {{ $item->id }}"
                            x-cloak
                            x-transition.opacity
                            class="text-xs sm:text-[13px] leading-relaxed text-white/95 bg-black/25 backdrop-blur-2xs rounded-xl p-3.5 border border-white/15"
                        >
                            {{ $item->description }}
                        </p>

                        <div
                            x-show="activeId !== {{ $item->id }}"
                            class="flex items-center justify-between text-[11px] font-semibold text-white/75 group-hover:text-white transition"
                        >
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $palette['pill'] }}">
                                Recognition
                            </span>
                            <span class="group-hover:translate-x-0.5 transition-transform">Details &rarr;</span>
                        </div>
                    </div>

                    <!-- Bottom Row: Icon -->
                    <div class="relative z-10 flex items-end justify-between">
                        @switch($item->icon)
                            @case('book')
                                <svg class="w-12 h-12 sm:w-14 sm:h-14 text-white/90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                                @break

                            @case('chart')
                                <svg class="w-12 h-12 sm:w-14 sm:h-14 text-white/90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="6" y1="20" x2="6" y2="15"></line>
                                    <line x1="12" y1="20" x2="12" y2="10"></line>
                                    <line x1="18" y1="20" x2="18" y2="5"></line>
                                </svg>
                                @break

                            @case('check')
                                <svg class="w-12 h-12 sm:w-14 sm:h-14 text-white/90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M8.5 12.5l2.5 2.5l5-5"></path>
                                </svg>
                                @break

                            @case('bulb')
                                <svg class="w-12 h-12 sm:w-14 sm:h-14 text-white/90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 18h6"></path>
                                    <path d="M10 22h4"></path>
                                    <path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"></path>
                                </svg>
                                @break

                            @default
                                <svg class="w-12 h-12 sm:w-14 sm:h-14 text-white/90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 3l7 3v6c0 5-3.5 8.5-7 9.5-3.5-1-7-4.5-7-9.5V6l7-3z"></path>
                                    <path d="M9.5 12l1.75 1.75L15 10"></path>
                                </svg>
                        @endswitch

                        <span class="text-[10px] font-bold uppercase tracking-widest text-white/60">
                            NSC
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>