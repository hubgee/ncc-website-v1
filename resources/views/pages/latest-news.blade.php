@extends("layouts.app")

@section("title", "Latest News")

@section("content")
				<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
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
		}" class="relative rounded-xl overflow-hidden shadow-md group bg-gray-900">
												<!-- Slides Loop -->
												<template x-for="(slide, index) in slides" :key="index">
																<div x-show="activeSlide === index" x-transition:enter="transition ease-out duration-500 opacity-0 scale-95"
																				x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
																				x-transition:leave="transition ease-in duration-300 opacity-100 scale-100"
																				x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
																				class="relative h-105 md:h-125 w-full flex flex-col justify-between p-6 md:p-10">
																				<!-- Background Image & Overlay -->
																				<img :src="slide.image" :alt="slide.title"
																								class="absolute inset-0 w-full h-full object-cover z-0"
																								onerror="this.src='https://via.placeholder.com/1200x600/334155/ffffff?text=Placeholder+Image'" />
																				<div class="absolute inset-0 bg-linear-to-t from-black/80 via-black/30 to-black/20 z-0"></div>

																				<!-- Top Left Badge -->
																				<div class="relative z-10 self-start">
																								<div
																												class="inline-flex items-center gap-1.5 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-md text-sm font-semibold text-gray-900 shadow-sm">
																												<span x-text="slide.tag"></span>
																												<span class="text-emerald-600 font-bold">&rarr;</span>
																												<span class="text-emerald-600" x-text="slide.category"></span>
																								</div>
																				</div>

																				<!-- Headline Link Overlay -->
																				<div class="relative z-10 text-center my-auto px-4 max-w-4xl mx-auto">
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

																				<!-- Bottom Pagination Dots -->
																				<div class="relative z-10 flex justify-center items-center gap-2 pb-2">
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
																class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-gray-800/70 text-white flex items-center justify-center hover:bg-gray-900/90 transition-colors focus:outline-none shadow-md"
																aria-label="Previous Slide">
																<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
																				<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
																</svg>
												</button>

												<button @click="next()"
																class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-gray-800/70 text-white flex items-center justify-center hover:bg-gray-900/90 transition-colors focus:outline-none shadow-md"
																aria-label="Next Slide">
																<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
																				<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
																</svg>
												</button>
								</div>

								<!-- Promotional Call-to-Action Bar -->
								<div class="mt-6 border-t border-b border-gray-200 py-4 px-2">
												<div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
																<!-- Left Text Statement -->
																<div
																				class="flex items-center gap-4 text-gray-900 font-extrabold text-sm sm:text-base tracking-wide uppercase">
																				<span>PARTNER WITH NCC TO INCREASE YOUR REACH AND IMPACT</span>
																				<span class="hidden md:inline-block text-red-500 font-light text-xl">|</span>
																</div>

																<!-- Right CTA Button -->
																<a href="#"
																				class="inline-flex items-center gap-2 border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white font-bold text-sm px-5 py-2.5 rounded-md transition-colors duration-200 tracking-wider whitespace-nowrap uppercase">
																				<span>ADVERTISE WITH NCC</span>
																				<span class="font-black">&gt;</span>
																</a>
												</div>
								</div>
				</section>
@endsection
