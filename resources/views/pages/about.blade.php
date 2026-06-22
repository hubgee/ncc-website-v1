@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<section class="relative bg-white py-12 px-6 md:px-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-center gap-8">
        
        <!-- Left: Text on green background -->
        <div class="relative bg-green-700 text-white rounded-lg p-8 lg:p-12">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">About our Commission</h1>
            <h2 class="text-xl md:text-2xl font-semibold mb-4">Championing the Rights of Every Child in Malawi</h2>
            <p class="text-base md:text-lg leading-relaxed">
                We are dedicated to safeguarding the rights, well-being, and dignity of all children in Malawi 
                through policy, advocacy, and community engagement.
            </p>
        </div>

        <!-- Right: Image breakout -->
        <div class="relative">
            <img src="{{ asset('images/about-hero.png') }}" alt="Children smiling" 
                 class="rounded-lg shadow-lg w-full lg:max-w-none lg:absolute lg:right-0 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-12">
        </div>
    </div>
</section>

<section class="py-12 px-6 md:px-12 bg-green-700" x-data="{ tab: 'mandate' }">
    <div class="max-w-7xl mx-auto">

        <!-- Tabs -->
        <div class="flex gap-4 mb-8 border-b">
            <button @click="tab = 'mandate'" 
                :class="tab === 'mandate' ? 'border-b-4 border-green-300 text-white' : 'text-gray-600'" 
                class="px-4 py-2 font-semibold">
                Our Mandate
            </button>
            <button @click="tab = 'mission'" 
                :class="tab === 'mission' ? 'border-b-4 border-green-300 text-white' : 'text-gray-600'" 
                class="px-4 py-2 font-semibold">
                Our Mission
            </button>
            <button @click="tab = 'vision'" 
                :class="tab === 'vision' ? 'border-b-4 border-green-300 text-white' : 'text-gray-600'" 
                class="px-4 py-2 font-semibold">
                Our Vision
            </button>
        </div>

        <!-- Mandate Tab -->
        <div x-show="tab === 'mandate'" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left: Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Protection -->
                <div class="bg-slate-50 rounded-lg shadow-md p-6 text-center">
                    <i class="fa-solid fa-shield-halved text-green-600 text-3xl mb-4"></i>
                    <h3 class="font-bold text-lg mb-2">Protection</h3>
                    <p class="text-gray-600 text-sm">Safeguarding children from abuse and exploitation.</p>
                </div>
                <!-- Policy & Law -->
                <div class="bg-slate-50 rounded-lg shadow-md p-6 text-center">
                    <i class="fa-solid fa-scale-balanced text-green-600 text-3xl mb-4"></i>
                    <h3 class="font-bold text-lg mb-2">Policy & Law</h3>
                    <p class="text-gray-600 text-sm">Monitoring child rights laws and conventions.</p>
                </div>
                <!-- Advocacy -->
                <div class="bg-slate-50 rounded-lg shadow-md p-6 text-center">
                    <i class="fa-solid fa-bullhorn text-green-600 text-3xl mb-4"></i>
                    <h3 class="font-bold text-lg mb-2">Advocacy</h3>
                    <p class="text-gray-600 text-sm">Amplifying children’s voices in society.</p>
                </div>
            </div>

            <!-- Right: Text + Tags -->
            <div>
                <h2 class="text-xl font-bold text-white mb-4">What the Commission is Mandated to Do</h2>
                <p class="text-black mb-6">
                    The Commission was established under the Child Care, Protection and Justice Act to serve as the independent authority for promoting and protecting children’s rights across all 28 districts.
                    We collaborate with government ministries, civil society, and communities to ensure every child in Malawi grows up safe and able to reach their full potential.
                </p>
                <div class="flex flex-wrap gap-3">
                    <span class="bg-white text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Child Protection</span>
                    <span class="bg-white text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Rights Monitoring</span>
                    <span class="bg-white text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Community Engagement</span>
                    <span class="bg-white text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Education Access</span>
                    <span class="bg-white text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Policy Reform</span>
                </div>
            </div>
        </div>

        <!-- Mission Tab -->
        <div x-show="tab === 'mission'" class="bg-slate-50 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Our Mission</h2>
            <p class="text-gray-700">
                Placeholder mission content goes here. You can replace this with the Commission’s official mission statement later.
            </p>
        </div>

        <!-- Vision Tab -->
        <div x-show="tab === 'vision'" class="bg-slate-50 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Our Vision</h2>
            <p class="text-gray-700">
                Placeholder vision content goes here. You can replace this with the Commission’s official vision statement later.
            </p>
        </div>
    </div>
</section>

<section class="py-12 px-6 md:px-12 bg-white">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-green-700 mb-2">Governance</h2>
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Commissioners & Ex‑Officials</h3>
        <p class="text-gray-700 mb-8">
            The Commission is governed by appointed Commissioners and key ex‑official representatives 
            from relevant government institutions.
        </p>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Commissioners -->
            <div>
                <h4 class="text-lg font-bold text-gray-800 mb-4">Commissioners</h4>
                <div class="space-y-4">
                    <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                        <i class="fa-solid fa-user-tie text-green-600 text-2xl mr-4"></i>
                        <div>
                            <p class="font-semibold">Mr Benedicto Khondowe</p>
                            <p class="text-sm text-gray-600">Chairperson</p>
                        </div>
                    </div>
                    <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                        <i class="fa-solid fa-user-tie text-green-600 text-2xl mr-4"></i>
                        <div>
                            <p class="font-semibold">Mr Benedicto Khondowe</p>
                            <p class="text-sm text-gray-600">Vice Chairperson</p>
                        </div>
                    </div>
                    <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                        <i class="fa-solid fa-user text-green-600 text-2xl mr-4"></i>
                        <div>
                            <p class="font-semibold">Dr Lucy Kapachira</p>
                            <p class="text-sm text-gray-600">Chair, Corporate Division</p>
                        </div>
                    </div>
                    <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                        <i class="fa-solid fa-user text-green-600 text-2xl mr-4"></i>
                        <div>
                            <p class="font-semibold">Mrs Laika Milanzi</p>
                            <p class="text-sm text-gray-600">Chair, Compliance Division</p>
                        </div>
                    </div>
                    <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                        <i class="fa-solid fa-user text-green-600 text-2xl mr-4"></i>
                        <div>
                            <p class="font-semibold">Mrs Julia Chimuna</p>
                            <p class="text-sm text-gray-600">Chair, Documentation & Learning Division</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ex‑Officials -->
            <div>
                <h4 class="text-lg font-bold text-gray-800 mb-4">Ex‑Officials</h4>
                <div class="space-y-4">
                    <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                        <i class="fa-solid fa-user text-green-600 text-2xl mr-4"></i>
                        <div>
                            <p class="font-semibold">Dr Esmie Kainja</p>
                            <p class="text-sm text-gray-600">Secretary responsible for Children Affairs</p>
                        </div>
                    </div>
                    <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                        <i class="fa-solid fa-user-tie text-green-600 text-2xl mr-4"></i>
                        <div>
                            <p class="font-semibold">Secretary to Treasury</p>
                            <p class="text-sm text-gray-600">Ministry of Finance</p>
                        </div>
                    </div>
                    <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                        <i class="fa-solid fa-user text-green-600 text-2xl mr-4"></i>
                        <div>
                            <p class="font-semibold">Priscilla Thawe</p>
                            <p class="text-sm text-gray-600">Executive Secretary, Malawi Human Rights Commission</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-12 px-6 md:px-12 bg-white">
    <div class="max-w-7xl mx-auto">
        <h3 class="text-2xl font-bold text-green-700 mb-2">Secretariat</h3>
        <h3 class="text-2xl font-bold text-green-700 mb-2">Management Team</h3>
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Senior management responsible for the day-to-day operations of the National Children’s Commission</h3>

        <!--<h4 class="text-lg font-bold text-gray-800 mb-6">Managers and Above</h4>

        <!-- Balanced grid layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- CEO -->
            <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                <i class="fa-solid fa-user-tie text-green-600 text-2xl mr-4"></i>
                <div>
                    <p class="font-semibold">Mr Geoffrey Chimwala</p>
                    <p class="text-sm text-gray-600">Chief Executive Officer (Acting)</p>
                </div>
            </div>
            <!-- Director of Compliance -->
            <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                <i class="fa-solid fa-user-tie text-green-600 text-2xl mr-4"></i>
                <div>
                    <p class="font-semibold">Mrs Martha Chiwanda</p>
                    <p class="text-sm text-gray-600">Director of Compliance (Acting)</p>
                </div>
            </div>
            <!-- Finance Manager -->
            <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                <i class="fa-solid fa-user text-green-600 text-2xl mr-4"></i>
                <div>
                    <p class="font-semibold">Mr Allan Jere</p>
                    <p class="text-sm text-gray-600">Finance Manager (Acting)</p>
                </div>
            </div>
            <!-- HR Manager -->
            <div class="flex items-center border border-green-600 rounded-lg bg-white p-4">
                <i class="fa-solid fa-user text-green-600 text-2xl mr-4"></i>
                <div>
                    <p class="font-semibold">Thoko Gremu</p>
                    <p class="text-sm text-gray-600">Human Resource Manager (Acting)</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-12 px-6 md:px-12 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl text-green-700 mb-2">Organogram</h2>

        <!-- CEO -->
        <div class="flex justify-center mb-8">
            <div class="border border-green-600 rounded-lg bg-white p-6 w-full md:w-1/3">
                <i class="fa-solid fa-user-tie text-green-600 text-3xl mb-3"></i>
                <p class="font-semibold">Chief Executive Officer</p>
            </div>
        </div>

        <!-- Managers row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="border border-green-600 rounded-lg bg-white p-6">
                <i class="fa-solid fa-user-tie text-green-600 text-3xl mb-3"></i>
                <p class="font-semibold">Director of Compliance</p>
            </div>
            <div class="border border-green-600 rounded-lg bg-white p-6">
                <i class="fa-solid fa-user text-green-600 text-3xl mb-3"></i>
                <p class="font-semibold">Finance Manager</p>
            </div>
            <div class="border border-green-600 rounded-lg bg-white p-6">
                <i class="fa-solid fa-user text-green-600 text-3xl mb-3"></i>
                <p class="font-semibold">Human Resource Manager</p>
            </div>
        </div>

        <!-- Footer note -->
        <p class="text-sm text-gray-600 italic">Full Organogram available on request.</p>
    </div>
</section>


 <!-- Statistics Section -->
    <section class="py-12 px-6 md:px-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div><h3 class="text-2xl font-bold text-green-700">1,249</h3><p>Children Supported</p></div>
            <div><h3 class="text-2xl font-bold text-green-700">2,000+</h3><p>Families Reached</p></div>
            <div><h3 class="text-2xl font-bold text-green-700">6,000</h3><p>Community Members</p></div>
            <div><h3 class="text-2xl font-bold text-green-700">28</h3><p>Districts Covered</p></div>
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
