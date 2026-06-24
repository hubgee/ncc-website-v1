@extends("layouts.app")

@section("title", 'Children\'s Corner')

@section("content")

				<div class="w-full px-4 py-12 bg-[url('/images/child-sketches.jpg')] bg-cover bg-center relative">
								<!-- Overlay -->
								<div class="absolute inset-0 bg-black/20"></div>

								<!-- Content wrapper -->
								<div class="relative z-10 text-center">
												<!-- Hero Title -->
												<h1 class="text-4xl md:text-6xl font-bold animate-bounce">
																CHILD RIGHTS CORNER
												</h1>

												<!-- Mission Statement -->
												<p class="max-w-xl mx-auto mt-4 text-base md:text-lg">
																We are dedicated to safeguarding the well-being of all children by promoting their rights,
																protecting their dignity and empowering them to reach their full potential.
												</p>

												<!-- Horizontal layout -->
												<div class="flex justify-between items-center mt-10">
																<!-- Left Icons -->
																<div class="flex space-x-25">
																				<!-- Quizzes -->
																				<div class="flex flex-col items-center">
																								<div
																												class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-blue-100 hover:bg-blue-200 hover:scale-110 hover:shadow-lg transition">
																												<i class="fa-solid fa-question text-blue-600 text-lg"></i>
																								</div>
																								<span class="text-sm mt-2">Quizzes</span>
																				</div>
																				<!-- Games -->
																				<div class="flex flex-col items-center">
																								<div
																												class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-green-100 hover:bg-green-200 hover:scale-110 hover:shadow-lg transition">
																												<i class="fa-solid fa-gamepad text-green-600 text-lg"></i>
																								</div>
																								<span class="text-sm mt-2">Games</span>
																				</div>
																				<!-- Videos -->
																				<div class="flex flex-col items-center">
																								<div
																												class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-red-100 hover:bg-red-200 hover:scale-110 hover:shadow-lg transition">
																												<i class="fa-solid fa-video text-red-600 text-lg"></i>
																								</div>
																								<span class="text-sm mt-2">Videos</span>
																				</div>
																				<!-- Stories -->
																				<div class="flex flex-col items-center">
																								<div
																												class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-yellow-100 hover:bg-yellow-200 hover:scale-110 hover:shadow-lg transition">
																												<i class="fa-solid fa-book-open text-yellow-600 text-lg"></i>
																								</div>
																								<span class="text-sm mt-2">Stories</span>
																				</div>
																</div>

																<!-- Center Stick Figure -->
																<div class="flex justify-center">
																				<img src="/images/child-hero.png" alt="Children illustration" class="w-60 md:w-150 mx-auto" />
																</div>

																<!-- Right Icons -->
																<div class="flex space-x-25">
																				<!-- Share Story -->
																				<div class="flex flex-col items-center">
																								<div
																												class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-purple-100 hover:bg-purple-200 hover:scale-110 hover:shadow-lg transition">
																												<i class="fa-solid fa-pencil text-purple-600 text-lg"></i>
																								</div>
																								<span class="text-sm mt-2">Share Story</span>
																				</div>
																				<!-- Share Drawing -->
																				<div class="flex flex-col items-center">
																								<div
																												class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-pink-100 hover:bg-pink-200 hover:scale-110 hover:shadow-lg transition">
																												<i class="fa-solid fa-paintbrush text-pink-600 text-lg"></i>
																								</div>
																								<span class="text-sm mt-2">Share Drawing</span>
																				</div>
																				<!-- Share Poem -->
																				<div class="flex flex-col items-center">
																								<div
																												class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center rounded-full bg-indigo-100 hover:bg-indigo-200 hover:scale-110 hover:shadow-lg transition">
																												<i class="fa-solid fa-feather text-indigo-600 text-lg"></i>
																								</div>
																								<span class="text-sm mt-2">Share Poem</span>
																				</div>
																</div>
												</div>
								</div>
				</div>
				<div class="w-full px-4 py-12 bg-green-600">
								<!-- Intro Text -->
								<h1 class="text-2xl md:text-2xl text-center text-white font-bold animate-bounce">
												CHILD RIGHTS
								</h1>
								<p class="max-w-3xl mx-auto text-center text-base md:text-lg font-medium mb-20">
												Awareness Of Child Rights Also Encourages Families, Schools, And Communities To Create A Safe And Supportive
												Environment Where Every Child Can Grow, Learn, And Reach Their Full Potential.
								</p>

								<!-- Rights Icons Row -->
								<div class="flex justify-center gap-8 md:gap-50">
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

				<div class="w-full px-4 py-12 bg-white">
								<!-- Section Heading -->
								<h2 class="text-2xl md:text-3xl font-bold text-center mb-4 mt-8 animate-bounce">
												Helping Kids Grow Through Play And Learning
								</h2>

								<!-- Images Row -->
								<div class="flex justify-center gap-4">
												<img src="/images/window1.png" alt="Window 1" />
												<img src="/images/window2.png" alt="Window 2" />
												<img src="/images/window3.png" alt="Window 3" class="h-70" style="margin-top: 2rem;" />
												<img src="/images/window4.png" alt="Window 4" />
												<img src="/images/window5.png" alt="Window 5" />
								</div>
				</div>

@endsection
