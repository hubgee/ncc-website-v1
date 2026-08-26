@extends("layouts.app")

@section("title", "What We Do")

@section("content")
				<section class="px-6 md:px-12 bg-white" x-data="{ tab: 'protection' }">
								<div class="mx-auto grid max-w-8xl grid-cols-1 gap-8">

												<!-- Left: Hero Image with overlay + centered text -->
												<div class="relative h-64 overflow-hidden rounded-lg shadow-md sm:h-80">
																<img src="{{ asset("images/what-we-do-banner.png") }}" alt="Children smiling"
																				class="w-full h-full object-cover animate-pulse">
																<!-- Overlay -->
																<div class="absolute inset-0 bg-black/50"></div>
																<!-- Centered Text -->
																<div class="absolute inset-0 z-10 flex flex-col items-center justify-center text-center px-6">
																				<h1 class="text-3xl md:text-4xl font-bold text-white mb-4">WHAT WE DO</h1>
																				<p class="text-lg md:text-xl text-gray-100 mb-8">
																								Every child deserves to feel safe, heard and protected!
																				</p>

																				<!-- Statistics inside hero -->
																				<div class="grid grid-cols-2 md:grid-cols-4 gap-15 text-center">
																								<div>
																												<h3 class="text-2xl font-bold text-white">1,249+</h3>
																												<p class="text-gray-100">Children Supported</p>
																								</div>
																								<div>
																												<h3 class="text-2xl font-bold text-white">2,000+</h3>
																												<p class="text-gray-100">Families Reached</p>
																								</div>
																								<div>
																												<h3 class="text-2xl font-bold text-white">6,000+</h3>
																												<p class="text-gray-100">Community Members</p>
																								</div>
																								<div>
																												<h3 class="text-2xl font-bold text-white">28</h3>
																												<p class="text-gray-100">Districts Covered</p>
																								</div>
																				</div>
																</div>
												</div>

												<!-- Right: Our Services Tabs
																																																																																																																																																																																																								<div class="flex flex-col justify-center gap-4 lg:h-80">
																																																																																																																																																																																																												<h2 class="text-2xl md:text-2xl font-semibold text-green-700 mb-2">Our Services</h2>
																																																																																																																																																																																																												<!-- Tabs
																																																																																																																																																																																																												<div class="flex flex-wrap gap-4 mb-8">
																																																																																																																																																																																																																<button @click="tab = 'protection'"
																																																																																																																																																																																																																				:class="tab === 'protection'
																																																																																																																																																																																																																				    ?
																																																																																																																																																																																																																				    'bg-red-600 text-white' :
																																																																																																																																																																																																																				    'bg-white text-gray-700 border'"
																																																																																																																																																																																																																				class="px-2 py-1 rounded-md font-semibold">Child Protection</button>
																																																																																																																																																																																																																<button @click="tab = 'advocacy'"
																																																																																																																																																																																																																				:class="tab === 'advocacy'
																																																																																																																																																																																																																				    ?
																																																																																																																																																																																																																				    'bg-red-600 text-white' :
																																																																																																																																																																																																																				    'bg-white text-gray-700 border'"
																																																																																																																																																																																																																				class="px-2 py-1 rounded-md font-semibold">Advocacy & Policy</button>
																																																																																																																																																																																																																<button @click="tab = 'awareness'"
																																																																																																																																																																																																																				:class="tab === 'awareness'
																																																																																																																																																																																																																				    ?
																																																																																																																																																																																																																				    'bg-red-600 text-white' :
																																																																																																																																																																																																																				    'bg-white text-gray-700 border'"
																																																																																																																																																																																																																				class="px-2 py-1 rounded-md font-semibold">Awareness</button>
																																																																																																																																																																																																																<button @click="tab = 'capacity'"
																																																																																																																																																																																																																				:class="tab === 'capacity'
																																																																																																																																																																																																																				    ?
																																																																																																																																																																																																																				    'bg-red-600 text-white' :
																																																																																																																																																																																																																				    'bg-white text-gray-700 border'"
																																																																																																																																																																																																																				class="px-2 py-1 rounded-md font-semibold">Capacity Building</button>
																																																																																																																																																																																																																<button @click="tab = 'referral'"
																																																																																																																																																																																																																				:class="tab === 'referral'
																																																																																																																																																																																																																				    ?
																																																																																																																																																																																																																				    'bg-red-600 text-white' :
																																																																																																																																																																																																																				    'bg-white text-gray-700 border'"
																																																																																																																																																																																																																				class="px-2 py-1 rounded-md font-semibold">Referral & Support</button>
																																																																																																																																																																																																																<button @click="tab = 'research'"
																																																																																																																																																																																																																				:class="tab === 'research'
																																																																																																																																																																																																																				    ?
																																																																																																																																																																																																																				    'bg-red-600 text-white' :
																																																																																																																																																																																																																				    'bg-white text-gray-700 border'"
																																																																																																																																																																																																																				class="px-2 py-1 rounded-md font-semibold">Research</button>
																																																																																																																																																																																																												</div>

																																																																																																																																																																																																												<!-- Tab Content
																																																																																																																																																																																																<div class="rounded-lg bg-white p-6 shadow-md">
																																																																																																																																																																																																				<!-- Child Protection
																																																																																																																																																																																																																<div x-show="tab === 'protection'" class="flex items-start gap-4">
																																																																																																																																																																																																																				<i class="fa-solid fa-shield-halved text-green-600 text-4xl"></i>
																																																																																																																																																																																																																				<div>
																																																																																																																																																																																																																								<h3 class="font-bold text-xl text-gray-800 mb-2">Child Protection</h3>
																																																																																																																																																																																																																								<p class="text-gray-700 mb-4">
																																																																																																																																																																																																																												Monitoring and preventing abuse, neglect, and exploitation of children.
																																																																																																																																																																																																																												Investigating cases of child maltreatment. Promoting child-safe environments in communities,
																																																																																																																																																																																																																												schools, and institutions.
																																																																																																																																																																																																																								</p>
																																																																																																																																																																																																																								<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																																																				</div>
																																																																																																																																																																																																																</div>
																																																																																																																																																																																																																<!-- Advocacy & Policy
																																																																																																																																																																																																																<div x-show="tab === 'advocacy'" class="flex items-start gap-4">
																																																																																																																																																																																																																				<i class="fa-solid fa-gavel text-green-600 text-4xl"></i>
																																																																																																																																																																																																																				<div>
																																																																																																																																																																																																																								<h3 class="font-bold text-xl text-gray-800 mb-2">Advocacy & Policy</h3>
																																																																																																																																																																																																																								<p class="text-gray-700 mb-4">
																																																																																																																																																																																																																												Placeholder: influencing laws and policies to strengthen child rights.
																																																																																																																																																																																																																												Working with government and stakeholders for systemic change.
																																																																																																																																																																																																																								</p>
																																																																																																																																																																																																																								<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																																																				</div>
																																																																																																																																																																																																																</div>

																																																																																																																																																																																																																<!-- Awareness
																																																																																																																																																																																																																<div x-show="tab === 'awareness'" class="flex items-start gap-4">
																																																																																																																																																																																																																				<i class="fa-solid fa-bullhorn text-green-600 text-4xl"></i>
																																																																																																																																																																																																																				<div>
																																																																																																																																																																																																																								<h3 class="font-bold text-xl text-gray-800 mb-2">Awareness</h3>
																																																																																																																																																																																																																								<p class="text-gray-700 mb-4">
																																																																																																																																																																																																																												Placeholder: raising awareness through campaigns, workshops, and community outreach.
																																																																																																																																																																																																																												Empowering children and families with knowledge of their rights.
																																																																																																																																																																																																																								</p>
																																																																																																																																																																																																																								<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																																																				</div>
																																																																																																																																																																																																																</div>

																																																																																																																																																																																																																<!-- Capacity Building
																																																																																																																																																																																																																<div x-show="tab === 'capacity'" class="flex items-start gap-4">
																																																																																																																																																																																																																				<i class="fa-solid fa-users text-green-600 text-4xl"></i>
																																																																																																																																																																																																																				<div>
																																																																																																																																																																																																																								<h3 class="font-bold text-xl text-gray-800 mb-2">Capacity Building</h3>
																																																																																																																																																																																																																								<p class="text-gray-700 mb-4">
																																																																																																																																																																																																																												Placeholder: training professionals, institutions, and communities.
																																																																																																																																																																																																																												Strengthening skills and resources for effective child protection.
																																																																																																																																																																																																																								</p>
																																																																																																																																																																																																																								<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																																																				</div>
																																																																																																																																																																																																																</div>

																																																																																																																																																																																																																<!-- Referral & Support
																																																																																																																																																																																																																<div x-show="tab === 'referral'" class="flex items-start gap-4">
																																																																																																																																																																																																																				<i class="fa-solid fa-hands-helping text-green-600 text-4xl"></i>
																																																																																																																																																																																																																				<div>
																																																																																																																																																																																																																								<h3 class="font-bold text-xl text-gray-800 mb-2">Referral & Support</h3>
																																																																																																																																																																																																																								<p class="text-gray-700 mb-4">
																																																																																																																																																																																																																												Placeholder: connecting children and families to support services.
																																																																																																																																																																																																																												Providing pathways for counseling, healthcare, and legal aid.
																																																																																																																																																																																																																								</p>
																																																																																																																																																																																																																								<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																																																				</div>
																																																																																																																																																																																																																</div>

																																																																																																																																																																																																																<!-- Research
																																																																																																																																																																																																																<div x-show="tab === 'research'" class="flex items-start gap-4">
																																																																																																																																																																																																																				<i class="fa-solid fa-flask text-green-600 text-4xl"></i>
																																																																																																																																																																																																																				<div>
																																																																																																																																																																																																																								<h3 class="font-bold text-xl text-gray-800 mb-2">Research</h3>
																																																																																																																																																																																																																								<p class="text-gray-700 mb-4">
																																																																																																																																																																																																																												Placeholder: conducting studies to inform evidence-based strategies.
																																																																																																																																																																																																																												Gathering data to improve child protection programs.
																																																																																																																																																																																																																								</p>
																																																																																																																																																																																																																								<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																																																				</div>
																																																																																																																																																																																																																			-->
				</section>

				<!-- Partnership Section -->
				<section class="w-full bg-white py-12 px-4 sm:px-6 lg:px-8">
								<div class="max-w-6xl mx-auto text-left">

												<!-- Heading -->
												<h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">
																WE WORK TOGETHER WITH OUR PARTNERS, AND CHILDREN AND THEIR COMMUNITIES, TO TRANSFORM LIVES
												</h2>

												<!-- Description -->
												<p class="text-gray-700 leading-relaxed mb-4">
																We go to remote corners, villages, and cities where it's really tough to be a child.
																We ask children, their families, and communities what children need to be healthy, safe, and learning.
																We listen to their experiences, insights, and ideas.
												</p>
												<p class="text-gray-700 leading-relaxed mb-8">
																Together, we work hand in hand to adapt and create new solutions for children facing crisis, now and in the
																future.
												</p>

												<!-- Donate Button -->
												<div class="text-center">
																<a href="#donate-form"
																				class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-lg shadow transition duration-300 ease-in-out">
																				<!-- Font Awesome Heart Icon -->
																				<i class="fa-solid fa-heart mr-2"></i>
																				DONATE NOW TO SUPPORT OUR WORK
																</a>
												</div>

								</div>

								<!-- Red Line Divider -->
								<hr class="max-w-full border-t-4 border-red-600 my-10">
				</section>
				<!-- Thematic Cards Section -->
				<section class="w-full bg-white py-12 px-4 sm:px-6 lg:px-8">
								<h2 class="text-2xl md:text-2xl text-center font-bold text-black mb-6">OUR PROGRAMS</h2>
								<div class="max-w-6xl mx-auto">

												<!-- Grid of Cards -->
												<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

																<!-- Card 1: Health -->
																<div class="relative rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/vaccine.jpg") }}" alt="Health" class="w-full h-75 object-cover">
																				<h3
																								class="absolute bottom-4 left-4 bg-white text-gray-900 px-4 py-2 rounded-md font-bold text-sm shadow-md">
																								ADVOCACY & POLICY</h3>
																</div>

																<!-- Card 2: Education -->
																<div class="relative rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/update-1.jpg") }}" alt="Education" class="w-full h-75 object-cover">
																				<h3
																								class="absolute bottom-4 left-4 bg-white text-gray-900 px-4 py-2 rounded-md font-bold text-sm shadow-md">
																								AWARENESS</h3>
																</div>

																<!-- Card 3: Protection -->
																<div class="relative rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/NCCkids.jpg") }}" alt="Protection" class="w-full h-75 object-cover">
																				<h3
																								class="absolute bottom-4 left-4 bg-white text-gray-900 px-4 py-2 rounded-md font-bold text-sm shadow-md">
																								PROTECTION</h3>
																</div>

																<!-- Card 4: Resilience -->
																<div class="relative rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/covered.jpg") }}" alt="Resilience" class="w-full h-75 object-cover">
																				<h3
																								class="absolute bottom-4 left-4 bg-white text-gray-900 px-4 py-2 rounded-md font-bold text-sm shadow-md">
																								REFERRAL & SUPPORT</h3>
																</div>

																<!-- Card 5: Emergencies -->
																<div class="relative rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/image4.jpg") }}" alt="Emergencies" class="w-full h-75 object-cover">
																				<h3
																								class="absolute bottom-4 left-4 bg-white text-gray-900 px-4 py-2 rounded-md font-bold text-sm shadow-md">
																								CAPACITY BUILDING</h3>
																</div>

																<!-- Card 6: Our Impact -->
																<div class="relative rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																				<img src="{{ asset("images/mission.jpg") }}" alt="Our Impact" class="w-full h-75 object-cover">
																				<h3
																								class="absolute bottom-4 left-4 bg-white text-gray-900 px-4 py-2 rounded-md font-bold text-sm shadow-md">
																								RESEARCH</h3>
																</div>

												</div>
								</div>

								<!-- Our Child, Our Responsibility Section -->
								<div class="mt-10 max-w-6xl mx-auto text-left">
												<!-- Red Line Divider -->
												<hr class="w-10 border-t-4 border-red-600 my-6">
												<!-- Heading -->
												<h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">
																OUR CHILD, OUR RESPONSIBILITY
												</h2>

												<!-- Description -->
												<p class="text-gray-700 leading-relaxed mb-4">
																We go to remote corners, villages, and cities where it's really tough to be a child.
																We ask children, their families, and communities what children need to be healthy, safe, and learning.
																We listen to their experiences, insights, and ideas.
												</p>
												<p class="text-gray-700 leading-relaxed mb-8">
																Together, we work hand in hand to adapt and create new solutions for children facing crisis, now and in the
																future.
												</p>

								</div>
								<!-- Red Line Divider -->
								<hr class="max-w-full border-t-4 border-red-600 my-10">
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

				<!-- Statistics Section -->
				<section class="bg-white py-12 px-6 md:px-12">
								<div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
												<div>
																<h3 class="text-2xl font-bold text-red-600">1,249</h3>
																<p>Children Supported</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-red-600">2,000+</h3>
																<p>Families Reached</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-red-600">6,000</h3>
																<p>Community Members</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-red-600">28</h3>
																<p>Districts Covered</p>
												</div>
								</div>
				</section>

				<!-- Action Buttons Section -->
				<section class="bg-white py-12 px-6 md:px-12">
								<div class="flex flex-col md:flex-row justify-center gap-100">
												<!-- Child Rights Corner Button -->
												<a href="{{ route("childrens-corner") }}"
																class="flex items-center justify-center border border-gray-300 px-6 py-3 rounded-lg font-bold uppercase text-gray-800 hover:text-green-700 hover:border-green-700">
																<i class="fa-solid fa-child mr-2 text-red-600"></i>
																CHILD RIGHTS CORNER
												</a>

												<!-- Report a Case Button -->
												<a href="{{ route("reporting") }}"
																class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-bold uppercase text-center">
																REPORT A CASE NOW
												</a>
								</div>
				</section>
@endsection
