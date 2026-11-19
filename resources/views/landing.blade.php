<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'NSCSMS') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen" x-data="{ mobileMenuOpen: false, openDropdown: null }">

    <!-- Sticky Header with 50% Opacity & Institutional Layout -->
    <header class="sticky top-0 z-50 bg-white/50 backdrop-blur-md border-b border-slate-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Left: Real Logo Image + Stacked Title with Green Divider -->
            <a href="/" class="flex items-center space-x-3 group">
                <img src="{{ asset('images/nsc-logo.png') }}" alt="NSC Logo" class="w-10 h-10 sm:w-11 sm:h-12 object-contain shrink-0">
                
                <div class="flex flex-col">
                    <span class="font-serif text-sm sm:text-lg font-bold tracking-wide text-slate-900 uppercase leading-tight">
                        Northern Samar Colleges
                    </span>
                    <div class="h-[2px] w-full bg-[#15803d] my-0.5"></div>
                    <span class="font-serif text-[9px] sm:text-xs tracking-[0.15em] sm:tracking-[0.2em] text-slate-700 uppercase text-center">
                        School Management System
                    </span>
                </div>
            </a>
            
            <!-- Desktop Navigation Links with Hover Dropdowns -->
            <nav class="hidden lg:flex items-center space-x-6 text-sm font-medium text-slate-900">
                <a href="#home" class="hover:text-[#0b381b] transition py-2">
                    Home
                </a>

                <!-- About Us Dropdown -->
                <div class="relative group">
                    <button type="button" class="flex items-center space-x-1 hover:text-[#0b381b] transition py-2">
                        <span>About Us</span>
                        <svg class="w-3.5 h-3.5 text-slate-700 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-1 w-48 bg-white rounded-xl shadow-lg border border-slate-200 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out z-50">
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">History & Heritage</a>
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Vision & Mission</a>
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Administration & Board</a>
                    </div>
                </div>

                <!-- Admissions Dropdown -->
                <div class="relative group">
                    <button type="button" class="flex items-center space-x-1 hover:text-[#0b381b] transition py-2">
                        <span>Admissions</span>
                        <svg class="w-3.5 h-3.5 text-slate-700 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-1 w-48 bg-white rounded-xl shadow-lg border border-slate-200 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out z-50">
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Enrollment Procedures</a>
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Tuition & Fees</a>
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Scholarships</a>
                    </div>
                </div>

                <!-- Academics Dropdown -->
                <div class="relative group">
                    <button type="button" class="flex items-center space-x-1 hover:text-[#0b381b] transition py-2">
                        <span>Academics</span>
                        <svg class="w-3.5 h-3.5 text-slate-700 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-1 w-48 bg-white rounded-xl shadow-lg border border-slate-200 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out z-50">
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Programs Offered</a>
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Departments</a>
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Academic Calendar</a>
                    </div>
                </div>

                <!-- Student Life Dropdown -->
                <div class="relative group">
                    <button type="button" class="flex items-center space-x-1 hover:text-[#0b381b] transition py-2">
                        <span>Student Life</span>
                        <svg class="w-3.5 h-3.5 text-slate-700 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-1 w-48 bg-white rounded-xl shadow-lg border border-slate-200 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out z-50">
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Campus Activities</a>
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Student Organizations</a>
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Portal Services</a>
                    </div>
                </div>

                <!-- Highlighted "More" Button with Dropdown -->
                <div class="relative group">
                    <button type="button" class="px-4 py-2 rounded-xl border-2 border-amber-300/90 bg-white/70 hover:bg-white transition flex flex-col items-center">
                        <span class="flex items-center space-x-1 text-slate-900">
                            <span>More</span>
                            <svg class="w-3.5 h-3.5 text-slate-700 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                        <span class="w-full h-[2.5px] bg-[#0b381b] rounded-full mt-0.5"></span>
                    </button>
                    <div class="absolute right-0 mt-1 w-48 bg-white rounded-xl shadow-lg border border-slate-200 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out z-50">
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">News & Events</a>
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Alumni Network</a>
                        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-emerald-50 hover:text-[#0b381b]">Contact Directory</a>
                    </div>
                </div>
            </nav>

            <!-- Mobile Hamburger Button -->
            <div class="flex lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 rounded-lg text-slate-700 hover:text-[#0b381b] hover:bg-slate-100 focus:outline-hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>

        <!-- Mobile Dropdown Navigation Menu -->
        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" x-transition class="lg:hidden bg-white/95 backdrop-blur-md border-b border-slate-200 px-4 pt-2 pb-6 space-y-3 shadow-lg">
            <a href="#home" @click="mobileMenuOpen = false" class="block py-2 text-sm font-medium text-slate-800 hover:text-[#0b381b]">Home</a>
            
            <!-- Mobile Accordion Item: About Us -->
            <div>
                <button @click="openDropdown = openDropdown === 'about' ? null : 'about'" class="w-full flex justify-between items-center py-2 text-sm font-medium text-slate-800">
                    <span>About Us</span>
                    <svg class="w-4 h-4 transition-transform" :class="openDropdown === 'about' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openDropdown === 'about'" class="pl-4 space-y-2 py-2 border-l-2 border-emerald-600/30">
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">History & Heritage</a>
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Vision & Mission</a>
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Administration & Board</a>
                </div>
            </div>

            <!-- Mobile Accordion Item: Admissions -->
            <div>
                <button @click="openDropdown = openDropdown === 'admissions' ? null : 'admissions'" class="w-full flex justify-between items-center py-2 text-sm font-medium text-slate-800">
                    <span>Admissions</span>
                    <svg class="w-4 h-4 transition-transform" :class="openDropdown === 'admissions' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openDropdown === 'admissions'" class="pl-4 space-y-2 py-2 border-l-2 border-emerald-600/30">
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Enrollment Procedures</a>
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Tuition & Fees</a>
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Scholarships</a>
                </div>
            </div>

            <!-- Mobile Accordion Item: Academics -->
            <div>
                <button @click="openDropdown = openDropdown === 'academics' ? null : 'academics'" class="w-full flex justify-between items-center py-2 text-sm font-medium text-slate-800">
                    <span>Academics</span>
                    <svg class="w-4 h-4 transition-transform" :class="openDropdown === 'academics' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openDropdown === 'academics'" class="pl-4 space-y-2 py-2 border-l-2 border-emerald-600/30">
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Programs Offered</a>
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Departments</a>
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Academic Calendar</a>
                </div>
            </div>

            <!-- Mobile Accordion Item: Student Life -->
            <div>
                <button @click="openDropdown = openDropdown === 'studentLife' ? null : 'studentLife'" class="w-full flex justify-between items-center py-2 text-sm font-medium text-slate-800">
                    <span>Student Life</span>
                    <svg class="w-4 h-4 transition-transform" :class="openDropdown === 'studentLife' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openDropdown === 'studentLife'" class="pl-4 space-y-2 py-2 border-l-2 border-emerald-600/30">
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Campus Activities</a>
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Student Organizations</a>
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Portal Services</a>
                </div>
            </div>

            <!-- Mobile Accordion Item: More -->
            <div>
                <button @click="openDropdown = openDropdown === 'more' ? null : 'more'" class="w-full flex justify-between items-center py-2 text-sm font-medium text-slate-800">
                    <span>More</span>
                    <svg class="w-4 h-4 transition-transform" :class="openDropdown === 'more' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openDropdown === 'more'" class="pl-4 space-y-2 py-2 border-l-2 border-emerald-600/30">
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">News & Events</a>
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Alumni Network</a>
                    <a href="#" class="block text-xs text-slate-600 hover:text-[#0b381b]">Contact Directory</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Hero Section -->
    <main id="home" class="flex-grow">
        <!-- Full-Width Sliding Banner Hero Section -->
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 pt-4 sm:pt-6">
            <div 
                x-data="{ 
                    activeSlide: 0, 
                    slides: [
                        '{{ asset('images/founding-pic.jpg') }}',
                        '{{ asset('images/graduation-pic.jpg') }}',
                        '{{ asset('images/nsc-people.jpg') }}'
                    ],
                    init() {
                        setInterval(() => {
                            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                        }, 5000);
                    }
                }" 
                class="relative w-full h-[280px] sm:h-[380px] lg:h-[450px] rounded-xl sm:rounded-2xl overflow-hidden shadow-md"
            >
                <template x-for="(slide, index) in slides" :key="index">
                    <div 
                        x-show="activeSlide === index" 
                        x-transition:enter="transition-opacity duration-1000 ease-in-out"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity duration-1000 ease-in-out"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute inset-0 w-full h-full"
                    >
                        <img :src="slide" alt="Campus Banner" class="w-full h-full object-cover">
                    </div>
                </template>

                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/20 pointer-events-none"></div>

                <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 sm:px-6 z-10">
                    <span class="inline-block px-3 py-1 mb-2 sm:mb-3 text-[10px] sm:text-xs font-semibold tracking-wider text-emerald-200 uppercase bg-emerald-900/80 rounded-full border border-emerald-700/50">
                        System Online
                    </span>
                    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-2 sm:mb-4 drop-shadow-md">
                        Welcome to <span class="text-amber-300">NSC-SMS</span>
                    </h1>
                    <p class="max-w-xl sm:max-w-2xl mx-auto text-xs sm:text-sm lg:text-base text-slate-200 mb-6 sm:mb-8 drop-shadow px-2">
                        A clean, fast, and responsive management platform powered by Laravel and Tailwind CSS.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4 w-full sm:w-auto px-6 sm:px-0">
                        <a href="#features" class="px-5 py-2.5 text-xs sm:text-sm font-medium text-white bg-[#0b381b] border border-emerald-600 rounded-lg shadow hover:bg-emerald-900 transition">
                            Explore Modules
                        </a>
                        <a href="#about" class="px-5 py-2.5 text-xs sm:text-sm font-medium text-slate-900 bg-white rounded-lg shadow hover:bg-slate-100 transition">
                            Documentation
                        </a>
                    </div>
                </div>

                <div class="absolute bottom-3 sm:bottom-4 left-0 right-0 flex justify-center space-x-2 z-20">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button 
                            @click="activeSlide = index" 
                            :class="activeSlide === index ? 'bg-amber-400 w-5 sm:w-6' : 'bg-white/50 w-2 sm:w-2.5'"
                            class="h-2 sm:h-2.5 rounded-full transition-all duration-300"
                        ></button>
                    </template>
                </div>
            </div>
        </div>

        <!-- Centered Big Font Motto Text -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 sm:pt-14 pb-4 text-center">
            <h2 class="text-lg sm:text-2xl lg:text-4xl font-serif font-bold text-[#0b381b] tracking-wider px-2">
                Educate &bull; Innovate &bull; Serve &bull; Excel
            </h2>
            <div class="w-24 sm:w-40 h-1 bg-amber-400 mx-auto mt-3 rounded-full"></div>
        </div>

        <!-- Our History Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Left Side: Text Content -->
                <div class="lg:col-span-6 space-y-6">
                    <div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-[#0b381b] mb-4">
                            <span class="w-1.5 h-1.5 mr-1.5 bg-[#0b381b] rounded-full"></span>
                            Our History
                        </span>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                            Northern Samar <br>
                            <span class="font-serif italic font-normal text-[#0b381b]">Colleges</span>
                        </h2>
                    </div>

                    <!-- Paragraphs with Left Emerald Border -->
                    <div class="border-l-4 border-[#0b381b] pl-4 sm:pl-6 space-y-4 text-sm sm:text-base text-slate-600 leading-relaxed">
                        <p>
                            We pursue <strong class="text-slate-900 font-semibold">innovative approaches</strong> in education to enhance instruction, research, and community involvement.
                        </p>
                        <p>
                            Pledging to provide learners a curricular framework that instills creative and critical thinking in a rapidly changing world.
                        </p>
                        <p>
                            Cultural Preservation, Environmental Care, and Values Formation are inculcated to guarantee genuine transformation.
                        </p>
                    </div>
                </div>

                <!-- Right Side: Circular Overlapping Venn-Diagram Image Layout with Click/Hover Support -->
                <div class="lg:col-span-6 flex justify-center items-center py-6" x-data="{ topImage: 'left' }">
                    <div class="relative flex items-center justify-center w-full max-w-lg h-[320px] sm:h-[380px]">
                        
                        <!-- Image 1 (Left Circle) -->
                        <div 
                            @mouseenter="topImage = 'left'"
                            @click="topImage = 'left'"
                            :class="topImage === 'left' ? 'z-30 scale-105 -translate-y-2' : 'z-10 scale-100'"
                            class="absolute left-4 sm:left-8 w-60 h-60 sm:w-72 sm:h-72 rounded-full overflow-hidden shadow-2xl border-4 border-white transition-all duration-300 cursor-pointer"
                        >
                            <img src="{{ asset('images/heritage-pic.jpg') }}" alt="Campus History" class="w-full h-full object-cover">
                        </div>

                        <!-- Image 2 (Right Overlapping Circle - Venn Diagram Effect) -->
                        <div 
                            @mouseenter="topImage = 'right'"
                            @click="topImage = 'right'"
                            :class="topImage === 'right' ? 'z-30 scale-105 -translate-y-2' : 'z-20 scale-100'"
                            class="absolute right-4 sm:right-8 w-60 h-60 sm:w-72 sm:h-72 rounded-full overflow-hidden shadow-2xl border-4 border-white transition-all duration-300 cursor-pointer"
                        >
                            <img src="{{ asset('images/heritage-pic2.jpg') }}" alt="Student Life & Programs" class="w-full h-full object-cover">
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- Programs Offered Section (DYNAMIC DATABASE LOOP) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="{ 
            scrollContainer: null,
            scrollLeft() {
                this.$refs.slider.scrollBy({ left: -340, behavior: 'smooth' });
            },
            scrollRight() {
                this.$refs.slider.scrollBy({ left: 340, behavior: 'smooth' });
            }
        }">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8">
                <div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-[#0b381b] mb-3">
                        <span class="w-1.5 h-1.5 mr-1.5 bg-[#0b381b] rounded-full"></span>
                        Academic Excellence
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                        Programs Offered
                    </h2>
                    <p class="text-sm sm:text-base text-slate-600 mt-2 max-w-xl">
                        Discover our academic programs designed to prepare students for meaningful careers and lifelong learning.
                    </p>
                </div>

                <!-- Clickable Slide Buttons -->
                <div class="flex items-center space-x-4 mt-4 md:mt-0">
                    <a href="#" class="hidden sm:inline-flex items-center text-sm font-semibold text-[#0b381b] hover:text-emerald-800 transition mr-2">
                        Explore All Programs <span class="ml-1.5">&rarr;</span>
                    </a>
                    <div class="flex space-x-2">
                        <button @click="scrollLeft()" class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center bg-white hover:bg-slate-100 text-slate-700 transition shadow-xs focus:outline-hidden">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button @click="scrollRight()" class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center bg-white hover:bg-slate-100 text-slate-700 transition shadow-xs focus:outline-hidden">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Horizontal Scrollable Container Loop -->
            <div x-ref="slider" class="flex gap-6 overflow-x-auto no-scrollbar scroll-smooth snap-x snap-mandatory pb-4">
                @foreach($programs as $program)
                <div class="program-card shrink-0 w-[85%] sm:w-[320px] lg:w-[350px] snap-start relative h-[420px] rounded-2xl overflow-hidden shadow-lg group flex flex-col justify-end p-6 bg-slate-900">
                    <img src="{{ asset($program->image_path) }}" alt="{{ $program->code }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-70">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    <div class="relative z-10">
                        <span class="inline-block px-2.5 py-1 mb-3 text-[10px] font-bold tracking-wider text-white uppercase bg-black/40 backdrop-blur-md rounded-md border border-white/20">
                            {{ $program->code }}
                        </span>
                        <h3 class="text-xl font-bold text-white mb-2 leading-snug">{{ $program->title }}</h3>
                        <p class="text-xs text-slate-200 mb-4 line-clamp-3">{{ $program->description }}</p>
                        <a href="#" class="inline-flex items-center text-xs font-semibold text-amber-300 hover:text-white transition">
                            Explore Program &rarr;
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- News & Events Section (DYNAMIC DATABASE LOOP) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
                <div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-900 mb-3">
                        <span class="w-1.5 h-1.5 mr-1.5 bg-amber-600 rounded-full"></span>
                        Stay Updated
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                        News & Events
                    </h2>
                    <p class="text-sm sm:text-base text-slate-600 mt-2 max-w-xl">
                        Discover the latest announcements, activities, and stories from Northern Samar Colleges.
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="#" class="inline-flex items-center text-sm font-semibold text-[#0b381b] hover:text-emerald-800 transition">
                        View Newsroom <span class="ml-1.5">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- News Grid Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Left: Big Featured Banner Card -->
                @if(isset($featuredNews))
                <div class="lg:col-span-7 relative h-[400px] sm:h-[480px] rounded-2xl overflow-hidden shadow-lg group flex flex-col justify-end p-6 sm:p-8 bg-slate-900">
                    <img src="{{ asset($featuredNews->image_path) }}" alt="Featured News" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-80">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/10"></div>
                    
                    <div class="relative z-10">
                        <span class="inline-block px-3 py-1 mb-3 text-xs font-bold tracking-wider text-white uppercase bg-emerald-700/90 rounded-md">
                            {{ $featuredNews->category }}
                        </span>
                        <h3 class="text-2xl sm:text-3xl font-bold text-white mb-3 leading-snug">
                            {{ $featuredNews->title }}
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-200 mb-4 line-clamp-2">
                            {{ $featuredNews->excerpt }}
                        </p>
                        <div class="flex items-center text-xs text-slate-300 space-x-2">
                            <span>🕒 {{ \Carbon\Carbon::parse($featuredNews->published_date)->format('F j, Y') }}</span>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Right: Scrollable Vertical List of News Cards -->
                <div class="lg:col-span-5 flex flex-col gap-4 max-h-[480px] overflow-y-auto pr-2 no-scrollbar">
                    @foreach($newsList as $news)
                    <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-xs flex flex-col sm:flex-row gap-4 items-center hover:shadow-md transition">
                        <img src="{{ asset($news->image_path) }}" alt="News Thumbnail" class="w-full sm:w-28 h-24 object-cover rounded-lg shrink-0">
                        <div class="flex flex-col justify-between w-full">
                            <div class="flex items-center justify-between text-[11px] text-slate-500 mb-1">
                                <span class="bg-emerald-50 text-emerald-800 font-semibold px-2 py-0.5 rounded">{{ $news->category }}</span>
                                <span>{{ \Carbon\Carbon::parse($news->published_date)->format('M j, Y') }}</span>
                            </div>
                            <h4 class="text-sm font-bold text-slate-900 line-clamp-2 mb-1 hover:text-[#0b381b]">
                                <a href="#">{{ $news->title }}</a>
                            </h4>
                            <a href="#" class="text-xs font-semibold text-[#0b381b] hover:underline mt-1">Read more &rarr;</a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Extra Section -->
        <section id="about" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="bg-[#0b381b] rounded-2xl p-6 sm:p-12 text-white text-center">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-3 sm:mb-4">Built for Speed & Scalability</h2>
                <p class="max-w-xl mx-auto text-xs sm:text-sm lg:text-base text-emerald-100 mb-6">
                    Scroll up and down to see the header and footer work seamlessly together.
                </p>
                <a href="#home" class="inline-block px-5 py-2.5 text-xs sm:text-sm font-semibold text-[#0b381b] bg-white rounded-lg hover:bg-emerald-50 transition">
                    Back to Top
                </a>
            </div>
        </section>
    </main>

    <!-- Multi-Column Dark Green Footer -->
    <footer id="contact" class="bg-[#0b381b] text-emerald-100 pt-12 sm:pt-16 pb-8 border-t border-emerald-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8 sm:gap-10 pb-12 border-b border-emerald-900/60">
                
                <!-- Column 1: Brand / Real Logo Image Area -->
                <div class="sm:col-span-2 lg:col-span-1 flex flex-col items-center sm:items-start text-center sm:text-left">
                    <img src="{{ asset('images/nsc-logo.png') }}" alt="NSC Footer Logo" class="w-16 h-16 sm:w-20 sm:h-20 object-contain mb-4">
                    <h4 class="font-bold text-white tracking-wide text-sm">NSC SYSTEM</h4>
                    <p class="text-xs text-emerald-200/80 mt-1">Official Management Portal</p>
                </div>

                <!-- Column 2: General Use Links -->
                <div>
                    <h3 class="text-white font-semibold text-sm mb-4 tracking-wide uppercase">General Use</h3>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="#" class="hover:text-white transition">Home</a></li>
                        <li><a href="#" class="hover:text-white transition">Vision & Mission</a></li>
                        <li><a href="#" class="hover:text-white transition">Academics</a></li>
                        <li><a href="#" class="hover:text-white transition">Admissions</a></li>
                        <li><a href="#" class="hover:text-white transition">News and Events</a></li>
                        <li><a href="#" class="hover:text-white transition">Student Resources</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers at Portal</a></li>
                    </ul>
                </div>

                <!-- Column 3: Contact Us -->
                <div>
                    <h3 class="text-white font-semibold text-sm mb-4 tracking-wide uppercase">Contact Us</h3>
                    <ul class="space-y-3 text-xs">
                        <li class="flex items-start space-x-2">
                            <span class="mt-0.5 text-amber-400">📍</span>
                            <span class="text-emerald-100/90 leading-relaxed">Barangay Dalakit, Catarman, Northern Samar</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="text-amber-400">📞</span>
                            <span class="text-emerald-100/90">+63 900 000 0000</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="text-amber-400">✉️</span>
                            <span class="text-emerald-100/90">support@nscsms.edu.ph</span>
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Connect with Us -->
                <div>
                    <h3 class="text-white font-semibold text-sm mb-4 tracking-wide uppercase">Connect with Us</h3>
                    <p class="text-xs text-emerald-200/80 mb-4 leading-relaxed">
                        Follow us on social media for updates and news.
                    </p>
                    <ul class="space-y-2.5 text-xs">
                        <li>
                            <a href="#" class="flex items-center space-x-2 hover:text-white transition">
                                <span class="text-amber-400 font-bold">f</span>
                                <span>NSC Official Page</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center space-x-2 hover:text-white transition">
                                <span class="text-amber-400">🌐</span>
                                <span>www.nscsms.edu.ph</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 5: For Faculty / Staff -->
                <div>
                    <h3 class="text-white font-semibold text-sm mb-4 tracking-wide uppercase">For Faculty/Staff</h3>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="#" class="hover:text-white transition">HR Portal</a></li>
                        <li><a href="#" class="hover:text-white transition">Facilities Requests</a></li>
                        <li><a href="#" class="hover:text-white transition">Professional Development</a></li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Copyright Bar -->
            <div class="pt-6 text-center text-xs text-emerald-300/70">
                <p>&copy; {{ date('Y') }} Northern Samar Colleges. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>