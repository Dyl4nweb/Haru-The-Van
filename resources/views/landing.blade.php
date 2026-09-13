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
                    <a href="#contact" class="hover:text-emerald-700 transition">Contact</a>
                </nav>

                <a href="tel:{{ $van['owner']['phone'] }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg text-xs sm:text-sm font-semibold text-emerald-800 bg-emerald-50 border border-emerald-200 hover:bg-emerald-100 transition">
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
                        <a href="tel:{{ $van['owner']['phone'] }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl text-base font-semibold text-stone-800 bg-white border border-stone-300 hover:bg-stone-50 active:scale-[0.98] transition">
                            <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>Call {{ $van['owner']['phone_display'] }}</span>
                        </a>
                    </div>
                </div>

                {{-- Van Photo Visual --}}
                <div class="mt-8 sm:mt-12 max-w-4xl mx-auto">
                    <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl shadow-stone-900/10 border-4 sm:border-8 border-white bg-stone-200">
                        <img 
                            src="{{ asset('images/haru-van.jpg') }}" 
                            alt="Haru The Friendly Van ready for road trips" 
                            class="w-full h-auto object-cover max-h-[480px]"
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
        <section id="about" class="py-12 sm:py-16 bg-stone-50 border-b border-stone-200/80">
            <div class="max-w-4xl mx-auto px-4 sm:px-6">
                
                <div class="bg-white rounded-3xl p-6 sm:p-10 border border-stone-200 shadow-sm flex flex-col md:flex-row gap-6 sm:gap-8 items-center">
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full bg-emerald-100 border-4 border-emerald-50 text-emerald-800 flex items-center justify-center text-3xl font-extrabold shrink-0 shadow-inner">
                        HR
                    </div>
                    
                    <div>
                        <span class="text-xs uppercase tracking-wider text-emerald-700 font-bold">About Our Business</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900 mt-1">
                            Meet Kuya Haru
                        </h2>
                        <p class="mt-3 text-stone-600 text-sm sm:text-base leading-relaxed">
                            Hello! I am Haru Ramos, owner and dedicated driver of <strong>Haru The Friendly Van</strong>. As an independent single-van operator, I personally manage every booking, inspect every tire, and drive every trip with patient, safe, and family-first care.
                        </p>
                        <p class="mt-3 text-stone-600 text-sm sm:text-base leading-relaxed">
                            Unlike big rental platforms with unpredictable vehicles or hired drivers, you get direct communication with me. Whether you are traveling for a family holiday in the mountains, a beach trip with friends, or an early morning airport pickup, you can rest easy knowing you're in safe, courteous hands.
                        </p>

                        <div class="mt-4 flex flex-wrap items-center gap-4 text-xs sm:text-sm text-stone-700 font-medium">
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Punctual Pickup
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Defensive, Safe Driving
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Courteous & Helpful
                            </span>
                        </div>
                    </div>
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
                                <div>
                                    <p class="text-xs text-stone-500 font-medium">Phone Number</p>
                                    <p class="text-sm font-bold text-stone-900">{{ $van['owner']['phone_display'] }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.145 2 11.258c0 2.91 1.455 5.514 3.734 7.205V22l3.37-1.85c.915.253 1.888.39 2.896.39 5.523 0 10-4.145 10-9.282C22 6.145 17.523 2 12 2zm1.04 12.51l-2.656-2.833-5.183 2.833 5.7-6.052 2.723 2.833 5.117-2.833-5.701 6.052z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-stone-500 font-medium">Facebook & Messenger</p>
                                    <a href="{{ $van['owner']['messenger_url'] }}" target="_blank" rel="noopener" class="text-sm font-bold text-emerald-700 hover:underline">
                                        {{ $van['owner']['facebook_name'] }}
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
                            <a href="tel:{{ $van['owner']['phone'] }}" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl font-bold text-sm text-white bg-emerald-700 hover:bg-emerald-800 active:scale-[0.98] shadow-sm transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <span>Call Now</span>
                            </a>
                            <a href="{{ $van['owner']['messenger_url'] }}" target="_blank" rel="noopener" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl font-bold text-sm text-stone-800 bg-white border border-stone-300 hover:bg-stone-50 active:scale-[0.98] transition">
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

                        <form action="{{ route('inquire.store') }}" method="POST" class="mt-5 space-y-4">
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
                                    placeholder="Destination (e.g. Baguio, Tagaytay), estimated passenger count, or special pickup notes..."
                                    class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 bg-white"
                                >{{ old('message') }}</textarea>
                            </div>

                            <button 
                                type="submit" 
                                class="w-full py-3.5 px-6 rounded-xl font-bold text-sm text-white bg-emerald-700 hover:bg-emerald-800 active:scale-[0.99] shadow-md shadow-emerald-700/20 transition"
                            >
                                Send Trip Inquiry
                            </button>
                            <p class="text-center text-[11px] text-stone-500">
                                No advance payment required for inquiries. We will confirm date availability first.
                            </p>
                        </form>
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
            <p class="mt-3 text-stone-400">&copy; {{ date('Y') }} Haru The Friendly Van. All rights reserved.</p>
        </div>
    </footer>

    {{-- Mobile Bottom Floating Sticky Action Bar --}}
    <div class="fixed bottom-0 inset-x-0 z-50 bg-white/95 backdrop-blur border-t border-stone-200 p-2.5 sm:hidden shadow-lg">
        <div class="flex items-center gap-2">
            <a href="tel:{{ $van['owner']['phone'] }}" class="flex-1 inline-flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-xl bg-emerald-700 text-white font-bold text-xs shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <span>Call</span>
            </a>
            <a href="{{ $van['owner']['messenger_url'] }}" target="_blank" rel="noopener" class="flex-1 inline-flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-xl bg-stone-100 text-stone-900 font-bold text-xs border border-stone-300">
                <svg class="w-4 h-4 text-emerald-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.145 2 11.258c0 2.91 1.455 5.514 3.734 7.205V22l3.37-1.85c.915.253 1.888.39 2.896.39 5.523 0 10-4.145 10-9.282C22 6.145 17.523 2 12 2zm1.04 12.51l-2.656-2.833-5.183 2.833 5.7-6.052 2.723 2.833 5.117-2.833-5.701 6.052z"/></svg>
                <span>Message</span>
            </a>
            <a href="#inquiry" class="inline-flex items-center justify-center p-2.5 rounded-xl bg-stone-50 text-stone-700 border border-stone-200 text-xs font-semibold" title="Inquiry Form">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </a>
        </div>
    </div>

</body>
</html>
