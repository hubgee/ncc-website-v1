@extends("layouts.app")

@section("title", "Donate")

@section("content")
				<!-- Donation Section -->
				<div id="donation-box" class="relative bg-white py-12 px-4" x-data="{
	    heroVisible: false,
	    step: 1,
	    presetAmounts: [2000, 5000, 10000],
	    selectedAmount: 2000,
	    isCustom: false,
	    customAmount: '',
	    recurring: true,
	    frequency: 'Monthly',
	    donor: { name: '', email: '', phone: '', message: '' },
	    errors: {},
	    touched: {},
	    amountError: '',
	    isSubmitting: false,
	    donationRef: '',
	    copied: false,
	    get effectiveAmount() { const v = this.isCustom ? parseInt(this.customAmount) || 0 : this.selectedAmount; return isNaN(v) ? 0 : v; },
	    get formattedAmount() { return this.effectiveAmount ? this.effectiveAmount.toLocaleString() : '0'; },
	    get annualTotal() { if (!this.recurring) return this.effectiveAmount; const map = { Monthly: 12, Quarterly: 4, Annually: 1 }; return this.effectiveAmount * (map[this.frequency] || 1); },
	    get frequencyLabel() { return this.recurring ? this.frequency : 'One-time'; },
	    get todayLabel() { return new Date().toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' }); },
	    validateAmount() {
	        if (!this.effectiveAmount || this.effectiveAmount === 0) { this.amountError = this.isCustom ? 'Please enter an amount' : 'Please select an amount'; return false; }
	        if (this.effectiveAmount < 500) { this.amountError = 'Minimum donation is Mkw 500'; return false; }
	        if (this.effectiveAmount > 5000000) { this.amountError = 'Maximum is Mkw 5,000,000'; return false; }
	        this.amountError = '';
	        return true;
	    },
	    validateDonor() {
	        const e = {};
	        if (!this.donor.name.trim()) e.name = 'Full name is required';
	        else if (this.donor.name.trim().length < 2) e.name = 'Name must be at least 2 characters';
	        if (!this.donor.email.trim()) e.email = 'Email is required';
	        else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.donor.email)) e.email = 'Enter a valid email address';
	        if (this.donor.phone && !/^(\+265|0)?\s?\d{3}[\s-]?\d{3}[\s-]?\d{3}$/.test(this.donor.phone.replace(/\s/g,''))) e.phone = 'Enter a valid Malawi phone e.g. 0880 123 456';
	        if (this.donor.message && this.donor.message.length > 500) e.message = 'Message must be under 500 characters';
	        this.errors = e;
	        return Object.keys(e).length === 0;
	    },
	    goToDetails() { if (this.validateAmount()) { this.step = 2; } },
	    goToPreview() {
	        this.touched = { name:true, email:true, phone:true, message:true };
	        if (this.validateDonor()) { this.step = 3; }
	    },
	    submitDonation() {
	        this.isSubmitting = true;
	        setTimeout(() => {
	            this.donationRef = 'NCC-DON-' + new Date().getFullYear() + '-' + Math.floor(10000 + Math.random()*90000);
	            this.isSubmitting = false;
	            this.step = 4;
	        }, 1400);
	    },
	    copyRef() { if (this.donationRef && navigator.clipboard) { navigator.clipboard.writeText(this.donationRef).then(() => { this.copied = true; setTimeout(()=> this.copied=false, 2000); }); } },
	    resetFlow() { this.step=1; this.donationRef=''; this.copied=false; this.isCustom=false; this.customAmount=''; this.selectedAmount=2000; this.recurring=true; this.frequency='Monthly'; this.donor={name:'',email:'',phone:'',message:''}; this.errors={}; this.touched={}; this.amountError=''; }
	}" x-init="$nextTick(() => heroVisible = true)">

								<!-- Headline -->
								<h1 class="text-3xl font-bold text-center mb-6 text-emerald-700" x-show="heroVisible"
												x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 -translate-y-6"
												x-transition:enter-end="opacity-100 translate-y-0">
												MAKE A CHILD SMILE
								</h1>

								<!-- Presentation-mode badge -->
								<div class="max-w-3xl mx-auto mb-4 flex justify-center" x-show="heroVisible" x-transition>
									<span class="inline-flex items-center gap-2 bg-amber-50 border border-amber-200 text-amber-800 text-xs font-semibold px-3 py-1.5 rounded-full">
										<i class="fa-solid fa-circle-info"></i> Presentation mode — donations are simulated in-memory, no backend / payment processed
									</span>
								</div>

								<!-- Images + Donation Card -->
								<div class="flex flex-col lg:flex-row justify-between items-start gap-6 mb-8" x-show="heroVisible"
												x-transition:enter="transition ease-out duration-700 delay-100"
												x-transition:enter-start="opacity-0 -translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
												<img src="{{ asset("images/boy childd.jpg") }}" alt="Child Left"
																class="w-full lg:w-1/3 rounded-lg shadow hidden lg:block transition-opacity duration-500 object-cover h-[520px]">
												<div class="w-full lg:w-1/3 flex flex-col bg-white shadow-lg rounded-xl p-6 border border-slate-100 min-h-[520px]">
																<!-- Stepper -->
																<div class="flex items-center justify-center gap-2 mb-5" aria-label="Donation steps">
																	<template x-for="s in [1,2,3]" :key="s">
																		<div class="flex items-center gap-2">
																			<div class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold border" :class="step >= s ? 'bg-emerald-600 text-white border-emerald-600' : step === s-1 ? 'bg-white text-emerald-600 border-emerald-300' : 'bg-slate-100 text-slate-400 border-slate-200'" x-text="s"></div>
																			<span class="text-[11px] font-bold tracking-wide hidden sm:inline" :class="step >= s ? 'text-emerald-700' : 'text-slate-400'" x-text="s===1 ? 'Amount' : s===2 ? 'Details' : 'Confirm'"></span>
																			<span x-show="s < 3" class="w-6 h-0.5" :class="step > s ? 'bg-emerald-600' : 'bg-slate-200'"></span>
																		</div>
																	</template>
																</div>

																<!-- ========== STEP 1: Amount + Recurring ========== -->
																<div x-show="step === 1" x-transition class="w-full space-y-4">
																	<!-- Recurring toggle -->
																	<div class="bg-slate-50 border border-slate-200 rounded-lg p-3 flex items-center justify-between gap-3">
																		<div>
																			<p class="text-sm font-bold text-slate-800">Make this recurring</p>
																			<p class="text-xs text-slate-500" x-text="recurring ? 'You will be charged ' + frequency.toLowerCase() : 'One-time donation'"></p>
																		</div>
																		<label class="relative inline-flex items-center cursor-pointer shrink-0" aria-label="Toggle recurring donation">
																			<input type="checkbox" class="sr-only peer" :checked="recurring" @change="recurring = !recurring" autocomplete="off">
																			<div class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-emerald-600 peer-focus:ring-2 peer-focus:ring-emerald-500 peer-focus:ring-offset-1 transition-colors duration-200"></div>
																			<div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow transition-transform duration-200 peer-checked:translate-x-5"></div>
																		</label>
																	</div>
																	<!-- Frequency selector -->
																	<div x-show="recurring" x-transition class="space-y-1">
																		<p class="text-xs font-semibold text-slate-600">Frequency</p>
																		<div class="grid grid-cols-3 gap-2">
																			<template x-for="f in ['Monthly','Quarterly','Annually']" :key="f">
																				<button type="button" @click="frequency = f" :class="frequency===f ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-white text-slate-700 border-slate-200 hover:border-emerald-300'" class="text-xs font-bold px-2 py-2 rounded-lg border" x-text="f"></button>
																			</template>
																		</div>
																	</div>

																	<!-- Preset amounts + Custom -->
																	<div>
																		<p class="text-xs font-semibold text-slate-600 mb-2">Select amount</p>
																		<div class="grid grid-cols-2 gap-2">
																			<template x-for="amount in presetAmounts" :key="amount">
																				<button type="button" @click="isCustom=false; selectedAmount=amount; amountError=''" :class="!isCustom && selectedAmount===amount ? 'bg-emerald-600 text-white border-emerald-600 shadow' : 'bg-white text-slate-700 border-slate-200 hover:border-emerald-300'" class="px-3 py-2.5 rounded-lg font-bold border text-sm transition">
																					Mkw <span x-text="amount.toLocaleString()"></span>
																				</button>
																			</template>
																			<button type="button" @click="isCustom=true; amountError=''" :class="isCustom ? 'bg-emerald-600 text-white border-emerald-600 shadow' : 'bg-white text-slate-700 border-slate-200 hover:border-emerald-300'" class="px-3 py-2.5 rounded-lg font-bold border text-sm transition col-span-2 sm:col-span-1">Custom</button>
																		</div>
																		<!-- Custom input -->
																		<div x-show="isCustom" x-transition class="mt-3">
																			<label class="block text-xs font-semibold text-slate-700 mb-1">Custom amount (Mkw)</label>
																			<div class="relative">
																				<span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm font-bold">Mkw</span>
																				<input type="number" inputmode="numeric" min="500" max="5000000" step="100" x-model="customAmount" @input="amountError=''" placeholder="e.g. 7500" class="w-full border rounded-lg pl-12 pr-3 py-2.5 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-500" :class="amountError ? 'border-red-400' : 'border-slate-200'">
																			</div>
																			<p class="text-[11px] text-slate-500 mt-1">Min Mkw 500 — Max Mkw 5,000,000</p>
																		</div>
																		<p x-show="amountError" x-text="amountError" class="text-xs text-red-600 mt-2 font-medium"></p>
																		<div class="mt-2 bg-emerald-50 border border-emerald-100 rounded-lg px-3 py-2 text-center">
																			<p class="text-xs text-slate-500">You are donating</p>
																			<p class="text-lg font-extrabold text-emerald-700">Mkw <span x-text="formattedAmount"></span> <span class="text-xs font-semibold text-slate-600" x-text="recurring ? '/ ' + frequency.toLowerCase() : ''"></span></p>
																			<p x-show="recurring" class="text-[11px] text-slate-500">Annual total: Mkw <span x-text="annualTotal.toLocaleString()"></span></p>
																		</div>
																	</div>

																	<p class="text-gray-600 text-center text-xs leading-relaxed" x-text="recurring ? 'Change children\'s lives every ' + frequency.toLowerCase() + ' with a recurring donation.' : 'Make a one-time gift and bring hope to a child today.'"></p>

																	<button type="button" @click="goToDetails()" class="w-full text-center px-4 py-2.5 bg-red-600 text-white rounded-lg font-bold hover:bg-red-700 transition flex items-center justify-center gap-2">
																		Continue <i class="fa-solid fa-arrow-right text-xs"></i>
																	</button>
																	<p class="text-[11px] text-center text-slate-400">Step 1 of 3 — amount & frequency</p>
																</div>

																<!-- ========== STEP 2: Donor information ========== -->
																<div x-show="step === 2" x-transition class="w-full space-y-3" id="donor-form-anchor">
																	<div class="flex items-center justify-between">
																		<h3 class="text-sm font-extrabold text-slate-800">Donor information</h3>
																		<span class="text-[11px] bg-slate-100 border border-slate-200 rounded-full px-2 py-1 font-semibold text-slate-600">Mkw <span x-text="formattedAmount"></span> • <span x-text="frequencyLabel"></span></span>
																	</div>
																	<div x-show="Object.keys(errors).length > 0" class="bg-red-50 border-l-4 border-red-500 p-3 rounded-md">
																		<p class="text-xs font-bold text-red-700">Please correct:</p>
																		<ul class="list-disc ml-5 mt-1 text-xs text-red-700">
																			<template x-for="(msg, field) in errors" :key="field"><li x-text="msg"></li></template>
																		</ul>
																	</div>
																	<div>
																		<label class="block text-xs font-semibold text-slate-700">Full name <span class="text-red-500">*</span></label>
																		<input type="text" x-model="donor.name" @blur="touched.name=true" autocomplete="name" class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" :class="errors.name && touched.name ? 'border-red-400' : 'border-slate-200'" placeholder="Jane Banda">
																		<p x-show="errors.name && touched.name" x-text="errors.name" class="text-xs text-red-600 mt-1"></p>
																	</div>
																	<div>
																		<label class="block text-xs font-semibold text-slate-700">Email <span class="text-red-500">*</span></label>
																		<input type="email" x-model="donor.email" @blur="touched.email=true" autocomplete="email" class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" :class="errors.email && touched.email ? 'border-red-400' : 'border-slate-200'" placeholder="jane@example.com">
																		<p x-show="errors.email && touched.email" x-text="errors.email" class="text-xs text-red-600 mt-1"></p>
																	</div>
																	<div>
																		<label class="block text-xs font-semibold text-slate-700">Phone <span class="text-slate-400 font-normal">(optional)</span></label>
																		<input type="tel" x-model="donor.phone" @blur="touched.phone=true" autocomplete="tel" class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" :class="errors.phone && touched.phone ? 'border-red-400' : 'border-slate-200'" placeholder="0880 123 456">
																		<p x-show="errors.phone && touched.phone" x-text="errors.phone" class="text-xs text-red-600 mt-1"></p>
																	</div>
																	<div>
																		<label class="block text-xs font-semibold text-slate-700">Message <span class="text-slate-400 font-normal">(optional)</span></label>
																		<textarea x-model="donor.message" @blur="touched.message=true" rows="3" maxlength="500" class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" :class="errors.message && touched.message ? 'border-red-400' : 'border-slate-200'" placeholder="Leave a note for the children..."></textarea>
																		<div class="flex justify-between mt-1">
																			<p x-show="errors.message && touched.message" x-text="errors.message" class="text-xs text-red-600"></p>
																			<p class="text-[11px] ml-auto" :class="donor.message.length > 450 ? 'text-amber-600' : 'text-slate-400'" x-text="donor.message.length + ' / 500'"></p>
																		</div>
																	</div>
																	<div class="flex gap-2 pt-1">
																		<button type="button" @click="step=1" class="flex-1 border border-slate-200 bg-white text-slate-700 rounded-lg py-2.5 text-sm font-bold hover:bg-slate-50">Back</button>
																		<button type="button" @click="goToPreview()" class="flex-1 bg-emerald-600 text-white rounded-lg py-2.5 text-sm font-bold hover:bg-emerald-700">Preview donation</button>
																	</div>
																</div>

																<!-- ========== STEP 3: Receipt preview ========== -->
																<div x-show="step === 3" x-transition class="w-full space-y-3" id="receipt-anchor">
																	<h3 class="text-sm font-extrabold text-slate-800 text-center">Receipt preview</h3>
																	<p class="text-[11px] text-center text-slate-500">Review in-memory — nothing is charged yet</p>
																	<div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4 space-y-3">
																		<div class="flex items-center justify-between">
																			<span class="text-xs font-semibold text-slate-600">Amount</span>
																			<span class="text-sm font-extrabold text-emerald-700">Mkw <span x-text="formattedAmount"></span> <span class="text-xs font-medium text-slate-600" x-text="recurring ? '/ ' + frequency.toLowerCase() : ''"></span></span>
																		</div>
																		<div class="flex items-center justify-between text-xs">
																			<span class="font-semibold text-slate-600">Frequency</span>
																			<span class="font-bold text-slate-800" x-text="frequencyLabel"></span>
																		</div>
																		<div x-show="recurring" class="flex items-center justify-between text-xs">
																			<span class="font-semibold text-slate-600">Annual total</span>
																			<span class="font-bold text-slate-800">Mkw <span x-text="annualTotal.toLocaleString()"></span></span>
																		</div>
																		<hr class="border-emerald-100">
																		<div class="space-y-1 text-xs">
																			<p class="font-bold text-slate-800">Donor</p>
																			<p class="text-slate-700"><span x-text="donor.name || '—'"></span> • <span x-text="donor.email || '—'"></span></p>
																			<p class="text-slate-600" x-text="donor.phone ? 'Phone: ' + donor.phone : 'Phone: not provided'"></p>
																			<p x-show="donor.message" class="text-slate-600 italic">"<span x-text="donor.message"></span>"</p>
																		</div>
																		<hr class="border-emerald-100">
																		<div class="flex items-center justify-between text-[11px] text-slate-500">
																			<span>Date</span><span x-text="todayLabel"></span>
																		</div>
																		<div class="flex items-center justify-between text-[11px] text-slate-500">
																			<span>Reference (preview)</span><span class="font-mono font-bold">NCC-DON-PREVIEW</span>
																		</div>
																	</div>
																	<div class="bg-slate-50 border border-slate-200 rounded-lg p-3 text-[11px] text-slate-600 leading-relaxed">
																		<i class="fa-solid fa-lock text-emerald-600 mr-1"></i> In presentation mode this receipt is generated fully in the browser. Use <span class="font-semibold">Confirm & Donate</span> to simulate a successful submission.
																	</div>
																	<div class="flex gap-2">
																		<button type="button" @click="step=2" class="flex-1 border border-slate-200 bg-white text-slate-700 rounded-lg py-2.5 text-sm font-bold hover:bg-slate-50">Edit details</button>
																		<button type="button" @click="submitDonation()" :disabled="isSubmitting" class="flex-1 bg-red-600 text-white rounded-lg py-2.5 text-sm font-bold hover:bg-red-700 disabled:opacity-50 flex items-center justify-center gap-2">
																			<span x-show="!isSubmitting">Confirm & Donate</span>
																			<span x-show="isSubmitting" class="flex items-center gap-2"><span class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></span> Processing...</span>
																		</button>
																	</div>
																</div>

																<!-- ========== STEP 4: Success (mock) ========== -->
																<div x-show="step === 4" x-transition class="w-full space-y-4 text-center" id="success-anchor">
																	<div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto"><i class="fa-solid fa-check text-xl"></i></div>
																	<h3 class="text-lg font-extrabold text-slate-800">Thank you, <span x-text="donor.name.split(' ')[0] || 'friend'"></span>!</h3>
																	<p class="text-sm text-slate-600">Your <span x-text="frequencyLabel.toLowerCase()"></span> donation of <span class="font-bold text-emerald-700">Mkw <span x-text="formattedAmount"></span></span> was received (simulated).</p>
																	<div class="bg-white border border-emerald-200 rounded-xl p-4 text-left space-y-2">
																		<p class="text-xs font-bold text-slate-700">Receipt</p>
																		<p class="text-xs text-slate-600">Reference: <span class="font-mono font-bold text-slate-800" x-text="donationRef"></span> <button type="button" @click="copyRef()" class="ml-2 text-emerald-600 font-bold text-xs hover:underline" x-text="copied ? 'Copied!' : 'Copy'"></button></p>
																		<p class="text-xs text-slate-600">Amount: Mkw <span x-text="formattedAmount"></span> • <span x-text="frequencyLabel"></span></p>
																		<p class="text-xs text-slate-600">Email: <span x-text="donor.email"></span></p>
																		<p class="text-xs text-slate-600">Date: <span x-text="todayLabel"></span></p>
																		<p x-show="recurring" class="text-xs text-slate-500">Next charge (simulated): <span x-text="frequency==='Monthly' ? 'next month' : frequency==='Quarterly' ? 'in 3 months' : 'in 12 months'"></span></p>
																	</div>
																	<div class="flex flex-col gap-2">
																		<button type="button" @click="resetFlow()" class="w-full bg-slate-800 text-white rounded-lg py-2.5 text-sm font-bold hover:bg-slate-900">Donate again</button>
																		<a href="mailto:nccmalawi@gmail.com?subject=Donation%20Receipt%20{{'NCC-DON-xxxx'}}" class="w-full border border-slate-200 bg-white text-slate-700 rounded-lg py-2.5 text-sm font-bold hover:bg-slate-50 text-center">Contact NCC</a>
																	</div>
																	<p class="text-[11px] text-slate-400">This is a frontend simulation. No email or payment was sent — wire this to your backend when ready.</p>
																</div>

																<!-- Payment Methods (show on step 1 & preview only) -->
																<div x-show="step===1 || step===3" class="flex flex-row justify-center gap-4 mt-2 pt-4 border-t border-slate-100">
																				<img src="{{ asset("images/airtel.png") }}" alt="Airtel Money" class="h-7 mx-auto opacity-90">
																				<img src="{{ asset("images/visa.png") }}" alt="Visa" class="h-7 mx-auto opacity-90">
																				<img src="{{ asset("images/paypal.png") }}" alt="PayPal" class="h-7 mx-auto opacity-90">
																				<img src="{{ asset("images/tnm.png") }}" alt="TNM Mpamba" class="h-7 mx-auto opacity-90">
																</div>
																<p x-show="step===1" class="text-[11px] text-center text-slate-400">Secure preview — no card charged in presentation mode</p>
												</div>
												<img src="{{ asset("images/girl child.jpg") }}" alt="Child Right" class="w-full lg:w-1/3 rounded-lg shadow object-cover h-[520px]">
								</div>
				</div>
				<!-- Intro Information Section -->
				<div class="bg-white py-12 px-4" x-data="{ introVisible: false }" x-init="$nextTick(() => introVisible = true)">
								<div class="max-w-4xl mx-auto text-center" x-show="introVisible"
												x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-6"
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
								<h2 class="text-2xl md:text-3xl font-bold text-center mb-8" x-show="sectionVisible"
												x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-6"
												x-transition:enter-end="opacity-100 translate-y-0">
												Even a little Donation makes a big Difference
								</h2>

								<!-- Cards Row -->
								<div class="relative overflow-hidden">
												<!-- Left Arrow -->
												<button x-show="current > 0" @click="current = Math.max(0, current - 1)"
																class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full z-10 md:hidden">
																&#8592;
												</button>

												<!-- Sliding Track -->
												<div class="flex w-max items-center" :class="perPage === 2 ? 'animate-scroll' : ''"
																:style="perPage === 2 ? '' : 'transform: translateX(-' + (current * (100 / perPage)) +
																    '%); transition: transform 2s ease-in-out;'">
																<template x-for="(card, index) in [...cards, ...cards]" :key="'slide-' + index">
																				<div class="shrink-0 w-150 px-3">
																								<div class="bg-gray-100 rounded-lg shadow p-4 text-center h-full">
																												<img :src="card.img" alt="Donation Impact" class="w-full h-80 object-cover rounded mb-4">
																												<h3 class="text-lg font-bold mb-2">
																																A Mkw <span x-text="card.amount"></span> Donation
																												</h3>
																												<p class="text-gray-700 mb-4" x-text="card.text"></p>
																								</div>
																				</div>
																</template>
												</div>

												<!-- Right Arrow -->
												<button x-show="current < cards.length - perPage"
																@click="current = Math.min(cards.length - perPage, current + 1)"
																class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full z-10 md:hidden">
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
												<h2 class="text-3xl font-bold text-gray-900 mb-12" x-show="visible.heading"
																x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-6"
																x-transition:enter-end="opacity-100 translate-y-0">
																Thanks to our supporters
												</h2>

												<!-- Grid -->
												<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
																<!-- Card 1 -->
																<div class="relative bg-white rounded-lg shadow p-6 pt-12 border-b-4 border-red-600" x-show="visible.card1"
																				x-transition:enter="transition ease-out duration-700"
																				x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
																				<!-- Icon -->
																				<div
																								class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-red-600 text-white rounded-full p-4">
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
																				x-show="visible.card2" x-transition:enter="transition ease-out duration-700"
																				x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
																				<div
																								class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-red-600 text-white rounded-full p-4">
																								<i class="fas fa-graduation-cap text-2xl"></i>
																				</div>
																				<div class="text-2xl font-extrabold text-gray-900 mb-2">23,000</div>
																				<p class="text-gray-600">
																								Children have been kept at school through our child education programmes.
																				</p>
																</div>

																<!-- Card 3 -->
																<div class="relative bg-white rounded-lg shadow p-6 pt-12 border-b-4 border-red-600 mt-4"
																				x-show="visible.card3" x-transition:enter="transition ease-out duration-700"
																				x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
																				<div
																								class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-red-600 text-white rounded-full p-4">
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
								<h2 class="text-2xl md:text-3xl font-bold text-center mb-8" x-show="sectionVisible"
												x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-6"
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
																				<div class="bg-white rounded-lg shadow p-6 flex flex-col h-full text-center" x-show="sectionVisible"
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
												<h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6 text-center" x-show="videoVisible"
																x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 scale-95"
																x-transition:enter-end="opacity-100 scale-100">
																Watch Our Story
												</h2>

												{{-- Video Wrapper with Aspect Ratio --}}
												<div class="w-full aspect-video rounded-xl shadow-lg overflow-hidden bg-black" x-show="videoVisible"
																x-transition:enter="transition ease-out duration-700 delay-200"
																x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
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
												<h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-8 text-center" x-show="faqVisible"
																x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-6"
																x-transition:enter-end="opacity-100 translate-y-0">
																FAQs about donating to National Children's Commission
												</h2>

												<!-- FAQ Items -->
												<div class="space-y-4" x-show="faqVisible" x-transition:enter="transition ease-out duration-700 delay-100"
																x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">

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

				<style>
								@keyframes continuous-scroll {
												0% {
																transform: translateX(0);
												}

												100% {
																transform: translateX(-50%);
												}
								}

								.animate-scroll {
												animation: continuous-scroll 15s linear infinite;
												width: max-content;
								}

								.animate-scroll:hover {
												animation-play-state: paused;
								}
				</style>

@endsection
