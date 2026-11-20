@props([
    'badge' => 'Section',
    'title' => 'Page Title',
    'subtitle' => null,
    'image' => 'images/nsc-people.jpg',
])

<div class="relative w-full py-14 sm:py-20 mb-8 overflow-hidden">
    <!-- Background Image + Dark Tint with Subtle Left & Right Edge Fade Only -->
    <div 
        style="
            -webkit-mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
            mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
        "
        class="absolute inset-0 pointer-events-none"
    >
        <img 
            src="{{ asset($image) }}" 
            alt="{{ $title }}" 
            class="w-full h-full object-cover object-center"
        >
        <div class="absolute inset-0 bg-slate-950/50"></div>
    </div>

    <!-- Header Card Container -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back to Home Button -->
        <button 
            @click="activeTab = 'home'; window.scrollTo({top: 0, behavior: 'smooth'})" 
            class="inline-flex items-center text-xs font-bold text-[#0b381b] bg-white/90 hover:bg-white px-3 py-1.5 rounded-full shadow-xs mb-4 transition cursor-pointer"
        >
            &larr; Back to Home
        </button>

        <!-- Frosted Title Card (40% Opacity) -->
        <div class="bg-white/40 backdrop-blur-md border border-white/50 rounded-2xl p-6 sm:p-8 shadow-lg max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-emerald-100/90 text-[#0b381b] mb-3">
                {{ $badge }}
            </span>

            <h1 {{ $attributes->merge(['class' => 'text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight']) }}>
                {{ $title }}
            </h1>

            @if($subtitle)
                <p class="text-xs sm:text-sm text-slate-900 font-medium mt-2 leading-relaxed">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
    </div>
</div>