@extends("layouts.app")

@section("title", "Home")

@section("content")
				@php
								$hero = \App\Models\SiteContent::where("section", "home")
								    ->where("type", "hero")
								    ->where("is_published", true)
								    ->first();
								$heroImage =
								    $hero && $hero->image_path
								        ? asset("storage/" . $hero->image_path . "?v=" . $hero->updated_at->timestamp)
								        : asset("images/hero-children.jpg");

								$updates = \App\Models\SiteContent::where("section", "home")
								    ->where("type", "update")
								    ->where("is_published", true)
								    ->orderBy("sort_order")
								    ->get();
								$featuredUpdate = $updates->first();
								$sidebarUpdate = $updates->slice(1);

								$news = \App\Models\SiteContent::where("section", "home")
								    ->where("type", "news")
								    ->where("is_published", true)
								    ->orderBy("sort_order")
								    ->get();
				@endphp
				<style>
								@keyframes heroFade1 {

												0%,
												25% {
																opacity: 1;
												}

												33%,
												91% {
																opacity: 0;
												}

												100% {
																opacity: 1;
												}
								}

								@keyframes heroFade2 {

												0%,
												33% {
																opacity: 0;
												}

												36%,
												64% {
																opacity: 1;
												}

												71%,
												100% {
																opacity: 0;
												}
								}

								@keyframes heroFade3 {

												0%,
												71% {
																opacity: 0;
												}

												75%,
												94% {
																opacity: 1;
												}

												100% {
																opacity: 0;
												}
								}

								.hero-slide {
												position: absolute;
												inset: 0;
												background-size: cover;
												background-position: center;
												animation-duration: 9s;
												animation-iteration-count: infinite;
												animation-timing-function: ease-in-out;
								}

								.hero-slide-1 {
												animation-name: heroFade1;
								}

								.hero-slide-2 {
												animation-name: heroFade2;
								}

								.hero-slide-3 {
												animation-name: heroFade3;
								}
				</style>
				<!-- Hero Section -->
				<section class="relative h-[70vh] flex items-center justify-center text-center text-white overflow-hidden">
								<div class="hero-slide hero-slide-1" style="background-image: url('{{ asset("images/NCChero.jpg") }}');"></div>
								<div class="hero-slide hero-slide-2" style="background-image: url('{{ asset("images/nccNews1.jpg") }}');"></div>
								<div class="hero-slide hero-slide-3" style="background-image: url('{{ asset("images/nccCeleb.jpg") }}');"></div>
								<div class="bg-black/50 absolute inset-0 z-10"></div>
								<div class="relative z-20 px-4">
												<h1 class="text-3xl md:text-5xl font-bold animate-pulse">Our Children, Our Responsibility</h1>
												<p class="mt-4 text-lg md:text-xl">Safeguarding children’s rights and dignity.</p>
												<div class="mt-6 flex flex-col md:flex-row gap-4 justify-center">
																<a href="{{ route("reporting") }}"
																				class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold text-sm">
																				Report a Case Now
																</a>
																<a href="{{ route("what-we-do") }}" class="border border-white px-4 py-2 rounded-lg font-semibold text-sm">
																				Work With Us
																</a>
												</div>
								</div>
				</section>

				<!-- Mission & Impact Section -->
				<section class="py-16 px-6 md:px-12 bg-white">
								<!-- Top Divider -->
								<div class="flex justify-center my-6">
												<hr class="w-full border-t-2 border-red-600">
								</div>

								<!-- Two Column Layout with Right Stretched -->
								<div class="max-w-8xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-20">

												<!-- Left: Programs Section (1/3 width) -->
												<div class="md:col-span-1">
																<h2 class="text-2xl sm:text-3xl font-bold text-green-800 mb-6">
																				OUR PROGRAMS
																</h2>
																<ul class="space-y-3 text-gray-900 text-lg">
																				<li class="hover:underline">Advocacy & Policy</li>
																				<li class="hover:underline">Awareness</li>
																				<li class="hover:underline">Protection</li>
																				<li class="hover:underline">Referral & Support</li>
																				<li class="hover:underline">Capacity Building</li>
																				<li class="hover:underline">Research</li>
																</ul>
												</div>

												<!-- Right: Mission Content (2/3 width) -->
												<div class="md:col-span-2">
																<h2 class="text-3xl md:text-4xl font-bold text-red-700 mb-4">
																				NATIONAL CHILDREN'S COMMISSION
																</h2>
																<h3 class="text-2xl font-bold text-gray-800 mb-4">
																				Championing the Rights of Children in Malawi
																</h3>
																<p class="text-gray-700 text-left mb-2">
																				The National Children's Commission (NCC) was established in 2019 by an Act of Parliament and became
																				fully operational in 2024. It was created to coordinate, monitor, and strengthen accountability in all
																				matters
																				concerning children's rights and welfare in Malawi.
																</p>
																<p class="text-gray-700 text-left mb-2">
																				With its motto "Our Children, Our Responsibility," the Commission works to safeguard children through
																				education, healthcare, protection from abuse, and policy advocacy. Today, the NCC stands as a unifying
																				body ensuring that every child in Malawi grows up safe, empowered, and supported by both government and
																				society.
																</p>
																<p class="text-gray-700 text-left mb-2">
																				Through its initiatives, the NCC has made significant strides in promoting child welfare, including
																				launching awareness campaigns, collaborating with NGOs, and implementing programs that directly impact
																				the lives of children across the nation.
																</p>
																<p class="text-red-700 max-w-6xl text-left font-bold mt-4">
																				As the NCC continues to expand its reach and influence, it remains committed to its mission of ensuring
																				that all children in Malawi have the opportunity to thrive in a safe and nurturing environment.<br>
																				Donate today to help us continue our vital work in protecting and empowering the children of Malawi.
																				<a href="{{ route("donate") }}" class="text-green-600 hover:underline font-semibold">Donate</a>
																</p>
												</div>
								</div>

								<!-- Bottom Divider -->
								<div class="flex justify-center my-6">
												<hr class="w-full border-t-2 border-red-600">
								</div>
				</section>

				<!-- Red Line Divider -->

				<!-- Initiatives Section -->
				<section class="py-6 px-6 md:px-12 bg-white">
								<div class="max-w-7xl mx-auto flex justify-left">
												<hr class="w-8 border-t-4 border-red-800">

								</div>
								<h2 class="max-w-7xl mx-auto text-xl md:text-xl font-bold text-green-800 mb-6">TOP STORIES</h2>
								<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

												<!-- Left Panel: Image + Red Rectangle -->
												@if ($featuredUpdate)
																<div class="md:col-span-2 flex flex-col md:flex-row rounded-lg overflow-hidden shadow-lg">
																				<!-- Image side -->
																				<div class="flex-1">
																								<img src="{{ $featuredUpdate->image_path ? asset("storage/" . $featuredUpdate->image_path . "?v=" . $featuredUpdate->updated_at->timestamp) : asset("images/vaccine.jpg") }}"
																												alt="{{ $featuredUpdate->title }}" class="w-full h-full object-cover">
																				</div>
																				<!-- Red rectangle side -->
																				<div
																								class="bg-{{ $featuredUpdate->accent_color ?? "red" }}-600 text-white flex flex-col justify-between p-4 md:w-1/2">
																								<!-- Icon -->
																								<div class="flex justify-start mb-4">
																												<i class="fa-solid fa-kit-medical text-2xl"></i>
																								</div>
																								<!-- Heading + Text -->
																								<div>
																												<h3 class="text-2xl font-bold mb-2">{{ $featuredUpdate->title }}</h3>
																												<p class="text-sm md:text-base mb-4">
																																{{ $featuredUpdate->description }}
																												</p>
																								</div>
																								<!-- Read More -->
																								@if ($featuredUpdate->button_text && $featuredUpdate->button_url)
																												<a href="{{ $featuredUpdate->button_url }}"
																																class="underline text-sm hover:text-gray-200">{{ $featuredUpdate->button_text }}</a>
																								@endif
																				</div>
																</div>
												@else
																<div class="md:col-span-2 flex flex-col md:flex-row rounded-lg overflow-hidden shadow-lg">
																				<!-- Image side -->
																				<div class="flex-1">
																								<img src="{{ asset("images/NCCkids.jpg") }}" alt="Take on Typhoid"
																												class="w-full h-full object-cover">
																				</div>
																				<!-- Red rectangle side -->
																				<div class="bg-red-600 text-white flex flex-col justify-between p-4 md:w-1/2">
																								<!-- Icon -->
																								<div class="flex justify-start mb-4">
																												<i class="fa-solid fa-kit-medical text-2xl"></i>
																								</div>
																								<!-- Heading + Text -->
																								<div>
																												<h3 class="text-2xl font-bold mb-2">PROTECT FAMILIES & CHILDREN</h3>
																												<p class="text-sm md:text-base mb-4">
																																NCC joined other stakeholders in commemorating the international Day of Families & the
																																international Day of street connected children.
																												</p>
																								</div>
																								<!-- Read More -->
																								<a href="https://www.facebook.com/61578135073164/
posts/122177408528937835/?
mibextid=rS40aB7S9Ucbxw6v"
																												class="underline text-sm hover:text-gray-200">Read More</a>
																				</div>
																</div>
												@endif

												<!-- Right Panel: White Card -->
												@if ($sidebarUpdate->isNotEmpty())
																@php $s = $sidebarUpdate->first(); @endphp
																<div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
																				<!-- Image -->
																				<img src="{{ $s->image_path ? asset("storage/" . $s->image_path . "?v=" . $s->updated_at->timestamp) : asset("images/Kids-Coding.jpg") }}"
																								alt="{{ $s->title }}" class="w-full h-48 object-cover">
																				<!-- Text -->
																				<div class="p-6 flex flex-col justify-between flex-1">
																								<div>
																												<h3 class="text-2xl font-bold mb-2">{{ $s->title }}</h3>
																												<p class="text-sm md:text-base mb-4">
																																{{ $s->description }}
																												</p>
																								</div>
																								@if ($s->button_text && $s->button_url)
																												<a href="{{ $s->button_url }}"
																																class="underline text-sm text-green-700 hover:text-green-900">{{ $s->button_text }}</a>
																								@endif
																				</div>
																</div>
												@else
																<div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
																				<!-- Image -->
																				<img src="{{ asset("images/mwambo.jpg") }}" alt="Children in Tech" class="w-full h-48 object-cover">
																				<!-- Text -->
																				<div class="p-6 flex flex-col justify-between flex-1">
																								<div>
																												<h3 class="text-2xl font-bold mb-2">PROTECT FAMILIES & CHILDREN</h3>
																												<p class="text-sm md:text-base mb-4">
																																The National Children’s Commission joined the Ministry of Gender, Children, Disability and
																																Social Welfare, development partners, traditional leaders, and community members in
																																commemorating the International Day of Families and the International Day of
																																Street-Connected Children at Lunzu Primary School Ground in Blantyre.
																												</p>
																								</div>
																								<!-- Read More -->
																								<a href="https://www.facebook.com/61578135073164/
posts/122177408528937835/?
mibextid=rS40aB7S9Ucbxw6v"
																												class="underline text-sm text-green-700 hover:text-green-900">Read More</a>
																				</div>
																</div>
												@endif

								</div>
				</section>

				<!-- Latest News Section -->
				<section class="py-12 px-6 md:px-12 bg-white">
								<div class="max-w-7xl mx-auto" x-data="{ showMoreNews: false }">
												<div class="flex justify-left">
																<hr class="w-8 border-t-4 border-red-800">
												</div>
												<h2 class="text-xl md:text-xl font-bold text-green-800 mb-6">LATEST NEWS</h2>
												<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
																<!-- News Card -->
																<div class="bg-white rounded-lg shadow-md overflow-hidden">
																				<img src="{{ asset("images/news1.png") }}" alt="News 1" class="w-full h-40 object-cover">
																				<div class="p-4">
																								<h3 class="font-bold text-gray-900 mb-2">NCC Calls for Stronger Action Against Child Labor</h3>
																								<p class="text-sm text-gray-500 mb-2">7 May 2026 | Dedza</p>
																								<p class="text-gray-600 text-sm">Leaders need to put more effort in nabbing perpetrators of child
																												labor…</p>
																								<a href="#"
																												class="inline-block mt-2 text-sm font-semibold text-green-700 hover:underline">Read
																												More ></a>
																				</div>
																</div>
																<!-- News Card -->
																<div class="bg-white rounded-lg shadow-md overflow-hidden">
																				<img src="{{ asset("images/news2.png") }}" alt="News 2" class="w-full h-40 object-cover">
																				<div class="p-4">
																								<h3 class="font-bold text-gray-900 mb-2">New Child Protection Guidelines Launched</h3>
																								<p class="text-sm text-gray-500 mb-2">7 May 2026 | Ntcheu</p>
																								<p class="text-gray-600 text-sm">NCC introduces new child protection guidelines, as one of the ways
																												to help…</p>
																								<a href="#"
																												class="inline-block mt-2 text-sm font-semibold text-green-700 hover:underline">Read
																												More ></a>
																				</div>
																</div>
																<!-- News Card -->
																<div class="bg-white rounded-lg shadow-md overflow-hidden">
																				<img src="{{ asset("images/news3.png") }}" alt="News 3" class="w-full h-40 object-cover">
																				<div class="p-4">
																								<h3 class="font-bold text-gray-900 mb-2">NCC Meets Youth Leaders to Promote Child Participation
																								</h3>
																								<p class="text-sm text-gray-500 mb-2">7 May 2026 | Mzuzu</p>
																								<p class="text-gray-600 text-sm">The National Children’s Commission (NCC) held a meeting with youth
																												leaders to discuss strategies for promoting child participation in community development
																												initiatives.</p>
																								<a href="#"
																												class="inline-block mt-2 text-sm font-semibold text-green-700 hover:underline">Read
																												More ></a>
																				</div>
																</div>
												</div>
												<!-- Hidden additional news cards -->
												<div x-show="showMoreNews" class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
																<!-- News Card -->
																<div class="bg-white rounded-lg shadow-md overflow-hidden">
																				<img src="{{ asset("images/image1.jpg") }}" alt="News 4" class="w-full h-40 object-cover">
																				<div class="p-4">
																								<h3 class="font-bold text-gray-900 mb-2">NCC Commissioners Visit Dedza Border Post to Strengthen
																												Child
																												Protection</h3>
																								<p class="text-sm text-gray-500 mb-2">5 August 2026 | Lilongwe</p>
																								<p class="text-gray-600 text-sm">Visited the Dedza Border Post to appreciate the child protection
																												services being offered at the facility.</p>
																								<a href="#"
																												class="inline-block mt-2 text-sm font-semibold text-green-700 hover:underline">Read
																												More ></a>
																				</div>
																</div>
																<!-- News Card -->
																<div class="bg-white rounded-lg shadow-md overflow-hidden">
																				<img src="{{ asset("images/image6.jpg") }}" alt="News 5" class="w-full h-40 object-cover">
																				<div class="p-4">
																								<h3 class="font-bold text-gray-900 mb-2">CHIEF MALEMIA SENTENCED TO 21 YEARS IN PRISON</h3>
																								<p class="text-sm text-gray-500 mb-2">1 August 2026 | Blantyre</p>
																								<p class="text-gray-600 text-sm">The National Children’s Commission (NCC) welcomes the sentencing
																												of Traditional Authority Malemia to 21 years’ imprisonment.</p>
																								<a href="#"
																												class="inline-block mt-2 text-sm font-semibold text-green-700 hover:underline">Read
																												More ></a>
																				</div>
																</div>
																<!-- News Card -->
																<div class="bg-white rounded-lg shadow-md overflow-hidden">
																				<img src="{{ asset("images/image3.jpg") }}" alt="News 6" class="w-full h-40 object-cover">
																				<div class="p-4">
																								<h3 class="font-bold text-gray-900 mb-2">Save the Children was honored to host the National
																												Children’s
																												Commission of Malawi (NCC)</h3>
																								<p class="text-sm text-gray-500 mb-2">20 July 2026 | Zomba</p>
																								<p class="text-gray-600 text-sm">He committed that Save the Children will continue to walk
																												hand-in-hand with the NCC.</p>
																								<a href="#"
																												class="inline-block mt-2 text-sm font-semibold text-green-700 hover:underline">Read
																												More ></a>
																				</div>
																</div>
																<!-- News Card -->
																<div class="bg-white rounded-lg shadow-md overflow-hidden">
																				<img src="{{ asset("images/image4.jpg") }}" alt="News 7" class="w-full h-40 object-cover">
																				<div class="p-4">
																								<h3 class="font-bold text-gray-900 mb-2">National Children’s Commission Appreciates World Vision’s
																												Support for Children</h3>
																								<p class="text-sm text-gray-500 mb-2">14 July 2026 | Kasungu</p>
																								<p class="text-gray-600 text-sm">The Commissioners interacted with beneficiaries around Mtengo
																												wambalame communities in T/A Kalumo.</p>
																								<a href="#"
																												class="inline-block mt-2 text-sm font-semibold text-green-700 hover:underline">Read
																												More ></a>
																				</div>
																</div>
																<!-- News Card -->
																<div class="bg-white rounded-lg shadow-md overflow-hidden">
																				<img src="{{ asset("images/cc1.jpg") }}" alt="News 8" class="w-full h-40 object-cover">
																				<div class="p-4">
																								<h3 class="font-bold text-gray-900 mb-2">Child Protection Policy Review Underway</h3>
																								<p class="text-sm text-gray-500 mb-2">12 May 2026 | Salima</p>
																								<p class="text-gray-600 text-sm">Stakeholders gather to review and strengthen existing
																												child protection policies and frameworks.</p>
																								<a href="#"
																												class="inline-block mt-2 text-sm font-semibold text-green-700 hover:underline">Read
																												More ></a>
																				</div>
																</div>
																<!-- News Card -->
																<div class="bg-white rounded-lg shadow-md overflow-hidden">
																				<img src="{{ asset("images/news1.png") }}" alt="News 9" class="w-full h-40 object-cover">
																				<div class="p-4">
																								<h3 class="font-bold text-gray-900 mb-2">NCC Celebrates Milestone in District Coverage</h3>
																								<p class="text-sm text-gray-500 mb-2">13 May 2026 | Mangochi</p>
																								<p class="text-gray-600 text-sm">NCC reaches new districts, expanding child protection
																												services to more vulnerable communities.</p>
																								<a href="#"
																												class="inline-block mt-2 text-sm font-semibold text-green-700 hover:underline">Read
																												More ></a>
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

				<!-- moments that matter section -->
				<section class="py-12 px-6 md:px-12 bg-white">

								<div class="max-w-7xl mx-auto mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
												@forelse($news as $article)
																<article class="overflow-hidden bg-white shadow rounded-[10px]">
																				<img src="{{ $article->image_path ? asset("storage/" . $article->image_path . "?v=" . $article->updated_at->timestamp) : asset("images/update-1.jpg") }}"
																								alt="{{ $article->title }}" class="w-full h-70 object-cover rounded-t-[10px]">
																				<div class="p-6">
																								<h3 class="font-semibold text-xl">{{ $article->title }}</h3>
																				</div>
																</article>
												@empty
																<article class="overflow-hidden bg-white shadow rounded-[10px]">
																				<img src="{{ asset("images/nccNews1.jpg") }}" alt="Child protection act"
																								class="w-full h-70 object-cover rounded-t-[10px]">
																				<div class="p-6">
																								<h3 class="font-semibold text-xl">On Friday, 5 june – Ncc engaged the Leaders of the flea Market in
																												Lilongwe in efforts to promote child protection.
																								</h3>
																				</div>
																</article>
																<article class="overflow-hidden bg-white shadow rounded-[10px]">
																				<img src="{{ asset("images/update-2.jpg") }}" alt="National day of the African child"
																								class="w-full h-70 object-cover rounded-t-[10px]">
																				<div class="p-6">
																								<h3 class="font-semibold text-xl">May 2025 – National Day of the African Child – Celebrations &
																												Pledges
																								</h3>
																				</div>
																</article>

																<article class="overflow-hidden bg-white shadow rounded-[10px]">
																				<img src="{{ asset("images/update-2.jpg") }}" alt="National day of the African child"
																								class="w-full h-70 object-cover rounded-t-[10px]">
																				<div class="p-6">
																								<h3 class="font-semibold text-xl">May 2025 – National Day of the African Child – Celebrations &
																												Pledges
																								</h3>
																				</div>
																</article>
												@endforelse
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

								<!-- Statistics -->
								<div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center mt-15">
												<div>
																<h3 class="text-2xl font-bold text-green-700">1,249+</h3>
																<p class="text-gray-700">Children Supported</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-green-700">2,000+</h3>
																<p class="text-gray-700">Families Reached</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-green-700">6,000+</h3>
																<p class="text-gray-700">Community Members</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-green-700">28</h3>
																<p class="text-gray-700">Districts Covered</p>
												</div>
								</div>
				</section>

@endsection
