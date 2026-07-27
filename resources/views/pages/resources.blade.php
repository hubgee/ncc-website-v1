@extends("layouts.app")

@section("title", "Resources")

@section("content")
				<div class="max-w-7xl mx-auto px-4 py-10">
								<!-- Page Header -->
								<h1 class="text-3xl font-bold text-emerald-700 mb-6">Resources</h1>
								<p class="text-gray-600 mb-8">
												Browse official documents and guidelines. Use the search and filters to quickly find what you need.
								</p>

								<!-- Search + Filters -->
								<div class="flex flex-col mb-8 gap-4">
												<!-- Search -->
												<div class="flex-1">
																<input type="text" placeholder="Search resources..."
																				class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
												</div>
												<!-- Filters -->
												<div class="flex gap-3">
																<button class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700">
																				All
																</button>
																<button class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700">
																				Acts
																</button>
																<button class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700">
																				Guidelines
																</button>
																<button class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700">
																				Legal Instruments
																</button>
																<button class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700">
																				Strategic Policies
																</button>
																<button class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700">
																				Stakeholder Tools
																</button>
																<button class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700">
																				Reports
																</button>
												</div>
								</div>

								<!-- Resource Cards -->
								<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
												<!-- NCC Act -->
												<div class="bg-white shadow rounded-lg p-6 flex flex-col">
																<h3 class="text-lg font-bold text-gray-800 mb-2">NCC Act</h3>
																<p class="text-gray-600 mb-4">Official Act establishing the National Children’s Commission.</p>
																<div class="mt-auto flex gap-3">
																				<a href="{{ asset("resource/NCC-Act.pdf") }}" target="_blank"
																								class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
																								View
																				</a>
																				<a href="{{ asset("resource/NCC-Act.pdf") }}" download
																								class="px-4 py-2 border border-emerald-600 text-emerald-600 rounded-lg hover:bg-emerald-50 transition">
																								Download
																				</a>
																</div>
												</div>

												<!-- NCC National Guidelines -->
												<div class="bg-white shadow rounded-lg p-6 flex flex-col">
																<h3 class="text-lg font-bold text-gray-800 mb-2">NCC National Guidelines</h3>
																<p class="text-gray-600 mb-4">Guidelines for implementing child protection and participation programs.</p>
																<div class="mt-auto flex gap-3">
																				<a href="{{ asset("resource/NCC NATIONAL GUIDELINES.pdf") }}" target="_blank"
																								class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
																								View
																				</a>
																				<a href="{{ asset("resource/NCC NATIONAL GUIDELINES.pdf") }}" download
																								class="px-4 py-2 border border-emerald-600 text-emerald-600 rounded-lg hover:bg-emerald-50 transition">
																								Download
																				</a>
																</div>
												</div>
								</div>
				</div>
@endsection
