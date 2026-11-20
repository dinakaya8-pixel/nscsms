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

            <!-- Our History Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
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
        <div x-show="activeTab === 'about-history'" x-cloak x-transition.opacity.duration.300ms class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <x-page-banner 
                badge="About Us" 
                title="History & Heritage" 
                subtitle="Discover the roots, milestones, and legacy of Northern Samar Colleges."
                image="images/heritage-pic.jpg" 
            />
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-xs space-y-4 text-slate-600 leading-relaxed">
                <p>Founded to serve the academic needs of Northern Samar, Northern Samar Colleges has grown into a pillar of accessible, quality higher education.</p>
            </div>
        </div>

        <div x-show="activeTab === 'about-vision'" x-cloak x-transition.opacity.duration.300ms class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <x-page-banner 
                badge="About Us" 
                title="Vision & Mission" 
                subtitle="Our guiding philosophy to educate, innovate, serve, and excel."
                image="images/founding-pic.jpg" 
            />
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-xs">
                    <h2 class="text-xl font-bold text-[#0b381b] mb-3">Our Vision</h2>
                    <p class="text-slate-600 leading-relaxed">A premier institution of learning recognized for academic excellence, innovation, and community transformation.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-xs">
                    <h2 class="text-xl font-bold text-[#0b381b] mb-3">Our Mission</h2>
                    <p class="text-slate-600 leading-relaxed">To educate, innovate, serve, and excel by providing holistic and globally competitive instruction.</p>
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
            </div>
        </div>

        <div x-show="activeTab === 'about-board'" x-cloak x-transition.opacity.duration.300ms class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <button @click="activeTab = 'home'" class="text-xs font-semibold text-[#0b381b] hover:underline mb-4 inline-block">&larr; Back to Home</button>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-6">Administration & Board</h1>
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-xs text-slate-600">
                <p>Directory of school executives, department deans, and administrative officers.</p>
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