<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

				<head>
								<meta charset="utf-8">
								<meta name="viewport" content="width=device-width, initial-scale=1">
								<title>@yield("title", config("app.name", 'National Children\'s Commission'))</title>
								@vite(["resources/css/app.css", "resources/js/app.js"])
								<!-- Free Font Awesome 6 CDN -->
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
												integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
								<script src="//unpkg.com/alpinejs" defer></script>
								<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

				</head>

				<body class="min-h-screen bg-slate-50 text-slate-900">
								<header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur-sm"
												x-data="{ open: false }">
												<div class="mx-auto flex max-w-8xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
																<a href="{{ route("home") }}" class="text-lg font-semibold text-emerald-700">
																				<img src="{{ asset("images/ncc-logo.png") }}" alt="NCC Logo" class="h-10 w-auto">
																</a>

																<div class="hidden flex-1 items-center justify-end gap-10 sm:flex">
																				<nav class="flex items-center gap-15 text-sm text-slate-700">
																								<a href="{{ route("home") }}" class="hover:text-emerald-700">Home</a>
																								<a href="{{ route("about") }}" class="hover:text-emerald-700">About</a>
																								<a href="{{ route("what-we-do") }}" class="hover:text-emerald-700">What we do</a>
																								<a href="{{ route("reporting") }}" class="hover:text-emerald-700">Reporting</a>
																				</nav>
																				<div class="flex items-center gap-3">
																								<a href="{{ route("childrens-corner") }}"
																												class="flex items-center justify-center rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold uppercase text-gray-800 transition hover:border-green-700 hover:text-green-700">
																												<i class="fa-solid fa-child mr-2 text-red-600"></i>
																												Child Rights Corner
																								</a>

																								<a href="{{ route("reporting") }}"
																												class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-700">
																												Report a Case Now
																								</a>
																				</div>
																</div>

																<div class="flex items-center gap-2 sm:hidden">
																				<a href="{{ route("childrens-corner") }}"
																								class="flex items-center justify-center rounded-md border border-gray-300 px-3 py-2 text-[11px] font-semibold uppercase text-gray-800 transition hover:border-green-700 hover:text-green-700">
																								<i class="fa-solid fa-child mr-2 text-red-600"></i>
																								Child Rights Corner
																				</a>
																				<a href="{{ route("reporting") }}"
																								class="rounded-md bg-red-600 px-4 py-2 text-center font-semibold text-white transition hover:bg-red-700">
																								Report a Case Now
																				</a>
																				<button type="button"
																								class="inline-flex items-center justify-center rounded-md p-2 text-slate-700 transition hover:bg-slate-100 hover:text-emerald-700"
																								@click="open = !open" :aria-expanded="open" aria-label="Toggle navigation">
																								<i class="fa-solid text-lg" :class="open ? 'fa-xmark' : 'fa-bars'"></i>
																				</button>
																</div>
												</div>

												<div class="border-t border-slate-200 px-4 pb-4 sm:hidden" x-show="open" @click.away="open = false"
																x-transition>
																<nav class="mt-4 flex flex-col gap-3 text-sm text-slate-700">
																				<a href="{{ route("home") }}" class="hover:text-emerald-700">Home</a>
																				<a href="{{ route("about") }}" class="hover:text-emerald-700">About</a>
																				<a href="{{ route("what-we-do") }}" class="hover:text-emerald-700">What we do</a>
																				<a href="{{ route("reporting") }}" class="hover:text-emerald-700">Reporting</a>

																</nav>
												</div>
								</header>

								<main class="mx-auto w-full max-w-8xl px-4 py-6 sm:px-6 lg:px-8">
												@yield("content")
								</main>

								<footer class="bg-green-700 text-white pt-12 pb-6">
												<div class="max-w-8xl mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-5 gap-8">
																<!-- Partnerships -->
																<div>
																				<h3 class="font-bold text-gray-700 mb-4">Partnerships & Stakeholders</h3>
																				<ul class="space-y-2">
																								<li>Unicef</li>
																								<li>NGOCCR</li>
																								<li>Save the Children</li>
																								<li>World Vision</li>
																								<li>Ministry of Gender</li>
																				</ul>
																</div>

																<!-- Quick Links -->
																<div>
																				<h3 class="font-bold text-gray-700 mb-4">Quick Links</h3>
																				<ul class="space-y-2">
																								<li><a href="{{ route("home") }}" class="hover:text-green-600">Home</a></li>
																								<li><a href="{{ route("about") }}" class="hover:text-green-600">About Us</a></li>
																								<li><a href="{{ route("what-we-do") }}" class="hover:text-green-600">What We Do</a></li>
																								<li><a href="#" class="hover:text-green-600">Resources</a></li>
																				</ul>
																</div>

																<!-- Help & Support -->
																<div>
																				<h3 class="font-bold text-gray-700 mb-4">Help & Support</h3>
																				<ul class="space-y-2">
																								<li><a href="{{ route("reporting") }}" class="hover:text-green-600">Report a Case</a></li>
																								<li><a href="#" class="hover:text-green-600">Check Case Studies</a></li>
																								<li><a href="#" class="hover:text-green-600">FAQs</a></li>
																								<li><a href="#" class="hover:text-green-600">Contact Us</a></li>
																				</ul>
																</div>

																<!-- Contact -->
																<div>
																				<h3 class="font-bold text-gray-700 mb-4">Contact Us</h3>
																				<p>P.O Box 30346, Area 12<br> Lilongwe, Malawi</p>
																				<p class="mt-2">📞 +265 (0) 880‑268‑418</p>
																				<p>✉️ nccmalawi@gmail.com</p>
																</div>

																<!-- Find Us -->
																<div>
																				<h3 class="font-bold text-gray-700 mb-4">Find Us</h3>
																				<img src="{{ asset("images/map-placeholder.jpg") }}" alt="Map"
																								class="rounded shadow-md w-full h-32 object-cover">
																</div>
												</div>

												<!-- Bottom Section -->
												<div
																class="bg-slate-50 border-t border-green-200 mt-8  px-6 md:px-12 flex flex-col md:flex-row justify-between items-center gap-6">
																<!-- Logo & Newsletter -->
																<div class="flex flex-col md:flex-row items-center gap-6">
																				<img src="{{ asset("images/ncc-logo.png") }}" alt="NCC Logo" class="h-16 w-auto">
																				<form class="flex gap-2">
																								<input type="email" placeholder="Enter your email"
																												class="border border-green-300 rounded px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-green-500">
																								<button type="submit"
																												class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Subscribe</button>
																				</form>
																</div>

																<!-- Helpline & Social -->
																<div class="flex flex-col items-center gap-4 md:flex-row md:items-center md:justify-end md:text-right">
																				<div>
																								<p class="font-semibold text-green-700">Need Help? Call Our Helpline</p>
																				</div>
																				<div>
																								<p class="text-base font-bold text-green-800">116</p>
																				</div>
																				<div class="flex items-center gap-4 text-green-700">
																								<a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
																								<a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
																								<a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
																								<a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
																				</div>
																</div>
												</div>
								</footer>

								@stack("scripts")
				</body>

</html>
