@extends("layouts.app")

@section("title", "Home")

@section("content")
				<!-- Hero Section -->
				<section class="relative bg-cover bg-center h-[70vh] flex items-center justify-center text-center text-white"
								style="background-image: url('{{ $hero['background_url'] ?? asset('images/hero-children.jpg') }}');">
								<div class="bg-black/50 absolute inset-0"></div>
								<div class="relative z-10 px-4">
												<h1 class="text-3xl md:text-5xl font-bold">{{ $hero['headline'] ?? 'Every Child Matters, Every Voice Counts' }}</h1>
												<p class="mt-4 text-lg md:text-xl">{{ $hero['subheadline'] ?? '' }}</p>
												<div class="mt-6 flex flex-col md:flex-row gap-4 justify-center">
																@if (!empty($hero['primary_cta']['route']))
																				<a href="{{ route($hero['primary_cta']['route']) }}"
																								class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold text-sm">
																								{{ $hero['primary_cta']['text'] ?? 'Learn More' }}
																				</a>
																@endif
																@if (!empty($hero['secondary_cta']['route']))
																				<a href="{{ route($hero['secondary_cta']['route']) }}"
																								class="border border-white px-4 py-2 rounded-lg font-semibold text-sm">
																								{{ $hero['secondary_cta']['text'] ?? 'Learn More' }}
																				</a>
																@endif
												</div>
								</div>
				</section>

				<!-- Mission & Impact Section -->
				<section class="py-16 px-6 md:px-12 bg-white">
								<div class="max-w-7xl mx-auto text-center">
												<h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-4">{{ $mission['title'] ?? 'Our Mission' }}</h2>
												<h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">
																{{ $mission['subtitle'] ?? '' }}
												</h3>
												<p class="text-gray-700 max-w-3xl mx-auto mb-12">
																{{ $mission['body'] ?? '' }}
												</p>

												<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
																@forelse ($features as $feature)
																				<div class="flex flex-col items-center">
																								<i class="fa-solid {{ $feature->payload['icon'] ?? 'fa-circle' }} text-red-600 text-4xl mb-3"></i>
																								<p class="font-semibold text-gray-800">{{ $feature->payload['label'] ?? '' }}</p>
																				</div>
																@empty
																				<div class="col-span-3 text-gray-500">No mission features configured.</div>
																@endforelse
												</div>

												<div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
																@forelse ($stats as $stat)
																				<div>
																								<h3 class="text-2xl font-bold text-green-700">{{ $stat->payload['value'] ?? '' }}</h3>
																								<p class="text-gray-700">{{ $stat->payload['label'] ?? '' }}</p>
																				</div>
																@empty
																				<div class="col-span-4 text-gray-500">No statistics configured.</div>
																@endforelse
												</div>
								</div>
				</section>

				<!-- Initiatives Section -->
				<section class="py-12 px-6 md:px-12 bg-white">
								<h2 class="text-base md:text-base font-bold text-green-700 text-center mb-4">LATEST UPDATES</h2>
								<div class="max-w-8xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
												@forelse ($featuredUpdates as $index => $item)
																@if (($item->payload['layout'] ?? 'card') === 'split' && $index === 0)
																				<div class="md:col-span-2 flex flex-col md:flex-row rounded-lg overflow-hidden shadow-lg">
																								<div class="flex-1">
																												<img src="{{ $item->image_url ?? asset('images/placeholder.jpg') }}"
																																alt="{{ $item->payload['title'] ?? '' }}" class="w-full h-full object-cover">
																								</div>
																								<div class="bg-red-600 text-white flex flex-col justify-between p-4 md:w-1/2">
																												@if (!empty($item->payload['icon']))
																																<div class="flex justify-start mb-4">
																																				<i class="fa-solid {{ $item->payload['icon'] }} text-2xl"></i>
																																</div>
																												@endif
																												<div>
																																<h3 class="text-2xl font-bold mb-2">{{ $item->payload['title'] ?? '' }}</h3>
																																<p class="text-sm md:text-base mb-4">{{ $item->payload['body'] ?? '' }}</p>
																												</div>
																												@if (!empty($item->payload['link_url']))
																																<a href="{{ $item->payload['link_url'] }}" class="underline text-sm hover:text-gray-200">Read More</a>
																												@else
																																<span class="underline text-sm text-gray-200">Read More</span>
																												@endif
																								</div>
																				</div>
																@else
																				<div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
																								<img src="{{ $item->image_url ?? asset('images/placeholder.jpg') }}"
																												alt="{{ $item->payload['title'] ?? '' }}" class="w-full h-48 object-cover">
																								<div class="p-6 flex flex-col justify-between flex-1">
																												<div>
																																<h3 class="text-2xl font-bold mb-2">{{ $item->payload['title'] ?? '' }}</h3>
																																<p class="text-sm md:text-base mb-4">{{ $item->payload['body'] ?? '' }}</p>
																												</div>
																												@if (!empty($item->payload['link_url']))
																																<a href="{{ $item->payload['link_url'] }}" class="underline text-sm text-green-700 hover:text-green-900">Read More</a>
																												@else
																																<span class="underline text-sm text-green-700">Read More</span>
																												@endif
																								</div>
																				</div>
																@endif
												@empty
																<div class="col-span-3 text-center text-gray-500">No featured updates configured.</div>
												@endforelse
								</div>
				</section>

				<!-- news section -->
				<section class="py-12 px-6 md:px-12 bg-white">
								<div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
												@forelse ($news as $article)
																<article class="overflow-hidden bg-white shadow rounded-[10px]">
																				<img src="{{ $article->image_url ?? asset('images/placeholder.jpg') }}"
																								alt="{{ $article->payload['title'] ?? '' }}"
																								class="w-full h-70 object-cover rounded-t-[10px]">
																				<div class="p-6">
																								<h3 class="font-semibold text-xl">{{ $article->payload['title'] ?? '' }}</h3>
																				</div>
																</article>
												@empty
																<div class="col-span-3 text-center text-gray-500">No news articles configured.</div>
												@endforelse
								</div>
				</section>

				<!-- Action Buttons Section -->
				<section class="py-12 px-6 md:px-12">
								<div class="flex flex-col md:flex-row justify-center gap-100">
												<a href="{{ route("childrens-corner") }}"
																class="flex items-center justify-center border border-gray-300 px-6 py-3 rounded-lg font-bold uppercase text-gray-800 hover:text-green-700 hover:border-green-700">
																<i class="fa-solid fa-child mr-2 text-red-600"></i>
																CHILD RIGHTS CORNER
												</a>
												<a href="{{ route("reporting") }}"
																class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-bold uppercase text-center">
																REPORT A CASE NOW
												</a>
								</div>
				</section>

@endsection
