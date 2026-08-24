@extends("layouts.app")

@section("title", 'Children\'s Corner')

@section("content")
				<style>
								@keyframes kidsMarquee {
												0% {
																transform: translateX(-50%);
												}

												100% {
																transform: translateX(0);
												}
								}

								.animate-marquee {
												animation: kidsMarquee 20s linear infinite;
								}

								.animate-marquee:hover {
												animation-play-state: paused;
								}
				</style>

				<div class="w-full px-4 py-12 relative overflow-hidden bg-cover bg-center bg-black/45">
								<div class="relative z-10 text-center text-black">
												<!-- Hero Title -->
												<h1 class="text-4xl md:text-6xl font-bold animate-bounce">
																CHILD RIGHTS CORNER
												</h1>

												<!-- Mission Statement -->
												<p class="max-w-xl mx-auto mt-4 text-base md:text-lg">
																We are dedicated to safeguarding the well-being of all children by promoting their rights,
																protecting their dignity and empowering them to reach their full potential.
												</p>

												<!-- Responsive Layout -->
												<div class="flex flex-col items-center justify-center mt-10 transition-all duration-500 ease-in-out">

													<!-- Stick Figure (always centered above icons) -->
													<div class="flex justify-center animate-pulse mb-9">
														<img src="/images/child-hero.png" alt="Children illustration" class="w-70 md:w-96 mx-auto" />
													</div>

													<!-- Icons (sequential row below picture, wraps on mobile) -->
													<div class="flex flex-wrap justify-between gap-8 w-full max-w-5xl mx-auto">
														<!-- Quizzes -->
														<div class="flex flex-col items-center">
															<div
																class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-blue-100 hover:bg-blue-200 hover:scale-110 hover:shadow-lg transition animate-bounce">
																<i class="fa-solid fa-question text-blue-600 text-lg"></i>
															</div>
															<span class="text-sm mt-2">Quizzes</span>
														</div>
														<!-- Games -->
														<div class="flex flex-col items-center">
															<div
																class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-green-100 hover:bg-green-200 hover:scale-110 hover:shadow-lg transition animate-bounce">
																<i class="fa-solid fa-gamepad text-green-600 text-lg"></i>
															</div>
															<span class="text-sm mt-2">Games</span>
														</div>
														<!-- Videos -->
														<div class="flex flex-col items-center">
															<div
																class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-red-100 hover:bg-red-200 hover:scale-110 hover:shadow-lg transition animate-bounce">
																<i class="fa-solid fa-video text-red-600 text-lg"></i>
															</div>
															<span class="text-sm mt-2">Videos</span>
														</div>
														<!-- Stories -->
														<div class="flex flex-col items-center">
															<div
																class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-yellow-100 hover:bg-yellow-200 hover:scale-110 hover:shadow-lg transition animate-bounce">
																<i class="fa-solid fa-book-open text-yellow-600 text-lg"></i>
															</div>
															<span class="text-sm mt-2">Stories</span>
														</div>
														<!-- Share Story -->
														<div class="flex flex-col items-center">
															<div
																class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-purple-100 hover:bg-purple-200 hover:scale-110 hover:shadow-lg transition animate-bounce">
																<i class="fa-solid fa-pencil text-purple-600 text-lg"></i>
															</div>
															<span class="text-sm mt-2">Share Story</span>
														</div>
														<!-- Share Drawing -->
														<div class="flex flex-col items-center">
															<div
																class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-pink-100 hover:bg-pink-200 hover:scale-110 hover:shadow-lg transition animate-bounce">
																<i class="fa-solid fa-paintbrush text-pink-600 text-lg"></i>
															</div>
															<span class="text-sm mt-2">Share Drawing</span>
														</div>
														<!-- Share Poem -->
														<div class="flex flex-col items-center">
															<div
																class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-indigo-100 hover:bg-indigo-200 hover:scale-110 hover:shadow-lg transition animate-bounce">
																<i class="fa-solid fa-feather text-indigo-600 text-lg"></i>
															</div>
															<span class="text-sm mt-2">Share Poem</span>
														</div>
													</div>
												</div>
								</div>
				</div>

				<div class="w-full px-4 py-12 bg-green-700">
								<!-- Intro Text -->
								<h1 class="text-2xl md:text-2xl text-center text-white font-bold animate-bounce">
												CHILD RIGHTS
								</h1>
								<p class="max-w-3xl mx-auto text-center text-base md:text-lg font-medium mb-20">
												Awareness Of Child Rights Also Encourages Families, Schools, And Communities To Create A Safe And Supportive
												Environment Where Every Child Can Grow, Learn, And Reach Their Full Potential.
								</p>

								<!-- Rights Icons Row -->
								<div class="flex flex-wrap justify-between gap-8 w-full max-w-5xl mx-auto">
												<!-- Education Rights -->
												<div class="flex flex-col items-center">
																<div
																				class="w-16 h-16 md:w-20 md:h-20 flex items-center justify-center rounded-full bg-blue-100 hover:bg-blue-200 hover:scale-110 hover:shadow-lg transition">
																				<i class="fa-solid fa-graduation-cap text-blue-600 text-xl"></i>
																</div>
																<span class="text-sm md:text-base mt-2 text-white font-semibold">Education Rights</span>
												</div>

												<!-- Participation Rights -->
												<div class="flex flex-col items-center">
																<div
																				class="w-16 h-16 md:w-20 md:h-20 flex items-center justify-center rounded-full bg-green-100 hover:bg-green-200 hover:scale-110 hover:shadow-lg transition">
																				<i class="fa-solid fa-people-group text-green-600 text-xl"></i>
																</div>
																<span class="text-sm md:text-base mt-2 text-white font-semibold">Participation Rights</span>
												</div>

												<!-- Protection Rights -->
												<div class="flex flex-col items-center">
																<div
																				class="w-16 h-16 md:w-20 md:h-20 flex items-center justify-center rounded-full bg-yellow-100 hover:bg-yellow-200 hover:scale-110 hover:shadow-lg transition">
																				<i class="fa-solid fa-shield text-yellow-600 text-xl"></i>
																</div>
																<span class="text-sm md:text-base mt-2 text-white font-semibold">Protection Rights</span>
												</div>

												<!-- Healthy Rights -->
												<div class="flex flex-col items-center">
																<div
																				class="w-16 h-16 md:w-20 md:h-20 flex items-center justify-center rounded-full bg-red-100 hover:bg-red-200 hover:scale-110 hover:shadow-lg transition">
																				<i class="fa-solid fa-heart text-red-600 text-xl"></i>
																</div>
																<span class="text-sm md:text-base mt-2 text-white font-semibold">Healthy Rights</span>
												</div>
								</div>
				</div>
				<!-- images section -->
				<div class="w-full px-4 py-12 bg-white" x-data="{
		    current: 0,
		    images: [
		        '/images/window1.png',
		        '/images/window2.png',
		        '/images/window3.png',
		        '/images/window4.png',
		        '/images/window5.png'
		    ]
		}">

								<!-- Section Heading -->
								<h2 class="text-2xl md:text-3xl font-bold text-center mb-4 animate-bounce">
												Helping Kids Grow Through Play And Learning
								</h2>

								<!-- Desktop: auto-sliding carousel -->
								<div class="hidden md:block w-full overflow-hidden">
												<div class="flex w-max items-center animate-marquee">
																<template x-for="img in images" :key="'a-' + img">
																				<img :src="img" class="shrink-0 h-20 lg:h-32 xl:h-44 w-auto object-contain mr-4" alt="Image">
																</template>
																<template x-for="img in images" :key="'b-' + img">
																				<img :src="img" class="shrink-0 h-20 lg:h-32 xl:h-44 w-auto object-contain mr-4" alt="Image">
																</template>
												</div>
								</div>

								<!-- Mobile: arrows + single row view -->
								<div class="relative md:hidden flex justify-center items-center">
												<img :src="images[current]" class="shrink-0 max-w-full max-h-64 w-auto object-contain" alt="Image">

												<!-- Left Arrow -->
												<button x-show="current > 0" @click="current--"
																class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full">
																&#8592;
												</button>

												<!-- Right Arrow -->
												<button x-show="current < images.length - 1" @click="current++"
																class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full">
																&#8594;
												</button>
								</div>
				</div>

				<!-- Kids News & Updates Section -->
				<section class="py-16 px-6 md:px-12 bg-white">
								<div class="max-w-8xl mx-auto">
												<h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-10 text-center animate-bounce">Kids News & Updates
												</h2>

												<div class="flex flex-wrap justify-center items-start gap-8">
																<!-- Card 1: Career Girl -->
																<div class="relative inline-block rounded-lg shadow-lg animate-fadeInUp">
																				<img src="{{ asset("images/career-girl.png") }}" alt="Career Girl" class="rounded-lg shadow-md z-0">
																				<!-- Overlay -->
																				<div class="absolute inset-0 bg-black/40 rounded-lg pointer-events-none"></div>
																				<!-- Text + Button -->
																				<div class="absolute inset-0 flex flex-col justify-end items-center p-4 z-20">
																								<h3 class="text-lg font-bold text-white mb-2 flex items-center gap-2">
																												<i class="fa-solid fa-play text-red-500"></i> Career Kids
																								</h3>
																								<button class="bg-red-600 text-white px-3 py-1 text-sm rounded-md hover:bg-red-700 transition">
																												Share Video
																								</button>
																				</div>
																</div>

																<!-- Card 2: Spelling Game -->
																<div class="relative inline-block rounded-lg shadow-lg animate-fadeInUp delay-200">
																				<img src="{{ asset("images/spelling.png") }}" alt="Spelling Game" class="rounded-lg shadow-md z-0">
																				<!-- Overlay -->
																				<div class="absolute inset-0 bg-black/40 rounded-lg pointer-events-none"></div>
																				<!-- Text + Button -->
																				<div class="absolute inset-0 flex flex-col justify-end items-center p-4 z-20">
																								<h3 class="text-xl font-bold text-green-400 mb-2 animate-bounce">SPELLING GAME</h3>
																								<button class="bg-red-600 text-white px-3 py-1 text-sm rounded-md hover:bg-red-700 transition">
																												Compete
																								</button>
																				</div>
																</div>

																<!-- Card 3: Career Boy -->
																<div class="relative inline-block rounded-lg shadow-lg animate-fadeInUp delay-500">
																				<img src="{{ asset("images/career-boy.png") }}" alt="Career Boy" class="rounded-lg shadow-md z-0">
																				<!-- Overlay -->
																				<div class="absolute inset-0 bg-black/40 rounded-lg pointer-events-none"></div>
																				<!-- Text + Button -->
																				<div class="absolute inset-0 flex flex-col justify-end items-center p-4 z-20">
																								<h3 class="text-lg font-bold text-white mb-2 flex items-center gap-2">
																												<i class="fa-solid fa-play text-red-500"></i> Career Kids
																								</h3>
																								<button class="bg-red-600 text-white px-3 py-1 text-sm rounded-md hover:bg-red-700 transition">
																												Share Video
																								</button>
																				</div>
																</div>
												</div>
								</div>
				</section>

@endsection
