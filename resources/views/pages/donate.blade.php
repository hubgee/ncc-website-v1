@extends("layouts.app")

@section("title", "Donate")

@section("content")
				<!-- Donation Section -->
				<div id="donation-box" class="relative bg-gray-100 py-12 px-4" x-data="{ tab: 'monthly', selectedAmount: 2000, heroVisible: false }" x-init="$nextTick(() => heroVisible = true)">

								<!-- Headline -->
								<h1 class="text-3xl font-bold text-center mb-6 text-emerald-700"
												x-show="heroVisible"
												x-transition:enter="transition ease-out duration-700"
												x-transition:enter-start="opacity-0 -translate-y-6"
												x-transition:enter-end="opacity-100 translate-y-0">
												MAKE A CHILD SMILE
								</h1>

								<!-- Images (placeholders for now) -->
								<div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8"
												x-show="heroVisible"
												x-transition:enter="transition ease-out duration-700 delay-100"
												x-transition:enter-start="opacity-0 -translate-y-6"
												x-transition:enter-end="opacity-100 translate-y-0">
												<img src="{{ asset("images/boy childd.jpg") }}" alt="Child Left"
																class="w-full md:w-1/3 rounded-lg shadow hidden lg:block transition-opacity duration-500">
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
																				Change children's lives every single month with a regular donation.
																</p>

																<!-- Continue Button -->
																<a href="{{ route("checkout") }}"
																				class="w-full text-center px-4 py-2 bg-red-600 text-white rounded-lg font-bold hover:bg-red-700 transition">
																				Continue
																</a>

																<!-- Payment Methods -->
																<div
																				class="flex flex-row lg:flex-row md:flex-col sm:flex-col justify-center gap-4 mt-6 transition-all duration-500 ease-in-out">
																				<img src="{{ asset("images/airtel.png") }}" alt="Airtel Money" class="h-8 mx-auto">
																				<img src="{{ asset("images/visa.png") }}" alt="Visa" class="h-8 mx-auto">
																				<img src="{{ asset("images/paypal.png") }}" alt="PayPal" class="h-8 mx-auto">
																				<img src="{{ asset("images/tnm.png") }}" alt="TNM Mpamba" class="h-8 mx-auto">
																</div>
												</div>
												<img src="{{ asset("images/girl child.jpg") }}" alt="Child Right" class="w-full md:w-1/3 rounded-lg shadow">
								</div>
				</div>
				<!-- Intro Information Section -->
				<div class="bg-white py-12 px-4" x-data="{ introVisible: false }" x-init="$nextTick(() => introVisible = true)">
								<div class="max-w-4xl mx-auto text-center"
												x-show="introVisible"
												x-transition:enter="transition ease-out duration-700"
												x-transition:enter-start="opacity-0 translate-y-6"
												x-transition:enter-end="opacity-100 translate-y-0">
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
    perPage: window.innerWidth >= 768 ? 2 : 1,
    sectionVisible: false,
    init() {
        window.addEventListener('resize', () => {
            this.perPage = window.innerWidth >= 768 ? 2 : 1;
            if (this.current > this.cards.length - this.perPage) {
                this.current = Math.max(0, this.cards.length - this.perPage);
            }
        });
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.sectionVisible = true;
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        observer.observe($el);
    },
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
								<h2 class="text-2xl md:text-3xl font-bold text-center mb-8"
												x-show="sectionVisible"
												x-transition:enter="transition ease-out duration-700"
												x-transition:enter-start="opacity-0 translate-y-6"
												x-transition:enter-end="opacity-100 translate-y-0">
												Even a little Donation makes a big Difference
								</h2>

								<!-- Cards Row -->
								<div class="relative flex justify-center items-center">
												<!-- Left Arrow -->
												<button x-show="current > 0" @click="current = Math.max(0, current - perPage)"
																class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full">
																&#8592;
												</button>

												<!-- Visible Cards -->
												<div class="grid grid-cols-1 md:grid-cols-2 gap-15 w-full max-w-6xl">
																<template x-for="(card, index) in cards.slice(current, current + perPage)" :key="index">
																				<div class="bg-gray-100 rounded-lg shadow p-4 text-center"
																								x-show="sectionVisible"
																								x-transition:enter="transition ease-out duration-700"
																								x-transition:enter-start="opacity-0 -translate-x-6"
																								x-transition:enter-end="opacity-100 translate-x-0"
																								:style="'transition-delay: ' + (index * 150) + 'ms'">
																								<img :src="card.img" alt="Donation Impact" class="w-full h-75 object-cover rounded mb-4">
																								<h3 class="text-lg font-bold mb-2">
																												A Mkw <span x-text="card.amount"></span> Donation
																								</h3>
																								<p class="text-gray-700 mb-4" x-text="card.text"></p>
																				</div>
																</template>
												</div>

												<!-- Right Arrow -->
												<button x-show="current < cards.length - perPage"
																@click="current = Math.min(cards.length - perPage, current + perPage)"
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
				<div class="bg-gray-50 py-12 px-4" x-data="{ visible: { heading: false, card1: false, card2: false, card3: false } }" x-init="Object.keys(visible).forEach((key, i) => setTimeout(() => visible[key] = true, i * 150))">
								<div class="max-w-7xl mx-auto text-center">
												<!-- Heading -->
												<h2 class="text-3xl font-bold text-gray-900 mb-12"
																x-show="visible.heading"
																x-transition:enter="transition ease-out duration-700"
																x-transition:enter-start="opacity-0 translate-y-6"
																x-transition:enter-end="opacity-100 translate-y-0">
																Thanks to our supporters
												</h2>

												<!-- Grid -->
												<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
																<!-- Card 1 -->
																<div class="relative bg-white rounded-lg shadow p-6 pt-12 border-b-4 border-red-600"
																				x-show="visible.card1"
																				x-transition:enter="transition ease-out duration-700"
																				x-transition:enter-start="opacity-0 translate-y-6"
																				x-transition:enter-end="opacity-100 translate-y-0">
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
																<div class="relative bg-white rounded-lg shadow p-6 pt-12 border-b-4 border-red-600 mt-4"
																				x-show="visible.card2"
																				x-transition:enter="transition ease-out duration-700"
																				x-transition:enter-start="opacity-0 translate-y-6"
																				x-transition:enter-end="opacity-100 translate-y-0">
																				<div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-red-600 text-white rounded-full p-4">
																								<i class="fas fa-graduation-cap text-2xl"></i>
																				</div>
																				<div class="text-2xl font-extrabold text-gray-900 mb-2">23,000</div>
																				<p class="text-gray-600">
																								Children have been kept at school through our child education programmes.
																				</p>
																</div>

																<!-- Card 3 -->
																<div class="relative bg-white rounded-lg shadow p-6 pt-12 border-b-4 border-red-600 mt-4"
																				x-show="visible.card3"
																				x-transition:enter="transition ease-out duration-700"
																				x-transition:enter-start="opacity-0 translate-y-6"
																				x-transition:enter-end="opacity-100 translate-y-0">
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
    perPage: window.innerWidth >= 768 ? 2 : 1,
    sectionVisible: false,
    init() {
        window.addEventListener('resize', () => {
            this.perPage = window.innerWidth >= 768 ? 2 : 1;
            if (this.current > this.cards.length - this.perPage) {
                this.current = Math.max(0, this.cards.length - this.perPage);
            }
        });
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.sectionVisible = true;
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        observer.observe($el);
    },
	    cards: [
	        { type: 'chart', title: 'Supporting Our Work', text: '75% of every donation goes directly into charitable programmes. 25% is invested in fundraising.', chart: true },
	        { type: 'photo', title: 'Supporting Child Education', text: 'Donations help provide supplies, uniforms, safe learning environments, and teacher training.', img: '/images/update-1.jpg' },
	        { type: 'photo', title: 'Supporting Child Education', text: 'Donations help provide supplies, uniforms, safe learning environments, and teacher training.', img: '/images/mission.jpg' },
	        { type: 'photo', title: 'Supporting Child Education', text: 'Donations help provide supplies, uniforms, safe learning environments, and teacher training.', img: '/images/Kids-Coding.jpg' },
	        { type: 'photo', title: 'Supporting Child Education', text: 'Donations help provide supplies, uniforms, safe learning environments, and teacher training.', img: '/images/about-vision.jpg' },
	        { type: 'photo', title: 'Supporting Child Education', text: 'Donations help provide supplies, uniforms, safe learning environments, and teacher training.', img: '/images/kidstech.jpeg' }
	    ]
	}">

								<!-- Heading -->
								<h2 class="text-2xl md:text-3xl font-bold text-center mb-8"
												x-show="sectionVisible"
												x-transition:enter="transition ease-out duration-700"
												x-transition:enter-start="opacity-0 translate-y-6"
												x-transition:enter-end="opacity-100 translate-y-0">
												Where will your donation go
								</h2>

								<!-- Cards Row -->
								<div class="relative flex justify-center items-center">
												<!-- Left Arrow -->
												<button x-show="current > 0" @click="current = Math.max(0, current - perPage)"
																class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-l-[10px]">
																&#8592;
												</button>

												<!-- Visible Cards -->
												<div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-7xl">
																<template x-for="(card, index) in cards.slice(current, current + perPage)" :key="index">
																				<div class="bg-white rounded-lg shadow p-6 flex flex-col h-full text-center"
																								x-show="sectionVisible"
																								x-transition:enter="transition ease-out duration-700"
																								x-transition:enter-start="opacity-0 translate-x-6"
																								x-transition:enter-end="opacity-100 translate-x-0"
																								:style="'transition-delay: ' + (index * 150) + 'ms'">
																								<!-- Chart Card -->
																								<template x-if="card.type === 'chart'">
																												<div class="flex flex-col h-full" x-init="$nextTick(() => {
							    const ctx = $refs.donationChart.getContext('2d');
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
							            maintainAspectRatio: false,
							            plugins: {
							                legend: {
							                    position: 'bottom'
							                }
							            }
							        }
							    });
							})">
																																<div class="grow min-h-0">
																																				<canvas x-ref="donationChart" class="w-full h-full"></canvas>
																																</div>
																																<h3 class="text-xl font-bold mb-2" x-text="card.title"></h3>
																																<p class="text-gray-700" x-text="card.text"></p>
																												</div>
																								</template>

																								<!-- Photo Card -->
																								<template x-if="card.type === 'photo'">
																												<div class="flex flex-col h-full">
																																<img :src="card.img" alt="Donation Impact"
																																				class="w-full grow object-cover rounded mb-6">
																																<div class="mt-auto">
																																				<h3 class="text-xl font-bold mb-2" x-text="card.title"></h3>
																																				<p class="text-gray-700" x-text="card.text"></p>
																																</div>
																												</div>
																								</template>
																				</div>
																</template>
												</div>

												<!-- Right Arrow -->
												<button x-show="current < cards.length - perPage"
																@click="current = Math.min(cards.length - perPage, current + perPage)"
																class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-r-[10px]">
																&#8594;
												</button>
								</div>
				</div>

				<!-- embedded video section  -->

				<section class="w-full bg-gray-100 py-12 px-4 sm:px-6 lg:px-8" x-data="{ videoVisible: false }" x-init="const observer = new IntersectionObserver((entries) => {
				    entries.forEach(entry => {
				        if (entry.isIntersecting) {
				            videoVisible = true;
				            observer.unobserve(entry.target);
				        }
				    });
				}, { threshold: 0.2 });
				observer.observe($el)">
								<div class="max-w-6xl mx-auto flex flex-col items-center">

												<!-- Heading -->
												<h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6 text-center"
																x-show="videoVisible"
																x-transition:enter="transition ease-out duration-700"
																x-transition:enter-start="opacity-0 scale-95"
																x-transition:enter-end="opacity-100 scale-100">
																Watch Our Story
												</h2>

												{{-- Video Wrapper with Aspect Ratio --}}
												<div class="w-full aspect-video rounded-xl shadow-lg overflow-hidden bg-black"
																x-show="videoVisible"
																x-transition:enter="transition ease-out duration-700 delay-200"
																x-transition:enter-start="opacity-0 scale-95"
																x-transition:enter-end="opacity-100 scale-100">
																<iframe class="w-full h-full border-0" src="https://www.youtube.com/embed/WMNEL8-INig"
																				title="Watch Our Story"
																				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
																				allowfullscreen>
																</iframe>
												</div>

								</div>
				</section>
				<!-- FAQ Section -->
				<section class="w-full bg-gray-50 py-12 px-4 sm:px-6 lg:px-8" x-data="{ open: 1, faqVisible: false }" x-init="const observer = new IntersectionObserver((entries) => {
				    entries.forEach(entry => {
				        if (entry.isIntersecting) {
				            faqVisible = true;
				            observer.unobserve(entry.target);
				        }
				    });
				}, { threshold: 0.2 });
				observer.observe($el)">
								<div class="max-w-6xl mx-auto">

												<!-- Heading -->
												<h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-8 text-center"
																x-show="faqVisible"
																x-transition:enter="transition ease-out duration-700"
																x-transition:enter-start="opacity-0 translate-y-6"
																x-transition:enter-end="opacity-100 translate-y-0">
																FAQs about donating to National Children's Commission
												</h2>

												<!-- FAQ Items -->
												<div class="space-y-4"
																x-show="faqVisible"
																x-transition:enter="transition ease-out duration-700 delay-100"
																x-transition:enter-start="opacity-0 translate-y-6"
																x-transition:enter-end="opacity-100 translate-y-0">

																<!-- Item 1 -->
																<div class="border rounded-lg shadow-sm">
																				<button @click="open === 1 ? open = null : open = 1"
																								class="w-full flex justify-between items-center px-4 py-3 text-left font-medium text-gray-800">
																								How are my donations spent?
																								<span x-show="open === 1">−</span>
																								<span x-show="open !== 1">+</span>
																				</button>
																				<div x-show="open === 1" x-transition class="px-4 pb-4 text-gray-600">
																								Your donations will help children in the world’s most vulnerable places survive,
																								through providing essentials like food, water, and shelter; recover from trauma
																								they experienced; and equip them to rebuild their future. This ranges from
																								life-saving healthcare to counselling, play therapy, and education.
																				</div>
																</div>

																<!-- Item 2 -->
																<div class="border rounded-lg shadow-sm">
																				<button @click="open === 2 ? open = null : open = 2"
																								class="w-full flex justify-between items-center px-4 py-3 text-left font-medium text-gray-800">
																								Why should I make a monthly donation?
																								<span x-show="open === 2">−</span>
																								<span x-show="open !== 2">+</span>
																				</button>
																				<div x-show="open === 2" x-transition class="px-4 pb-4 text-gray-600">
																								Monthly donations provide consistent support, allowing us to plan long-term
																								projects and ensure children receive ongoing care and education.
																				</div>
																</div>

																<!-- Item 3 -->
																<div class="border rounded-lg shadow-sm">
																				<button @click="open === 3 ? open = null : open = 3"
																								class="w-full flex justify-between items-center px-4 py-3 text-left font-medium text-gray-800">
																								Why should I support National Children's Commission?
																								<span x-show="open === 3">−</span>
																								<span x-show="open !== 3">+</span>
																				</button>
																				<div x-show="open === 3" x-transition class="px-4 pb-4 text-gray-600">
																								Supporting NCC means investing in children’s rights, safety, and future.
																								Your contributions directly impact programs that protect and empower children.
																				</div>
																</div>

																<!-- Item 4 -->
																<div class="border rounded-lg shadow-sm">
																				<button @click="open === 4 ? open = null : open = 4"
																								class="w-full flex justify-between items-center px-4 py-3 text-left font-medium text-gray-800">
																								How do I know my donations are making a difference?
																								<span x-show="open === 4">−</span>
																								<span x-show="open !== 4">+</span>
																				</button>
																				<div x-show="open === 4" x-transition class="px-4 pb-4 text-gray-600">
																								We provide regular updates, reports, and stories showing how your donations
																								are changing lives and strengthening communities.
																				</div>
																</div>

																<!-- Item 5 -->
																<div class="border rounded-lg shadow-sm">
																				<button @click="open === 5 ? open = null : open = 5"
																								class="w-full flex justify-between items-center px-4 py-3 text-left font-medium text-gray-800">
																								Where in the world will my donations be used?
																								<span x-show="open === 5">−</span>
																								<span x-show="open !== 5">+</span>
																				</button>
																				<div x-show="open === 5" x-transition class="px-4 pb-4 text-gray-600">
																								Donations are directed to areas where children are most at risk,
																								ensuring resources reach those who need them most.
																				</div>
																</div>

												</div>

												<!-- Donate Button -->
												<div class="mt-8 text-center">
																<a href="#donation-box"
																				class="inline-block bg-red-600 hover:bg-red-300 text-white font-semibold px-6 py-3 rounded-lg shadow">
																				Donate
																</a>
												</div>
								</div>
				</section>

@endsection
