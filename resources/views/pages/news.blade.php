@extends("layouts.app")
@section("title", "News")
@section("content")

				<!-- News Banner Section -->
				<section class="w-full bg-white p">
								<div class="max-w-7xl mx-auto px-6 pt-7 flex items-center gap-10">
												<p class="text-lg font-serif text-red-600 uppercase tracking-widest inline-flex items-center gap-2">
																News <i class="fa-solid fa-book text-base"></i>
												</p>
												<div class="flex items-center gap-3">
																<span class="text-sm font-medium text-red-600">Share</span>
																<a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i
																								class="fa-brands fa-facebook-f"></i></a>
																<a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i
																								class="fa-brands fa-x-twitter"></i></a>
																<a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i
																								class="fa-brands fa-linkedin-in"></i></a>
																<a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i
																								class="fa-brands fa-whatsapp"></i></a>
																<a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i
																								class="fa-solid fa-envelope"></i></a>
												</div>
								</div>
								<h1 class="max-w-7xl mx-auto px-6 py-7 text-5xl md:text-4xl font-bold text-gray-900 mb-4">
												Protect Families & Children
								</h1>
								<div class="max-w-7xl mx-auto px-6 relative">
												<img src="{{ asset("images/newsbanner.png") }}" alt="News Banner" class="w-full h-100 md:h-200 object-cover">
												<h3
																class="absolute bottom-4 left-1/2 -translate-x-1/2 md:bottom-8 md:right-8 md:left-auto md:translate-x-0 bg-white text-gray-900 px-4 py-2 rounded-md font-bold text-sm shadow-md">
																NEWS
												</h3>
								</div>
								<div class="max-w-5xl mx-auto px-6 py-10">
												<p class="text-sm text-gray-500 mb-4">2 June 2026</p>
												<p class="text-lg text-gray-700 leading-relaxed font-bold mb-4">
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

								<!-- related news section -->
								<section class="w-full bg-white py-12 px-4 sm:px-6 lg:px-8" x-data="{ headingsOnly: false }">
												<!-- Red Line Divider -->
												<div class="flex justify-center my-6">
																<hr class="w-7xl border-t-3 border-red-600">
												</div>
												<div class="max-w-7xl mx-auto space-y-8">
																<div class="flex justify-between items-center gap-4">
																				<h1 class="text-3xl md:text-3xl font-bold text-red-700">
																								RELATED NEWS
																				</h1>
																				<div class="flex items-center gap-3">
																								<span class="text-sm font-medium text-gray-700">Headings Only</span>
																								<button @click="headingsOnly = !headingsOnly" role="switch" :aria-checked="headingsOnly"
																												class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2"
																												:class="headingsOnly ? 'bg-red-600' : 'bg-gray-200'">
																												<span class="sr-only">Headings Only</span>
																												<span aria-hidden="true"
																																class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
																																:class="headingsOnly ? 'translate-x-5' : 'translate-x-0'"></span>
																								</button>
																				</div>
																</div>
																<!-- Card 1 -->
																<div class="flex flex-col md:flex-row bg-white rounded-lg shadow overflow-hidden">
																				<!-- Image -->
																				<img src="{{ asset("images/news1.png") }}" alt="News 1" class="w-full md:w-1/2 h-64 object-cover"
																								x-show="!headingsOnly">
																				<!-- Text -->
																				<div class="p-6 flex-1">
																								<p class="text-sm text-gray-500 mb-2">06 Aug 2026 · Lilongwe</p>
																								<h3 class="text-xl font-bold text-gray-900 mb-4">
																												Ncc Calls For Stronger Action Against Child Labour.
																								</h3>
																								<p class="text-gray-700">
																												Leaders need to put more effort in nabbing perpetrators of child
																												labor…
																								</p>
																								<!-- Read More + Share -->
																								<div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between gap-4 flex-wrap">
																												<a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-red-600 hover:text-red-700 transition-colors duration-200">
																																Read More <i class="fa-solid fa-arrow-right text-xs"></i>
																												</a>
																												<div class="flex items-center gap-3">
																																<span class="text-sm font-medium text-gray-700">Share</span>
																																<a href="#" aria-label="Share on Facebook" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-facebook-f"></i></a>
																																<a href="#" aria-label="Share on X" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-x-twitter"></i></a>
																																<a href="#" aria-label="Share on LinkedIn" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-linkedin-in"></i></a>
																																<a href="#" aria-label="Share on WhatsApp" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-whatsapp"></i></a>
																																<a href="#" aria-label="Share via Email" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-solid fa-envelope"></i></a>
																												</div>
																								</div>
																				</div>
																</div>

																<!-- Card 2 -->
																<div class="flex flex-col md:flex-row bg-white rounded-lg shadow overflow-hidden">
																				<img src="{{ asset("images/news2.png") }}" alt="News 2" class="w-full md:w-1/2 h-64 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6 flex-1">
																								<p class="text-sm text-gray-500 mb-2">04 Aug 2026 · Gaza</p>
																								<h3 class="text-xl font-bold text-gray-900 mb-4">
																												New Child Protection Guidelines Launched
																								</h3>
																								<p class="text-gray-700">
																												NCC introduces new child protection guidelines, as one of the ways
																												to help…
																								</p>
																								<!-- Read More + Share -->
																								<div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between gap-4 flex-wrap">
																												<a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-red-600 hover:text-red-700 transition-colors duration-200">
																																Read More <i class="fa-solid fa-arrow-right text-xs"></i>
																												</a>
																												<div class="flex items-center gap-3">
																																<span class="text-sm font-medium text-gray-700">Share</span>
																																<a href="#" aria-label="Share on Facebook" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-facebook-f"></i></a>
																																<a href="#" aria-label="Share on X" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-x-twitter"></i></a>
																																<a href="#" aria-label="Share on LinkedIn" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-linkedin-in"></i></a>
																																<a href="#" aria-label="Share on WhatsApp" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-whatsapp"></i></a>
																																<a href="#" aria-label="Share via Email" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-solid fa-envelope"></i></a>
																												</div>
																								</div>
																				</div>
																</div>

																<!-- Card 3 -->
																<div class="flex flex-col md:flex-row bg-white rounded-lg shadow overflow-hidden">
																				<img src="{{ asset("images/news3.png") }}" alt="News 3" class="w-full md:w-1/2 h-64 object-cover"
																								x-show="!headingsOnly">
																				<div class="p-6 flex-1">
																								<p class="text-sm text-gray-500 mb-2">31 Jul 2026 · Global</p>
																								<h3 class="text-xl font-bold text-gray-900 mb-4">
																												NCC Meets Youth Leaders to Promote Child Participation
																								</h3>
																								<p class="text-gray-700">
																												Thousands of migrants have crossed into Ceuta, many of them children unaccompanied or separated
																												from families.
																								</p>
																								<!-- Read More + Share -->
																								<div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between gap-4 flex-wrap">
																												<a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-red-600 hover:text-red-700 transition-colors duration-200">
																																Read More <i class="fa-solid fa-arrow-right text-xs"></i>
																												</a>
																												<div class="flex items-center gap-3">
																																<span class="text-sm font-medium text-gray-700">Share</span>
																																<a href="#" aria-label="Share on Facebook" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-facebook-f"></i></a>
																																<a href="#" aria-label="Share on X" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-x-twitter"></i></a>
																																<a href="#" aria-label="Share on LinkedIn" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-linkedin-in"></i></a>
																																<a href="#" aria-label="Share on WhatsApp" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-brands fa-whatsapp"></i></a>
																																<a href="#" aria-label="Share via Email" class="text-gray-500 hover:text-red-600 transition-colors duration-200"><i class="fa-solid fa-envelope"></i></a>
																												</div>
																								</div>

																				</div>
																</div>

												</div>
								</section>

				</section>

				<!-- latest news section -->
				<section class="w-full bg-white py-12 px-4 sm:px-6 lg:px-8">
						<!-- Red Line Divider -->
							<div class="flex justify-center my-6">
									<hr class="w-7xl border-t-3 border-red-600">
							</div>
						<div class="max-w-6xl mx-auto" x-data="{
								tab: 'child-protection',
								mobileOpen: false,
								headingsOnly: false,
								visible: {},
								categories: [
									{ value: 'child-protection', label: 'CHILD PROTECTION' },
									{ value: 'education', label: 'EDUCATION' },
									{ value: 'health', label: 'HEALTH' },
									{ value: 'community-events', label: 'COMMUNITY-EVENTS' },
									{ value: 'policy', label: 'POLICY' },
									{ value: 'partnerships', label: 'PARTNERSHIPS' }
								],
								newsItems: [
									{ category: 'child-protection', date: '24 JULY 2026', location: 'ZOMBA', title: 'Chief Malemia Sentenced to 21 Years in Prison for Child Defilement', excerpt: 'The National Children\'s Commission (NCC) welcomes the sentencing of Traditional Authority Malemia to 21 years in prison.', image: '{{ asset("images/image6.jpg") }}' },
									{ category: 'child-protection', date: '12 MAY 2026', location: 'LILONGWE', title: 'NCC Commissioners Visit Dedza Border Post to Strengthen Child Protection', excerpt: 'The visit appreciated the child protection services being offered at the facility.', image: '{{ asset("images/image1.jpg") }}' },
									{ category: 'child-protection', date: '01 AUG 2026', location: 'BLANTYRE', title: 'NCC Intensifies Crackdown on Child Trafficking Networks', excerpt: 'Joint operations with police and social welfare officers continue to rescue and reintegrate victims.', image: '{{ asset("images/news1.png") }}' },
									{ category: 'child-protection', date: '18 JUL 2026', location: 'KARONGA', title: 'NCC Rescues 12 Children from Forced Labour at Border Town', excerpt: 'The children were reunited with their families and enrolled in psychosocial support programmes.', image: '{{ asset("images/image4.jpg") }}' },
									{ category: 'child-protection', date: '30 JUN 2026', location: 'MANGOCHI', title: 'Community Watch Groups Trained to Report Child Abuse', excerpt: 'Over 200 community volunteers were equipped with child protection reporting and referral tools.', image: '{{ asset("images/image3.jpg") }}' },
									{ category: 'child-protection', date: '22 JUN 2026', location: 'LILONGWE', title: 'NCC Launches Toll-Free Child Helpline Awareness Drive', excerpt: 'The campaign encourages children and adults to report abuse through the 116 toll-free helpline.', image: '{{ asset("images/image6.jpg") }}' },
									{ category: 'education', date: '18 JUN 2026', location: 'MZUZU', title: 'NCC Launches Back-to-School Campaign for Vulnerable Children', excerpt: 'The campaign aims to re-enrol out-of-school children and support learners at risk of dropping out.', image: '{{ asset("images/image3.jpg") }}' },
									{ category: 'education', date: '02 APR 2026', location: 'SALIMA', title: 'Teachers Trained on Child-Friendly Learning Environments', excerpt: 'NCC partnered with district education officers to promote inclusive, child-centred teaching methods.', image: '{{ asset("images/image4.jpg") }}' },
									{ category: 'education', date: '20 FEB 2026', location: 'MANGOCHI', title: 'School Clubs Champion Children\'s Rights Awareness', excerpt: 'Learners formed school clubs to promote children\'s rights and safely report abuse in their communities.', image: '{{ asset("images/news2.png") }}' },
									{ category: 'education', date: '28 MAY 2026', location: 'KARONGA', title: 'NCC Donates Learning Materials to Flood-Affected Schools', excerpt: 'Exercise books, pens and uniforms were distributed to over 500 displaced learners.', image: '{{ asset("images/image1.jpg") }}' },
									{ category: 'education', date: '14 APR 2026', location: 'BLANTYRE', title: 'Girls\' Education Drive Targets Dropout Hotspots', excerpt: 'Community sensitisation meetings encouraged families to keep girls in school.', image: '{{ asset("images/news1.png") }}' },
									{ category: 'education', date: '01 APR 2026', location: 'DEDZA', title: 'Radio Learning Programme Reaches Rural Learners', excerpt: 'Weekly lessons broadcast in Chichewa and Tumbuka support children in remote areas.', image: '{{ asset("images/image4.jpg") }}' },
									{ category: 'health', date: '09 JUL 2026', location: 'ZOMBA', title: 'NCC Advocates for Improved Adolescent Health Services', excerpt: 'The Commission engaged health officials on youth-friendly services for adolescents nationwide.', image: '{{ asset("images/image6.jpg") }}' },
									{ category: 'health', date: '15 MAY 2026', location: 'BLANTYRE', title: 'Free Medical Camp Reaches Vulnerable Children', excerpt: 'Hundreds of children received screenings, treatment and referrals through a partner-led medical camp.', image: '{{ asset("images/image1.jpg") }}' },
									{ category: 'health', date: '03 MAR 2026', location: 'MZUZU', title: 'Nutrition Programme Boosts Under-Five Child Health', excerpt: 'Community nutrition clinics recorded improved growth outcomes for children under five.', image: '{{ asset("images/image4.jpg") }}' },
									{ category: 'community-events', date: '2 JUNE 2026', location: 'BLANTYRE', title: 'NCC Commemorates International Day of Families and Street-Connected Children', excerpt: 'The event at Lunzu Primary School brought together stakeholders to reflect on families and child well being.', image: '{{ asset("images/news1.png") }}' },
									{ category: 'community-events', date: '25 APR 2026', location: 'LILONGWE', title: 'Children\'s Fun Day Promotes Play and Participation', excerpt: 'Children enjoyed games, music and storytelling while learning about their rights.', image: '{{ asset("images/image3.jpg") }}' },
									{ category: 'community-events', date: '12 JAN 2026', location: 'MZUZU', title: 'Community Dialogue on Street-Connected Children Held', excerpt: 'Traditional leaders and community members committed to protecting street-connected children.', image: '{{ asset("images/image4.jpg") }}' },
									{ category: 'policy', date: '05 MAR 2026', location: 'GLOBAL', title: 'Bungwe la NCC Lakhazikitsa Ndondomeko Zopititsa Ufulu wa Ana Patsogolo', excerpt: 'National Children\'s Commission lati liyika ndondomeko zabwino zofuna kuonetsetsa kuti ufulu wa ana ukupita patsogolo.', image: '{{ asset("images/image4.jpg") }}' },
									{ category: 'policy', date: '22 FEB 2026', location: 'LILONGWE', title: 'NCC Submits Recommendations on the Child Justice Bill', excerpt: 'The Commission presented proposals to strengthen child-friendly justice procedures.', image: '{{ asset("images/image6.jpg") }}' },
									{ category: 'policy', date: '10 JAN 2026', location: 'GLOBAL', title: 'NCC Reviews National Child Protection Policy Framework', excerpt: 'A comprehensive review will guide the next phase of child protection policy reforms.', image: '{{ asset("images/news2.png") }}' },
									{ category: 'partnerships', date: '25 JUL 2026', location: 'GLOBAL', title: 'NCC and Save the Children Strengthen Collaboration', excerpt: 'Save the Children hosted the NCC, led by Vice Chairperson, Commissioner Benedicto Kondowe.', image: '{{ asset("images/image3.jpg") }}' },
									{ category: 'partnerships', date: '20 JULY 2026', location: 'ZOMBA', title: 'Save the Children Commits to Walk Hand-in-Hand with NCC', excerpt: 'He committed that Save the Children will continue to walk hand-in-hand with the NCC.', image: '{{ asset("images/news2.png") }}' },
									{ category: 'partnerships', date: '28 JUN 2026', location: 'BLANTYRE', title: 'NCC Signs MoU with Local NGOs on Child Welfare', excerpt: 'The agreement formalises coordination on case management and child protection reporting.', image: '{{ asset("images/image1.jpg") }}' }
								],
								countFor(value) { return this.newsItems.filter(n => n.category === value).length },
								shownCount(value) { return Math.min(this.visible[value] || 3, this.countFor(value)) },
								isShown(item) { return this.newsItems.filter(n => n.category === item.category).indexOf(item) < this.shownCount(item.category) },
								hasMore(value) { return this.countFor(value) > this.shownCount(value) },
								labelFor(value) { const c = this.categories.find(c => c.value === value); return c ? c.label : '' },
								loadMore() { this.visible[this.tab] = this.shownCount(this.tab) + 3 },
								showLess() { this.visible[this.tab] = 3 }
								}">
							<!-- Heading -->
						<div class="flex justify-between items-center gap-4">
									<h2 class="text-2xl sm:text-3xl font-bold text-red-700 mb-4">
																LATEST NEWS
									</h2>
									<div class="flex items-center gap-3">
													<span class="text-sm font-medium text-gray-700">Headings Only</span>
													<button @click="headingsOnly = !headingsOnly" role="switch" :aria-checked="headingsOnly"
																					class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2"
																					:class="headingsOnly ? 'bg-red-600' : 'bg-gray-200'">
																					<span class="sr-only">Headings Only</span>
																					<span aria-hidden="true"
																													class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
																													:class="headingsOnly ? 'translate-x-5' : 'translate-x-0'"></span>
													</button>
									</div>
						</div>

							<!-- Tabbed Filters -->
						<div class="mb-8">
									<!-- Mobile Dropdown -->
									<div class="md:hidden">
													<button @click="mobileOpen = !mobileOpen"
																			class="w-full flex items-center justify-between bg-white border border-gray-300 rounded-md px-4 py-2 text-gray-700">
																				<span x-text="labelFor(tab)"></span>
																				<i class="fa-solid fa-chevron-down text-xs"></i>
													</button>
													<div x-show="mobileOpen" @click.away="mobileOpen = false" x-transition
																			class="mt-2 bg-white border border-gray-200 rounded-md shadow-lg overflow-hidden">
																				<template x-for="option in categories" :key="option.value">
																									<button @click="tab = option.value; mobileOpen = false"
																																	:class="tab === option.value ? 'bg-red-600 text-white' : 'text-gray-700 hover:bg-gray-50'"
																																	class="flex items-center justify-between w-full text-left px-4 py-3 text-sm font-medium">
																																	<span x-text="option.label"></span>
																																	<span class="text-xs px-1.5 py-0.5 rounded-full"
																																									:class="tab === option.value ? 'bg-white text-red-600' : 'bg-red-100 text-red-700'"
																																									x-text="countFor(option.value)"></span>
																									</button>
																				</template>
													</div>
									</div>
									<!-- Desktop Tabs -->
									<div class="hidden md:flex flex-wrap gap-2">
													<template x-for="option in categories" :key="option.value">
																				<button @click="tab = option.value"
																													:class="tab === option.value ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border hover:border-red-600 hover:text-red-600'"
																													class="inline-flex items-center gap-2 px-4 py-2 rounded-md font-semibold text-sm transition">
																													<span x-text="option.label"></span>
																													<span class="text-xs px-1.5 py-0.5 rounded-full"
																																					:class="tab === option.value ? 'bg-white text-red-600' : 'bg-red-100 text-red-700'"
																																					x-text="countFor(option.value)"></span>
																				</button>
													</template>
									</div>
						</div>

							<!-- Grid of Cards -->
						<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
												<template x-for="item in newsItems" :key="item.title">
																				<div x-show="item.category === tab && isShown(item)"
																													x-transition:enter="transition ease-out duration-300"
																													x-transition:enter-start="opacity-0 translate-y-2"
																													x-transition:enter-end="opacity-100 translate-y-0"
																													x-transition:leave="transition ease-in duration-200"
																													x-transition:leave-start="opacity-100"
																													x-transition:leave-end="opacity-0"
																													class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
																													<img :src="item.image" :alt="item.title" class="w-full h-48 object-cover" x-show="!headingsOnly">
																													<div class="p-6">
																																					<p class="text-sm text-gray-500 mb-2" x-text="item.date + ' · ' + item.location"></p>
																																					<h3 class="text-lg font-bold text-gray-900 mb-3" x-text="item.title"></h3>
																																					<p class="text-gray-700 text-sm" x-text="item.excerpt"></p>
																													</div>
																				</div>
												</template>
						</div>

							<!-- Load More Button (per category, shown only when more than 3 cards exist) -->
						<div class="mt-8 text-center" x-show="hasMore(tab)" x-transition>
												<button @click="loadMore()"
																			class="bg-green-700 hover:bg-green-800 text-white px-6 py-2 rounded-md font-semibold transition duration-200">
																			Load More
												</button>
						</div>
							<!-- Show Less Button -->
						<div class="mt-8 text-center" x-show="shownCount(tab) > 3" x-transition>
												<button @click="showLess()"
																			class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-md font-semibold transition duration-200">
																			Show Less
												</button>
						</div>
						</div>
				</section>


				<!-- Subscribe Section -->
				<section class="w-full bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
								<div class="max-w-5xl mx-auto text-center">

												<!-- Heading -->
												<h2 class="text-2xl sm:text-3xl font-bold text-green-700 mb-4">
																Subscribe to Get Our Latest News
												</h2>
												<p class="text-gray-700 mb-6">
																Stay updated with the latest stories, programs, and impact reports from the National Children's Commission.
												</p>

												<!-- Subscription Form -->
												<form action="#" method="POST" class="flex flex-col sm:flex-row gap-4 justify-center">
																<input type="email" name="email" placeholder="Enter your email"
																				class="w-full sm:w-2/3 px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600">
																<button type="submit"
																				class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
																				Subscribe
																</button>
												</form>
								</div>
				</section>

@endsection


