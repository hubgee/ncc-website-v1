@extends("layouts.app")

@section("title", "Donate")

@section("content")
				<!-- Donation Section -->
				<div id="donation-box" class= "relative bg-gray-100 py-12 px-4" x-data="{ tab: 'monthly', selectedAmount: 2000 }">

								<!-- Headline -->
								<h1 class="text-3xl font-bold text-center mb-6 text-emerald-700">
												MAKE A CHILD SMILE
								</h1>

								<!-- Images (placeholders for now) -->
								<div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8">
												<img src="{{ asset("images/boy childd.jpg") }}" alt="Child Left" class="w-full md:w-1/3 rounded-lg shadow">
												<div class="w-full md:w-1/3 flex flex-col items-center bg-white shadow-lg rounded-lg p-6">

																<!-- Toggle Tabs -->
																<div class="flex gap-4 mb-6">
																				<button @click="tab = 'monthly'; selectedAmount = 2000"
																								:class="tab === 'monthly' ? 'bg-emerald-600 text-white' : 'bg-gray-200 text-gray-700'"
																								class="px-4 py-2 rounded-lg font-semibold">
																								MONTHLY
																				</button>
																				<button @click="tab = 'oneoff'; selectedAmount = 2000"
																								:class="tab === 'oneoff' ? 'bg-emerald-600 text-white' : 'bg-gray-200 text-gray-700'"
																								class="px-4 py-2 rounded-lg font-semibold">
																								ONE-OFF
																				</button>
																</div>

																<!-- Amount Options -->
																<div class="flex flex-col gap-3 mb-6 w-full">
																				<template x-for="amount in [2000, 5000, 10000]" :key="amount">
																								<button @click="selectedAmount = amount"
																												:class="selectedAmount === amount ? 'bg-emerald-600 text-white' : 'bg-gray-100 text-gray-700'"
																												class="w-full px-4 py-2 rounded-lg font-semibold">
																												Mkw <span x-text="amount"></span>
																								</button>
																				</template>
																</div>

																<!-- Supporting Text -->
																<p class="text-gray-600 text-center mb-4">
																				Change children’s lives every single month with a regular donation.
																</p>

																<!-- Continue Button -->
																<a href="{{ route("checkout") }}"
																				class="w-full text-center px-4 py-2 bg-red-600 text-white rounded-lg font-bold hover:bg-red-700 transition">
																				Continue
																</a>

																<!-- Payment Methods -->
																<div class="flex justify-center gap-10 mt-6">
																				<img src="{{ asset("images/airtel.png") }}" alt="Airtel Money" class="h-8">
																				<img src="{{ asset("images/visa.png") }}" alt="Visa" class="h-8">
																				<img src="{{ asset("images/paypal.png") }}" alt="PayPal" class="h-8">
																				<img src="{{ asset("images/tnm.png") }}" alt="TNM Mpamba" class="h-8">
																</div>
												</div>
												<img src="{{ asset("images/girl child.jpg") }}" alt="Child Right" class="w-full md:w-1/3 rounded-lg shadow">
								</div>
				</div>
				<!-- Intro Information Section -->
				<div class="bg-white py-12 px-4">
								<div class="max-w-4xl mx-auto text-center">
												<!-- Headings -->
												<h2 class="text-4xl font-bold text-gray-900 mb-2">
																Donate to help children today
												</h2>
												<h3 class="text-xl font-semibold text-red-600 mb-6">
																Our Children, Our Responsibility
												</h3>

												<!-- Body Text -->
												<p class="text-gray-700 mb-8">
																Your support can give them access to education, healthcare, and nutritious food.
																Even small contributions make a big difference in shaping their future.
																Together, we can bring hope and opportunity to every child in need.
												</p>

												<!-- CTA Button -->
												<a href="#donation-box"
																class="inline-block px-6 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition">
																Donate →
												</a>
								</div>
				</div>

				<!-- scrollable impact section -->
				<div class="bg-gray-100 py-12 px-4" x-data="{
	    current: 0,
	    cards: [
	        { amount: 500, text: 'can provide a warm blanket to a child lacking in our rural settlements.', img: '/images/covered.jpg' },
	        { amount: 1000, text: 'can help feed children in schools located in hunger stricken areas.', img: '/images/food child.jpg' },
	        { amount: 2000, text: 'can assist in funding child healthcare programs in Malawi.', img: '/images/vaccine1.jpg' },
	        { amount: 700, text: 'can help in child protection initiatives across the country.', img: '/images/NCCkids.jpg' },
	        { amount: 2000, text: 'can provide a warm blanket to a child lacking in our rural settlements.', img: '/images/covered.jpg' },
	        { amount: 5000, text: 'can help fund educational programs for underprivileged children.', img: '/images/update-2.jpg' }
	    ]
	}">

								<!-- Heading -->
								<h2 class="text-2xl md:text-3xl font-bold text-center mb-8">
												Even a little Donation makes a big Difference
								</h2>

								<!-- Cards Row -->
								<div class="relative flex justify-center items-center">
												<!-- Left Arrow -->
												<button x-show="current > 0" @click="current -= 2"
																class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full">
																&#8592;
												</button>

												<!-- Visible Cards -->
												<div class="grid grid-cols-1 md:grid-cols-2 gap-15 w-full max-w-6xl">
																<template x-for="(card, index) in cards.slice(current, current+2)" :key="index">
																				<div class="bg-gray-100 rounded-lg shadow p-4 text-center">
																								<img :src="card.img" alt="Donation Impact" class="w-full h-75 object-cover rounded mb-4">
																								<h3 class="text-lg font-bold mb-2">A Mkw <span x-text="card.amount"></span> Donation</h3>
																								<p class="text-gray-700 mb-4" x-text="card.text"></p>
																				</div>
																</template>
												</div>

												<!-- Right Arrow -->
												<button x-show="current < cards.length - 2" @click="current += 2"
																class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full">
																&#8594;
												</button>
								</div>

								<!-- CTA Button -->
								<div class="text-center mt-8">
												<a href="#donation-box"
																class="inline-block px-6 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition">
																Donate
												</a>
								</div>
				</div>

				<!-- our supporters Section -->
				<div class="bg-gray-50 py-12 px-4">
								<div class="max-w-7xl mx-auto text-center">
												<!-- Heading -->
												<h2 class="text-3xl font-bold text-gray-900 mb-12">
																Thanks to our supporters
												</h2>

												<!-- Grid -->
												<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
																<!-- Card 1 -->
																<div class="relative bg-white rounded-lg shadow p-6 pt-12 border-b-4 border-red-600">
																				<!-- Icon -->
																				<div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-red-600 text-white rounded-full p-4">
																								<i class="fas fa-users text-2xl"></i>
																				</div>
																				<!-- Number -->
																				<div class="text-2xl font-extrabold text-gray-900 mb-2">12,000</div>
																				<!-- Text -->
																				<p class="text-gray-600">
																								Children have been kept safe through our child protection programmes.
																				</p>
																</div>

																<!-- Card 2 -->
																<div class="relative bg-white rounded-lg shadow p-6 pt-12 border-b-4 border-red-600">
																				<div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-red-600 text-white rounded-full p-4">
																								<i class="fas fa-graduation-cap text-2xl"></i>
																				</div>
																				<div class="text-2xl font-extrabold text-gray-900 mb-2">23,000</div>
																				<p class="text-gray-600">
																								Children have been kept at school through our child education programmes.
																				</p>
																</div>

																<!-- Card 3 -->
																<div class="relative bg-white rounded-lg shadow p-6 pt-12 border-b-4 border-red-600">
																				<div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-red-600 text-white rounded-full p-4">
																								<i class="fas fa-bullhorn text-2xl"></i>
																				</div>
																				<div class="text-2xl font-extrabold text-gray-900 mb-2">5,000</div>
																				<p class="text-gray-600">
																								Guardians have been sensitized through our child protection awareness programmes.
																				</p>
																</div>
												</div>
								</div>
				</div>
				<!-- PIE CHART SECTION & SCROLLABLE CARDS SECTION -->
				<div class="bg-gray-50 py-12 px-4" x-data="{
	    current: 0,
	    cards: [
	        { type: 'chart', title: 'Supporting Our Work', text: '75% of every donation goes directly to programmes. 25% is invested in fundraising.', chart: true },
	        { type: 'photo', title: 'Supporting Child Education', text: 'Donations help provide supplies, uniforms, safe learning environments, and teacher training.', img: '/images/update-1.jpg' },
	        { type: 'photo', title: 'Supporting Child Education', text: 'Donations help provide supplies, uniforms, safe learning environments, and teacher training.', img: '/images/mission.jpg' },
	        { type: 'photo', title: 'Supporting Child Education', text: 'Donations help provide supplies, uniforms, safe learning environments, and teacher training.', img: '/images/Kids-Coding.jpg' },
	        { type: 'photo', title: 'Supporting Child Education', text: 'Donations help provide supplies, uniforms, safe learning environments, and teacher training.', img: '/images/about-vision.jpg' },
	        { type: 'photo', title: 'Supporting Child Education', text: 'Donations help provide supplies, uniforms, safe learning environments, and teacher training.', img: '/images/kidstech.jpeg' }
	    ]
	}">

								<!-- Heading -->
								<h2 class="text-2xl md:text-3xl font-bold text-center mb-8">
												Where will your donation go
								</h2>

								<!-- Cards Row -->
								<div class="relative flex justify-center items-center">
												<!-- Left Arrow -->
												<button x-show="current > 0" @click="current -= 2"
																class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-l-[10px]">
																&#8592;
												</button>

												<!-- Visible Cards -->
												<div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-7xl">
																<template x-for="(card, index) in cards.slice(current, current+2)" :key="index">
																				<div class="bg-white rounded-lg shadow p-6 text-center">
																								<!-- Chart Card -->
																								<template x-if="card.type === 'chart'">
																												<div>
																																<canvas id="donationChart" class="mb-6"></canvas>
																																<h3 class="text-xl font-bold mb-2" x-text="card.title"></h3>
																																<p class="text-gray-700" x-text="card.text"></p>
																												</div>
																								</template>

																								<!-- Photo Card -->
																								<template x-if="card.type === 'photo'">
																												<div>
																																<img :src="card.img" alt="Donation Impact"
																																				class="w-full h-80 object-cover rounded mb-6">
																																<h3 class="text-xl font-bold mb-2" x-text="card.title"></h3>
																																<p class="text-gray-700" x-text="card.text"></p>
																												</div>
																								</template>
																				</div>
																</template>
												</div>

												<!-- Right Arrow -->
												<button x-show="current < cards.length - 2" @click="current += 2"
																class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-r-[10px]">
																&#8594;
												</button>
								</div>
				</div>

				<!-- Chart.js Script -->
				<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
				<script>
								document.addEventListener('alpine:init', () => {
												const ctx = document.getElementById('donationChart').getContext('2d');
												new Chart(ctx, {
																type: 'pie',
																data: {
																				labels: ['Charitable Programmes', 'Fundraising'],
																				datasets: [{
																								data: [75, 25],
																								backgroundColor: ['#10B981', '#D1D5DB'], // green + gray
																				}]
																},
																options: {
																				responsive: true,
																				plugins: {
																								legend: {
																												position: 'bottom'
																								}
																				}
																}
												});
								});
				</script>
				<!-- embedded video section  -->

				<section class="w-full bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
								<div class="max-w-5xl mx-auto flex flex-col items-center">

												<!-- Heading -->
												<h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6 text-center">
																Watch Our Story
												</h2>

												{{-- Video Wrapper with Aspect Ratio --}}
												<div class="w-full aspect-video rounded-xl shadow-lg overflow-hidden bg-black">
																<iframe class="w-full h-full border-0" src="https://www.youtube.com/embed/WMNEL8-INig"
																				title="Watch Our Story"
																				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
																				allowfullscreen>
																</iframe>
												</div>

								</div>
				</section>

@endsection
