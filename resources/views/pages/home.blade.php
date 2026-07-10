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
												<h1 class="text-3xl md:text-5xl font-bold">Every Child Matters, Every Voice Counts</h1>
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
								<div class="max-w-7xl mx-auto text-center">
												<!-- Mission -->
												<h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-4">Our Mission</h2>
												<h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">
																Championing the Rights of Children in Malawi
												</h3>
												<p class="text-gray-700 max-w-3xl mx-auto mb-12">
																The National Children’s Commission works tirelessly to protect, promote, and fulfill the rights of children.
																We believe every child regardless of background deserves safety, education and the chance to thrive.
												</p>

												<!-- Icons Row -->
												<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
																<div class="flex flex-col items-center">
																				<i class="fa-solid fa-shield-halved text-red-600 text-4xl mb-3"></i>
																				<p class="font-semibold text-gray-800">Protection First</p>
																</div>
																<div class="flex flex-col items-center">
																				<i class="fa-solid fa-graduation-cap text-red-600 text-4xl mb-3"></i>
																				<p class="font-semibold text-gray-800">Education & Awareness</p>
																</div>
																<div class="flex flex-col items-center">
																				<i class="fa-solid fa-scale-balanced text-red-600 text-4xl mb-3"></i>
																				<p class="font-semibold text-gray-800">Justice & Advocacy</p>
																</div>
												</div>

												<!-- Statistics -->
												<div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
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
								</div>
				</section>

				<!-- Initiatives Section -->
				<section class="py-12 px-6 md:px-12 bg-white">
								<h2 class="text-base md:text-base font-bold text-green-700 text-center mb-4">LATEST UPDATES</h2>
								<div class="max-w-8xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

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

				<!-- Initiatives Section -->
				<section class="py-12 px-6 md:px-12 bg-white">

								<div class="max-w-8xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

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
																								<img src="{{ asset("images/CC.jpg") }}" alt="Take on Typhoid"
																												class="w-full h-full object-cover">
																				</div>
																				<!-- Red rectangle side -->
																				<div class="bg-red-600 text-white flex flex-col justify-between p-4 md:w-1/2">
																								<!-- Icon -->
																								<div class="flex justify-start mb-4">
																												<i class="fa-solid fa-flag text-2xl"></i>
																								</div>
																								<!-- Heading + Text -->
																								<div>
																												<h3 class="text-2xl font-bold mb-2">UNVEILING OF CHILD COMMISSIONERS</h3>
																												<p class="text-sm md:text-base mb-4">
																																NCC celebrates the unveiling of the new child commissioners.
																												</p>
																								</div>
																								<!-- Read More -->
																								<a href="https://www.facebook.com/61578135073164/
posts/122179322960937835/?
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
																				<img src="{{ asset("images/cc1.jpg") }}" alt="Children in Tech" class="w-full h-48 object-cover">
																				<!-- Text -->
																				<div class="p-6 flex flex-col justify-between flex-1">
																								<div>
																												<h3 class="text-2xl font-bold mb-2">UNVEILING OF CHILD COMMISSIONERS</h3>
																												<p class="text-sm md:text-base mb-4">
																																National children's commissioners celebrates the unveiling of the new child commissioners.
																																A significant step towards strengthening the commission's mandate and ensuring the voices of
																																children are heard and represented.
																												</p>
																								</div>
																								<!-- Read More -->
																								<a href="https://www.facebook.com/61578135073164/
posts/122179322960937835/?
mibextid=rS40aB7S9Ucbxw6v"
																												class="underline text-sm text-green-700 hover:text-green-900">Read More</a>
																				</div>
																</div>
												@endif

								</div>
				</section>

				<!-- news section -->
				<section class="py-12 px-6 md:px-12 bg-white">

								<div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
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
				</section>

@endsection
