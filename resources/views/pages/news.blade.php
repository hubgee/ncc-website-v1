@extends("layouts.app")
@section("title", "News")
@section("content")

				<!-- News Banner Section -->
				<section class="w-full bg-white p">
								<div class="max-w-7xl mx-auto px-6 pt-7 flex items-center gap-10">
												<p class="text-lg font-serif text-red-600 uppercase tracking-widest inline-flex items-center gap-2">
																News <i class="fa-solid fa-book text-base"></i>
												</p>
												<div class="flex items-center gap-3">
																<span class="text-sm font-medium text-red-600">Share</span>
																<a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i
																								class="fa-brands fa-facebook-f"></i></a>
																<a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i
																								class="fa-brands fa-x-twitter"></i></a>
																<a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i
																								class="fa-brands fa-linkedin-in"></i></a>
																<a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i
																								class="fa-brands fa-whatsapp"></i></a>
																<a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i
																								class="fa-solid fa-envelope"></i></a>
												</div>
								</div>
								<h1 class="max-w-7xl mx-auto px-6 py-7 text-5xl md:text-4xl font-bold text-gray-900 mb-4">
												Protect Families & Children
								</h1>
								<div class="max-w-7xl mx-auto px-6 relative">
												<img src="{{ asset("images/newsbanner.png") }}" alt="News Banner" class="w-full h-100 md:h-200 object-cover">
												<h3
																class="absolute bottom-4 left-1/2 -translate-x-1/2 md:bottom-8 md:right-8 md:left-auto md:translate-x-0 bg-white text-gray-900 px-4 py-2 rounded-md font-bold text-sm shadow-md">
																NEWS
												</h3>
								</div>
								<div class="max-w-5xl mx-auto px-6 py-10">
												<p class="text-sm text-gray-500 mb-4">2 June 2026</p>
												<p class="text-lg text-gray-700 leading-relaxed font-bold mb-4">
																The National Children's Commission joined the Ministry of Gender, Children, Disability and Social Welfare,
																development partners, traditional leaders, and community members in commemorating the International Day of
																Families and the International Day of Street-Connected Children at Lunzu Primary School Ground in
																Blantyre.<br>
												</p>

												<p class="text-lg text-gray-700 leading-relaxed">
																The commemoration was presided over by the Honourable Minister of Gender, Children, Disability and Social
																Welfare, Honourable Mary Thom Navicha, MP, and attended by traditional leaders led by Senior Chief
																Kapeni.<br>
																The Commission was represented by Commissioner Julia Chimuna and members of the Secretariat.
																Held under the theme "Families, Inequalities and Child Well being", the event provided an opportunity for
																stakeholders to reflect on the importance of strong families in promoting child well being and addressing
																challenges affecting street-connected children.
												</p>
								</div>

								<!-- related news section -->
								<section class="w-full bg-white py-12 px-4 sm:px-6 lg:px-8" x-data="{ headingsOnly: false }">
												<!-- Red Line Divider -->
												<div class="flex justify-center my-6">
																<hr class="w-7xl border-t-3 border-red-600">
												</div>
												<div class="max-w-7xl mx-auto space-y-8">
																<div class="flex justify-between items-center gap-4">
																				<h1 class="text-3xl md:text-3xl font-bold text-red-700">
																								RELATED NEWS
																				</h1>
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
																<!-- Card 1 -->
																<div class="flex flex-col md:flex-row bg-white rounded-lg shadow overflow-hidden">
																				<!-- Image -->
																				<img src="{{ asset("images/news1.png") }}" alt="News 1" class="w-full md:w-1/2 h-64 object-cover"
																								x-show="!headingsOnly">
																				<!-- Text -->
																				<div class="p-6 flex-1">
																								<p class="text-sm text-gray-500 mb-2">06 Aug 2026 · Lilongwe</p>
																								<h3 class="text-xl font-bold text-gray-900 mb-4">
																												Ncc Calls For Stronger Action Against Child Labour.
																								</h3>
																								<p class="text-gray-700">
																												Leaders need to put more effort in nabbing perpetrators of child
																												labor…
																				</div>
																</div>

																<!-- Card 2 -->
																<div class="flex flex-col md:flex-row bg-white rounded-lg shadow overflow-hidden">
																				<img src="{{ asset("images/news2.png") }}" alt="News 2" class="w-full md:w-1/2 h-64 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6 flex-1">
																								<p class="text-sm text-gray-500 mb-2">04 Aug 2026 · Gaza</p>
																								<h3 class="text-xl font-bold text-gray-900 mb-4">
																												New Child Protection Guidelines Launched
																								</h3>
																								<p class="text-gray-700">
																												NCC introduces new child protection guidelines, as one of the ways
																												to help…
																								</p>
																				</div>
																</div>

																<!-- Card 3 -->
																<div class="flex flex-col md:flex-row bg-white rounded-lg shadow overflow-hidden">
																				<img src="{{ asset("images/news3.png") }}" alt="News 3" class="w-full md:w-1/2 h-64 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6 flex-1">
																								<p class="text-sm text-gray-500 mb-2">31 Jul 2026 · Global</p>
																								<h3 class="text-xl font-bold text-gray-900 mb-4">
																												NCC Meets Youth Leaders to Promote Child Participation
																								</h3>
																								<p class="text-gray-700">
																												Thousands of migrants have crossed into Ceuta, many of them children unaccompanied or separated
																												from families.
																								</p>
																				</div>
																</div>

												</div>
								</section>

				</section>

				<!-- latest news section -->
				<section class="w-full bg-white py-12 px-4 sm:px-6 lg:px-8">
								<!-- Red Line Divider -->
								<div class="flex justify-center my-6">
												<hr class="w-7xl border-t-3 border-red-600">
								</div>
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
				<!-- Subscribe Section -->
				<section class="w-full bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
								<div class="max-w-5xl mx-auto text-center">

												<!-- Heading -->
												<h2 class="text-2xl sm:text-3xl font-bold text-green-700 mb-4">
																Subscribe to Get Our Latest News
												</h2>
												<p class="text-gray-700 mb-6">
																Stay updated with the latest stories, programs, and impact reports from the National Children's Commission.
												</p>

												<!-- Subscription Form -->
												<form action="#" method="POST" class="flex flex-col sm:flex-row gap-4 justify-center">
																<input type="email" name="email" placeholder="Enter your email"
																				class="w-full sm:w-2/3 px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600">
																<button type="submit"
																				class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
																				Subscribe
																</button>
												</form>
								</div>
				</section>

@endsection
