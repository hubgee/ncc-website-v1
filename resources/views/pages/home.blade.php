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
           <a href="{{ route('what-we-do') }}" class="border border-white px-4 py-2 rounded-lg font-semibold text-sm">
                Work With Us
            </a>
        </div>
    </div>
</section>

    <!-- Mission & Impact Section -->
<section class="py-16 px-6 md:px-12 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <!-- Mission -->
        <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-4">Our Mission</h2>
        <h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">
            Championing the Rights of Children in Malawi
        </h3>
        <p class="text-gray-700 max-w-3xl mx-auto mb-12">
            The National Children’s Commission works tirelessly to protect, promote, and fulfill the rights of children. 
            We believe every child regardless of background deserves safety, education and the chance to thrive.
        </p>

        <!-- Icons Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="flex flex-col items-center">
                <i class="fa-solid fa-shield-halved text-red-600 text-4xl mb-3"></i>
                <p class="font-semibold text-gray-800">Protection First</p>
            </div>
            <div class="flex flex-col items-center">
                <i class="fa-solid fa-graduation-cap text-red-600 text-4xl mb-3"></i>
                <p class="font-semibold text-gray-800">Education & Awareness</p>
            </div>
            <div class="flex flex-col items-center">
                <i class="fa-solid fa-scale-balanced text-red-600 text-4xl mb-3"></i>
                <p class="font-semibold text-gray-800">Justice & Advocacy</p>
            </div>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <h3 class="text-2xl font-bold text-green-700">1,249+</h3>
                <p class="text-gray-700">Children Supported</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-green-700">2,000+</h3>
                <p class="text-gray-700">Families Reached</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-green-700">6,000+</h3>
                <p class="text-gray-700">Community Members</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-green-700">28</h3>
                <p class="text-gray-700">Districts Covered</p>
            </div>
        </div>
    </div>
</section>


    <!-- Latest Updates -->
    <section class="py-12 px-6 md:px-12">
        <h2 class="text-base md:text-base font-bold text-green-700 text-center">LATEST UPDATES</h2>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
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

