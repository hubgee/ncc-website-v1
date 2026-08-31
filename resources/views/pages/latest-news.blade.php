@extends("layouts.app")

@section("title", "Latest News")

@section("content")
				<!--hero section-->
				<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 ">
								<!-- Carousel & Hero Container -->
								<div x-data="{
		    activeSlide: 0,
		    slides: [{
		            tag: 'NEWS',
		            category: 'Headlines',
		            title: 'NCC unveils child commissioners',
		            image: '{{ asset("images/LATEST1.jpg") }}',
		            link: '#'
		        },
		        {
		            tag: 'NEWS',
		            category: 'Headlines',
		            title: 'Strategic Partnership for Community Development',
		            image: '{{ asset("images/LATEST2.jpg") }}',
		            link: '#'
		        },
		        {
		            tag: 'NEWS',
		            category: 'Headlines',
		            title: 'National Child Protection Initiative Launched',
		            image: '{{ asset("images/LATEST3.jpg") }}',
		            link: '#'
		        }
		    ],
		    next() {
		        this.activeSlide = (this.activeSlide + 1) % this.slides.length;
		    },
		    prev() {
		        this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
		    }
		}" class="relative rounded-xl overflow-hidden shadow-md group bg-gray-900 h-105 md:h-125">
												<!-- Slides Loop -->
												<template x-for="(slide, index) in slides" :key="index">
																<div class="absolute inset-0 w-full h-full transition-opacity duration-700"
																				:class="activeSlide === index ? 'opacity-100 z-10' : 'opacity-0 z-0'">
																				<!-- Background Image & Overlay -->
																				<img :src="slide.image" :alt="slide.title"
																								class="absolute inset-0 w-full h-full object-cover z-0" />
																				<div class="absolute inset-0 bg-linear-to-t from-black/80 via-black/30 to-black/20 z-0"></div>

																				<!-- Category Badge - Top Left -->
																				<div class="absolute top-4 left-4 md:top-6 md:left-6 z-20">
																								<div
																												class="inline-flex items-center gap-1.5 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-md text-sm font-semibold text-gray-900 shadow-sm">
																												<span x-text="slide.tag"></span>
																												<span class="text-emerald-600 font-bold">&rarr;</span>
																												<span class="text-emerald-600" x-text="slide.category"></span>
																								</div>
																				</div>

																				<!-- Text Overlay -->
																				<div class="relative z-20 flex flex-col items-center justify-end h-full px-6 pb-16 text-center">
																								<a :href="slide.link"
																												class="inline-flex items-center gap-2 text-white text-2xl md:text-4xl font-extrabold tracking-tight hover:text-gray-200 transition-colors drop-shadow-md">
																												<span x-text="slide.title"></span>
																												<svg class="w-6 h-6 md:w-8 md:h-8 stroke-current" fill="none" viewBox="0 0 24 24"
																																stroke-width="2.5">
																																<path stroke-linecap="round" stroke-linejoin="round"
																																				d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
																												</svg>
																								</a>
																				</div>

																				<!-- Pagination Dots at Bottom -->
																				<div class="absolute bottom-4 left-1/2 -translate-x-1/2 z-20 flex gap-2">
																								<template x-for="(dotslide, dotIndex) in slides" :key="dotIndex">
																												<button @click="activeSlide = dotIndex"
																																:class="activeSlide === dotIndex ? 'w-8 bg-white' : 'w-2.5 bg-white/50 hover:bg-white/80'"
																																class="h-2.5 rounded-full transition-all duration-300 focus:outline-none"
																																:aria-label="'Go to slide ' + (dotIndex + 1)"></button>
																								</template>
																				</div>
																</div>
												</template>

												<!-- Navigation Arrows -->
												<button @click="prev()"
																class="absolute left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-gray-800/70 text-white flex items-center justify-center hover:bg-gray-900/90 transition-colors focus:outline-none shadow-md"
																aria-label="Previous Slide">
																<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
																				<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
																</svg>
												</button>

												<button @click="next()"
																class="absolute right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-gray-800/70 text-white flex items-center justify-center hover:bg-gray-900/90 transition-colors focus:outline-none shadow-md"
																aria-label="Next Slide">
																<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
																				<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
																</svg>
												</button>
								</div>

								<!-- Promotional Call-to-Action Bar -->
								<div class="mt-6 border-t border-b border-gray-200 py-4 px-2">
												<div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
																<div
																				class="flex items-center gap-4 text-gray-900 font-extrabold text-sm sm:text-base tracking-wide uppercase">
																				<span>PARTNER WITH NCC TO INCREASE YOUR REACH AND IMPACT</span>
																				<span class="hidden md:inline-block text-red-500 font-light text-xl">|</span>
																</div>
																<a href="#"
																				class="inline-flex items-center gap-2 border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white font-bold text-sm px-5 py-2.5 rounded-md transition-colors duration-200 tracking-wider whitespace-nowrap uppercase">
																				<span>ADVERTISE WITH NCC</span>
																				<span class="font-black">&gt;</span>
																</a>
												</div>
								</div>
				</section>

				<!-- Top Divider -->
				<div class="flex justify-center my-6">
								<hr class="w-full border-t-3 border-red-600">
				</div>

				<!-- latest news section -->
				<section class="w-full bg-white py-12 px-4 sm:px-6 lg:px-8">

								<div class="max-w-6xl mx-auto" x-data="{ showMoreNews: false, tab: 'child-protection', mobileOpen: false, headingsOnly: false }">
												<!-- Heading -->
												<div class="flex justify-between items-center gap-4">
																<h2 class="text-2xl sm:text-3xl font-bold text-red-700 mb-4">
																				LATEST NEWS
																</h2>
																<div class="flex items-center gap-3">
																				<span class="text-sm font-medium text-gray-700">Headings Only</span>
																				<button @click="headingsOnly = !headingsOnly" role="switch" :aria-checked="headingsOnly"
																								class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2"
																								:class="headingsOnly ? 'bg-red-600' : 'bg-gray-200'">
																								<span class="sr-only">Headings Only</span>
																								<span aria-hidden="true"
																												class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
																												:class="headingsOnly ? 'translate-x-5' : 'translate-x-0'"></span>
																				</button>
																</div>
												</div>

												<!-- Tabbed Filters -->
												<div class="mb-8">
																<!-- Mobile Dropdown -->
																<div class="md:hidden">
																				<button @click="mobileOpen = !mobileOpen"
																								class="w-full flex items-center justify-between bg-white border border-gray-300 rounded-md px-4 py-2 text-gray-700">
																								<span
																												x-text="tab === 'child-protection' ? 'CHILD PROTECTION' : tab === 'education' ? 'EDUCATION' : tab === 'health' ? 'HEALTH' : tab === 'community-events' ? 'COMMUNITY-EVENTS' : tab === 'policy' ? 'POLICY' : 'PARTNERSHIPS'"></span>
																								<i class="fa-solid fa-chevron-down text-xs"></i>
																				</button>
																				<div x-show="mobileOpen" @click.away="mobileOpen = false" x-transition
																								class="mt-2 bg-white border border-gray-200 rounded-md shadow-lg overflow-hidden">
																								<template
																												x-for="option in [
																												{ value: 'child-protection', label: 'CHILD PROTECTION' },
																												{ value: 'education', label: 'EDUCATION' },
																												{ value: 'health', label: 'HEALTH' },
																												{ value: 'community-events', label: 'COMMUNITY-EVENTS' },
																												{ value: 'policy', label: 'POLICY' },
																												{ value: 'partnerships', label: 'PARTNERSHIPS' }
																								]">
																												<button @click="tab = option.value; mobileOpen = false"
																																:class="tab === option.value ? 'bg-red-600 text-white' : 'text-gray-700 hover:bg-gray-50'"
																																class="block w-full text-left px-4 py-3 text-sm font-medium">
																																<span x-text="option.label"></span>
																												</button>
																								</template>
																				</div>
																</div>
																<!-- Desktop Tabs -->
																<div class="hidden md:flex flex-wrap gap-2">
																				<template
																								x-for="option in [
																								{ value: 'child-protection', label: 'CHILD PROTECTION' },
																								{ value: 'education', label: 'EDUCATION' },
																								{ value: 'health', label: 'HEALTH' },
																								{ value: 'community-events', label: 'COMMUNITY-EVENTS' },
																								{ value: 'policy', label: 'POLICY' },
																								{ value: 'partnerships', label: 'PARTNERSHIPS' }
																				]">
																								<button @click="tab = option.value"
																												:class="tab === option.value ? 'bg-red-600 text-white' :
																												    'bg-white text-gray-700 border hover:border-red-600 hover:text-red-600'"
																												class="px-4 py-2 rounded-md font-semibold text-sm transition">
																												<span x-text="option.label"></span>
																								</button>
																				</template>
																</div>
												</div>

												<!-- Grid of Cards -->
												<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6">
																<!-- Card 1 -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/image6.jpg") }}" alt="News 1" class="w-full h-48 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6">
																								<p class="text-sm text-gray-500 mb-2">24 JULY 2026 · ZOMBA</p>
																								<h3 class="text-lg font-bold text-gray-900 mb-3">
																												Chief malemia sentenced to 21 years imprisonment for child defilement.
																								</h3>
																								<p class="text-gray-700 text-sm">
																												The National Children's Commission (NCC) welcomes the sentencing of Traditional Authority
																												Malemia to 21 years' imprisonment.
																								</p>
																				</div>
																</div>

																<!-- Card 2 -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/image3.jpg") }}" alt="News 2" class="w-full h-48 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6">
																								<p class="text-sm text-gray-500 mb-2">25 JUL 2026 · GLOBAL</p>
																								<h3 class="text-lg font-bold text-gray-900 mb-3">
																												NCC and Save the Children Strengthen Collaboration
																								</h3>
																								<p class="text-gray-700 text-sm">
																												Today, Save the Children was honored to host the National Children's Commission of Malawi (NCC),
																												led by Vice Chairperson, Commissioner Benedicto Kondowe.
																								</p>
																				</div>
																</div>

																<!-- Card 3 -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/image4.jpg") }}" alt="News 3" class="w-full h-48 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6">
																								<p class="text-sm text-gray-500 mb-2">05 MAR 2026 · GLOBAL</p>
																								<h3 class="text-lg font-bold text-gray-900 mb-3">
																												Bungwe la NCC lakhazikitsa ndondomeko zopititsa ufulu wa ana patsogolo.
																								</h3>
																								<p class="text-gray-700 text-sm">
																												National Children's Commission lati liyika ndondomeko zabwino zofuna kuonetsetsa kuti ufulu wa
																												ana ukupita patsogolo mdziko muno.
																								</p>
																				</div>
																</div>
												</div>

												<!-- Grid of Cards 2 -->
												<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
																<!-- Card 1 -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/image6.jpg") }}" alt="News 1" class="w-full h-48 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6">
																								<p class="text-sm text-gray-500 mb-2">24 JULY 2026 · ZOMBA</p>
																								<h3 class="text-lg font-bold text-gray-900 mb-3">
																												Chief malemia sentenced to 21 years imprisonment for child defilement.
																								</h3>
																								<p class="text-gray-700 text-sm">
																												The National Children's Commission (NCC) welcomes the sentencing of Traditional Authority
																												Malemia to 21 years' imprisonment.
																								</p>
																				</div>
																</div>

																<!-- Card 2 -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/image3.jpg") }}" alt="News 2" class="w-full h-48 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6">
																								<p class="text-sm text-gray-500 mb-2">25 JUL 2026 · GLOBAL</p>
																								<h3 class="text-lg font-bold text-gray-900 mb-3">
																												NCC and Save the Children Strengthen Collaboration
																								</h3>
																								<p class="text-gray-700 text-sm">
																												Today, Save the Children was honored to host the National Children's Commission of Malawi (NCC),
																												led by Vice Chairperson, Commissioner Benedicto Kondowe.
																								</p>
																				</div>
																</div>

																<!-- Card 3 -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/image4.jpg") }}" alt="News 3" class="w-full h-48 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6">
																								<p class="text-sm text-gray-500 mb-2">05 MAR 2026 · GLOBAL</p>
																								<h3 class="text-lg font-bold text-gray-900 mb-3">
																												Bungwe la NCC lakhazikitsa ndondomeko zopititsa ufulu wa ana patsogolo.
																								</h3>
																								<p class="text-gray-700 text-sm">
																												National Children's Commission lati liyika ndondomeko zabwino zofuna kuonetsetsa kuti ufulu wa
																												ana ukupita patsogolo mdziko muno.
																								</p>
																				</div>
																</div>
												</div>

												<!-- Hidden additional news cards -->
												<div x-show="showMoreNews" class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
																<!-- Card 4 -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/image1.jpg") }}" alt="News 4" class="w-full h-48 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6">
																								<p class="text-sm text-gray-500 mb-2">12 MAY 2026 · LILONGWE</p>
																								<h3 class="text-lg font-bold text-gray-900 mb-3">
																												NCC Commissioners Visit Dedza Border Post to Strengthen Child Protection
																								</h3>
																								<p class="text-gray-700 text-sm">
																												Visited the Dedza Border Post to appreciate the child protection services being offered at the
																												facility.
																								</p>
																				</div>
																</div>

																<!-- Card 5 -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/news1.png") }}" alt="News 5" class="w-full h-48 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6">
																								<p class="text-sm text-gray-500 mb-2">01 AUG 2026 · BLANTYRE</p>
																								<h3 class="text-lg font-bold text-gray-900 mb-3">
																												CHIEF MALEMIA SENTENCED TO 21 YEARS IN PRISON
																								</h3>
																								<p class="text-gray-700 text-sm">
																												The National Children's Commission (NCC) welcomes the sentencing of Traditional Authority
																												Malemia to 21 years' imprisonment.
																								</p>
																				</div>
																</div>

																<!-- Card 6 -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/news2.png") }}" alt="News 6" class="w-full h-48 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6">
																								<p class="text-sm text-gray-500 mb-2">20 JULY 2026 · ZOMBA</p>
																								<h3 class="text-lg font-bold text-gray-900 mb-3">
																												Save the Children was honored to host the National Children's Commission of Malawi (NCC)
																								</h3>
																								<p class="text-gray-700 text-sm">
																												He committed that Save the Children will continue to walk hand-in-hand with the NCC.
																								</p>
																				</div>
																</div>
												</div>

												<!-- Load More Button -->
												<div class="mt-8 text-center" x-show="!showMoreNews">
																<button @click="showMoreNews = true"
																				class="bg-green-700 hover:bg-green-800 text-white px-6 py-2 rounded-md font-semibold transition duration-200">
																				Load More
																</button>
												</div>
												<!-- Show Less Button -->
												<div class="mt-8 text-center" x-show="showMoreNews">
																<button @click="showMoreNews = false"
																				class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-md font-semibold transition duration-200">
																				Show Less
																</button>
												</div>
								</div>
				</section>

				<!-- Sponsored Ads Section -->
				<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" x-data="{
	    activeSlide: 0,
	    totalSlides: 3,
	    perView() {
	        return window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1);
	    },
	    get maxSlide() {
	        return Math.max(0, this.totalSlides - this.perView());
	    },
	    next() {
	        this.activeSlide = this.activeSlide >= this.maxSlide ? 0 : this.activeSlide + 1;
	    },
	    prev() {
	        this.activeSlide = this.activeSlide <= 0 ? this.maxSlide : this.activeSlide - 1;
	    }
	}"
								@resize.window="activeSlide = Math.min(activeSlide, maxSlide)">
								<!-- Header -->
								<div class="flex items-center justify-between mb-6">
												<div class="flex items-center space-x-2">
																<span class="h-2.5 w-2.5 rounded-full bg-orange-500 inline-block animate-pulse"></span>
																<h2 class="text-xs font-bold uppercase tracking-wider text-slate-500">Sponsored Ads</h2>
												</div>
												<a href='#'
																class="text-sm font-medium text-slate-600 hover:text-orange-600 transition-colors flex items-center gap-1">
																View all
																<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
																				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
																</svg>
												</a>
								</div>

								<!-- Ad Slider Container -->
								<div class="overflow-hidden">
												<div class="flex transition-transform duration-300 ease-in-out"
																:style="`transform: translateX(-${activeSlide * (100 / perView())}%)`">
																@php
																				$sponsoredAds = [
																				    [
																				        "title" => "PROPOSAL WRITING SERVICES",
																				        "description" => "We provide proposal writing services across all fields of study.",
																				        "image" => asset("images/ad-promo-1.jfif"),
																				        "is_featured" => true,
																				        "ends_at" => "Aug 31",
																				        "url" => "#"
																				    ],
																				    [
																				        "title" => "HELP SPONSOR OUR CHILD FRIENDLY PROGRAMS...",
																				        "description" => "Help us in reaching out to a lot of young people in Malawi....",
																				        "image" => asset("images/ad-promo-2.jfif"),
																				        "is_featured" => true,
																				        "ends_at" => "Dec 31",
																				        "url" => "#"
																				    ],
																				    [
																				        "title" => "APPLY TO BE THE NEXT CHILD COMMISSIONER",
																				        "description" => "This is your chance to be the change maker that the youth needs.",
																				        "image" => asset("images/ad-promo-3.png"),
																				        "is_featured" => true,
																				        "ends_at" => "Dec 31",
																				        "url" => "#"
																				    ]
																				];
																@endphp

																@foreach ($sponsoredAds as $ad)
																				<div class="w-full md:w-1/2 lg:w-1/3 shrink-0 px-3">
																								<article
																												class="bg-white rounded-xl border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow duration-200 overflow-hidden flex flex-col">
																												<a href="{{ $ad["url"] }}" class="flex group flex-1 p-4 gap-4">
																																<!-- Image Thumbnail -->
																																<div
																																				class="w-24 h-24 sm:w-28 sm:h-28 shrink-0 rounded-lg overflow-hidden bg-slate-100 border border-slate-100">
																																				<img src="{{ $ad["image"] }}" alt="{{ $ad["title"] }}"
																																								class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
																																								loading="lazy"
																																								onerror="this.src='https://via.placeholder.com/150?text=Ad+Image'" />
																																</div>

																																<!-- Details -->
																																<div class="flex-1 flex flex-col justify-between">
																																				<div>
																																								<!-- Badges -->
																																								<div class="flex items-center gap-2 text-xs mb-1.5 flex-wrap">
																																												@if ($ad["is_featured"])
																																																<span
																																																				class="inline-flex items-center gap-1 font-semibold text-amber-600 bg-amber-50 px-2 py-0.5 rounded text-[11px]">
																																																				<svg class="w-3 h-3 fill-amber-500" viewBox="0 0 20 20">
																																																								<path
																																																												d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
																																																				</svg>
																																																				FEATURED
																																																</span>
																																												@endif
																																												<span class="text-slate-400 text-[11px]">Ends {{ $ad["ends_at"] }}</span>
																																								</div>

																																								<!-- Title -->
																																								<h3
																																												class="font-bold text-slate-800 text-sm leading-snug group-hover:text-orange-600 transition-colors line-clamp-2">
																																												{{ $ad["title"] }}
																																								</h3>

																																								<!-- Description -->
																																								<p class="text-xs text-slate-500 mt-1 line-clamp-2">
																																												{{ $ad["description"] }}
																																								</p>
																																				</div>
																																</div>
																												</a>
																								</article>
																				</div>
																@endforeach
												</div>
								</div>

								<!-- Carousel Controls (Left Arrow, Dots, Right Arrow) -->
								<div class="flex items-center justify-center gap-3 mt-6">
												<!-- Previous Button -->
												<button @click="prev()"
																class="w-8 h-8 rounded-full border border-slate-200 bg-white text-slate-400 hover:text-slate-600 hover:border-slate-300 flex items-center justify-center transition-colors shadow-sm focus:outline-none"
																aria-label="Previous slide">
																<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
																				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
																</svg>
												</button>

												<!-- Pagination Dots -->
												<div class="flex items-center gap-1.5">
																<template x-for="i in (totalSlides - perView() + 1)" :key="i">
																				<button @click="activeSlide = i - 1"
																								:class="activeSlide === (i - 1) ? 'w-4 bg-orange-500' : 'w-2 bg-slate-200 hover:bg-slate-300'"
																								class="h-2 rounded-full transition-all duration-200 focus:outline-none"></button>
																</template>
												</div>

												<!-- Next Button -->
												<button @click="next()"
																class="w-8 h-8 rounded-full border border-slate-200 bg-white text-slate-400 hover:text-slate-600 hover:border-slate-300 flex items-center justify-center transition-colors shadow-sm focus:outline-none"
																aria-label="Next slide">
																<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
																				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
																</svg>
												</button>
								</div>
				</section>
				<!-- Featured Health News Section -->
				<section class="w-full bg-white mx-auto px-4 sm:px-6 lg:px-8 py-6">
								<div x-data="{
		    article: {
		        badge: 'FEATURED NEWS',
		        category: 'HEALTHY',
		        title: 'MALAWI REACHES 7.37 MILLION CHILDREN WITH POLIO VACCINATION',
		        image: '{{ asset("images/EBOLA.webp") }}',
		        link: '#',
		        source: 'Ministry of healthy'
		    }
		}"
												class="relative h-112.5 md:h-137.5 max-w-7xl mx-auto rounded-2xl overflow-hidden shadow-lg group bg-gray-900 flex flex-col justify-between p-6 md:p-10">
												<!-- Background Image -->
												<img :src="article.image" :alt="article.title"
																class="absolute inset-0 w-full h-full object-cover z-0 transition-transform duration-500 group-hover:scale-105"
																onerror="this.src='https://via.placeholder.com/1200x600/1e293b/ffffff?text=Featured+Health+News'" />

												<!-- Dark Gradient Overlay for Readability -->
												<div class="absolute inset-0 bg-linear-to-t from-black/85 via-black/30 to-black/20 z-0"></div>

												<!-- Top Left Badge -->
												<div class="relative z-10 self-start">
																<div
																				class="inline-flex items-center gap-2 bg-white/95 backdrop-blur-sm px-4 py-2 rounded-lg text-sm font-black tracking-wider text-gray-900 shadow-md">
																				<span x-text="article.badge"></span>
																				<span class="text-red-600 font-bold">&rarr;</span>
																				<span class="text-red-600 uppercase" x-text="article.category"></span>
																</div>
												</div>

												<!-- Bottom Area: Title Overlay & Source Tag -->
												<div class="relative z-10 w-full flex flex-col md:flex-row md:items-end justify-between gap-6">
																<!-- Headline Link -->
																<div class="max-w-3xl">
																				<a :href="article.link"
																								class="inline-flex items-baseline gap-2 text-white text-2xl sm:text-3xl md:text-4xl font-black uppercase tracking-tight hover:text-gray-200 transition-colors drop-shadow-lg leading-tight">
																								<span x-text="article.title"></span>
																								<svg class="w-6 h-6 md:w-8 md:h-8 stroke-current inline-block shrink-0 self-center" fill="none"
																												viewBox="0 0 24 24" stroke-width="3">
																												<path stroke-linecap="round" stroke-linejoin="round"
																																d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
																								</svg>
																				</a>
																</div>

																<!-- Bottom Right Source Attribution Badge -->
																<div class="self-end shrink-0">
																				<div
																								class="inline-flex items-center gap-2 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-md text-xs font-semibold text-gray-800 shadow-md">
																								<span class="text-red-600 font-bold">&amp;</span>
																								<span class="uppercase tracking-wider">SOURCE :</span>
																								<span class="text-gray-600 capitalize" x-text="article.source"></span>
																				</div>
																</div>
												</div>
								</div>
				</section>

@endsection
