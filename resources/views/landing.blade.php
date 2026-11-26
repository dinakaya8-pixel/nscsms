<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'NSCSMS') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen" x-data="{ mobileMenuOpen: false, openDropdown: null, activeTab: 'home' }">

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
            
            <!-- Desktop Navigation Links with Mega-Menu Hover Cards -->
            <nav class="hidden lg:flex items-center space-x-7 text-sm font-medium text-slate-900">
                <!-- Home -->
                <a href="/" @click.prevent="activeTab = 'home'; window.scrollTo({top: 0, behavior: 'smooth'})" 
                    :class="activeTab === 'home' ? 'text-[#0b381b] font-bold border-b-2 border-[#0b381b]' : 'hover:text-[#0b381b] border-b-2 border-transparent'"
                    class="transition py-3">
                    Home
                </a>

                <!-- About Us Mega-Menu -->
                <div class="relative group">
                    <button type="button"
                            :class="activeTab.startsWith('about') ? 'text-[#0b381b] font-bold border-b-2 border-[#0b381b]' : 'hover:text-[#0b381b] border-b-2 border-transparent group-hover:border-[#0b381b]'"
                            class="flex items-center space-x-1.5 transition py-3 cursor-pointer">
                        <span>About Us</span>
                        <svg class="w-3.5 h-3.5 text-slate-700 group-hover:rotate-180 group-hover:text-[#0b381b] transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div class="absolute left-1/2 -translate-x-1/3 mt-0 w-[620px] bg-white rounded-2xl shadow-2xl border border-slate-200/80 p-7 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 ease-out z-50">
                        <div class="grid grid-cols-2 gap-x-8 gap-y-6">
                            <!-- Column 1: Overview & Campus -->
                            <div class="space-y-5">
                                <div>
                                    <div class="flex items-center space-x-2 text-[#0b381b] font-bold text-sm mb-3">
                                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <span>Overview</span>
                                    </div>
                                    <div class="space-y-1.5">
                                        <a href="#history" @click.prevent="activeTab = 'about-history'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                            <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">History &amp; Heritage</div>
                                            <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">Discover the roots and milestones of Northern Samar Colleges</p>
                                        </a>
                                        <a href="#vision" @click.prevent="activeTab = 'about-vision'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                            <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Vision &amp; Mission</div>
                                            <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">Our institutional foundation, goals, and guiding values</p>
                                        </a>
                                        <a href="#contact" @click.prevent="activeTab = 'about-contact'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                            <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Contact Us</div>
                                            <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">Campus location map, office hours, and direct inquiries</p>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center space-x-2 text-[#0b381b] font-bold text-sm mb-2">
                                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                        </svg>
                                        <span>Campus</span>
                                    </div>
                                    <a href="#facilities" @click.prevent="activeTab = 'about-facilities'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                        <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Campus Facilities</div>
                                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">Explore our laboratories, library, and campus grounds</p>
                                    </a>
                                </div>
                            </div>

                            <!-- Column 2: Governance & Quality -->
                            <div>
                                <div class="flex items-center space-x-2 text-[#0b381b] font-bold text-sm mb-3">
                                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                    <span>Governance &amp; Quality</span>
                                </div>
                                <div class="space-y-1.5">
                                    <a href="#board" @click.prevent="activeTab = 'about-board'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                        <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Administration &amp; Board</div>
                                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">Explore the college's organizational leadership</p>
                                    </a>
                                    <a href="#accreditations" @click.prevent="activeTab = 'about-accreditations'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                        <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Accreditations &amp; Achievements</div>
                                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">Our quality standards and institutional recognitions</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Admissions Mega-Menu -->
                <div class="relative group">
                    <button type="button" 
                            :class="activeTab.startsWith('admissions') ? 'text-[#0b381b] font-bold border-b-2 border-[#0b381b]' : 'hover:text-[#0b381b] border-b-2 border-transparent group-hover:border-[#0b381b]'"
                            class="flex items-center space-x-1.5 transition py-3 cursor-pointer">
                        <span>Admissions</span>
                        <svg class="w-3.5 h-3.5 text-slate-700 group-hover:rotate-180 group-hover:text-[#0b381b] transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div class="absolute left-0 mt-0 w-[360px] bg-white rounded-2xl shadow-2xl border border-slate-200/80 p-6 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 ease-out z-50">
                        <div class="flex items-center space-x-2 text-[#0b381b] font-bold text-sm mb-3">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span>Enrollment &amp; Financial Aid</span>
                        </div>
                        <div class="space-y-1.5">
                            <a href="#enrollment" @click.prevent="activeTab = 'admissions-enrollment'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Enrollment Procedures</div>
                                <p class="text-xs text-slate-500 mt-0.5">Requirements for incoming freshmen and transferees</p>
                            </a>
                            <a href="#tuition" @click.prevent="activeTab = 'admissions-tuition'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Tuition &amp; Fees</div>
                                <p class="text-xs text-slate-500 mt-0.5">Assessment schedules and payment options</p>
                            </a>
                            <a href="#scholarships" @click.prevent="activeTab = 'admissions-scholarships'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Scholarships</div>
                                <p class="text-xs text-slate-500 mt-0.5">Academic, athletic, and government-assisted grants</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Academics Mega-Menu -->
                <div class="relative group">
                    <button type="button" 
                            :class="activeTab.startsWith('academics') ? 'text-[#0b381b] font-bold border-b-2 border-[#0b381b]' : 'hover:text-[#0b381b] border-b-2 border-transparent group-hover:border-[#0b381b]'"
                            class="flex items-center space-x-1.5 transition py-3 cursor-pointer">
                        <span>Academics</span>
                        <svg class="w-3.5 h-3.5 text-slate-700 group-hover:rotate-180 group-hover:text-[#0b381b] transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div class="absolute left-0 mt-0 w-[360px] bg-white rounded-2xl shadow-2xl border border-slate-200/80 p-6 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 ease-out z-50">
                        <div class="flex items-center space-x-2 text-[#0b381b] font-bold text-sm mb-3">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            </svg>
                            <span>Colleges &amp; Curriculum</span>
                        </div>
                        <div class="space-y-1.5">
                            <a href="#programs" @click.prevent="activeTab = 'academics-programs'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Programs Offered</div>
                                <p class="text-xs text-slate-500 mt-0.5">Browse all undergraduate degree offerings</p>
                            </a>
                            <a href="#departments" @click.prevent="activeTab = 'academics-departments'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Departments</div>
                                <p class="text-xs text-slate-500 mt-0.5">Academic colleges, faculty, and department heads</p>
                            </a>
                            <a href="#calendar" @click.prevent="activeTab = 'academics-calendar'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Academic Calendar</div>
                                <p class="text-xs text-slate-500 mt-0.5">Important semester dates, exams, and holidays</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Student Life Mega-Menu -->
                <div class="relative group">
                    <button type="button"
                            :class="activeTab.startsWith('studentLife') ? 'text-[#0b381b] font-bold border-b-2 border-[#0b381b]' : 'hover:text-[#0b381b] border-b-2 border-transparent group-hover:border-[#0b381b]'" 
                            class="flex items-center space-x-1.5 transition py-3 cursor-pointer">
                        <span>Student Life</span>
                        <svg class="w-3.5 h-3.5 text-slate-700 group-hover:rotate-180 group-hover:text-[#0b381b] transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div class="absolute right-0 mt-0 w-[360px] bg-white rounded-2xl shadow-2xl border border-slate-200/80 p-6 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 ease-out z-50">
                        <div class="flex items-center space-x-2 text-[#0b381b] font-bold text-sm mb-3">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Campus Experience</span>
                        </div>
                        <div class="space-y-1.5">
                            <a href="#campus" @click.prevent="activeTab = 'studentLife-campus'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Campus Activities</div>
                                <p class="text-xs text-slate-500 mt-0.5">Events, cultural celebrations, and athletics</p>
                            </a>
                            <a href="#organizations" @click.prevent="activeTab = 'studentLife-organizations'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Student Organizations</div>
                                <p class="text-xs text-slate-500 mt-0.5">Student government, academic clubs, and societies</p>
                            </a>
                            <a href="#portal" @click.prevent="activeTab = 'studentLife-portal'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Portal Services</div>
                                <p class="text-xs text-slate-500 mt-0.5">Online student records, grades, and requests</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Highlighted "More" Button with Mega-Menu -->
                <div class="relative group">
                    <button type="button" 
                            :class="activeTab.startsWith('more') ? 'text-[#0b381b] font-bold' : 'hover:text-[#0b381b]'" 
                            class="px-4 py-2 rounded-xl border-2 border-amber-300/90 bg-white/70 hover:bg-white transition flex flex-col items-center cursor-pointer">
                        <span class="flex items-center space-x-1 text-slate-900">
                            <span>More</span>
                            <svg class="w-3.5 h-3.5 text-slate-700 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                        <span class="w-full h-[2.5px] bg-[#0b381b] rounded-full mt-0.5"></span>
                    </button>

                    <div class="absolute right-0 mt-0 w-[340px] bg-white rounded-2xl shadow-2xl border border-slate-200/80 p-6 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 ease-out z-50">
                        <div class="flex items-center space-x-2 text-[#0b381b] font-bold text-sm mb-3">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Quick Resources</span>
                        </div>
                        <div class="space-y-1.5">
                            <a href="#news" @click.prevent="activeTab = 'more-news'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">News &amp; Events</div>
                                <p class="text-xs text-slate-500 mt-0.5">Latest campus announcements and stories</p>
                            </a>
                            <a href="#alumni" @click.prevent="activeTab = 'more-alumni'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Alumni Network</div>
                                <p class="text-xs text-slate-500 mt-0.5">Connect with graduates and alumni events</p>
                            </a>
                            <a href="#directory" @click.prevent="activeTab = 'more-directory'; window.scrollTo({top: 0, behavior: 'smooth'})" class="block p-2.5 -mx-2.5 rounded-xl hover:bg-emerald-50/70 transition group/item">
                                <div class="text-sm font-semibold text-slate-900 group-hover/item:text-[#0b381b]">Contact Directory</div>
                                <p class="text-xs text-slate-500 mt-0.5">Find office numbers, emails, and locations</p>
                            </a>
                        </div>
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

        <<!-- Mobile Dropdown Navigation Menu -->
        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" x-transition class="lg:hidden bg-white/95 backdrop-blur-md border-b border-slate-200 px-4 pt-2 pb-6 space-y-3 shadow-lg">
            <a href="/" @click.prevent="activeTab = 'home'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-2 text-sm font-medium text-slate-800 hover:text-[#0b381b]">
                Home
            </a>
            
            <!-- Mobile Accordion Item: About Us -->
            <div>
                <button type="button" @click="openDropdown = openDropdown === 'about' ? null : 'about'" class="w-full flex justify-between items-center py-2 text-sm font-medium text-slate-800">
                    <span>About Us</span>
                    <svg class="w-4 h-4 transition-transform" :class="openDropdown === 'about' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openDropdown === 'about'" class="pl-4 space-y-2 py-2 border-l-2 border-emerald-600/30">
                    <a href="#history" @click.prevent="activeTab = 'about-history'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">History &amp; Heritage</a>
                    <a href="#vision" @click.prevent="activeTab = 'about-vision'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Vision &amp; Mission</a>
                    <a href="#board" @click.prevent="activeTab = 'about-board'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Administration &amp; Board</a>
                    <a href="#accreditations" @click.prevent="activeTab = 'about-accreditations'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Accreditations &amp; Achievements</a>
                    <a href="#contact" @click.prevent="activeTab = 'about-contact'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Contact Us</a>
                </div>
            </div>

            <!-- Mobile Accordion Item: Admissions -->
            <div>
                <button type="button" @click="openDropdown = openDropdown === 'admissions' ? null : 'admissions'" class="w-full flex justify-between items-center py-2 text-sm font-medium text-slate-800">
                    <span>Admissions</span>
                    <svg class="w-4 h-4 transition-transform" :class="openDropdown === 'admissions' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openDropdown === 'admissions'" class="pl-4 space-y-2 py-2 border-l-2 border-emerald-600/30">
                    <a href="#enrollment" @click.prevent="activeTab = 'admissions-enrollment'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Enrollment Procedures</a>
                    <a href="#tuition" @click.prevent="activeTab = 'admissions-tuition'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Tuition &amp; Fees</a>
                    <a href="#scholarships" @click.prevent="activeTab = 'admissions-scholarships'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Scholarships</a>
                </div>
            </div>

            <!-- Mobile Accordion Item: Academics -->
            <div>
                <button type="button" @click="openDropdown = openDropdown === 'academics' ? null : 'academics'" class="w-full flex justify-between items-center py-2 text-sm font-medium text-slate-800">
                    <span>Academics</span>
                    <svg class="w-4 h-4 transition-transform" :class="openDropdown === 'academics' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openDropdown === 'academics'" class="pl-4 space-y-2 py-2 border-l-2 border-emerald-600/30">
                    <a href="#programs" @click.prevent="activeTab = 'academics-programs'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Programs Offered</a>
                    <a href="#departments" @click.prevent="activeTab = 'academics-departments'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Departments</a>
                    <a href="#calendar" @click.prevent="activeTab = 'academics-calendar'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Academic Calendar</a>
                </div>
            </div>

            <!-- Mobile Accordion Item: Student Life -->
            <div>
                <button type="button" @click="openDropdown = openDropdown === 'studentLife' ? null : 'studentLife'" class="w-full flex justify-between items-center py-2 text-sm font-medium text-slate-800">
                    <span>Student Life</span>
                    <svg class="w-4 h-4 transition-transform" :class="openDropdown === 'studentLife' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openDropdown === 'studentLife'" class="pl-4 space-y-2 py-2 border-l-2 border-emerald-600/30">
                    <a href="#campus" @click.prevent="activeTab = 'studentLife-campus'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Campus Activities</a>
                    <a href="#organizations" @click.prevent="activeTab = 'studentLife-organizations'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Student Organizations</a>
                    <a href="#portal" @click.prevent="activeTab = 'studentLife-portal'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Portal Services</a>
                </div>
            </div>

            <!-- Mobile Accordion Item: More -->
            <div>
                <button type="button" @click="openDropdown = openDropdown === 'more' ? null : 'more'" class="w-full flex justify-between items-center py-2 text-sm font-medium text-slate-800">
                    <span>More</span>
                    <svg class="w-4 h-4 transition-transform" :class="openDropdown === 'more' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openDropdown === 'more'" class="pl-4 space-y-2 py-2 border-l-2 border-emerald-600/30">
                    <a href="#news" @click.prevent="activeTab = 'more-news'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">News &amp; Events</a>
                    <a href="#alumni" @click.prevent="activeTab = 'more-alumni'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Alumni Network</a>
                    <a href="#directory" @click.prevent="activeTab = 'more-directory'; mobileMenuOpen = false; openDropdown = null; window.scrollTo({top: 0, behavior: 'smooth'})" class="block py-1 text-xs text-slate-600 hover:text-[#0b381b]">Contact Directory</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area (Controlled by activeTab on <body>) -->
    <main id="home" class="flex-grow">

        <!-- ========================================================= -->
        <!-- TAB 1: HOME (DEFAULT LANDING PAGE)                        -->
        <!-- ========================================================= -->
        <div x-show="activeTab === 'home'" x-transition.opacity.duration.300ms>
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
                            <a href="#programs" @click.prevent="activeTab = 'academics-programs'; window.scrollTo({top: 0, behavior: 'smooth'})" class="px-5 py-2.5 text-xs sm:text-sm font-medium text-white bg-[#0b381b] border border-emerald-600 rounded-lg shadow hover:bg-emerald-900 transition">
                                Explore Programs
                            </a>
                            <a href="#admissions" @click.prevent="activeTab = 'admissions-enrollment'; window.scrollTo({top: 0, behavior: 'smooth'})" class="px-5 py-2.5 text-xs sm:text-sm font-medium text-slate-900 bg-white rounded-lg shadow hover:bg-slate-100 transition">
                                Admissions Info
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

            <!-- Our History Section (Summary & Philosophy) -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 space-y-12">
                <!-- Top Row: History Summary & Overlapping Circular Photos -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                    <div class="lg:col-span-6 space-y-6">
                        <div>
                            <div class="flex items-center space-x-2.5 text-[#0b381b] text-xs font-bold uppercase tracking-widest mb-2">
                                <span class="w-6 h-[2px] bg-[#0b381b] rounded-full"></span>
                                <span>Our History &bull; Est. 1949</span>
                            </div>
                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                                Northern Samar <br>
                                <span class="font-serif italic font-normal text-[#0b381b]">Colleges</span>
                            </h2>
                        </div>

                        <div class="border-l-4 border-[#0b381b] pl-4 sm:pl-6 space-y-4 text-sm sm:text-base text-slate-600 leading-relaxed">
                            <p>
                                Established in <strong class="text-[#0b381b] font-semibold">1949</strong> and incorporated in <strong class="text-[#0b381b] font-semibold">1950</strong> as an accessible school for Catarman townsfolk, <strong class="text-slate-900 font-semibold">Northern Samar Colleges</strong> began as a secondary and teacher-training institution before operating as <strong class="text-slate-900 font-semibold">Northern Samar Academy (NSA)</strong> with high school and short-term vocational courses.
                            </p>
                            <p>
                                On its 50th anniversary in <strong class="text-[#0b381b] font-semibold">SY 2000</strong>, it became a non-stock corporation expanding into basic education, TESDA technical-vocational courses, and collegiate programs—later moving college classes to <strong class="text-slate-900 font-semibold">Brgy. Dalakit</strong> in <strong class="text-[#0b381b] font-semibold">2018</strong> while keeping Basic Education in <strong class="text-slate-900 font-semibold">Brgy. J. P. Rizal</strong>.
                            </p>
                        </div>

                        <div class="pt-1">
                            <button 
                                type="button"
                                @click="activeTab = 'about-history'; window.scrollTo({top: 0, behavior: 'smooth'})" 
                                class="inline-flex items-center text-xs sm:text-sm font-bold text-[#0b381b] hover:text-emerald-800 transition cursor-pointer"
                            >
                                Explore Full History &amp; Heritage &rarr;
                            </button>
                        </div>
                    </div>

                    <!-- Right Column: Overlapping Interactive Circular Photos -->
                    <div class="lg:col-span-6 flex justify-center items-center py-6" x-data="{ topImage: 'left' }">
                        <div class="relative flex items-center justify-center w-full max-w-lg h-[320px] sm:h-[380px]">
                            <div 
                                @mouseenter="topImage = 'left'"
                                @click="topImage = 'left'"
                                :class="topImage === 'left' ? 'z-30 scale-105 -translate-y-2' : 'z-10 scale-100'"
                                class="absolute left-4 sm:left-8 w-60 h-60 sm:w-72 sm:h-72 rounded-full overflow-hidden shadow-2xl border-4 border-white transition-all duration-300 cursor-pointer"
                            >
                                <img src="{{ asset('images/heritage-pic.jpg') }}" alt="Campus History" class="w-full h-full object-cover">
                            </div>

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

                <!-- Bottom Row: Compact Educational Philosophy Summary -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200 shadow-xs">
                    <div class="mb-5">
                        <div class="flex items-center space-x-2 text-[#0b381b] text-xs font-bold uppercase tracking-widest mb-1.5">
                            <span class="w-5 h-[2px] bg-[#0b381b] rounded-full"></span>
                            <span>Philosophy</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900">
                            Educational <span class="font-serif text-[#0b381b]">Philosophy</span>
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        <div class="p-4 rounded-xl bg-slate-50/80 border border-slate-100 hover:scale-[1.03] hover:shadow-2xl transition-all duration-300">
                            <strong class="block text-slate-900 font-semibold mb-1">Holistic &amp; Lifelong Growth</strong>
                            Develops the total person and nurtures creative, critical thinkers and lifelong learners.
                        </div>

                        <div class="p-4 rounded-xl bg-slate-50/80 border border-slate-100 hover:scale-[1.03] hover:shadow-2xl transition-all duration-300">
                            <strong class="block text-slate-900 font-semibold mb-1">Family &amp; Moral Character</strong>
                            Partners with families to form competent, enterprising individuals who make morally upright choices.
                        </div>

                        <div class="p-4 rounded-xl bg-slate-50/80 border border-slate-100 hover:scale-[1.03] hover:shadow-2xl transition-all duration-300 md:col-span-2 lg:col-span-1">
                            <strong class="block text-slate-900 font-semibold mb-1">Community Upliftment</strong>
                            Responds to community needs to help uplift society's moral, cultural, and material well-being.
                        </div>
                    </div>
                </div>
            </section>

            <!-- Programs Offered Section (DYNAMIC DATABASE LOOP) -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="{ 
                scrollLeft() { this.$refs.slider.scrollBy({ left: -340, behavior: 'smooth' }); },
                scrollRight() { this.$refs.slider.scrollBy({ left: 340, behavior: 'smooth' }); }
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

                    <div class="flex items-center space-x-4 mt-4 md:mt-0">
                        <a href="#programs" @click.prevent="activeTab = 'academics-programs'; window.scrollTo({top: 0, behavior: 'smooth'})" class="hidden sm:inline-flex items-center text-sm font-semibold text-[#0b381b] hover:text-emerald-800 transition mr-2">
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

                <!-- Horizontal Scrollable Container Loop (Added py-4 so hover shadow/scale isn't clipped) -->
                <div x-ref="slider" class="flex gap-6 overflow-x-auto no-scrollbar scroll-smooth snap-x snap-mandatory py-4 px-1">
                    @foreach($programs as $program)
                    <div class="program-card shrink-0 w-[85%] sm:w-[320px] lg:w-[350px] snap-start relative h-[420px] rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:shadow-emerald-950/30 transition-all duration-300 ease-out hover:scale-[1.03] hover:-translate-y-1 group flex flex-col justify-end p-6 bg-slate-900">
                        <img src="{{ asset($program->image_path) }}" alt="{{ $program->code }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-70">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                        <div class="relative z-10">
                            <span class="inline-block px-2.5 py-1 mb-3 text-[10px] font-bold tracking-wider text-white uppercase bg-black/40 backdrop-blur-md rounded-md border border-white/20">
                                {{ $program->code }}
                            </span>
                            <h3 class="text-xl font-bold text-white mb-2 leading-snug">{{ $program->title }}</h3>
                            <p class="text-xs text-slate-200 mb-4 line-clamp-3">{{ $program->description }}</p>
                            <a href="#programs" @click.prevent="activeTab = 'academics-programs'; window.scrollTo({top: 0, behavior: 'smooth'})" class="inline-flex items-center text-xs font-semibold text-amber-300 hover:text-white transition">
                                Explore Program &rarr;
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Campus Stats Highlights Section -->
            <section class="relative w-full py-16 sm:py-20 my-6 overflow-hidden">
                <!-- Background Campus Photo -->
                <img 
                    src="{{ asset('images/nsc-people.jpg') }}" 
                    alt="Northern Samar Colleges Campus Life" 
                    class="absolute inset-0 w-full h-full object-cover object-center"
                >

                <!-- Equal Top & Bottom Fade (Subtle / Lessened) -->
                <div class="absolute inset-0 bg-gradient-to-b from-slate-50/85 via-slate-900/15 to-slate-50/85 pointer-events-none"></div>

                <!-- 4 Metric Cards -->
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6">
                        
                        <!-- Stat 1 -->
                        <div class="bg-white/80 backdrop-blur-md border border-white/70 rounded-2xl p-6 sm:p-7 shadow-lg hover:bg-white/90 transition">
                            <div class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                                1,500+
                            </div>
                            <div class="text-xs font-bold uppercase tracking-wider text-slate-600 mt-1.5">
                                Students
                            </div>
                        </div>

                        <!-- Stat 2 -->
                        <div class="bg-white/80 backdrop-blur-md border border-white/70 rounded-2xl p-6 sm:p-7 shadow-lg hover:bg-white/90 transition">
                            <div class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                                70+
                            </div>
                            <div class="text-xs font-bold uppercase tracking-wider text-slate-600 mt-1.5">
                                Faculty &amp; Staff
                            </div>
                        </div>

                        <!-- Stat 3 -->
                        <div class="bg-white/80 backdrop-blur-md border border-white/70 rounded-2xl p-6 sm:p-7 shadow-lg hover:bg-white/90 transition">
                            <div class="text-3xl sm:text-4xl font-extrabold text-[#0b381b] tracking-tight">
                                15
                            </div>
                            <div class="text-xs font-bold uppercase tracking-wider text-slate-600 mt-1.5">
                                Academic Programs
                            </div>
                        </div>

                        <!-- Stat 4 -->
                        <div class="bg-white/80 backdrop-blur-md border border-white/70 rounded-2xl p-6 sm:p-7 shadow-lg hover:bg-white/90 transition">
                            <div class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                                35
                            </div>
                            <div class="text-xs font-bold uppercase tracking-wider text-slate-600 mt-1.5">
                                Years of Excellence
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- News & Events Section (DYNAMIC DATABASE LOOP) -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
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
                        <a href="#news" @click.prevent="activeTab = 'more-news'; window.scrollTo({top: 0, behavior: 'smooth'})" class="inline-flex items-center text-sm font-semibold text-[#0b381b] hover:text-emerald-800 transition">
                            View Newsroom <span class="ml-1.5">&rarr;</span>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
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
                                    <a href="#news" @click.prevent="activeTab = 'more-news'; window.scrollTo({top: 0, behavior: 'smooth'})">{{ $news->title }}</a>
                                </h4>
                                <a href="#news" @click.prevent="activeTab = 'more-news'; window.scrollTo({top: 0, behavior: 'smooth'})" class="text-xs font-semibold text-[#0b381b] hover:underline mt-1">Read more &rarr;</a>
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
                    <a href="#home" @click.prevent="window.scrollTo({top: 0, behavior: 'smooth'})" class="inline-block px-5 py-2.5 text-xs sm:text-sm font-semibold text-[#0b381b] bg-white rounded-lg hover:bg-emerald-50 transition">
                        Back to Top
                    </a>
                </div>
            </section>
        </div>

       <!-- ========================================================= -->
        <!-- TAB 2: ABOUT US VIEWS                                     -->
        <!-- ========================================================= -->
        <div x-show="activeTab === 'about-history'" x-cloak x-transition.opacity.duration.300ms>
            <x-page-banner 
                badge="About Us" 
                title="History & Heritage" 
                subtitle="Discover the roots, milestones, and legacy of Northern Samar Colleges since 1949."
                image="images/heritage-pic.jpg" 
            />

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 space-y-16">
                
                <!-- Part 1: Founding Narrative & Overlapping Circular Heritage Photos -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                    <div class="lg:col-span-6 space-y-6">
                        <div>
                            <div class="flex items-center space-x-2.5 text-[#0b381b] text-xs font-bold uppercase tracking-widest mb-2">
                                <span class="w-6 h-[2px] bg-[#0b381b] rounded-full"></span>
                                <span>Our Roots &bull; Est. 1949</span>
                            </div>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                                From Northern Samar Academy to <span class="font-serif italic font-normal text-[#0b381b]">Northern Samar Colleges</span>
                            </h2>
                        </div>

                        <div class="border-l-4 border-[#0b381b] pl-4 sm:pl-6 space-y-4 text-sm text-slate-600 leading-relaxed">
                            <p>
                                <strong class="text-slate-900 font-semibold">Northern Samar Colleges</strong>, formerly <strong class="text-slate-900 font-semibold">Northern Samar Academy</strong>, located along Annunciacion corner Roxas Streets, Brgy. J. P. Rizal, Catarman, Northern Samar, was established in <strong class="text-[#0b381b] font-semibold">1949</strong> and incorporated in <strong class="text-[#0b381b] font-semibold">1950</strong> in response to the clamor for a school that could meet the needs of a particular segment of the town populace.
                            </p>
                            <p>
                                At that time, there were only two schools in town: a private Roman Catholic high school and a public agricultural school about three kilometers away from the town proper across the river. With no bridge connecting the town, no tricycles or pedicabs, and scarce public buses, students had to cross by <em>banca</em> and hike the remaining distance.
                            </p>
                            <p>
                                To provide an affordable and accessible alternative in the town proper, concerned citizens incorporated <strong class="text-slate-900 font-semibold">Northern Samar Colleges, Inc.</strong>, initially offering high school and "inverted education" courses for public school teachers before focusing on secondary education and short-term vocational courses as <strong class="text-slate-900 font-semibold">Northern Samar Academy (NSA)</strong> through its 50th anniversary.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Overlapping Interactive Circular Photos -->
                    <div class="lg:col-span-6 flex justify-center items-center py-6" x-data="{ topImage: 'left' }">
                        <div class="relative flex items-center justify-center w-full max-w-lg h-[320px] sm:h-[380px]">
                            <div 
                                @mouseenter="topImage = 'left'"
                                @click="topImage = 'left'"
                                :class="topImage === 'left' ? 'z-30 scale-105 -translate-y-2' : 'z-10 scale-100'"
                                class="absolute left-4 sm:left-8 w-60 h-60 sm:w-72 sm:h-72 rounded-full overflow-hidden shadow-2xl border-4 border-white transition-all duration-300 cursor-pointer"
                            >
                                <img src="{{ asset('images/heritage-pic.jpg') }}" alt="Campus History" class="w-full h-full object-cover">
                            </div>

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

                <!-- Part 2: Historical Milestones Timeline Cards -->
                <div class="pt-12 border-t border-slate-200/80">
                    <div class="mb-8">
                        <div class="flex items-center space-x-2.5 text-[#0b381b] text-xs font-bold uppercase tracking-widest mb-2">
                            <span class="w-6 h-[2px] bg-[#0b381b] rounded-full"></span>
                            <span>Institutional Evolution</span>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                            Key <span class="font-serif text-[#0b381b]">Milestones</span>
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Milestone 1: 1949 – 1950 -->
                        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:scale-[1.03] hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                            <div>
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-extrabold bg-emerald-100 text-[#0b381b] mb-3">
                                    1949 – 1950
                                </span>
                                <h4 class="text-base font-bold text-slate-900 mb-2">Foundation &amp; Incorporation</h4>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                    Established in 1949 and incorporated in 1950 along Annunciacion cor. Roxas Sts., Brgy. J.P. Rizal to give Catarman townsfolk an accessible, affordable secondary and teacher-training school without crossing the river by <em>banca</em>.
                                </p>
                            </div>
                        </div>

                        <!-- Milestone 2: The NSA Era -->
                        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:scale-[1.03] hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                            <div>
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-extrabold bg-emerald-100 text-[#0b381b] mb-3">
                                    50-Year Era
                                </span>
                                <h4 class="text-base font-bold text-slate-900 mb-2">Northern Samar Academy</h4>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                    Renamed Northern Samar Academy (NSA), focusing on secondary education alongside practical short-term vocational courses—including tailoring, dressmaking, and cosmetology—until its 50th anniversary.
                                </p>
                            </div>
                        </div>

                        <!-- Milestone 3: School Year 2000 -->
                        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:scale-[1.03] hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                            <div>
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-extrabold bg-emerald-100 text-[#0b381b] mb-3">
                                    SY 2000
                                </span>
                                <h4 class="text-base font-bold text-slate-900 mb-2">Golden Jubilee &amp; Collegiate Expansion</h4>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                    Converted into a non-stock corporation during its 50th Jubilee Year, adding Preschool, Grades 1–6, TESDA technical-vocational courses, and collegiate degrees in Education, IT, Office Administration, Hospitality Management, and Business Administration.
                                </p>
                            </div>
                        </div>

                        <!-- Milestone 4: 2018 Campus Expansion -->
                        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:scale-[1.03] hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                            <div>
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-extrabold bg-emerald-100 text-[#0b381b] mb-3">
                                    2018 – Present
                                </span>
                                <h4 class="text-base font-bold text-slate-900 mb-2">Two-Campus Expansion</h4>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                    Growing enrollment prompted the transfer of collegiate programs to Barangay Dalakit along JP Rizal Highway, while Basic Education (Preschool, Elementary, Junior High, and Senior High School) remained concentrated at the historic Brgy. J.P. Rizal town proper campus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Part 3: Educational Philosophy Section -->
                <div class="pt-12 border-t border-slate-200/80">
                    <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-xs">
                        <div class="max-w-3xl mb-8">
                            <div class="flex items-center space-x-2.5 text-[#0b381b] text-xs font-bold uppercase tracking-widest mb-2">
                                <span class="w-6 h-[2px] bg-[#0b381b] rounded-full"></span>
                                <span>Guiding Beliefs</span>
                            </div>
                            <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                                Educational <span class="font-serif text-[#0b381b]">Philosophy</span>
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                                Northern Samar Colleges embraces and operates on the following core educational philosophies:
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Philosophy 1 -->
                            <div class="flex items-start space-x-3.5 p-5 rounded-2xl bg-slate-50/70 border border-slate-200/80 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                                <span class="w-7 h-7 rounded-full bg-[#0b381b] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</span>
                                <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                                    Education shall develop the total person—everything that is human in the individual.
                                </p>
                            </div>

                            <!-- Philosophy 2 -->
                            <div class="flex items-start space-x-3.5 p-5 rounded-2xl bg-slate-50/70 border border-slate-200/80 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                                <span class="w-7 h-7 rounded-full bg-[#0b381b] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</span>
                                <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                                    Education enables the individual to become creative and critical thinkers and lifelong learners.
                                </p>
                            </div>

                            <!-- Philosophy 3 -->
                            <div class="flex items-start space-x-3.5 p-5 rounded-2xl bg-slate-50/70 border border-slate-200/80 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                                <span class="w-7 h-7 rounded-full bg-[#0b381b] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</span>
                                <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                                    The school and the family are partners in the exercise of the educational rights and duties of the family.
                                </p>
                            </div>

                            <!-- Philosophy 4 -->
                            <div class="flex items-start space-x-3.5 p-5 rounded-2xl bg-slate-50/70 border border-slate-200/80 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                                <span class="w-7 h-7 rounded-full bg-[#0b381b] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">4</span>
                                <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                                    The school shall form individuals who are concerned for the common good, professionally competent, enterprising and creative, capable of making free and morally upright choices, and can act as positive agents of change in society.
                                </p>
                            </div>

                            <!-- Philosophy 5 (Spans Full Width on Desktop) -->
                            <div class="md:col-span-2 flex items-start space-x-3.5 p-5 rounded-2xl bg-slate-50/70 border border-slate-200/80 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                                <span class="w-7 h-7 rounded-full bg-[#0b381b] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">5</span>
                                <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                                    The school shall be sensitive and responsive to the needs of the community which sustains it, and it must strive to uplift the moral, cultural, and material level of society.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div x-show="activeTab === 'about-vision'" x-cloak x-transition.opacity.duration.300ms class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <x-page-banner 
                badge="About Us" 
                title="Vision, Mission & Objectives" 
                subtitle="Our guiding philosophy to educate, innovate, serve, and excel."
                image="images/founding-pic.jpg" 
            />

            <div class="space-y-8">
                <!-- Top Row: Vision & Objectives -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                    <!-- Vision Card (5 Cols) -->
                    <div class="lg:col-span-5 bg-white p-8 rounded-2xl border border-slate-200 shadow-xs hover:scale-[1.03] hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center space-x-2 text-xs font-bold uppercase tracking-widest text-[#0b381b] mb-2">
                                <span class="w-5 h-[2px] bg-[#0b381b] rounded-full"></span>
                                <span>Institutional Direction</span>
                            </div>
                            <h2 class="text-2xl font-extrabold text-slate-900 mb-4">
                                Our <span class="font-serif text-[#0b381b]">Vision</span>
                            </h2>
                            <p class="text-slate-700 text-sm sm:text-base leading-relaxed font-medium">
                                Northern Samar Colleges as a premier school for community leaders, successful professionals, and workers with world-class technical skills and competencies.
                            </p>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center space-x-2 text-xs font-semibold text-[#0b381b]">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span>Excellence &bull; Leadership &bull; Competency</span>
                        </div>
                    </div>

                    <!-- Objectives Card (7 Cols) -->
                    <div class="lg:col-span-7 bg-white p-8 rounded-2xl border border-slate-200 shadow-xs hover:scale-[1.03] hover:shadow-2xl transition-all duration-300">
                        <div class="flex items-center space-x-2 text-xs font-bold uppercase tracking-widest text-[#0b381b] mb-2">
                            <span class="w-5 h-[2px] bg-[#0b381b] rounded-full"></span>
                            <span>Core Goals</span>
                        </div>
                        <h2 class="text-2xl font-extrabold text-slate-900 mb-3">
                            Our <span class="font-serif text-[#0b381b]">Objectives</span>
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-5">
                            Northern Samar Colleges as a premier school for community leaders, successful professionals, and workers with world-class technical skills and competencies.
                        </p>

                        <ol class="space-y-3">
                            <li class="flex items-start space-x-3 p-3 rounded-xl bg-slate-50/80 border border-slate-100">
                                <span class="w-6 h-6 rounded-full bg-[#0b381b] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</span>
                                <span class="text-xs sm:text-sm text-slate-700 leading-relaxed">To provide quality education with strong adherence to time-honored universal values.</span>
                            </li>
                            <li class="flex items-start space-x-3 p-3 rounded-xl bg-slate-50/80 border border-slate-100">
                                <span class="w-6 h-6 rounded-full bg-[#0b381b] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</span>
                                <span class="text-xs sm:text-sm text-slate-700 leading-relaxed">To enhance learning through school facilities and dynamic teaching staff.</span>
                            </li>
                            <li class="flex items-start space-x-3 p-3 rounded-xl bg-slate-50/80 border border-slate-100">
                                <span class="w-6 h-6 rounded-full bg-[#0b381b] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</span>
                                <span class="text-xs sm:text-sm text-slate-700 leading-relaxed">To strive to build the institution as a place for character formation with a high level of participation and unity in creating an atmosphere conducive to learning.</span>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Bottom Row: Full-Width Mission Card (7 Numbered Pillars) -->
                <div class="bg-white p-8 sm:p-10 rounded-2xl border border-slate-200 shadow-xs">
                    <div class="mb-6 pb-4 border-b border-slate-100">
                        <div class="flex items-center space-x-2 text-xs font-bold uppercase tracking-widest text-[#0b381b] mb-2">
                            <span class="w-5 h-[2px] bg-[#0b381b] rounded-full"></span>
                            <span>Institutional Mandate</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
                            Our <span class="font-serif text-[#0b381b]">Mission</span>
                        </h2>
                    </div>

                    <ol class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <li class="flex items-start space-x-3.5 p-4 rounded-xl border border-slate-200/80 bg-slate-50/50 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                            <span class="w-7 h-7 rounded-lg bg-emerald-100 text-[#0b381b] text-xs font-extrabold flex items-center justify-center shrink-0 mt-0.5">1</span>
                            <span class="text-xs sm:text-sm text-slate-700 leading-relaxed">Strive to reach a level of excellence in its research and teaching programs that will earn for itself a place among the most prestigious educational institutions in the area.</span>
                        </li>

                        <li class="flex items-start space-x-3.5 p-4 rounded-xl border border-slate-200/80 bg-slate-50/50 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                            <span class="w-7 h-7 rounded-lg bg-emerald-100 text-[#0b381b] text-xs font-extrabold flex items-center justify-center shrink-0 mt-0.5">2</span>
                            <span class="text-xs sm:text-sm text-slate-700 leading-relaxed">Adopt advanced research and teaching techniques so as to become a source of innovative forms of learning, as well as contribute to a better balance between the cost and quality of research, communication, and education.</span>
                        </li>

                        <li class="flex items-start space-x-3.5 p-4 rounded-xl border border-slate-200/80 bg-slate-50/50 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                            <span class="w-7 h-7 rounded-lg bg-emerald-100 text-[#0b381b] text-xs font-extrabold flex items-center justify-center shrink-0 mt-0.5">3</span>
                            <span class="text-xs sm:text-sm text-slate-700 leading-relaxed">Adopt its teaching programs, founded upon basic research and the study of humanities, to the actual needs of a society undergoing progressive change and of a wide region promoting international cooperation.</span>
                        </li>

                        <li class="flex items-start space-x-3.5 p-4 rounded-xl border border-slate-200/80 bg-slate-50/50 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                            <span class="w-7 h-7 rounded-lg bg-emerald-100 text-[#0b381b] text-xs font-extrabold flex items-center justify-center shrink-0 mt-0.5">4</span>
                            <span class="text-xs sm:text-sm text-slate-700 leading-relaxed">Seek, while working closely with other Philippine institutions, wider regional and international recognition so that it can be present in intellectual policy dialogues.</span>
                        </li>

                        <li class="flex items-start space-x-3.5 p-4 rounded-xl border border-slate-200/80 bg-slate-50/50 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                            <span class="w-7 h-7 rounded-lg bg-emerald-100 text-[#0b381b] text-xs font-extrabold flex items-center justify-center shrink-0 mt-0.5">5</span>
                            <span class="text-xs sm:text-sm text-slate-700 leading-relaxed">Strengthen and broaden the avenues for cooperation so that it can effectively contribute to social development and obtain from various sectors of society the necessary support to carry out its extension work.</span>
                        </li>

                        <li class="flex items-start space-x-3.5 p-4 rounded-xl border border-slate-200/80 bg-slate-50/50 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                            <span class="w-7 h-7 rounded-lg bg-emerald-100 text-[#0b381b] text-xs font-extrabold flex items-center justify-center shrink-0 mt-0.5">6</span>
                            <span class="text-xs sm:text-sm text-slate-700 leading-relaxed">Organize itself in a manner conducive to internal efficiency and effective coordination, while keeping enough flexibility, to enable all members of the school community to contribute freely and responsibly to the fulfillment of their common tasks.</span>
                        </li>

                        <li class="md:col-span-2 flex items-start space-x-3.5 p-4 rounded-xl border border-slate-200/80 bg-slate-50/50 hover:border-[#0b381b]/40 hover:bg-emerald-50/30 transition">
                            <span class="w-7 h-7 rounded-lg bg-emerald-100 text-[#0b381b] text-xs font-extrabold flex items-center justify-center shrink-0 mt-0.5">7</span>
                            <span class="text-xs sm:text-sm text-slate-700 leading-relaxed">Strive to attain, as a necessary condition for its autonomous development, a level of economic self-sufficiency that will allow the school to firmly establish itself as a center of academic excellence to initiate projects, and to admit well-qualified students from the underprivileged sector of society.</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>

       <!-- ========================================================= -->
        <!-- TAB 2C: ABOUT US - CONTACT US & CAMPUS MAP                -->
        <!-- ========================================================= -->
        <div x-show="activeTab === 'about-contact'" x-cloak x-transition.opacity.duration.300ms>
            <x-page-banner 
                badge="About Us" 
                title="Contact Us" 
                subtitle="Reach out to our admissions, registrar, and administrative offices, or visit our campus."
                image="images/nsc-people.jpg" 
            />

            <!-- Single Shared Container for Both Map & Reach Out Sections -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                    
                    <!-- Left Column: Campus Details Card -->
                    <div class="lg:col-span-5 bg-white p-8 rounded-2xl border border-slate-200 shadow-xs flex flex-col justify-between space-y-6">
                        <div class="space-y-6">
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-[#0b381b]">Main Campus</span>
                                <h2 class="text-2xl font-extrabold text-slate-900 mt-1">Northern Samar Colleges</h2>
                                <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                                    We welcome prospective students, parents, and alumni to visit our campus during regular office hours.
                                </p>
                            </div>

                            <div class="space-y-4 text-sm text-slate-700">
                                <!-- Address -->
                                <div class="flex items-start space-x-3">
                                    <div class="w-9 h-9 rounded-lg bg-emerald-50 text-[#0b381b] flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-slate-900">Campus Address</div>
                                        <div class="text-slate-600 text-xs mt-0.5">Catarman, Northern Samar, 6400 Philippines</div>
                                    </div>
                                </div>

                                <!-- Office Hours -->
                                <div class="flex items-start space-x-3">
                                    <div class="w-9 h-9 rounded-lg bg-emerald-50 text-[#0b381b] flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-slate-900">Office Hours</div>
                                        <div class="text-slate-600 text-xs mt-0.5">Monday – Friday: 8:00 AM – 5:00 PM</div>
                                    </div>
                                </div>

                                <!-- Email / Phone -->
                                <div class="flex items-start space-x-3">
                                    <div class="w-9 h-9 rounded-lg bg-emerald-50 text-[#0b381b] flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-slate-900">Email &amp; Inquiries</div>
                                        <div class="text-slate-600 text-xs mt-0.5">info@nsc.edu.ph</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Direct Google Maps Directions Button -->
                        <div class="pt-4 border-t border-slate-100">
                            <a 
                                href="https://maps.app.goo.gl/ZRAFy4EKEcB4eTeY9" 
                                target="_blank" 
                                rel="noopener noreferrer"
                                class="w-full inline-flex items-center justify-center px-5 py-2.5 text-xs font-semibold text-white bg-[#0b381b] hover:bg-emerald-900 rounded-xl shadow-xs transition"
                            >
                                Open in Google Maps &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Embedded Google Map -->
                    <div class="lg:col-span-7 bg-white p-2 rounded-2xl border border-slate-200 shadow-xs min-h-[380px] sm:min-h-[440px] flex">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31161.95496402972!2d124.6033566!3d12.4999552!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x330a0252b492aa0f%3A0x6678c569e3a33bcc!2sNorthern%20Samar%20Colleges%20-%20Dalakit%20College%20Campus!5e0!3m2!1sen!2sph!4v1795138628924!5m2!1sen!2sph" 
                            class="w-full h-full min-h-[360px] rounded-xl border-0" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="strict-origin-when-cross-origin">
                        </iframe>
                    </div>

                </div>

                <!-- ========================================================= -->
                <!-- REACH OUT / CONTACT INFORMATION SECTION (Inside Container)  -->
                <!-- ========================================================= -->
                <div class="mt-14 pt-12 border-t border-slate-200/80">
                    <!-- Top Eyebrow & Dual-Tone Heading -->
                    <div class="mb-10">
                        <div class="flex items-center space-x-2.5 text-[#0b381b] text-xs font-bold uppercase tracking-widest mb-2">
                            <span class="w-6 h-[2px] bg-[#0b381b] rounded-full"></span>
                            <span>Reach Out</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                            Contact <span class="font-serif text-[#0b381b]">Information</span>
                        </h2>
                    </div>

                    <!-- Two-Column Layout: Left Info Cards + Right Inquiry Form -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                        
                        <!-- Left Column (5 Cols): Intro, Contact Cards & Social Links -->
                        <div class="lg:col-span-5 space-y-6">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900">Have any inquiries or concerns?</h3>
                                <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                                    Fill out our form details to send us a message. We will get back to you as soon as possible. Alternatively, you may visit our directory to contact the offices or departments directly.
                                </p>
                                <p class="text-xs text-slate-500 mt-3">
                                    Use <span class="font-semibold text-slate-700">"N/A"</span> if information does not apply to you.
                                </p>
                            </div>

                            <!-- Stacked Bordered Info Cards -->
                            <div class="space-y-3.5">
                                <!-- Address Card -->
                                <div class="flex items-start space-x-3.5 p-4 rounded-2xl border border-slate-200 bg-white shadow-2xs hover:border-[#0b381b]/40 transition">
                                    <div class="text-[#0b381b] mt-0.5 shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-[10px] font-bold uppercase tracking-widest text-slate-500">Address</div>
                                        <div class="text-xs sm:text-sm font-medium text-slate-800 mt-1 leading-snug">
                                            Northern Samar Colleges — Dalakit Campus<br>
                                            Catarman, Northern Samar, Philippines
                                        </div>
                                    </div>
                                </div>

                                <!-- Phone Card -->
                                <div class="flex items-start space-x-3.5 p-4 rounded-2xl border border-slate-200 bg-white shadow-2xs hover:border-[#0b381b]/40 transition">
                                    <div class="text-[#0b381b] mt-0.5 shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-[10px] font-bold uppercase tracking-widest text-slate-500">Phone</div>
                                        <div class="text-xs sm:text-sm font-medium text-slate-800 mt-1">
                                            +63 (055) 500-9124
                                        </div>
                                    </div>
                                </div>

                                <!-- Email Card -->
                                <div class="flex items-start space-x-3.5 p-4 rounded-2xl border border-slate-200 bg-white shadow-2xs hover:border-[#0b381b]/40 transition">
                                    <div class="text-[#0b381b] mt-0.5 shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-[10px] font-bold uppercase tracking-widest text-slate-500">Email</div>
                                        <div class="text-xs sm:text-sm font-medium text-slate-800 mt-1">
                                            communications@nsc.edu.ph
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Connect With Us Social Icons -->
                            <div class="pt-4 border-t border-slate-200">
                                <div class="text-xs font-bold text-slate-900 mb-3">Connect With Us</div>
                                <div class="flex items-center space-x-2.5">
                                    <!-- Facebook -->
                                    <a href="#" aria-label="Facebook" class="w-9 h-9 rounded-lg bg-slate-100 hover:bg-[#0b381b] text-slate-800 hover:text-white flex items-center justify-center transition">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                            <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/>
                                        </svg>
                                    </a>
                                    <!-- YouTube -->
                                    <a href="#" aria-label="YouTube" class="w-9 h-9 rounded-lg bg-red-50 hover:bg-red-600 text-red-700 hover:text-white flex items-center justify-center transition">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                        </svg>
                                    </a>
                                    <!-- Website / Portal -->
                                    <a href="/" @click.prevent="activeTab = 'home'; window.scrollTo({top: 0, behavior: 'smooth'})" aria-label="NSC Portal" class="w-9 h-9 rounded-lg bg-emerald-50 hover:bg-[#0b381b] text-[#0b381b] hover:text-white flex items-center justify-center transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column (7 Cols): Floating White Inquiry Form Card -->
                        <div 
                            x-data="{ submitted: false }"
                            class="lg:col-span-7 bg-white rounded-3xl border border-slate-200/90 shadow-xl shadow-slate-200/60 p-6 sm:p-8"
                        >
                            <!-- Confirmation Alert on Submit -->
                            <div x-show="submitted" x-cloak x-transition class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-xs text-[#0b381b] flex items-center justify-between">
                                <span class="font-semibold">Thank you! Your inquiry has been received by Northern Samar Colleges.</span>
                                <button type="button" @click="submitted = false" class="font-bold underline ml-4 cursor-pointer">Send another</button>
                            </div>

                            <form @submit.prevent="submitted = true" class="space-y-4">
                                <!-- Name -->
                                <div>
                                    <label class="block text-xs font-semibold text-slate-800 mb-1.5">Name</label>
                                    <input 
                                        type="text" 
                                        required
                                        placeholder="Enter your full name"
                                        class="w-full px-4 py-2.5 text-xs sm:text-sm text-slate-900 bg-white rounded-xl border border-slate-200 focus:outline-none focus:border-[#0b381b] focus:ring-2 focus:ring-[#0b381b]/15 transition"
                                    >
                                </div>

                                <!-- ID Number & Year Level -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-800 mb-1.5">ID Number</label>
                                        <input 
                                            type="text" 
                                            placeholder="e.g. 2026-00123 or N/A"
                                            class="w-full px-4 py-2.5 text-xs sm:text-sm text-slate-900 bg-white rounded-xl border border-slate-200 focus:outline-none focus:border-[#0b381b] focus:ring-2 focus:ring-[#0b381b]/15 transition"
                                        >
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-800 mb-1.5">Year Level / Year Graduated</label>
                                        <input 
                                            type="text" 
                                            placeholder="e.g. 1st Year, 2024, or N/A"
                                            class="w-full px-4 py-2.5 text-xs sm:text-sm text-slate-900 bg-white rounded-xl border border-slate-200 focus:outline-none focus:border-[#0b381b] focus:ring-2 focus:ring-[#0b381b]/15 transition"
                                        >
                                    </div>
                                </div>

                                <!-- College & Course -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-800 mb-1.5">College</label>
                                        <select class="w-full px-4 py-2.5 text-xs sm:text-sm text-slate-700 bg-white rounded-xl border border-slate-200 focus:outline-none focus:border-[#0b381b] focus:ring-2 focus:ring-[#0b381b]/15 transition">
                                            <option value="">Select College</option>
                                            <option value="ccs">College of Computer Studies</option>
                                            <option value="cba">College of Business &amp; Accountancy</option>
                                            <option value="cte">College of Teacher Education</option>
                                            <option value="ccje">College of Criminal Justice Education</option>
                                            <option value="na">N/A (Prospective Student / Guest)</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-800 mb-1.5">Course</label>
                                        <select class="w-full px-4 py-2.5 text-xs sm:text-sm text-slate-700 bg-white rounded-xl border border-slate-200 focus:outline-none focus:border-[#0b381b] focus:ring-2 focus:ring-[#0b381b]/15 transition">
                                            <option value="">Select Course</option>
                                            @foreach($programs as $program)
                                                <option value="{{ $program->code }}">{{ $program->code }} — {{ $program->title }}</option>
                                            @endforeach
                                            <option value="na">N/A</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Office or Department Concerned -->
                                <div>
                                    <label class="block text-xs font-semibold text-slate-800 mb-1.5">Office or Department Concerned</label>
                                    <select class="w-full px-4 py-2.5 text-xs sm:text-sm text-slate-700 bg-white rounded-xl border-2 border-[#0b381b]/80 focus:outline-none focus:border-[#0b381b] focus:ring-2 focus:ring-[#0b381b]/15 transition">
                                        <option value="">Select Office/Department</option>
                                        <option value="admissions">Admissions &amp; Scholarships Office</option>
                                        <option value="registrar">Office of the College Registrar</option>
                                        <option value="accounting">Accounting &amp; Cashier's Office</option>
                                        <option value="osa">Office of Student Affairs (OSA)</option>
                                        <option value="president">Office of the President</option>
                                    </select>
                                </div>

                                <!-- Concern Textarea -->
                                <div>
                                    <label class="block text-xs font-semibold text-slate-800 mb-1.5">Concern</label>
                                    <textarea 
                                        rows="4" 
                                        required
                                        placeholder="Write your message, question, or concern here..."
                                        class="w-full px-4 py-3 text-xs sm:text-sm text-slate-900 bg-white rounded-xl border border-slate-200 focus:outline-none focus:border-[#0b381b] focus:ring-2 focus:ring-[#0b381b]/15 transition resize-y"
                                    ></textarea>
                                </div>

                                <!-- Full-Width Pill Submit Button -->
                                <div class="pt-2">
                                    <button 
                                        type="submit" 
                                        class="w-full py-3.5 px-6 rounded-full bg-[#0b381b] hover:bg-emerald-900 text-white text-xs sm:text-sm font-bold tracking-wide shadow-md hover:shadow-lg transition cursor-pointer"
                                    >
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- ========================================================= -->
                <!-- OFFICE DIRECTORY SECTION (3-Column Grid)                  -->
                <!-- ========================================================= -->
                <div class="mt-16 pt-14 border-t border-slate-200/80">
                    <!-- Section Header with Institutional Seal on Right -->
                    <div class="flex items-start justify-between gap-4 mb-10">
                        <div>
                            <div class="flex items-center space-x-2.5 text-[#0b381b] text-xs font-bold uppercase tracking-widest mb-2">
                                <span class="w-6 h-[2px] bg-[#0b381b] rounded-full"></span>
                                <span>Directory</span>
                            </div>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                                Office <span class="font-serif text-[#0b381b]">Directory</span>
                            </h2>
                        </div>

                        <!-- School Seal / Crest (Swap src with your NSC logo path) -->
                        <img 
                            src="{{ asset('images/nsc-logo.png') }}" 
                            alt="Northern Samar Colleges Seal" 
                            class="w-12 h-12 sm:w-14 sm:h-14 object-contain shrink-0 opacity-90"
                        >
                    </div>

                    <!-- 3-Column Office Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        <!-- Card 1: Accounting Office -->
                        <div class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-2xs hover:shadow-md hover:border-[#0b381b]/30 transition">
                            <h3 class="text-base font-bold text-[#0b381b] pb-3.5 mb-4 border-b border-slate-100">
                                Accounting Office
                            </h3>
                            <div class="space-y-3 text-xs sm:text-sm text-slate-700">
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </span>
                                    <span>0908 885 4520</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                    <a href="mailto:accounting@nsc.edu.ph" class="hover:text-[#0b381b] hover:underline break-all">accounting@nsc.edu.ph</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Finance Office -->
                        <div class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-2xs hover:shadow-md hover:border-[#0b381b]/30 transition">
                            <h3 class="text-base font-bold text-[#0b381b] pb-3.5 mb-4 border-b border-slate-100">
                                Finance Office
                            </h3>
                            <div class="space-y-3 text-xs sm:text-sm text-slate-700">
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </span>
                                    <span>0908 885 3694</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                    <a href="mailto:finance@nsc.edu.ph" class="hover:text-[#0b381b] hover:underline break-all">finance@nsc.edu.ph</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3: Human Resources Office -->
                        <div class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-2xs hover:shadow-md hover:border-[#0b381b]/30 transition">
                            <h3 class="text-base font-bold text-[#0b381b] pb-3.5 mb-4 border-b border-slate-100">
                                Human Resources Office
                            </h3>
                            <div class="space-y-3 text-xs sm:text-sm text-slate-700">
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </span>
                                    <span>0955 620 6455</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                    <a href="mailto:hr@nsc.edu.ph" class="hover:text-[#0b381b] hover:underline break-all">hr@nsc.edu.ph</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4: Admissions & Marketing Office -->
                        <div class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-2xs hover:shadow-md hover:border-[#0b381b]/30 transition">
                            <h3 class="text-base font-bold text-[#0b381b] pb-3.5 mb-4 border-b border-slate-100">
                                Admissions &amp; Marketing Office
                            </h3>
                            <div class="space-y-3 text-xs sm:text-sm text-slate-700">
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </span>
                                    <span>0908 885 5380</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                    <a href="mailto:admissions@nsc.edu.ph" class="hover:text-[#0b381b] hover:underline break-all">admissions@nsc.edu.ph</a>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                    <a href="mailto:marketing@nsc.edu.ph" class="hover:text-[#0b381b] hover:underline break-all">marketing@nsc.edu.ph</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 5: OSAS and Guidance Office -->
                        <div class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-2xs hover:shadow-md hover:border-[#0b381b]/30 transition">
                            <h3 class="text-base font-bold text-[#0b381b] pb-3.5 mb-4 border-b border-slate-100">
                                OSAS and Guidance Office
                            </h3>
                            <div class="space-y-3 text-xs sm:text-sm text-slate-700">
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </span>
                                    <span>0908 885 6201</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                    <a href="mailto:osas@nsc.edu.ph" class="hover:text-[#0b381b] hover:underline break-all">osas@nsc.edu.ph</a>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                    <a href="mailto:guidance@nsc.edu.ph" class="hover:text-[#0b381b] hover:underline break-all">guidance@nsc.edu.ph</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 6: Registrar Office -->
                        <div class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-2xs hover:shadow-md hover:border-[#0b381b]/30 transition">
                            <h3 class="text-base font-bold text-[#0b381b] pb-3.5 mb-4 border-b border-slate-100">
                                Registrar Office
                            </h3>
                            <div class="space-y-3 text-xs sm:text-sm text-slate-700">
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </span>
                                    <span>0908 885 3687</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50/90 text-[#0b381b] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                    <a href="mailto:registrar@nsc.edu.ph" class="hover:text-[#0b381b] hover:underline break-all">registrar@nsc.edu.ph</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================================= -->
        <!-- TAB 2D: ABOUT US - ADMINISTRATION & BOARD                 -->
        <!-- ========================================================= -->
        <div x-show="activeTab === 'about-board'" x-cloak x-transition.opacity.duration.300ms>
            <x-page-banner
                badge="About Us"
                title="Administration & Board"
                subtitle="Meet the leadership, board of trustees, and academic administrators guiding Northern Samar Colleges."
                image="images/nsc-people.jpg"
            />

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 space-y-8">
                <div>
                    <div class="flex items-center space-x-2.5 text-[#0b381b] text-xs font-bold uppercase tracking-widest mb-1.5">
                        <span class="w-6 h-[2px] bg-[#0b381b] rounded-full"></span>
                        <span>Organizational Structure</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
                        Administrative <span class="font-serif text-[#0b381b]">Chart</span>
                    </h2>
                </div>

                <div class="bg-slate-50/70 rounded-3xl border border-slate-200/90 p-6 sm:p-10 overflow-x-auto">
                    @if($boardRoots->isEmpty())
                        <p class="text-sm text-slate-500 text-center py-10">
                            Organizational chart entries will appear here once added in the admin panel.
                        </p>
                    @else
                        <div class="min-w-max flex items-start justify-center gap-10 mx-auto">
                            @foreach($boardRoots as $root)
                                <x-org-node :node="$root" />
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- ========================================================= -->
        <!-- TAB 2E: ABOUT US - ACCREDITATIONS & ACHIEVEMENTS           -->
        <!-- ========================================================= -->
        <div x-show="activeTab === 'about-accreditations'" x-cloak x-transition.opacity.duration.300ms>
            <x-page-banner
                badge="About Us"
                title="Accreditations & Achievements"
                subtitle="Explore the college's accreditations, quality standards, and institutional recognitions."
                image="images/nsc-people.jpg"
            />

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
                <x-accreditation-grid :items="$accreditations" />
            </div>
        </div>

        <!-- ========================================================= -->
        <!-- TAB 3: ADMISSIONS VIEWS                                   -->
        <!-- ========================================================= -->
        <div x-show="activeTab.startsWith('admissions-')" x-cloak x-transition.opacity.duration.300ms class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <x-page-banner 
                badge="Admissions" 
                image="images/nsc-people.jpg"
                x-text="
                    activeTab === 'admissions-enrollment' ? 'Enrollment Procedures' : 
                    (activeTab === 'admissions-tuition' ? 'Tuition & Fees' : 'Scholarships & Financial Aid')
                "
            />
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-xs text-slate-600 leading-relaxed">
                <p>Detailed requirements, registrar schedules, and student financial assistance guidelines for incoming freshmen, transferees, and continuing students.</p>
            </div>
        </div>

        <!-- ========================================================= -->
        <!-- TAB 4: ACADEMICS VIEWS (USES YOUR DYNAMIC $programs DATA) -->
        <!-- ========================================================= -->
        <div x-show="activeTab.startsWith('academics-')" x-cloak x-transition.opacity.duration.300ms class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <x-page-banner 
                badge="Academics" 
                title="Academic Programs & Departments" 
                subtitle="Explore our degree offerings built for modern careers."
                image="images/graduation-pic.jpg" 
            />
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($programs as $program)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-xl hover:shadow-emerald-950/15 transition-all duration-300 ease-out hover:scale-[1.03] hover:-translate-y-1 group flex flex-col">
                    <div class="overflow-hidden h-48">
                        <img src="{{ asset($program->image_path) }}" alt="{{ $program->code }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-bold text-[#0b381b] uppercase tracking-wider">{{ $program->code }}</span>
                            <h3 class="text-lg font-bold text-slate-900 mt-1 mb-2 group-hover:text-[#0b381b] transition-colors">{{ $program->title }}</h3>
                            <p class="text-sm text-slate-600">{{ $program->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- ========================================================= -->
        <!-- TAB 5: STUDENT LIFE & MORE VIEWS                          -->
        <!-- ========================================================= -->
        <div x-show="activeTab.startsWith('student-') || activeTab.startsWith('more-')" x-cloak x-transition.opacity.duration.300ms class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <button @click="activeTab = 'home'" class="text-xs font-semibold text-[#0b381b] hover:underline mb-4 inline-block">&larr; Back to Home</button>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-6">Campus Updates & Services</h1>
            
            <!-- Reuses your dynamic $newsList data so nothing is hardcoded -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($newsList as $news)
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex gap-4 items-start">
                    <img src="{{ asset($news->image_path) }}" alt="News" class="w-24 h-24 rounded-xl object-cover shrink-0">
                    <div>
                        <span class="text-xs font-semibold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded">{{ $news->category }}</span>
                        <h3 class="text-base font-bold text-slate-900 mt-1">{{ $news->title }}</h3>
                        <p class="text-xs text-slate-600 mt-1">{{ $news->excerpt }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

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
                        <li>
                            <a href="/" @click.prevent="activeTab = 'home'; window.scrollTo({top: 0, behavior: 'smooth'})" class="hover:text-white transition">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#vision" @click.prevent="activeTab = 'about-vision'; window.scrollTo({top: 0, behavior: 'smooth'})" class="hover:text-white transition">
                                Vision &amp; Mission
                            </a>
                        </li>
                        <li>
                            <a href="#programs" @click.prevent="activeTab = 'academics-programs'; window.scrollTo({top: 0, behavior: 'smooth'})" class="hover:text-white transition">
                                Academics
                            </a>
                        </li>
                        <li>
                            <a href="#enrollment" @click.prevent="activeTab = 'admissions-enrollment'; window.scrollTo({top: 0, behavior: 'smooth'})" class="hover:text-white transition">
                                Admissions
                            </a>
                        </li>
                        <li>
                            <a href="#news" @click.prevent="activeTab = 'more-news'; window.scrollTo({top: 0, behavior: 'smooth'})" class="hover:text-white transition">
                                News and Events
                            </a>
                        </li>
                        <li>
                            <a href="#portal" @click.prevent="activeTab = 'studentLife-portal'; window.scrollTo({top: 0, behavior: 'smooth'})" class="hover:text-white transition">
                                Student Resources
                            </a>
                        </li>
                        <li>
                            <a href="#directory" @click.prevent="activeTab = 'more-directory'; window.scrollTo({top: 0, behavior: 'smooth'})" class="hover:text-white transition">
                                Careers at Portal
                            </a>
                        </li>
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