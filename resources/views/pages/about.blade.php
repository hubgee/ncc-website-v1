@extends("layouts.app")

@section("title", "About Us")

@section("content")
				<section class="relative overflow-hidden py-12 px-6 md:px-12 min-h-128" x-data="{
	    tab: 'mandate',
	    backgrounds: {
	        mandate: '{{ asset("images/about-mandate.jpg") }}',
	        mission: '{{ asset("images/about-mission.jpg") }}',
	        vision: '{{ asset("images/about-vision.jpg") }}'
	    },
	    cycleInterval: null,
	    startCycle() {
	        this.cycleInterval = setInterval(() => {
	            this.tab = this.tab === 'mandate' ? 'mission' : this.tab === 'mission' ? 'vision' : 'mandate'
	        }, 8000)
	    },
	    stopCycle() {
	        clearInterval(this.cycleInterval)
	        this.cycleInterval = null
	    }
	}" x-init="startCycle()"
								@mouseenter="stopCycle()" @mouseleave="startCycle()">
								<div class="absolute inset-0">
												<template x-for="(image, key) in backgrounds" :key="key">
																<div x-show="tab === key" x-cloak x-transition:enter="transition-opacity duration-1000"
																				x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
																				x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100"
																				x-transition:leave-end="opacity-0" class="absolute inset-0 z-0 bg-cover bg-center bg-no-repeat"
																				:style="'background-image: url(' + image + ')'"></div>
												</template>
												<div class="absolute inset-0 z-10 bg-green-900/50"></div>
								</div>

								<div class="relative max-w-7xl mx-auto z-20">
												<div class="bg-white/90 border border-slate-200 rounded-2xl shadow-sm p-8 backdrop-blur-sm">
																<div class="flex flex-wrap items-center justify-center gap-4 border-b border-slate-200 pb-6 mb-8">
																				<button @click="tab = 'mandate'"
																								:class="tab === 'mandate' ? 'border-b-4 border-green-600 text-green-700' : 'text-gray-600'"
																								class="px-4 py-3 font-semibold transition duration-200">
																								Our Mandate
																				</button>
																				<button @click="tab = 'mission'"
																								:class="tab === 'mission' ? 'border-b-4 border-green-600 text-green-700' : 'text-gray-600'"
																								class="px-4 py-3 font-semibold transition duration-200">
																								Our Mission
																				</button>
																				<button @click="tab = 'vision'"
																								:class="tab === 'vision' ? 'border-b-4 border-green-600 text-green-700' : 'text-gray-600'"
																								class="px-4 py-3 font-semibold transition duration-200">
																								Our Vision
																				</button>
																</div>

																<div class="space-y-6">
																				<div x-show="tab === 'mandate'" class="grid grid-cols-1 gap-8" x-cloak>
																								<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
																												<div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
																																<i class="fa-solid fa-shield-halved text-green-600 text-3xl mb-4"></i>
																																<h3 class="font-bold text-lg mb-2">Protection</h3>
																																<p class="text-gray-600 text-sm">Safeguarding children from abuse and exploitation.</p>
																												</div>
																												<div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
																																<i class="fa-solid fa-scale-balanced text-green-600 text-3xl mb-4"></i>
																																<h3 class="font-bold text-lg mb-2">Policy & Law</h3>
																																<p class="text-gray-600 text-sm">Monitoring child rights laws and conventions.</p>
																												</div>
																												<div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
																																<i class="fa-solid fa-bullhorn text-green-600 text-3xl mb-4"></i>
																																<h3 class="font-bold text-lg mb-2">Advocacy</h3>
																																<p class="text-gray-600 text-sm">Amplifying children’s voices in society.</p>
																												</div>
																								</div>
																								<div class="bg-slate-50 rounded-3xl p-8 shadow-sm">
																												<h2 class="text-xl font-bold text-green-700 mb-4">What the Commission is Mandated to Do</h2>
																												<p class="text-gray-700 mb-6">
																																The Commission was established under the Child Care, Protection and Justice Act to serve as
																																the independent authority for promoting and protecting children’s rights across all 28
																																districts.
																																We collaborate with government ministries, civil society, and communities to ensure every
																																child in Malawi grows up safe and able to reach their full potential.
																												</p>
																												<div class="flex flex-wrap gap-3">
																																<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Child
																																				Protection</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Rights
																																				Monitoring</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Community
																																				Engagement</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Education
																																				Access</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Policy
																																				Reform</span>
																												</div>
																								</div>
																				</div>

																				<div x-show="tab === 'mission'" class="grid grid-cols-1 gap-8" x-cloak>
																								<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
																												<div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
																																<i class="fa-solid fa-shield-halved text-green-600 text-3xl mb-4"></i>
																																<h3 class="font-bold text-lg mb-2">Protection</h3>
																																<p class="text-gray-600 text-sm">Safeguarding children from abuse and exploitation.</p>
																												</div>
																												<div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
																																<i class="fa-solid fa-scale-balanced text-green-600 text-3xl mb-4"></i>
																																<h3 class="font-bold text-lg mb-2">Policy & Law</h3>
																																<p class="text-gray-600 text-sm">Monitoring child rights laws and conventions.</p>
																												</div>
																												<div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
																																<i class="fa-solid fa-bullhorn text-green-600 text-3xl mb-4"></i>
																																<h3 class="font-bold text-lg mb-2">Advocacy</h3>
																																<p class="text-gray-600 text-sm">Amplifying children’s voices in society.</p>
																												</div>
																								</div>
																								<div class="bg-slate-50 rounded-3xl p-8 shadow-sm">
																												<h2 class="text-xl font-bold text-green-700 mb-4">What the Commission is Mandated to Do</h2>
																												<p class="text-gray-700 mb-6">
																																The Commission was established under the Child Care, Protection and Justice Act to serve as
																																the independent authority for promoting and protecting children’s rights across all 28
																																districts.
																																We collaborate with government ministries, civil society, and communities to ensure every
																																child in Malawi grows up safe and able to reach their full potential.
																												</p>
																												<div class="flex flex-wrap gap-3">
																																<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Child
																																				Protection</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Rights
																																				Monitoring</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Community
																																				Engagement</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Education
																																				Access</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Policy
																																				Reform</span>
																												</div>
																								</div>
																				</div>

																				<div x-show="tab === 'vision'" class="grid grid-cols-1 gap-8" x-cloak>
																								<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
																												<div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
																																<i class="fa-solid fa-shield-halved text-green-600 text-3xl mb-4"></i>
																																<h3 class="font-bold text-lg mb-2">Protection</h3>
																																<p class="text-gray-600 text-sm">Safeguarding children from abuse and exploitation.</p>
																												</div>
																												<div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
																																<i class="fa-solid fa-scale-balanced text-green-600 text-3xl mb-4"></i>
																																<h3 class="font-bold text-lg mb-2">Policy & Law</h3>
																																<p class="text-gray-600 text-sm">Monitoring child rights laws and conventions.</p>
																												</div>
																												<div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
																																<i class="fa-solid fa-bullhorn text-green-600 text-3xl mb-4"></i>
																																<h3 class="font-bold text-lg mb-2">Advocacy</h3>
																																<p class="text-gray-600 text-sm">Amplifying children’s voices in society.</p>
																												</div>
																								</div>
																								<div class="bg-slate-50 rounded-3xl p-8 shadow-sm">
																												<h2 class="text-xl font-bold text-green-700 mb-4">What the Commission is Mandated to Do</h2>
																												<p class="text-gray-700 mb-6">
																																The Commission was established under the Child Care, Protection and Justice Act to serve as
																																the independent authority for promoting and protecting children’s rights across all 28
																																districts.
																																We collaborate with government ministries, civil society, and communities to ensure every
																																child in Malawi grows up safe and able to reach their full potential.
																												</p>
																												<div class="flex flex-wrap gap-3">
																																<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Child
																																				Protection</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Rights
																																				Monitoring</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Community
																																				Engagement</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Education
																																				Access</span>
																																<span
																																				class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Policy
																																				Reform</span>
																												</div>
																								</div>
																				</div>
																</div>
												</div>
								</div>
				</section>

				<div class="max-w-8xl mx-auto px-4 py-10">
								<!-- Tabs -->
								<div class="flex space-x-4 border-b mb-6">
												<button class="tab-btn px-4 py-2 font-semibold text-blue-600 border-b-2 border-blue-600"
																data-tab="commissioners">
																Commissioners
												</button>
												<button class="tab-btn px-4 py-2 font-semibold text-gray-600 hover:text-blue-600" data-tab="managers">
																Managers & Above
												</button>
												<button class="tab-btn px-4 py-2 font-semibold text-gray-600 hover:text-blue-600" data-tab="ex-officials">
																Ex-Officials
												</button>
								</div>

								<!-- Tab Content -->
								<!-- Commissioners -->
								<div id="commissioners" class="tab-content grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
												@for ($i = 1; $i <= 5; $i++)
																<div class="bg-white shadow rounded-lg p-4 flex flex-col items-center">
																				<img src="{{ asset("image" . (($i % 2) + 1) . ".png") }}" alt="Portrait"
																								class="rounded-md w-32 h-40 object-cover mb-4">
																				<h3 class="text-lg font-bold">Commissioner {{ $i }}</h3>
																				<p class="text-gray-600">Position {{ $i }}</p>
																</div>
												@endfor
								</div>

								<!-- Managers -->
								<div id="managers" class="tab-content grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
												@for ($i = 1; $i <= 4; $i++)
																<div class="bg-white shadow rounded-lg p-4 flex flex-col items-center">
																				<img src="{{ asset("image" . (($i % 2) + 1) . ".png") }}" alt="Portrait"
																								class="rounded-md w-32 h-40 object-cover mb-4">
																				<h3 class="text-lg font-bold">Manager {{ $i }}</h3>
																				<p class="text-gray-600">Position {{ $i }}</p>
																</div>
												@endfor
								</div>

								<!-- Ex-Officials -->
								<div id="ex-officials" class="tab-content grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
												@for ($i = 1; $i <= 3; $i++)
																<div class="bg-white shadow rounded-lg p-4 flex flex-col items-center">
																				<img src="{{ asset("image" . (($i % 2) + 1) . ".png") }}" alt="Portrait"
																								class="rounded-md w-32 h-40 object-cover mb-4">
																				<h3 class="text-lg font-bold">Ex-Official {{ $i }}</h3>
																				<p class="text-gray-600">Position {{ $i }}</p>
																</div>
												@endfor
								</div>

								<!-- Organogram -->
								<div class="mt-12">
												<div class="flex flex-col items-center">
																<!-- CEO -->
																<div class="bg-green-500 text-white font-bold px-6 py-3 rounded-lg shadow">
																				Chief Executive Officer
																</div>

																<!-- Line -->
																<div class="h-12 w-1 bg-green-500"></div>

																<!-- Managers -->
																<div class="flex flex-wrap mb-8 justify-center gap-20">
																				<div class="bg-green-500 text-white font-bold px-6 py-3 rounded-lg shadow">
																								Director of Compliance
																				</div>
																				<div class="bg-green-500 text-white font-bold px-6 py-3 rounded-lg shadow">
																								Finance Manager
																				</div>
																				<div class="bg-green-500 text-white font-bold px-6 py-3 rounded-lg shadow">
																								Human Resource Manager
																				</div>
																</div>
												</div>
								</div>
				</div>

				<!-- Simple Tab Script -->
				<script>
								document.querySelectorAll('.tab-btn').forEach(btn => {
												btn.addEventListener('click', () => {
																// Reset all buttons
																document.querySelectorAll('.tab-btn').forEach(b => {
																				b.classList.remove('text-blue-600', 'border-blue-600');
																				b.classList.add('text-gray-600');
																				b.classList.remove('border-b-2');
																});
																// Highlight active
																btn.classList.add('text-blue-600', 'border-blue-600', 'border-b-2');

																// Hide all content
																document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
																// Show selected
																document.getElementById(btn.dataset.tab).classList.remove('hidden');
												});
								});
				</script>

				<!-- Statistics Section -->
				<section class="py-12 px-6 md:px-12">
								<div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
												<div>
																<h3 class="text-2xl font-bold text-green-700">1,249</h3>
																<p>Children Supported</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-green-700">2,000+</h3>
																<p>Families Reached</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-green-700">6,000</h3>
																<p>Community Members</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-green-700">28</h3>
																<p>Districts Covered</p>
												</div>
								</div>
				</section>

				<!-- Action Buttons Section -->
				<section class="py-12 px-6 md:px-12">
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
