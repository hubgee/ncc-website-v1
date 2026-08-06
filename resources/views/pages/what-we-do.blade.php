@extends("layouts.app")

@section("title", "What We Do")

@section("content")
				<section class="px-6 md:px-12 bg-white" x-data="{ tab: 'protection' }">
								<div class="mx-auto grid max-w-8xl grid-cols-1 gap-8">

												<!-- Left: Hero Image with overlay + centered text -->
												<div class="relative h-64 overflow-hidden rounded-lg shadow-md sm:h-80">
																<img src="{{ asset("images/what-we-do-banner.png") }}" alt="Children smiling"
																				class="w-full h-full object-cover animate-pulse">
																<!-- Overlay -->
																<div class="absolute inset-0 bg-black/50"></div>
																<!-- Centered Text -->
																<div class="absolute inset-0 z-10 flex flex-col items-center justify-center text-center px-6">
																				<h1 class="text-3xl md:text-4xl font-bold text-white mb-4">WHAT WE DO</h1>
																				<p class="text-lg md:text-xl text-gray-100 mb-8">
																								Every child deserves to feel safe, heard and protected!
																				</p>

																				<!-- Statistics inside hero -->
																				<div class="grid grid-cols-2 md:grid-cols-4 gap-15 text-center">
																								<div>
																												<h3 class="text-2xl font-bold text-white">1,249+</h3>
																												<p class="text-gray-100">Children Supported</p>
																								</div>
																								<div>
																												<h3 class="text-2xl font-bold text-white">2,000+</h3>
																												<p class="text-gray-100">Families Reached</p>
																								</div>
																								<div>
																												<h3 class="text-2xl font-bold text-white">6,000+</h3>
																												<p class="text-gray-100">Community Members</p>
																								</div>
																								<div>
																												<h3 class="text-2xl font-bold text-white">28</h3>
																												<p class="text-gray-100">Districts Covered</p>
																								</div>
																				</div>
																</div>
												</div>

												<!-- Right: Our Services Tabs
																																																																																																																																																																				<div class="flex flex-col justify-center gap-4 lg:h-80">
																																																																																																																																																																								<h2 class="text-2xl md:text-2xl font-semibold text-green-700 mb-2">Our Services</h2>
																																																																																																																																																																								<!-- Tabs
																																																																																																																																																																								<div class="flex flex-wrap gap-4 mb-8">
																																																																																																																																																																												<button @click="tab = 'protection'"
																																																																																																																																																																																:class="tab === 'protection'
																																																																																																																																																																																    ?
																																																																																																																																																																																    'bg-red-600 text-white' :
																																																																																																																																																																																    'bg-white text-gray-700 border'"
																																																																																																																																																																																class="px-2 py-1 rounded-md font-semibold">Child Protection</button>
																																																																																																																																																																												<button @click="tab = 'advocacy'"
																																																																																																																																																																																:class="tab === 'advocacy'
																																																																																																																																																																																    ?
																																																																																																																																																																																    'bg-red-600 text-white' :
																																																																																																																																																																																    'bg-white text-gray-700 border'"
																																																																																																																																																																																class="px-2 py-1 rounded-md font-semibold">Advocacy & Policy</button>
																																																																																																																																																																												<button @click="tab = 'awareness'"
																																																																																																																																																																																:class="tab === 'awareness'
																																																																																																																																																																																    ?
																																																																																																																																																																																    'bg-red-600 text-white' :
																																																																																																																																																																																    'bg-white text-gray-700 border'"
																																																																																																																																																																																class="px-2 py-1 rounded-md font-semibold">Awareness</button>
																																																																																																																																																																												<button @click="tab = 'capacity'"
																																																																																																																																																																																:class="tab === 'capacity'
																																																																																																																																																																																    ?
																																																																																																																																																																																    'bg-red-600 text-white' :
																																																																																																																																																																																    'bg-white text-gray-700 border'"
																																																																																																																																																																																class="px-2 py-1 rounded-md font-semibold">Capacity Building</button>
																																																																																																																																																																												<button @click="tab = 'referral'"
																																																																																																																																																																																:class="tab === 'referral'
																																																																																																																																																																																    ?
																																																																																																																																																																																    'bg-red-600 text-white' :
																																																																																																																																																																																    'bg-white text-gray-700 border'"
																																																																																																																																																																																class="px-2 py-1 rounded-md font-semibold">Referral & Support</button>
																																																																																																																																																																												<button @click="tab = 'research'"
																																																																																																																																																																																:class="tab === 'research'
																																																																																																																																																																																    ?
																																																																																																																																																																																    'bg-red-600 text-white' :
																																																																																																																																																																																    'bg-white text-gray-700 border'"
																																																																																																																																																																																class="px-2 py-1 rounded-md font-semibold">Research</button>
																																																																																																																																																																								</div>

																																																																																																																																																																								<!-- Tab Content
																																																																																																																																																												<div class="rounded-lg bg-white p-6 shadow-md">
																																																																																																																																																																<!-- Child Protection
																																																																																																																																																																												<div x-show="tab === 'protection'" class="flex items-start gap-4">
																																																																																																																																																																																<i class="fa-solid fa-shield-halved text-green-600 text-4xl"></i>
																																																																																																																																																																																<div>
																																																																																																																																																																																				<h3 class="font-bold text-xl text-gray-800 mb-2">Child Protection</h3>
																																																																																																																																																																																				<p class="text-gray-700 mb-4">
																																																																																																																																																																																								Monitoring and preventing abuse, neglect, and exploitation of children.
																																																																																																																																																																																								Investigating cases of child maltreatment. Promoting child-safe environments in communities,
																																																																																																																																																																																								schools, and institutions.
																																																																																																																																																																																				</p>
																																																																																																																																																																																				<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																</div>
																																																																																																																																																																												</div>
																																																																																																																																																																												<!-- Advocacy & Policy
																																																																																																																																																																												<div x-show="tab === 'advocacy'" class="flex items-start gap-4">
																																																																																																																																																																																<i class="fa-solid fa-gavel text-green-600 text-4xl"></i>
																																																																																																																																																																																<div>
																																																																																																																																																																																				<h3 class="font-bold text-xl text-gray-800 mb-2">Advocacy & Policy</h3>
																																																																																																																																																																																				<p class="text-gray-700 mb-4">
																																																																																																																																																																																								Placeholder: influencing laws and policies to strengthen child rights.
																																																																																																																																																																																								Working with government and stakeholders for systemic change.
																																																																																																																																																																																				</p>
																																																																																																																																																																																				<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																</div>
																																																																																																																																																																												</div>

																																																																																																																																																																												<!-- Awareness
																																																																																																																																																																												<div x-show="tab === 'awareness'" class="flex items-start gap-4">
																																																																																																																																																																																<i class="fa-solid fa-bullhorn text-green-600 text-4xl"></i>
																																																																																																																																																																																<div>
																																																																																																																																																																																				<h3 class="font-bold text-xl text-gray-800 mb-2">Awareness</h3>
																																																																																																																																																																																				<p class="text-gray-700 mb-4">
																																																																																																																																																																																								Placeholder: raising awareness through campaigns, workshops, and community outreach.
																																																																																																																																																																																								Empowering children and families with knowledge of their rights.
																																																																																																																																																																																				</p>
																																																																																																																																																																																				<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																</div>
																																																																																																																																																																												</div>

																																																																																																																																																																												<!-- Capacity Building
																																																																																																																																																																												<div x-show="tab === 'capacity'" class="flex items-start gap-4">
																																																																																																																																																																																<i class="fa-solid fa-users text-green-600 text-4xl"></i>
																																																																																																																																																																																<div>
																																																																																																																																																																																				<h3 class="font-bold text-xl text-gray-800 mb-2">Capacity Building</h3>
																																																																																																																																																																																				<p class="text-gray-700 mb-4">
																																																																																																																																																																																								Placeholder: training professionals, institutions, and communities.
																																																																																																																																																																																								Strengthening skills and resources for effective child protection.
																																																																																																																																																																																				</p>
																																																																																																																																																																																				<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																</div>
																																																																																																																																																																												</div>

																																																																																																																																																																												<!-- Referral & Support
																																																																																																																																																																												<div x-show="tab === 'referral'" class="flex items-start gap-4">
																																																																																																																																																																																<i class="fa-solid fa-hands-helping text-green-600 text-4xl"></i>
																																																																																																																																																																																<div>
																																																																																																																																																																																				<h3 class="font-bold text-xl text-gray-800 mb-2">Referral & Support</h3>
																																																																																																																																																																																				<p class="text-gray-700 mb-4">
																																																																																																																																																																																								Placeholder: connecting children and families to support services.
																																																																																																																																																																																								Providing pathways for counseling, healthcare, and legal aid.
																																																																																																																																																																																				</p>
																																																																																																																																																																																				<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																</div>
																																																																																																																																																																												</div>

																																																																																																																																																																												<!-- Research
																																																																																																																																																																												<div x-show="tab === 'research'" class="flex items-start gap-4">
																																																																																																																																																																																<i class="fa-solid fa-flask text-green-600 text-4xl"></i>
																																																																																																																																																																																<div>
																																																																																																																																																																																				<h3 class="font-bold text-xl text-gray-800 mb-2">Research</h3>
																																																																																																																																																																																				<p class="text-gray-700 mb-4">
																																																																																																																																																																																								Placeholder: conducting studies to inform evidence-based strategies.
																																																																																																																																																																																								Gathering data to improve child protection programs.
																																																																																																																																																																																				</p>
																																																																																																																																																																																				<a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
																																																																																																																																																																																</div>
																																																																																																																																																																															-->
				</section>

				<!-- Partnership Section -->
				<section class="w-full bg-white py-12 px-4 sm:px-6 lg:px-8">
								<div class="max-w-6xl mx-auto text-left">

												<!-- Heading -->
												<h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">
																WE WORK TOGETHER WITH OUR PARTNERS, AND CHILDREN AND THEIR COMMUNITIES, TO TRANSFORM LIVES
												</h2>

												<!-- Description -->
												<p class="text-gray-700 leading-relaxed mb-4">
																We go to remote corners, villages, and cities where it's really tough to be a child.
																We ask children, their families, and communities what children need to be healthy, safe, and learning.
																We listen to their experiences, insights, and ideas.
												</p>
												<p class="text-gray-700 leading-relaxed mb-8">
																Together, we work hand in hand to adapt and create new solutions for children facing crisis, now and in the
																future.
												</p>

												<!-- Donate Button -->
												<div class="text-center">
																<a href="#donate-form"
																				class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-lg shadow transition duration-300 ease-in-out">
																				<!-- Font Awesome Heart Icon -->
																				<i class="fa-solid fa-heart mr-2"></i>
																				DONATE NOW TO SUPPORT OUR WORK
																</a>
												</div>
								</div>
				</section>
				<!-- Thematic Cards Section -->
				<section class="w-full bg-white py-12 px-4 sm:px-6 lg:px-8">
								<h2 class="text-2xl md:text-2xl text-center font-bold text-black mb-6">OUR PROGRAMS</h2>
								<div class="max-w-6xl mx-auto">

												<!-- Grid of Cards -->
												<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

																<!-- Card 1: Health -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 text-center">
																				<img src="{{ asset("images/vaccine.jpg") }}" alt="Health"
																								class="w-full h-75 object-cover rounded mb-4">
																				<h3 class="text-xl font-bold text-gray-900">ADVOCACY & POLICY</h3>
																</div>

																<!-- Card 2: Education -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 text-center">
																				<img src="{{ asset("images/update-1.jpg") }}" alt="Education"
																								class="w-full h-75 object-cover rounded mb-4">
																				<h3 class="text-xl font-bold text-gray-900">AWARENESS</h3>
																</div>

																<!-- Card 3: Protection -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 text-center">
																				<img src="{{ asset("images/NCCkids.jpg") }}" alt="Protection"
																								class="w-full h-75 object-cover rounded mb-4">
																				<h3 class="text-xl font-bold text-gray-900">PROTECTION</h3>
																</div>

																<!-- Card 4: Resilience -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 text-center">
																				<img src="{{ asset("images/covered.jpg") }}" alt="Resilience"
																								class="w-full h-75 object-cover rounded mb-4">
																				<h3 class="text-xl font-bold text-gray-900">REFERRAL & SUPPORT</h3>
																</div>

																<!-- Card 5: Emergencies -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 text-center">
																				<img src="{{ asset("images/image4.jpg") }}" alt="Emergencies"
																								class="w-full h-75 object-cover rounded mb-4">
																				<h3 class="text-xl font-bold text-gray-900">CAPACITY BUILDING</h3>
																</div>

																<!-- Card 6: Our Impact -->
																<div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 text-center">
																				<img src="{{ asset("images/mission.jpg") }}" alt="Our Impact"
																								class="w-full h-75 object-cover rounded mb-4">
																				<h3 class="text-xl font-bold text-gray-900">RESEARCH</h3>
																</div>

												</div>
								</div>

								<!-- Our Child, Our Responsibility Section -->
								<div class="mt-15 max-w-6xl mx-auto text-left">

												<!-- Heading -->
												<h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">
																OUR CHILD, OUR RESPONSIBILITY
												</h2>

												<!-- Description -->
												<p class="text-gray-700 leading-relaxed mb-4">
																We go to remote corners, villages, and cities where it's really tough to be a child.
																We ask children, their families, and communities what children need to be healthy, safe, and learning.
																We listen to their experiences, insights, and ideas.
												</p>
												<p class="text-gray-700 leading-relaxed mb-8">
																Together, we work hand in hand to adapt and create new solutions for children facing crisis, now and in the
																future.
												</p>

								</div>
								<!-- Red Line Divider -->
								<hr class="max-w-full border-t-4 border-red-600 my-10">
				</section>

				<!-- Statistics Section -->
				<section class="bg-white py-12 px-6 md:px-12">
								<div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
												<div>
																<h3 class="text-2xl font-bold text-red-600">1,249</h3>
																<p>Children Supported</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-red-600">2,000+</h3>
																<p>Families Reached</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-red-600">6,000</h3>
																<p>Community Members</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-red-600">28</h3>
																<p>Districts Covered</p>
												</div>
								</div>
				</section>

				<!-- Action Buttons Section -->
				<section class="bg-white py-12 px-6 md:px-12">
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
