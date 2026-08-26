@extends("layouts.app")

@section("title", "Advertise")

@section("content")
				<style>
								html {
												scroll-behavior: smooth;
								}
				</style>

				<!-- Advertise Hero Banner -->
				<section class="relative w-full h-[70vh] bg-cover bg-center"
								style="background-image: url('{{ asset("images/BannerImage.png") }}');">
								<!-- Overlay -->
								<div class="bg-black/50 absolute inset-0 z-10 animate-pulse"></div>

								<!-- Content -->
								<div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-6">
												<h3 class="text-sm uppercase tracking-widest mb-2 font-bold">Partner & Advertise with NCC</h3>
												<h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-8">
																Align Your Brand with <span class="text-yellow-400">Child Protection & Social Impact in Malawi</span>
												</h1>
												<p class="max-w-2xl text-lg mb-14">
																Reach communities across Malawi while supporting the rights and welfare of children.
												</p>

												<!-- Stats -->
												<div class="flex flex-col sm:flex-row justify-center gap-15 mb-20">
																<div class="flex flex-col items-center">
																				<i class="fas fa-map-marker-alt text-yellow-400 text-2xl mb-1"></i>
																				<p class="font-semibold">28 Districts Reached</p>
																</div>
																<div class="flex flex-col items-center">
																				<i class="fas fa-users text-yellow-400 text-2xl mb-1"></i>
																				<p class="font-semibold">2,000+ Families Supported</p>
																</div>
																<div class="flex flex-col items-center">
																				<i class="fas fa-hand-holding-heart text-yellow-400 text-2xl mb-1"></i>
																				<p class="font-semibold">6,000+ Community Members</p>
																</div>
												</div>

												<!-- CTA Button -->
												<a href="#inquiry-form"
																class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow transition">
																Start Your Partnership
												</a>
								</div>
				</section>

				<!-- Why Partner With NCC Section -->
				<section class="w-full bg-white py-16 px-6 md:px-12">
								<div class="max-w-6xl mx-auto text-center">
												<h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-6">
																Why Partner With the National Children's Commission?
												</h2>
												<p class="text-gray-700 max-w-3xl mx-auto mb-12">
																Partnering with NCC means aligning your brand with a mission that protects and empowers children across
																Malawi.
																Together, we create sustainable change through education, advocacy, and community engagement.
												</p>

												<!-- Impact Cards -->
												<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
																<div class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition">
																				<i class="fas fa-hand-holding-heart text-green-600 text-3xl mb-4"></i>
																				<h3 class="text-xl font-semibold text-gray-800 mb-2">Social Impact</h3>
																				<p class="text-gray-600">
																								Your sponsorship directly supports programs that improve child welfare and community resilience.
																				</p>
																</div>

																<div class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition">
																				<i class="fas fa-users text-green-600 text-3xl mb-4"></i>
																				<h3 class="text-xl font-semibold text-gray-800 mb-2">Community Reach</h3>
																				<p class="text-gray-600">
																								NCC’s initiatives span 28 districts, connecting your brand with thousands of families and local
																								leaders.
																				</p>
																</div>

																<div class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition">
																				<i class="fas fa-shield-alt text-green-600 text-3xl mb-4"></i>
																				<h3 class="text-xl font-semibold text-gray-800 mb-2">Trusted Partnership</h3>
																				<p class="text-gray-600">
																								We uphold strict ethical standards and transparency, ensuring every collaboration reflects shared
																								values.
																				</p>
																</div>
												</div>
								</div>
				</section>
				<!-- Bottom Divider -->
				<div class="flex justify-center my-6">
								<hr class="w-full border-t-2 border-green-600">
				</div><!-- Ad Placements & Formats Section -->
				<section class="w-full bg-white py-16 px-6 md:px-12">
								<div class="max-w-6xl mx-auto text-center">
												<h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-6">
																Sponsorship Opportunities
												</h2>
												<p class="text-gray-700 max-w-3xl mx-auto mb-12">
																Choose from a range of advertising formats designed to maximize your brand’s visibility while supporting
																child protection initiatives.
												</p>

												<!-- Sponsorship Cards -->
												<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

																<!-- Digital Display -->
																<div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
																				<i class="fas fa-desktop text-green-600 text-3xl mb-4"></i>
																				<h3 class="text-xl font-semibold text-gray-800 mb-2">Digital Display</h3>
																				<p class="text-gray-600">
																								Place your brand on select NCC news and article pages with banner ads that reach engaged readers.
																				</p>
																</div>

																<!-- Newsletter Sponsorship -->
																<div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
																				<i class="fas fa-envelope text-green-600 text-3xl mb-4"></i>
																				<h3 class="text-xl font-semibold text-gray-800 mb-2">Newsletter Sponsorship</h3>
																				<p class="text-gray-600">
																								Feature your brand in our monthly stakeholder emails sent to partners, families, and community
																								leaders.
																				</p>
																</div>

																<!-- Event & Campaign Sponsorship -->
																<div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
																				<i class="fas fa-users text-green-600 text-3xl mb-4"></i>
																				<h3 class="text-xl font-semibold text-gray-800 mb-2">Event & Campaign Sponsorship</h3>
																				<p class="text-gray-600">
																								Gain visibility during major events such as the Day of the African Child and Day of Families.
																				</p>
																</div>

												</div>
								</div>
				</section>
				<!-- Ethical & Safeguarding Guidelines Section -->
				<section class="w-full bg-red-50 py-16 px-6 md:px-12" id="ethical-guidelines">
								<div class="max-w-5xl mx-auto">

												<!-- Heading -->
												<h2 class="text-3xl md:text-4xl font-bold text-red-700 mb-6 text-center">
																Ethical & Safeguarding Guidelines
												</h2>

												<!-- Intro -->
												<p class="text-gray-700 text-center max-w-3xl mx-auto mb-10">
																NCC is committed to protecting children and ensuring that all advertising partnerships align with our values
																of safety, education, and empowerment.
												</p>

												<!-- Guidelines List -->
												<div class="bg-white rounded-lg shadow p-8 border-l-4 border-red-600">
																<ul class="space-y-4 text-gray-800 text-lg">
																				<li class="flex items-start">
																								<i class="fas fa-ban text-red-600 text-xl mr-3"></i>
																								Prohibited ads: alcohol, tobacco, gambling, unhealthy foods, or any product harmful to children.
																				</li>
																				<li class="flex items-start">
																								<i class="fas fa-check-circle text-green-600 text-xl mr-3"></i>
																								All ads undergo NCC board review prior to publication.
																				</li>
																				<li class="flex items-start">
																								<i class="fas fa-shield-alt text-green-600 text-xl mr-3"></i>
																								Advertisers must comply with strict safeguarding standards and ethical criteria.
																				</li>
																				<li class="flex items-start">
																								<i class="fas fa-heart text-green-600 text-xl mr-3"></i>
																								We welcome brands that share our mission of protecting and empowering children.
																				</li>
																</ul>
												</div>
								</div>
				</section>

				<!-- Inquiry / Application Form Section -->
				<section id="inquiry-form" class="w-full bg-gray-100 py-16 px-6 md:px-12">
								<div class="max-w-4xl mx-auto">

												<!-- Heading -->
												<h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-6 text-center">
																Submit Your Advertising Inquiry
												</h2>
												<p class="text-gray-700 text-center max-w-2xl mx-auto mb-10">
																Complete the form below to apply for partnership. All submissions are reviewed by the NCC board to ensure
																compliance with our safeguarding standards.
												</p>

												<!-- Form -->
												<form action="#" method="POST" enctype="multipart/form-data"
																class="bg-white rounded-lg shadow p-8 space-y-6">

																<!-- Company Name -->
																<div>
																				<label for="company" class="block text-gray-700 font-semibold mb-2">Company / Organization Name</label>
																				<input type="text" id="company" name="company" required
																								class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
																</div>

																<!-- Industry -->
																<div>
																				<label for="industry" class="block text-gray-700 font-semibold mb-2">Industry / Sector</label>
																				<input type="text" id="industry" name="industry" required
																								class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
																</div>

																<!-- Campaign Objectives -->
																<div>
																				<label for="objectives" class="block text-gray-700 font-semibold mb-2">Campaign Objectives</label>
																				<textarea id="objectives" name="objectives" rows="4" required
																				    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"></textarea>
																</div>

																<!-- Target Start Date -->
																<div>
																				<label for="start_date" class="block text-gray-700 font-semibold mb-2">Target Start Date</label>
																				<input type="date" id="start_date" name="start_date" required
																								class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
																</div>

																<!-- Budget Scope -->
																<div>
																				<label for="budget" class="block text-gray-700 font-semibold mb-2">Budget Scope</label>
																				<input type="text" id="budget" name="budget"
																								class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
																</div>

																<!-- File Upload -->
																<div>
																				<label for="artwork" class="block text-gray-700 font-semibold mb-2">Upload Proposed Ad
																								Artwork</label>
																				<input type="file" id="artwork" name="artwork"
																								class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
																</div>

																<!-- Agreement Checkbox -->
																<div class="flex items-center">
																				<input type="checkbox" id="agreement" name="agreement" required
																								class="h-5 w-5 text-green-600 border-gray-300 rounded focus:ring-green-600">
																				<label for="agreement" class="ml-3 text-gray-700">
																								I confirm my campaign complies with NCC’s safeguarding guidelines.
																				</label>
																				<a href="#ethical-guidelines" class="ml-auto text-green-600 hover:text-green-700 underline pl-4">View
																								Guidelines</a>
																</div>

																<!-- Submit Button -->
																<div class="text-center">
																				<button type="submit"
																								class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
																								Submit Inquiry
																				</button>
																</div>
												</form>
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

@endsection
