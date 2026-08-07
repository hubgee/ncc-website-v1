@extends("layouts.app")
@section("title", "News")
@section("content")

				<!-- News Banner Section -->
				<section class="w-full bg-white p">
								<div class="max-w-7xl mx-auto px-6 pt-7 flex items-center gap-10">
												<p class="text-lg font-serif text-red-600 uppercase tracking-widest inline-flex items-center gap-2">
																News <i class="fa-solid fa-book text-base"></i>
												</p>
												<a href="#" class="text-gray-700 hover:text-red-600 inline-flex items-center gap-1">
																Share <i class="fa-solid fa-share-nodes"></i>
												</a>
								</div>
								<h1 class="max-w-7xl mx-auto px-6 py-7 text-5xl md:text-4xl font-bold text-gray-900 mb-4">
												Protect Families & Children
								</h1>
								<div class="max-w-7xl mx-auto px-6">
												<img src="{{ asset("images/newsbanner.png") }}" alt="News Banner" class="w-full h-100 md:h-200 object-cover">
								</div>
								<div class="max-w-5xl mx-auto px-6 py-10">
												<p class="text-sm text-gray-500 mb-4">2 June 2026</p>
												<p class="text-lg text-gray-700 leading-relaxed font-bold">
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
								<!-- Red Line Divider -->
								<div class="flex justify-center my-6">
												<hr class="w-7xl border-t-3 border-red-600">
								</div>
								<!-- News Cards Section -->
								<section class="w-full bg-white py-12 px-4 sm:px-6 lg:px-8">
												<div class="max-w-7xl mx-auto space-y-8">
																<h1 class="max-w-7xl mx-auto px-4 py-4 text-3xl md:text-3xl font-bold text-red-700 mb-4">
																				RELATED NEWS
																</h1>
																<!-- Card 1 -->
																<div class="flex flex-col md:flex-row bg-white rounded-lg shadow overflow-hidden">
																				<!-- Image -->
																				<img src="{{ asset("images/news1.png") }}" alt="News 1" class="w-full md:w-1/2 h-64 object-cover">
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
																				<img src="{{ asset("images/news2.png") }}" alt="News 2" class="w-full md:w-1/2 h-64 object-cover">
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
																				<img src="{{ asset("images/news3.png") }}" alt="News 3" class="w-full md:w-1/2 h-64 object-cover">
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

@endsection
