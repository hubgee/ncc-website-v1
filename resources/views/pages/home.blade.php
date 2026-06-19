@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-[70vh] flex items-center justify-center text-center text-white"
         style="background-image: url('{{ asset('images/hero-children.jpg') }}');">
    <div class="bg-black/50 absolute inset-0"></div>
    <div class="relative z-10 px-4">
        <h1 class="text-3xl md:text-5xl font-bold">Every Child Matters, Every Voice Counts</h1>
        <p class="mt-4 text-lg md:text-xl">Safeguarding children’s rights and dignity.</p>
        <div class="mt-6 flex flex-col md:flex-row gap-4 justify-center">
            <a href="{{ route('reporting') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold text-sm">
                Report a Case Now
            </a>
           <a href="{{ route('get-involved') }}" class="border border-white px-4 py-2 rounded-lg font-semibold text-sm">
                Work With Us
            </a>
        </div>
    </div>
</section>

    <!-- Mission Section -->
    <section class="py-12 px-6 md:px-12 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-green-700">Our Mission</h2>
        <p class="mt-4 max-w-2xl mx-auto text-gray-700">
            Championship the Rights of Every Child in Malawi. We work tirelessly to protect, promote, and fulfill the rights of children.
        </p>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 bg-white shadow rounded">
                <img src="/icons/protection.svg" class="mx-auto h-12 mb-4" alt="Protection">
                <h3 class="font-semibold">Protection First</h3>
            </div>
            <div class="p-6 bg-white shadow rounded">
                <img src="/icons/education.svg" class="mx-auto h-12 mb-4" alt="Education">
                <h3 class="font-semibold">Education & Awareness</h3>
            </div>
            <div class="p-6 bg-white shadow rounded">
                <img src="/icons/justice.svg" class="mx-auto h-12 mb-4" alt="Justice">
                <h3 class="font-semibold">Justice & Advocacy</h3>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="bg-green-50 py-12 px-6 md:px-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div><h3 class="text-2xl font-bold text-green-700">1,249</h3><p>Children Supported</p></div>
            <div><h3 class="text-2xl font-bold text-green-700">2,000+</h3><p>Families Reached</p></div>
            <div><h3 class="text-2xl font-bold text-green-700">6,000</h3><p>Community Members</p></div>
            <div><h3 class="text-2xl font-bold text-green-700">28</h3><p>Districts Covered</p></div>
        </div>
    </section>

    <!-- Latest Updates -->
    <section class="py-12 px-6 md:px-12">
        <h2 class="text-base md:text-base font-bold text-green-700 text-center">LATEST UPDATES</h2>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <article class="overflow-hidden bg-white shadow rounded-[10px]">
                <img src="{{ asset('images/update-1.jpg') }}" alt="Child protection act" class="w-full h-70 object-cover rounded-t-[10px]">
                <div class="p-6">
                    <h3 class="font-semibold text-xl">May 2025 – Parliament Passes Strengthened Child Protection Act</h3>
                </div>
            </article>
            <article class="overflow-hidden bg-white shadow rounded-[10px]">
                <img src="{{ asset('images/update-2.jpg') }}" alt="National day of the African child" class="w-full h-70 object-cover rounded-t-[10px]">
                <div class="p-6">
                    <h3 class="font-semibold text-xl">May 2025 – National Day of the African Child – Celebrations & Pledges</h3>
                </div>
            </article>
        </div>
    </section>
    <!-- Action Buttons Section -->
<section class="py-12 px-6 md:px-12">
    <div class="flex flex-col md:flex-row justify-center gap-100">
        <!-- Child Rights Corner Button -->
        <a href="{{ route('childrens-corner') }}"
           class="flex items-center justify-center border border-gray-300 px-6 py-3 rounded-lg font-bold uppercase text-gray-800 hover:text-green-700 hover:border-green-700">
            <i class="fa-solid fa-child mr-2 text-red-600"></i>
            CHILD RIGHTS CORNER
        </a>

        <!-- Report a Case Button -->
        <a href="{{ route('reporting') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-bold uppercase text-center">
            REPORT A CASE NOW
        </a>
    </div>
</section>

@endsection
