<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haru The Friendly Van | Comfortable & Reliable Van Rental</title>
    <meta name="description" content="Affordable, comfortable, and reliable single-van rental with friendly driver for family trips, out-of-town tours, and airport transfers.">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-50 text-stone-900 font-sans antialiased selection:bg-emerald-500 selection:text-white pb-24 md:pb-0">

    {{-- Top Notification / Availability Banner --}}
    <div class="bg-emerald-800 text-emerald-50 text-xs sm:text-sm font-medium py-2 px-4 text-center tracking-wide">
        <div class="max-w-6xl mx-auto flex items-center justify-center gap-2">
            <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span>Now accepting trip bookings for weekends and out-of-town holidays!</span>
        </div>
    </div>

    {{-- Minimal Navigation Header --}}
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur border-b border-stone-200/80">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <a href="{{ route('landing') }}" class="flex items-center gap-2 group">
                <span class="w-9 h-9 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold text-lg shadow-sm group-hover:bg-emerald-700 transition">
                    H
                </span>
                <div>
                    <span class="block font-bold text-base sm:text-lg leading-tight text-stone-900">Haru The Friendly Van</span>
                    <span class="block text-[11px] text-stone-500 font-medium">Single Van • Personalized Service</span>
                </div>
            </a>

            <div class="flex items-center gap-3 sm:gap-4">
                <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-stone-600">
                    <a href="#details" class="hover:text-emerald-700 transition">Van Details</a>
                    <a href="#about" class="hover:text-emerald-700 transition">About</a>
                    <a href="#trips" class="hover:text-emerald-700 transition">Client Trips</a>
                    <a href="#contact" class="hover:text-emerald-700 transition">Contact</a>
                </nav>

                <a href="tel:{{ $van['owner']['phone_tel'] }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg text-xs sm:text-sm font-semibold text-emerald-800 bg-emerald-50 border border-emerald-200 hover:bg-emerald-100 transition">
                    <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span class="hidden sm:inline">Call:</span>
                    <span>{{ $van['owner']['phone_display'] }}</span>
                </a>
            </div>
        </div>
    </header>

    <main>
        {{-- Section 1: Hero --}}
        <section class="pt-8 sm:pt-14 pb-12 sm:pb-16 bg-gradient-to-b from-white via-stone-50 to-stone-100/70 border-b border-stone-200/60">
            <div class="max-w-5xl mx-auto px-4 sm:px-6">
                
                {{-- Flash Message if Inquiry Submitted --}}
                @if (session('success'))
                    <div id="flash-success" class="mb-8 p-4 rounded-xl bg-emerald-50 border border-emerald-300 text-emerald-900 flex items-start gap-3 shadow-sm">
                        <svg class="w-6 h-6 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-sm sm:text-base">{{ session('success') }}</p>
                            <p class="text-xs sm:text-sm text-emerald-800/90 mt-0.5">We will review your date and message right away.</p>
                        </div>
                    </div>
                @endif

                <div class="text-center max-w-3xl mx-auto">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200 mb-4">
                        <svg class="w-3.5 h-3.5 text-emerald-700" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Local Owner-Operated Van Service
                    </span>

                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-stone-900 leading-tight">
                        {{ $van['headline'] }}
                    </h1>

                    <p class="mt-4 text-base sm:text-lg text-stone-600 leading-relaxed max-w-2xl mx-auto">
                        {{ $van['subheadline'] }}
                    </p>

                    <div class="mt-6 sm:mt-8 flex flex-wrap items-center justify-center gap-3 sm:gap-4">
                        <a href="#inquiry" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl text-base font-semibold text-white bg-emerald-700 hover:bg-emerald-800 shadow-md shadow-emerald-700/20 active:scale-[0.98] transition">
                            <span>Inquire Now</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                            </svg>
                        </a>
                        <a href="tel:{{ $van['owner']['phone_tel'] }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl text-base font-semibold text-stone-800 bg-white border border-stone-300 hover:bg-stone-50 active:scale-[0.98] transition">
                            <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>Call {{ $van['owner']['phone_display'] }}</span>
                        </a>
                    </div>
                </div>

                {{-- Van Photo Visual (Hero Showcase) --}}
                <div class="mt-8 sm:mt-12 max-w-5xl mx-auto">
                    <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-2xl shadow-stone-900/15 border-4 sm:border-8 border-white ring-1 ring-stone-200/80 bg-stone-200">
                        <img 
                            src="{{ asset('images/haru-van.jpg') }}" 
                            alt="Haru The Friendly Van ready for road trips" 
                            class="w-full h-auto object-cover max-h-[540px]"
                            loading="eager"
                            fetchpriority="high"
                        />
                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-stone-950/80 via-stone-950/40 to-transparent p-4 sm:p-6 text-white flex flex-col sm:flex-row sm:items-end justify-between gap-2">
                            <div>
                                <p class="text-xs uppercase tracking-wider text-emerald-300 font-semibold">Available Van</p>
                                <p class="text-base sm:text-xl font-bold">{{ $van['model'] }}</p>
                            </div>
                            <div class="inline-flex items-center gap-1.5 text-xs sm:text-sm bg-white/20 backdrop-blur px-3 py-1.5 rounded-lg font-medium self-start sm:self-auto">
                                <svg class="w-4 h-4 text-emerald-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Clean • Sanitized • Dual Aircon</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Section 2: Van Details --}}
        <section id="details" class="py-12 sm:py-16 bg-white border-b border-stone-200/80">
            <div class="max-w-5xl mx-auto px-4 sm:px-6">
                
                <div class="max-w-2xl mb-8 sm:mb-12">
                    <span class="text-xs uppercase tracking-wider text-emerald-700 font-bold">Vehicle Profile</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900 mt-1">
                        Our Van Details
                    </h2>
                    <p class="text-stone-600 mt-2 text-sm sm:text-base leading-relaxed">
                        We operate exclusively with our single, dedicated van. That means you always know exactly which vehicle will arrive at your doorstep—clean, inspected, and ready to roll.
                    </p>
                </div>

                {{-- Specs Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
                    @foreach ($van['specs'] as $spec)
                        <div class="p-5 rounded-2xl bg-stone-50 border border-stone-200 hover:border-emerald-300 transition group">
                            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold mb-3 group-hover:scale-105 transition">
                                @if(str_contains($spec['label'], 'Capacity'))
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                @elseif(str_contains($spec['label'], 'Air'))
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                @elseif(str_contains($spec['label'], 'Luggage'))
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                                @endif
                            </div>
                            <p class="text-xs font-semibold text-stone-500 uppercase tracking-wide">{{ $spec['label'] }}</p>
                            <p class="text-lg font-bold text-stone-900 mt-0.5">{{ $spec['value'] }}</p>
                            <p class="text-xs text-stone-600 mt-1">{{ $spec['detail'] }}</p>
                        </div>
                    @endforeach
                </div>

                {{-- Van Description & Service Details Box --}}
                <div class="bg-stone-50 rounded-2xl p-6 sm:p-8 border border-stone-200 flex flex-col md:flex-row gap-6 items-start justify-between">
                    <div class="max-w-2xl">
                        <h3 class="text-lg font-bold text-stone-900">Rental Inclusions & Availability</h3>
                        <p class="text-stone-600 text-sm leading-relaxed mt-2">
                            {{ $van['description'] }}
                        </p>
                        <ul class="mt-4 space-y-2 text-sm text-stone-700">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span><strong>Service Type:</strong> {{ $van['service_type'] }}</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span><strong>Availability:</strong> {{ $van['availability'] }}</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span><strong>Destinations:</strong> Out-of-town trips, airport transfers, family events across Luzon</span>
                            </li>
                        </ul>
                    </div>

                    <div class="w-full md:w-auto shrink-0 bg-white p-5 rounded-xl border border-stone-200 text-center md:text-left">
                        <span class="text-xs font-bold text-stone-500 uppercase tracking-wide block">Trip Quotation</span>
                        <p class="text-sm text-stone-600 mt-1 max-w-xs">
                            Rates depend on your destination, fuel, and trip duration. Contact us for an instant, transparent quote with no surprise fees.
                        </p>
                        <a href="#inquiry" class="mt-4 inline-flex items-center justify-center w-full px-4 py-2.5 rounded-lg text-xs sm:text-sm font-semibold text-emerald-800 bg-emerald-50 border border-emerald-300 hover:bg-emerald-100 transition">
                            Request Quote
                        </a>
                    </div>
                </div>

            </div>
        </section>

        {{-- Section 3: About --}}
        <section id="about" class="py-16 sm:py-24 bg-stone-50 border-b border-stone-200/80">
            <div class="max-w-5xl mx-auto px-4 sm:px-6">
                
                <div class="bg-white rounded-3xl p-6 sm:p-10 md:p-12 border border-stone-200 shadow-sm">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                        
                        {{-- Prominent Driver Portrait Column (Significantly Enlarged on Desktop & Mobile) --}}
                        <div class="lg:col-span-6 w-full flex flex-col items-center">
                            <div class="relative w-full max-w-lg aspect-square sm:aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl border-4 sm:border-8 border-white ring-1 ring-stone-200/90 bg-stone-100 group">
                                <img 
                                    src="{{ asset('images/charls-driver.jpg') }}" 
                                    alt="Charls Pandeo - Owner and Driver of Haru The Friendly Van" 
                                    class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-500"
                                    loading="lazy"
                                />
                                
                                {{-- Badges on Image --}}
                                <div class="absolute top-4 left-4 bg-stone-900/85 backdrop-blur-md text-white text-xs font-bold px-3.5 py-1.5 rounded-full shadow-lg flex items-center gap-2 border border-white/20">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>Owner & Dedicated Driver</span>
                                </div>

                                <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-stone-950/90 via-stone-950/50 to-transparent p-5 sm:p-6 text-white">
                                    <p class="text-xs uppercase tracking-widest text-emerald-400 font-bold">Driver & Operator</p>
                                    <h3 class="text-xl sm:text-2xl font-black tracking-tight">Charls Pandeo</h3>
                                    <p class="text-xs sm:text-sm text-stone-200 mt-0.5 font-medium">Haru The Friendly Van • Metro Manila & Luzon Trips</p>
                                </div>
                            </div>
                            <p class="text-xs text-stone-500 text-center mt-3 font-medium">
                                Personalized service — Charls personally drives and inspects Haru on every trip.
                            </p>
                        </div>
                        
                        {{-- Content Column --}}
                        <div class="lg:col-span-6 text-center lg:text-left">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200 mb-3">
                                <svg class="w-3.5 h-3.5 text-emerald-700" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                Dedicated Single-Van Operator
                            </span>

                            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-stone-900 leading-tight">
                                Meet Charls Pandeo
                            </h2>
                            <p class="text-emerald-700 font-medium text-sm mt-1">
                                The trusted person behind the wheel of Haru The Friendly Van
                            </p>

                            <div class="mt-4 space-y-3 text-stone-600 text-sm sm:text-base leading-relaxed">
                                <p>
                                    Hello! I am <strong>Charls Pandeo</strong>, the owner and dedicated driver of <strong>Haru The Friendly Van</strong>. Because I manage and drive only one vehicle, my complete focus is on giving you and your family a reliable, safe, and stress-free travel experience.
                                </p>
                                <p>
                                    Unlike large commercial rental services where you deal with changing agents or unknown third-party drivers, you communicate directly with me from your very first message until drop-off. I personally inspect the van before every departure, keep the cabin fresh and cool, and guarantee calm, defensive driving on every Luzon road.
                                </p>
                            </div>

                            {{-- Service Guarantees / Highlights --}}
                            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3 text-left">
                                <div class="p-3 rounded-xl bg-stone-50 border border-stone-200 flex items-start gap-2.5">
                                    <div class="w-6 h-6 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-stone-800">Punctual Pickups</p>
                                        <p class="text-[11px] text-stone-500">Always on time for airport transfers & tours</p>
                                    </div>
                                </div>

                                <div class="p-3 rounded-xl bg-stone-50 border border-stone-200 flex items-start gap-2.5">
                                    <div class="w-6 h-6 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-stone-800">Safe Defensive Driving</p>
                                        <p class="text-[11px] text-stone-500">Careful driving through mountain passes & highways</p>
                                    </div>
                                </div>

                                <div class="p-3 rounded-xl bg-stone-50 border border-stone-200 flex items-start gap-2.5">
                                    <div class="w-6 h-6 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-stone-800">Clean & Fresh Interior</p>
                                        <p class="text-[11px] text-stone-500">Smoke-free, sanitized cabin with dual cold aircon</p>
                                    </div>
                                </div>

                                <div class="p-3 rounded-xl bg-stone-50 border border-stone-200 flex items-start gap-2.5">
                                    <div class="w-6 h-6 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-stone-800">Direct Communication</p>
                                        <p class="text-[11px] text-stone-500">Talk directly to Charls without middle-men</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Direct Action in About Card --}}
                            <div class="mt-6 pt-5 border-t border-stone-100 flex flex-wrap items-center justify-center lg:justify-start gap-3">
                                <a href="#inquiry" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm text-white bg-emerald-700 hover:bg-emerald-800 active:scale-95 shadow-sm transition">
                                    <span>Plan Trip with Charls</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                                <a href="tel:{{ $van['owner']['phone_tel'] }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl font-semibold text-xs sm:text-sm text-stone-700 bg-stone-100 hover:bg-stone-200 border border-stone-300 active:scale-95 transition">
                                    <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    <span>Call {{ $van['owner']['phone_display'] }}</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Section: Client Proof & Recent Trips --}}
        <section id="trips" class="py-14 sm:py-20 bg-stone-100/70 border-b border-stone-200/80">
            <div class="max-w-5xl mx-auto px-4 sm:px-6">
                <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200 mb-3">
                        <svg class="w-3.5 h-3.5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Client Proof & Trip Highlights
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight">
                        Travel Memories with Haru & Charls
                    </h2>
                    <p class="text-stone-600 text-sm sm:text-base mt-2 leading-relaxed">
                        Real road trips, family holidays, barkada getaways, and safe airport transfers across Luzon.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach ($van['trip_proofs'] as $trip)
                        <div class="bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-sm hover:shadow-md transition group">
                            {{-- Image Container / Photo Slot --}}
                            <div class="relative aspect-video sm:aspect-[4/3] bg-stone-100 overflow-hidden">
                                @if (file_exists(public_path($trip['image'])))
                                    <img 
                                        src="{{ asset($trip['image']) }}" 
                                        alt="{{ $trip['title'] }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                        loading="lazy"
                                    >
                                @else
                                    {{-- Client Photo Placeholder Frame --}}
                                    <div class="w-full h-full border-2 border-dashed border-stone-300 rounded-t-2xl flex flex-col items-center justify-center p-6 text-center bg-gradient-to-br from-stone-50 to-stone-100 group-hover:border-emerald-500/50 transition">
                                        <div class="w-12 h-12 rounded-full bg-emerald-50 text-emerald-700 flex items-center justify-center mb-3">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                        <p class="text-xs font-bold text-stone-800">{{ $trip['title'] }}</p>
                                        <span class="inline-block text-[11px] text-stone-500 mt-1 font-mono bg-white px-2 py-0.5 rounded border border-stone-200">
                                            Photo slot: public/{{ $trip['image'] }}
                                        </span>
                                        <p class="text-[10px] text-emerald-700 font-semibold mt-2">Ready for your client photo</p>
                                    </div>
                                @endif

                                {{-- Tag Overlay --}}
                                <div class="absolute top-3 left-3">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[11px] font-bold bg-stone-900/80 backdrop-blur text-white shadow-sm">
                                        {{ $trip['tag'] }}
                                    </span>
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-5">
                                <div class="flex items-center gap-1.5 text-xs font-semibold text-emerald-700 mb-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>{{ $trip['destination'] }}</span>
                                </div>
                                <h3 class="text-base font-bold text-stone-900 leading-snug">
                                    {{ $trip['title'] }}
                                </h3>
                                <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                                    {{ $trip['caption'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Quick CTA to book a trip --}}
                <div class="mt-10 p-5 sm:p-6 rounded-2xl bg-emerald-800 text-emerald-50 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-md">
                    <div>
                        <p class="font-bold text-sm sm:text-base text-white">Planning your own family or barkada trip?</p>
                        <p class="text-xs sm:text-sm text-emerald-200 mt-0.5">Let Charls take care of the driving with Haru The Friendly Van.</p>
                    </div>
                    <a href="#inquiry" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-white text-emerald-900 hover:bg-emerald-50 active:scale-95 transition shrink-0">
                        <span>Book Your Schedule</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- Section 4: Contact & Small Inquiry Form --}}
        <section id="contact" class="py-12 sm:py-16 bg-white">
            <div class="max-w-5xl mx-auto px-4 sm:px-6">
                
                <div class="text-center max-w-xl mx-auto mb-10">
                    <span class="text-xs uppercase tracking-wider text-emerald-700 font-bold">Get In Touch</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900 mt-1">
                        Contact & Trip Inquiry
                    </h2>
                    <p class="text-stone-600 text-sm sm:text-base mt-2">
                        Reach out directly via phone or message, or fill out the quick trip inquiry form below.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                    
                    {{-- Contact Information Box --}}
                    <div class="md:col-span-5 bg-stone-50 rounded-2xl p-6 sm:p-7 border border-stone-200">
                        <h3 class="text-lg font-bold text-stone-900">Direct Contact</h3>
                        <p class="text-xs text-stone-500 mt-1">Fastest response via direct call or Messenger.</p>

                        <div class="mt-6 space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-stone-500 font-medium">Owner & Driver</p>
                                    <p class="text-sm font-bold text-stone-900">{{ $van['owner']['name'] }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-stone-500 font-medium">Phone Number</p>
                                    <div class="flex flex-wrap items-center gap-2 mt-0.5">
                                        <a 
                                            href="tel:{{ $van['owner']['phone_tel'] }}" 
                                            class="text-sm sm:text-base font-bold text-stone-900 hover:text-emerald-700 active:text-emerald-800 transition inline-flex items-center gap-1.5"
                                            title="Tap to call directly on phone"
                                        >
                                            <span>{{ $van['owner']['phone_display'] }}</span>
                                            <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-100/80 px-1.5 py-0.5 rounded">Tap to Call</span>
                                        </a>
                                        <button 
                                            type="button" 
                                            onclick="copyPhoneNumber('{{ $van['owner']['phone_display'] }}')" 
                                            id="btn-copy-phone"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-semibold text-stone-700 bg-stone-200/80 hover:bg-stone-300 active:scale-95 transition cursor-pointer"
                                            title="Copy phone number to clipboard"
                                        >
                                            <svg id="copy-phone-icon" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                            <span id="copy-phone-text">Copy</span>
                                        </button>
                                    </div>
                                    <p class="text-[11px] text-stone-500 mt-1">Direct call opens dialer immediately on mobile</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.145 2 11.258c0 2.91 1.455 5.514 3.734 7.205V22l3.37-1.85c.915.253 1.888.39 2.896.39 5.523 0 10-4.145 10-9.282C22 6.145 17.523 2 12 2zm1.04 12.51l-2.656-2.833-5.183 2.833 5.7-6.052 2.723 2.833 5.117-2.833-5.701 6.052z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-stone-500 font-medium">Facebook & Messenger</p>
                                    <a href="{{ $van['owner']['messages_url'] }}" target="_blank" rel="noopener" class="text-sm font-bold text-emerald-700 hover:underline">
                                        {{ $van['owner']['facebook_name'] }}
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 00-1-.08A6.34 6.34 0 003 15.66a6.34 6.34 0 0010.86 4.46 6.13 6.13 0 001.92-4.46V8.71a8.31 8.31 0 004.81 1.52V6.78a4.85 4.85 0 01-1-.09z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-stone-500 font-medium">TikTok</p>
                                    <a href="{{ $van['owner']['tiktok_url'] }}" target="_blank" rel="noopener" class="text-sm font-bold text-emerald-700 hover:underline">
                                        {{ $van['owner']['tiktok_handle'] }}
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-stone-500 font-medium">Location</p>
                                    <p class="text-sm font-semibold text-stone-900">{{ $van['owner']['location'] }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="mt-7 pt-6 border-t border-stone-200/80 flex flex-col sm:flex-row gap-3">
                            <a href="tel:{{ $van['owner']['phone_tel'] }}" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl font-bold text-sm text-white bg-emerald-700 hover:bg-emerald-800 active:scale-[0.98] shadow-sm transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <span>Call Now (Direct)</span>
                            </a>
                            <a href="{{ $van['owner']['messages_url'] }}" target="_blank" rel="noopener" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl font-bold text-sm text-stone-800 bg-white border border-stone-300 hover:bg-stone-50 active:scale-[0.98] transition">
                                <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.145 2 11.258c0 2.91 1.455 5.514 3.734 7.205V22l3.37-1.85c.915.253 1.888.39 2.896.39 5.523 0 10-4.145 10-9.282C22 6.145 17.523 2 12 2zm1.04 12.51l-2.656-2.833-5.183 2.833 5.7-6.052 2.723 2.833 5.117-2.833-5.701 6.052z"/></svg>
                                <span>Message</span>
                            </a>
                        </div>
                    </div>

                    {{-- Small Inquiry Form --}}
                    <div id="inquiry" class="md:col-span-7 bg-white rounded-2xl p-6 sm:p-7 border border-stone-200 shadow-sm">
                        <h3 class="text-lg font-bold text-stone-900">Trip Inquiry Form</h3>
                        <p class="text-xs text-stone-500 mt-1">Tell us when and where you want to travel. We will get back to you promptly.</p>

                        @if ($errors->any())
                            <div class="mt-4 p-3.5 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs">
                                <p class="font-bold">Please check the following:</p>
                                <ul class="list-disc list-inside mt-1 space-y-0.5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="inquiry-form" action="{{ route('inquire.store') }}" method="POST" class="mt-5 space-y-4">
                            @csrf

                            <div>
                                <label for="name" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">
                                    Your Name <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    required 
                                    value="{{ old('name') }}"
                                    placeholder="e.g. Maria Santos" 
                                    class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 bg-white"
                                >
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="phone" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">
                                        Contact Number <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="tel" 
                                        name="phone" 
                                        id="phone" 
                                        inputmode="tel"
                                        required 
                                        value="{{ old('phone') }}"
                                        placeholder="0917-xxx-xxxx" 
                                        class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 bg-white"
                                    >
                                </div>

                                <div>
                                    <label for="rental_date" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">
                                        Rental Date <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="date" 
                                        name="rental_date" 
                                        id="rental_date" 
                                        required 
                                        min="{{ date('Y-m-d') }}"
                                        value="{{ old('rental_date') }}"
                                        class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 bg-white"
                                    >
                                </div>
                            </div>

                            <div>
                                <label for="message" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">
                                    Message / Trip Details <span class="text-stone-400 font-normal">(Optional)</span>
                                </label>
                                <textarea 
                                    name="message" 
                                    id="message" 
                                    rows="3" 
                                    placeholder="Destination (e.g. Baguio, Tagaytay, Batangas), estimated passenger count, or special pickup notes..."
                                    class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 bg-white"
                                >{{ old('message') }}</textarea>
                            </div>

                            {{-- Inquiry Action Buttons --}}
                            <div class="space-y-3 pt-2">
                                {{-- Primary Action: Direct Website Submit (100% No Login Needed) --}}
                                <button 
                                    type="submit" 
                                    class="w-full py-3.5 px-6 rounded-xl font-bold text-sm text-white bg-emerald-700 hover:bg-emerald-800 active:scale-[0.99] shadow-md shadow-emerald-700/20 flex items-center justify-center gap-2 transition cursor-pointer"
                                >
                                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                    <span>Submit Trip Inquiry (No Login Needed)</span>
                                </button>

                                {{-- Divider --}}
                                <div class="relative flex py-0.5 items-center">
                                    <div class="flex-grow border-t border-stone-200"></div>
                                    <span class="flex-shrink mx-3 text-[11px] uppercase tracking-wider text-stone-400 font-semibold">Or send directly via</span>
                                    <div class="flex-grow border-t border-stone-200"></div>
                                </div>

                                {{-- Secondary Action: Facebook Messenger for logged-in users --}}
                                <button 
                                    type="button" 
                                    id="btn-send-messenger"
                                    onclick="sendViaMessenger()"
                                    class="w-full py-3 px-4 rounded-xl font-semibold text-xs sm:text-sm text-blue-700 bg-blue-50 hover:bg-blue-100 border border-blue-200 active:scale-[0.99] flex items-center justify-center gap-2 transition cursor-pointer"
                                >
                                    <svg class="w-4 h-4 shrink-0 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.145 2 11.258c0 2.91 1.455 5.514 3.734 7.205V22l3.37-1.85c.915.253 1.888.39 2.896.39 5.523 0 10-4.145 10-9.282C22 6.145 17.523 2 12 2zm1.04 12.51l-2.656-2.833-5.183 2.833 5.7-6.052 2.723 2.833 5.117-2.833-5.701 6.052z"/></svg>
                                    <span>Chat with Charls on Facebook Messenger</span>
                                </button>
                            </div>

                            <p class="text-center text-[11px] text-stone-500">
                                No account or advance payment required. Charls will confirm van availability first.
                            </p>
                        </form>

                        {{-- Messenger Feedback Alert Modal/Toast --}}
                        <div id="messenger-modal" class="hidden fixed inset-0 z-50 bg-stone-900/60 backdrop-blur-xs flex items-center justify-center p-4">
                            <div class="bg-white rounded-2xl max-w-md w-full p-6 text-center shadow-2xl border border-stone-200 animate-in fade-in zoom-in duration-200">
                                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.145 2 11.258c0 2.91 1.455 5.514 3.734 7.205V22l3.37-1.85c.915.253 1.888.39 2.896.39 5.523 0 10-4.145 10-9.282C22 6.145 17.523 2 12 2zm1.04 12.51l-2.656-2.833-5.183 2.833 5.7-6.052 2.723 2.833 5.117-2.833-5.701 6.052z"/></svg>
                                </div>
                                <h4 class="text-lg font-bold text-stone-900">Inquiry Details Copied!</h4>
                                <p class="text-stone-600 text-xs sm:text-sm mt-2 leading-relaxed">
                                    Your trip details have been copied to your clipboard. Simply paste them into the chat and send them to Charls on Messenger!
                                </p>

                                <div class="mt-4 p-3 bg-stone-50 rounded-xl border border-stone-200 text-left text-xs text-stone-700 font-mono whitespace-pre-line" id="preview-text"></div>

                                <div class="mt-5 flex flex-col gap-2">
                                    <a 
                                        id="modal-messenger-link" 
                                        href="{{ $van['owner']['messages_url'] }}" 
                                        target="_blank" 
                                        rel="noopener"
                                        class="w-full py-3 px-4 rounded-xl font-bold text-sm text-white bg-blue-600 hover:bg-blue-700 active:scale-[0.98] transition flex items-center justify-center gap-2"
                                    >
                                        <span>Open Messenger Chat</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                    <button 
                                        type="button" 
                                        onclick="closeMessengerModal()" 
                                        class="text-xs font-semibold text-stone-500 hover:text-stone-800 py-1"
                                    >
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
    </main>

    {{-- Minimal Footer --}}
    <footer class="bg-stone-100 border-t border-stone-200 py-8 text-center text-xs text-stone-500">
        <div class="max-w-5xl mx-auto px-4">
            <p class="font-bold text-stone-800 text-sm">Haru The Friendly Van</p>
            <p class="mt-1">Comfortable and reliable single-van rental for your trips across Luzon.</p>
            
            <div class="mt-3 flex items-center justify-center gap-4 text-xs font-semibold text-stone-600">
                <a href="{{ $van['owner']['facebook_url'] }}" target="_blank" rel="noopener" class="hover:text-emerald-700 transition flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.145 2 11.258c0 2.91 1.455 5.514 3.734 7.205V22l3.37-1.85c.915.253 1.888.39 2.896.39 5.523 0 10-4.145 10-9.282C22 6.145 17.523 2 12 2zm1.04 12.51l-2.656-2.833-5.183 2.833 5.7-6.052 2.723 2.833 5.117-2.833-5.701 6.052z"/></svg>
                    <span>Facebook / Messenger</span>
                </a>
                <span class="text-stone-300">•</span>
                <a href="{{ $van['owner']['tiktok_url'] }}" target="_blank" rel="noopener" class="hover:text-emerald-700 transition flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-stone-900" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 00-1-.08A6.34 6.34 0 003 15.66a6.34 6.34 0 0010.86 4.46 6.13 6.13 0 001.92-4.46V8.71a8.31 8.31 0 004.81 1.52V6.78a4.85 4.85 0 01-1-.09z"/></svg>
                    <span>TikTok ({{ $van['owner']['tiktok_handle'] }})</span>
                </a>
            </div>

            <p class="mt-4 text-stone-400">&copy; {{ date('Y') }} Haru The Friendly Van. All rights reserved.</p>
        </div>
    </footer>

    {{-- Mobile Bottom Floating Sticky Action Bar --}}
    <div class="fixed bottom-0 inset-x-0 z-40 bg-white/95 backdrop-blur border-t border-stone-200 p-2.5 sm:hidden shadow-lg">
        <div class="flex items-center gap-2">
            <a href="tel:{{ $van['owner']['phone_tel'] }}" class="flex-1 inline-flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-xl bg-emerald-700 text-white font-bold text-xs shadow-sm active:scale-95 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <span>Call Directly</span>
            </a>
            <a href="{{ $van['owner']['messenger_url'] }}" target="_blank" rel="noopener" class="flex-1 inline-flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-xl bg-blue-600 text-white font-bold text-xs shadow-sm active:scale-95 transition">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.145 2 11.258c0 2.91 1.455 5.514 3.734 7.205V22l3.37-1.85c.915.253 1.888.39 2.896.39 5.523 0 10-4.145 10-9.282C22 6.145 17.523 2 12 2zm1.04 12.51l-2.656-2.833-5.183 2.833 5.7-6.052 2.723 2.833 5.117-2.833-5.701 6.052z"/></svg>
                <span>Messenger</span>
            </a>
            <a href="#inquiry" class="inline-flex items-center justify-center p-2.5 rounded-xl bg-stone-50 text-stone-700 border border-stone-200 text-xs font-semibold active:scale-95 transition" title="Inquiry Form">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </a>
        </div>
    </div>

    {{-- JavaScript for Phone Copy & Messenger Auto-Send --}}
    <script>
        function copyPhoneNumber(number) {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(number).then(() => {
                    showCopyPhoneFeedback();
                }).catch(() => {
                    fallbackCopyPhone(number);
                });
            } else {
                fallbackCopyPhone(number);
            }
        }

        function fallbackCopyPhone(text) {
            const temp = document.createElement('input');
            temp.value = text;
            document.body.appendChild(temp);
            temp.select();
            try {
                document.execCommand('copy');
                showCopyPhoneFeedback();
            } catch (e) {}
            document.body.removeChild(temp);
        }

        function showCopyPhoneFeedback() {
            const btn = document.getElementById('btn-copy-phone');
            const text = document.getElementById('copy-phone-text');
            if (!btn || !text) return;
            const originalText = text.textContent;
            text.textContent = 'Copied!';
            btn.classList.add('bg-emerald-600', 'text-white');
            btn.classList.remove('bg-stone-200/80', 'text-stone-700');
            setTimeout(() => {
                text.textContent = originalText;
                btn.classList.remove('bg-emerald-600', 'text-white');
                btn.classList.add('bg-stone-200/80', 'text-stone-700');
            }, 2000);
        }

        function sendViaMessenger() {
            const form = document.getElementById('inquiry-form');
            const name = document.getElementById('name').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const rentalDate = document.getElementById('rental_date').value;
            const message = document.getElementById('message').value.trim();

            if (!name || !phone || !rentalDate) {
                form.reportValidity();
                return;
            }

            const formattedMessage = [
                'Hello Charls! Trip inquiry for Haru The Friendly Van:',
                '• Name: ' + name,
                '• Contact: ' + phone,
                '• Travel Date: ' + rentalDate,
                '• Details / Destination: ' + (message || 'To be discussed in chat')
            ].join('\n');

            // Save to database in the background so lead is never lost
            fetch('{{ route('inquire.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: name,
                    phone: phone,
                    rental_date: rentalDate,
                    message: message
                })
            }).catch(() => {});

            // Copy to clipboard
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(formattedMessage).catch(() => {});
            }

            // Show feedback modal
            document.getElementById('preview-text').textContent = formattedMessage;
            document.getElementById('messenger-modal').classList.remove('hidden');

            // Open Messenger directly
            const messengerUrl = '{{ $van['owner']['messages_url'] }}';
            window.open(messengerUrl, '_blank');
        }

        function closeMessengerModal() {
            document.getElementById('messenger-modal').classList.add('hidden');
        }
    </script>

</body>
</html>
