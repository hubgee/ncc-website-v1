@extends("layouts.app")

@section("title", "About Us")

@section("content")
				<!-- Mandate / Mission / Objective Section — redesign ref: inset white card on field image -->
				<section x-data="{
	    selected: 'mandate',
	    items: {
	        mandate: {
	            title: 'OUR MANDATE',
	            bullets: [
	                'The Commission safeguards and promotes the rights and welfare of all children, ensuring their protection from abuse, neglect, and exploitation.',
	                'It monitors compliance with child-related laws, policies, and international conventions, holding duty bearers accountable for their responsibilities.',
	                'The Commission coordinates and advises government, civil society, and communities to strengthen child protection and welfare programs.',
	                'It conducts research, advocacy, and awareness campaigns to amplify children\'s voices and make child rights a national priority.'
	            ],
	            bg: '{{ asset("images/LATEST1.jpg") }}'
	        },
	        mission: {
	            title: 'OUR MISSION',
	            bullets: [
	                'To champion a Malawi where every child grows up safe, valued, and empowered to reach their full potential.',
	                'To monitor and drive implementation of child-related laws, policies, and international conventions with rigour and transparency.',
	                'To strengthen accountability among duty bearers and build resilient systems that prevent harm and respond swiftly when it occurs.',
	                'To elevate community awareness, evidence, and partnerships that put children at the centre of national development.'
	            ],
	            bg: '{{ asset("images/LATEST2.jpg") }}'
	        },
	        objective: {
	            title: 'OUR OBJECTIVE',
	            bullets: [
	                'Coordinate government, civil society, and community efforts for coherent, child-centred welfare and protection.',
	                'Provide expert advice and technical support to strengthen child protection systems and service delivery.',
	                'Lead research, data, and learning to inform policy, advocacy, and scalable programmes.',
	                'Amplify children\'s voices and agency, ensuring their rights shape decisions at every level.'
	            ],
	            bg: '{{ asset("images/nccNews1.jpg") }}'
	        }
	    }
	}"
								class="relative w-full min-h-150 lg:min-h-140 bg-cover bg-center flex items-center py-8 lg:py-10"
								x-bind:style="`background-image: url('${items[selected].bg}')`">
								<!-- subtle overlay to ensure white card pops without hiding background -->
								<div class="absolute inset-0 bg-black/10 pointer-events-none"></div>

								<!-- Inset Content Card -->
								<div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
												<div
																class="bg-white rounded-xl shadow-2xl overflow-hidden flex flex-col min-h-105 lg:min-h-110 p-6 sm:p-8 lg:p-10">
																<!-- Title row — right aligned on desktop, centered on mobile -->
																<div class="flex justify-center lg:justify-end mb-6 lg:mb-8">
																				<h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold tracking-tight text-[#0b6b2e] leading-none"
																								style="text-shadow: 0 1px 2px rgba(0,0,0,0.08)" x-text="items[selected].title"></h2>
																</div>

																<!-- 3-zone body -->
																<div class="flex-1 grid grid-cols-1 lg:grid-cols-[170px_210px_1fr] gap-6 lg:gap-8 items-center">
																				<!-- Left: pill tabs -->
																				<div
																								class="flex flex-row lg:flex-col gap-2 justify-center lg:justify-start lg:space-y-2 order-2 lg:order-1">
																								<button @click="selected='mandate'"
																												:class="selected === 'mandate' ? 'bg-[#0a7a2e] text-white shadow-md border-[#0a7a2e]' :
																												    'bg-white text-slate-800 border-slate-200 hover:border-green-300'"
																												class="flex-1 lg:flex-none text-xs sm:text-sm font-bold px-4 py-2.5 rounded-full border text-center transition whitespace-nowrap">Our
																												Mandate</button>
																								<button @click="selected='mission'"
																												:class="selected === 'mission' ? 'bg-[#0a7a2e] text-white shadow-md border-[#0a7a2e]' :
																												    'bg-white text-slate-800 border-slate-200 hover:border-green-300'"
																												class="flex-1 lg:flex-none text-xs sm:text-sm font-bold px-4 py-2.5 rounded-full border text-center transition whitespace-nowrap">Our
																												Mission</button>
																								<button @click="selected='objective'"
																												:class="selected === 'objective' ? 'bg-[#0a7a2e] text-white shadow-md border-[#0a7a2e]' :
																												    'bg-white text-slate-800 border-slate-200 hover:border-green-300'"
																												class="flex-1 lg:flex-none text-xs sm:text-sm font-bold px-4 py-2.5 rounded-full border text-center transition whitespace-nowrap">Our
																												Objective</button>
																				</div>

																				<!-- Center: large shield icon -->
																				<div class="flex items-center justify-center order-1 lg:order-2 py-2 lg:py-0">
																								<!-- Outline shield with check / target / lightbulb per tab -->
																								<div x-show="selected==='mandate'" class="text-[#0a7a2e]">
																												<svg width="132" height="148" viewBox="0 0 100 110" fill="none"
																																xmlns="http://www.w3.org/2000/svg" class="drop-shadow-sm">
																																<path d="M50 5 L88 20 L88 52 C88 72 70 92 50 105 C30 92 12 72 12 52 L12 20 Z"
																																				stroke="currentColor" stroke-width="5.5" fill="none" stroke-linejoin="round" />
																																<path d="M50 10 L82 23 L82 52 C82 68 68 86 50 98 C32 86 18 68 18 52 L18 23 Z"
																																				stroke="currentColor" stroke-width="1.2" fill="white" opacity="0.95" />
																																<path d="M28 54 L44 72 L74 38" stroke="currentColor" stroke-width="6" stroke-linecap="round"
																																				stroke-linejoin="round" fill="none" />
																												</svg>
																								</div>
																								<div x-show="selected==='mission'"
																												class="w-33 h-37 flex items-center justify-center text-[#0a7a2e]">
																												<i class="fas fa-bullseye text-[92px] leading-none"></i>
																								</div>
																								<div x-show="selected==='objective'"
																												class="w-33 h-37 flex items-center justify-center text-[#0a7a2e]">
																												<i class="fas fa-lightbulb text-[88px] leading-none"></i>
																								</div>
																				</div>

																				<!-- Right: bullets -->
																				<div class="order-3 text-left">
																								<ul class="space-y-3.5">
																												<template x-for="(bullet, idx) in items[selected].bullets" :key="idx">
																																<li class="flex gap-2.5 text-[13px] lg:text-[12.5px] leading-relaxed text-slate-800">
																																				<span class="mt-1.75 w-1.5 h-1.5 rounded-full bg-slate-900 shrink-0"></span>
																																				<span x-text="bullet"></span>
																																</li>
																												</template>
																								</ul>
																				</div>
																</div>

																<!-- Footer CTA -->
																<div class="flex justify-center lg:justify-end mt-8 lg:mt-6">
																				<a href="#partner"
																								class="inline-flex items-center justify-center bg-[#0a7a2e] hover:bg-[#095a22] text-white text-xs font-bold tracking-wide uppercase px-6 py-2.5 rounded shadow transition">Partner
																								With Us</a>
																</div>
												</div>
								</div>
				</section>

				<div class="max-w-8xl mx-auto px-4 py-10">
								<!-- Tabs -->
								<div class="flex space-x-4 border-b mb-6">
												<button class="tab-btn px-4 py-2 font-semibold text-blue-600 border-b-2 border-blue-600"
																data-tab="commissioners">
																Commissioners
												</button>
												<button class="tab-btn px-4 py-2 font-semibold text-gray-600 hover:text-blue-600" data-tab="ex-officials">
																Ex-Officials
												</button>
												<button class="tab-btn px-4 py-2 font-semibold text-gray-600 hover:text-blue-600" data-tab="managers">
																Management
												</button>
								</div>

								<!-- Commissioners -->
								<div id="commissioners" class="tab-content grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
												<div class="bg-white shadow rounded-lg p-4 flex flex-col items-center">
																<img src="{{ asset("images/vincent-mwakawawa.jpg") }}"
																				class="w-32 h-40  object-cover transform transition duration-300 hover:scale-110 mb-4 rounded-md"
																				alt="Vincent Mwakawawa">
																<h3 class="text-lg font-bold">Mr Vincent Mwakawawa</h3>
																<p class="text-gray-600">Chairperson</p>
																<button onclick="document.getElementById('bio-modal-vincent').classList.remove('hidden')"
																				class="mt-2 text-sm text-green-600 hover:underline font-semibold transition duration-200">View
																				Biography</button>
												</div>
												<div class="bg-white shadow rounded-lg p-4 flex flex-col items-center">
																<img src="{{ asset("images/benedicto-khondowe.jpg") }}"
																				class="w-32 h-40 object-cover transform transition duration-300 hover:scale-110 mb-4 rounded-md"
																				alt="Benedicto Khondowe">
																<h3 class="text-lg font-bold">Mr Benedicto Khondowe</h3>
																<p class="text-gray-600">Vice Chairperson</p>
																<button onclick="document.getElementById('bio-modal-benedicto').classList.remove('hidden')"
																				class="mt-2 text-sm text-green-600 hover:underline font-semibold transition duration-200">View
																				Biography</button>
												</div>
												<div class="bg-white shadow rounded-lg p-4 flex flex-col items-center">
																<img src="{{ asset("images/lucy-kapachira.jpg") }}"
																				class="w-32 h-40 object-cover transform transition duration-300 hover:scale-110 mb-4 rounded-md"
																				alt="Lucy Kapachira">
																<h3 class="text-lg font-bold">Dr Lucy Kapachira</h3>
																<p class="text-gray-600">Chair, Corporate Division</p>
																<button onclick="document.getElementById('bio-lucy-kapachira').classList.remove('hidden')"
																				class="mt-2 text-sm text-green-600 hover:underline font-semibold transition duration-200">View
																				Biography</button>
												</div>

												<div class="bg-white shadow rounded-lg p-4 flex flex-col items-center">
																<img src="{{ asset("images/laika-milanzi.jpg") }}"
																				class="w-32 h-40 object-cover transform transition duration-300 hover:scale-110 mb-4 rounded-md"
																				alt="Laika Milanzi">
																<h3 class="text-lg font-bold">Mrs Laika Milanzi</h3>
																<p class="text-gray-600">Chair, Compliance Division</p>
																<button onclick="document.getElementById('bio-laika-milanzi').classList.remove('hidden')"
																				class="mt-2 text-sm text-green-600 hover:underline font-semibold transition duration-200">View
																				Biography</button>
												</div>
												<div class="bg-white shadow rounded-lg p-4 flex flex-col items-center">
																<img src="{{ asset("images/julia-chimuna.jpg") }}"
																				class="w-32 h-40 object-cover transform transition duration-300 hover:scale-110 mb-4 rounded-md"
																				alt="Julia Chimuna">
																<h3 class="text-lg font-bold">Mrs Julia Chimuna</h3>
																<p class="text-gray-600">Chair, Documentation & Learning Division</p>
																<button onclick="document.getElementById('bio-julia-chimuna').classList.remove('hidden')"
																				class="mt-2 text-sm text-green-600 hover:underline font-semibold transition duration-200">View
																				Biography</button>
												</div>
								</div>

								<!-- Managers (hidden by default) -->
								<div id="managers" class="tab-content hidden">
												<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
																@foreach (["vincent-mwakawawa.jpg", "benedicto-khondowe.jpg", "lucy-kapachira.jpg", "laika-milanzi.jpg"] as $img)
																				<div class="bg-white shadow rounded-lg p-4 flex flex-col items-center">
																								<div class="overflow-hidden rounded-md mb-4">
																												<img src="{{ asset("images/" . $img) }}"
																																class="w-32 h-40 object-cover transform transition duration-300 hover:scale-110"
																																alt="Manager">
																								</div>
																								<h3 class="text-lg font-bold">Manager Name</h3>
																								<p class="text-gray-600">Manager Position</p>
																				</div>
																@endforeach
												</div>
								</div>

								<!-- Ex-Officials (hidden by default) -->
								<div id="ex-officials" class="tab-content hidden">
												<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
																@foreach (["vincent-mwakawawa.jpg", "benedicto-khondowe.jpg", "lucy-kapachira.jpg"] as $img)
																				<div class="bg-white shadow rounded-lg p-4 flex flex-col items-center">
																								<div class="overflow-hidden rounded-md mb-4">
																												<img src="{{ asset("images/" . $img) }}"
																																class="w-32 h-40 object-cover transform transition duration-300 hover:scale-110"
																																alt="Ex-Official">
																								</div>
																								<h3 class="text-lg font-bold">Ex-Official Name</h3>
																								<p class="text-gray-600">Ex-Official Position</p>
																				</div>
																@endforeach
												</div>
								</div>
								<!-- Organogram -->
								<div class="mt-12">
												<div class="flex flex-col items-center">
																<!-- CEO -->
																<div class="bg-green-500 text-white font-bold px-6 py-3 rounded-lg shadow">
																				Chief Executive Officer
																</div>

																<!-- Line -->
																<div class="h-12 w-1 bg-green-500"></div>

																<!-- Managers -->
																<div class="flex flex-wrap mb-8 justify-center gap-20">
																				<div class="bg-green-500 text-white font-bold px-6 py-3 rounded-lg shadow">
																								Director of Compliance
																				</div>
																				<div class="bg-green-500 text-white font-bold px-6 py-3 rounded-lg shadow">
																								Finance Manager
																				</div>
																				<div class="bg-green-500 text-white font-bold px-6 py-3 rounded-lg shadow">
																								Human Resource Manager
																				</div>
																</div>
												</div>
								</div>
				</div>

				<!-- Simple Tab Script -->
				<script>
								document.querySelectorAll('.tab-btn').forEach(btn => {
												btn.addEventListener('click', () => {
																// Reset all buttons
																document.querySelectorAll('.tab-btn').forEach(b => {
																				b.classList.remove('text-blue-600', 'border-blue-600');
																				b.classList.add('text-gray-600');
																				b.classList.remove('border-b-2');
																});
																// Highlight active
																btn.classList.add('text-blue-600', 'border-blue-600', 'border-b-2');

																// Hide all content
																document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
																// Show selected
																document.getElementById(btn.dataset.tab).classList.remove('hidden');
												});
								});
				</script>

				<!-- Bottom Divider -->
				<div class="flex justify-center my-6">
								<hr class="w-full border-t-2 border-red-600">
				</div>

				<!-- Statistics Section -->
				<section class="py-12 px-6 md:px-12">

								<div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
												<div>
																<h3 class="text-2xl font-bold text-green-700">1,249</h3>
																<p>Children Supported</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-green-700">2,000+</h3>
																<p>Families Reached</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-green-700">6,000</h3>
																<p>Community Members</p>
												</div>
												<div>
																<h3 class="text-2xl font-bold text-green-700">28</h3>
																<p>Districts Covered</p>
												</div>
								</div>
				</section>

				<!-- Biography Modal -->
				<div id="bio-modal-vincent" class="fixed inset-0 z-50 items-center justify-center bg-black/50 hidden"
								onclick="this.classList.add('hidden')">
								<div class="bg-white rounded-2xl shadow-xl max-w-lg w-full mx-4 p-6 relative" onclick="event.stopPropagation()">
												<button onclick="document.getElementById('bio-modal-vincent').classList.add('hidden')"
																class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition duration-200">
																<i class="fa-solid fa-xmark text-xl"></i>
												</button>
												<div class="text-center mb-6">
																<img src="{{ asset("images/vincent-mwakawawa.jpg") }}"
																				class="w-24 h-24 rounded-full mx-auto mb-3 object-cover" alt="Vincent Mwakawawa">
																<h3 class="text-xl font-bold">Mr Vincent Mwakawawa</h3>
																<p class="text-gray-600">Chairperson</p>
												</div>
												<div class="space-y-4 text-gray-700">
																<div>
																				<h4 class="font-semibold text-green-700 mb-1">Professional Background</h4>
																				<p class="text-sm">Mr. Mwakawawa has over two decades of experience in child protection policy and
																								advocacy across Malawi. He has led initiatives to strengthen legislative frameworks for children's
																								rights and has worked extensively with government ministries and community organizations. His career
																								has focused on ensuring vulnerable children have access to safety, education, and justice.</p>
																</div>
																<div>
																				<h4 class="font-semibold text-green-700 mb-1">Education &amp; Certifications</h4>
																				<p class="text-sm">Mr. Mwakawawa holds a degree in Social Work from a recognized institution and has
																								completed advanced certifications in child rights and protection. He has attended numerous
																								professional development programs on advocacy, policy reform, and community engagement. He is a
																								registered member of relevant professional bodies in the social services sector.</p>
																</div>
												</div>
								</div>
				</div>

				<!-- Biography Modal for Benedicto Khondowe -->
				<div id="bio-modal-benedicto" class="fixed inset-0 z-50 items-center justify-center bg-black/50 hidden"
								onclick="this.classList.add('hidden')">
								<div class="bg-white rounded-2xl shadow-xl max-w-lg w-full mx-4 p-6 relative" onclick="event.stopPropagation()">
												<button onclick="document.getElementById('bio-modal-benedicto').classList.add('hidden')"
																class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition duration-200">
																<i class="fa-solid fa-xmark text-xl"></i>
												</button>
												<div class="text-center mb-6">
																<img src="{{ asset("images/benedicto-khondowe.jpg") }}"
																				class="w-24 h-24 rounded-full mx-auto mb-3 object-cover" alt="Benedicto Khondowe">
																<h3 class="text-xl font-bold">Mr Benedicto Khondowe</h3>
																<p class="text-gray-600">Vice Chairperson</p>
												</div>
												<div class="space-y-4 text-gray-700">
																<div>
																				<h4 class="font-semibold text-green-700 mb-1">Professional Background</h4>
																				<p class="text-sm">Mr. Khondowe has over two decades of experience in child protection policy and
																								advocacy across Malawi. He has led initiatives to strengthen legislative frameworks for children's
																								rights and has worked extensively with government ministries and community organizations. His career
																								has focused on ensuring vulnerable children have access to safety, education, and justice.</p>
																</div>
																<div>
																				<h4 class="font-semibold text-green-700 mb-1">Education &amp; Certifications</h4>
																				<p class="text-sm">Mr. Khondowe holds a degree in Social Work from a recognized institution and has
																								completed advanced certifications in child rights and protection. He has attended numerous
																								professional development programs on advocacy, policy reform, and community engagement. He is a
																								registered member of relevant professional bodies in the social services sector.</p>
																</div>
												</div>
								</div>
				</div>

				<!-- Biography Modal for DR lucy Kapachira -->
				<div id="bio-lucy-kapachira" class="fixed inset-0 z-50 items-center justify-center bg-black/50 hidden"
								onclick="this.classList.add('hidden')">
								<div class="bg-white rounded-2xl shadow-xl max-w-lg w-full mx-4 p-6 relative" onclick="event.stopPropagation()">
												<button onclick="document.getElementById('bio-lucy-kapachira').classList.add('hidden')"
																class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition duration-200">
																<i class="fa-solid fa-xmark text-xl"></i>
												</button>
												<div class="text-center mb-6">
																<img src="{{ asset("images/lucy-kapachira.jpg") }}"
																				class="w-24 h-24 rounded-full mx-auto mb-3 object-cover" alt="Benedicto Khondowe">
																<h3 class="text-xl font-bold">DR Lucy Kapachira</h3>
																<p class="text-gray-600">Chair, Coorporate Division</p>
												</div>
												<div class="space-y-4 text-gray-700">
																<div>
																				<h4 class="font-semibold text-green-700 mb-1">Professional Background</h4>
																				<p class="text-sm">Dr Lucy Kapachira has over two decades of experience in child protection policy and
																								advocacy across Malawi. He has led initiatives to strengthen legislative frameworks for children's
																								rights and has worked extensively with government ministries and community organizations. His career
																								has focused on ensuring vulnerable children have access to safety, education, and justice.</p>
																</div>
																<div>
																				<h4 class="font-semibold text-green-700 mb-1">Education &amp; Certifications</h4>
																				<p class="text-sm">Dr Lucy Kapachira holds a PHD in Social Work from a recognized institution and has
																								completed advanced certifications in child rights and protection. He has attended numerous
																								professional development programs on advocacy, policy reform, and community engagement. He is a
																								registered member of relevant professional bodies in the social services sector.</p>
																</div>
												</div>
								</div>
				</div>

				<!-- Biography Modal for Mrs Laika Milanzi -->
				<div id="bio-laika-milanzi" class="fixed inset-0 z-50 items-center justify-center bg-black/50 hidden"
								onclick="this.classList.add('hidden')">
								<div class="bg-white rounded-2xl shadow-xl max-w-lg w-full mx-4 p-6 relative" onclick="event.stopPropagation()">
												<button onclick="document.getElementById('bio-laika-milanzi').classList.add('hidden')"
																class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition duration-200">
																<i class="fa-solid fa-xmark text-xl"></i>
												</button>
												<div class="text-center mb-6">
																<img src="{{ asset("images/laika-milanzi.jpg") }}"
																				class="w-24 h-24 rounded-full mx-auto mb-3 object-cover" alt="Benedicto Khondowe">
																<h3 class="text-xl font-bold">Mrs Lika Milanzi</h3>
																<p class="text-gray-600">Chair, Compliance Division</p>
												</div>
												<div class="space-y-4 text-gray-700">
																<div>
																				<h4 class="font-semibold text-green-700 mb-1">Professional Background</h4>
																				<p class="text-sm">Mrs Laika Milanzi has over two decades of experience in child protection policy and
																								advocacy across Malawi. He has led initiatives to strengthen legislative frameworks for children's
																								rights and has worked extensively with government ministries and community organizations. His career
																								has focused on ensuring vulnerable children have access to safety, education, and justice.</p>
																</div>
																<div>
																				<h4 class="font-semibold text-green-700 mb-1">Education &amp; Certifications</h4>
																				<p class="text-sm">Mrs Laika Milanzi holds a PHD in Social Work from a recognized institution and has
																								completed advanced certifications in child rights and protection. He has attended numerous
																								professional development programs on advocacy, policy reform, and community engagement. He is a
																								registered member of relevant professional bodies in the social services sector.</p>
																</div>
												</div>
								</div>
				</div>

				<!-- Biography Modal for Mrs Julia Chimuna -->
				<div id="bio-julia-chimuna" class="fixed inset-0 z-50 items-center justify-center bg-black/50 hidden"
								onclick="this.classList.add('hidden')">
								<div class="bg-white rounded-2xl shadow-xl max-w-lg w-full mx-4 p-6 relative" onclick="event.stopPropagation()">
												<button onclick="document.getElementById('bio-julia-chimuna').classList.add('hidden')"
																class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition duration-200">
																<i class="fa-solid fa-xmark text-xl"></i>
												</button>
												<div class="text-center mb-6">
																<img src="{{ asset("images/julia-chimuna.jpg") }}"
																				class="w-24 h-24 rounded-full mx-auto mb-3 object-cover" alt="Benedicto Khondowe">
																<h3 class="text-xl font-bold">Mrs Julia Chimuna</h3>
																<p class="text-gray-600">Chair, Documentation & Learning Division</p>
												</div>
												<div class="space-y-4 text-gray-700">
																<div>
																				<h4 class="font-semibold text-green-700 mb-1">Professional Background</h4>
																				<p class="text-sm">Mrs Julia Chimuna has over two decades of experience in child protection policy and
																								advocacy across Malawi. He has led initiatives to strengthen legislative frameworks for children's
																								rights and has worked extensively with government ministries and community organizations. His career
																								has focused on ensuring vulnerable children have access to safety, education, and justice.</p>
																</div>
																<div>
																				<h4 class="font-semibold text-green-700 mb-1">Education &amp; Certifications</h4>
																				<p class="text-sm">Mrs Julia Chimuna holds a PHD in Social Work from a recognized institution and has
																								completed advanced certifications in child rights and protection. He has attended numerous
																								professional development programs on advocacy, policy reform, and community engagement. He is a
																								registered member of relevant professional bodies in the social services sector.</p>
																</div>
												</div>
								</div>
				</div>

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
