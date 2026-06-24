@extends('layouts.app')

@section('title', 'What We Do')

@section('content')
<section class="px-6 md:px-12 bg-white" x-data="{ tab: 'protection' }">
    <div class="max-w-8xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 h-80"> <!-- controllable height -->

        <!-- Left: Hero Image with overlay + centered text -->
        <div class="relative h-80 overflow-hidden rounded-lg shadow-md">
            <img src="{{ asset('images/what-we-do-banner.png') }}" 
                 alt="Children smiling" 
                 class="w-full h-full object-cover">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/50"></div>
            <!-- Centered Text -->
            <div class="absolute inset-0 z-10 flex flex-col items-center justify-center text-center px-6">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">WHAT WE DO</h1>
                <p class="text-lg md:text-xl text-gray-100 mb-8">
                    Every child deserves to feel safe, heard and protected!
                </p>

                <!-- Statistics inside hero -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
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

        <!-- Right: Our Services Tabs -->
        <div class="h-80 flex flex-col justify-center">
            <h2 class="text-2xl md:text-2xl font-semibold text-green-700 mb-6">Our Services</h2>

            <!-- Tabs -->
            <div class="flex flex-wrap gap-4 mb-8">
                <button @click="tab = 'protection'" 
                    :class="tab === 'protection' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border'" 
                    class="px-2 py-1 rounded-md font-semibold">Child Protection</button>
                <button @click="tab = 'advocacy'" 
                    :class="tab === 'advocacy' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border'" 
                    class="px-2 py-1 rounded-md font-semibold">Advocacy & Policy</button>
                <button @click="tab = 'awareness'" 
                    :class="tab === 'awareness' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border'" 
                    class="px-2 py-1 rounded-md font-semibold">Awareness</button>
                <button @click="tab = 'capacity'" 
                    :class="tab === 'capacity' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border'" 
                    class="px-2 py-1 rounded-md font-semibold">Capacity Building</button>
                <button @click="tab = 'referral'" 
                    :class="tab === 'referral' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border'" 
                    class="px-2 py-1 rounded-md font-semibold">Referral & Support</button>
                <button @click="tab = 'research'" 
                    :class="tab === 'research' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border'" 
                    class="px-2 py-1 rounded-md font-semibold">Research</button>
            </div>

            <!-- Tab Content -->
            <div class="bg-white rounded-lg shadow-md p-6 space-y-6 flex-1 overflow-y-auto">
                <!-- Child Protection -->
                <div x-show="tab === 'protection'" class="flex items-start gap-4">
                    <i class="fa-solid fa-shield-halved text-green-600 text-4xl"></i>
                    <div>
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Child Protection</h3>
                        <p class="text-gray-700 mb-4">
                            Monitoring and preventing abuse, neglect, and exploitation of children.
                            Investigating cases of child maltreatment. Promoting child-safe environments in communities, schools, and institutions.
                        </p>
                        <a href="#" class="text-green-600 font-semibold hover:underline">Learn More ></a>
                    </div>
                </div>
                <!-- Advocacy & Policy -->
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

            <!-- Awareness -->
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
               
            <!-- Capacity Building -->
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

            <!-- Referral & Support -->
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

            <!-- Research -->
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
            </div>
        </div>
    </div>
</section>


    <!-- Latest News Section -->
    <section class="py-12 px-6 md:px-12 bg-white">
        <div class="max-w-8xl mx-auto">
            <h2 class="text-2xl md:text-2xl font-bold text-green-700 mb-6">Latest News</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- News Card -->
                <div class="bg-green-700 rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/news1.png') }}" alt="News 1" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-white mb-2">NCC Calls for Stronger Action Against Child Labor</h3>
                        <p class="text-sm text-gray-300 mb-2">7 May 2026 | Dedza</p>
                        <p class="text-gray-300 text-sm">Leaders need to put more effort in nabbing perpetrators of child labor…</p>
                    </div>
                </div>
                <!-- News Card -->
                <div class="bg-green-700 rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/news2.png') }}" alt="News 2" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-white mb-2">New Child Protection Guidelines Launched</h3>
                        <p class="text-sm text-gray-300 mb-2">7 May 2026 | Ntchieu</p>
                        <p class="text-gray-300 text-sm">NCC introduces new child protection guidelines, as one of the ways to help…</p>
                    </div>
                </div>
                <!-- News Card -->
                <div class="bg-green-700 rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/news3.png') }}" alt="News 3" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-white mb-2">NCC Meets Youth Leaders to Promote Child Participation</h3>
                        <p class="text-sm text-gray-300 mb-2">7 May 2026 | Mzuzu</p>
                        <p class="text-gray-300 text-sm">Leaders need to put more effort in nabbing perpetrators of child labor…</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Moments That Matter -->
<section class="py-12 px-6 md:px-12 bg-white">
    <div class="max-w-8xl mx-auto">
        <h2 class="text-2xl md:text-3xl font-bold text-green-700 mb-6">Moments That Matter</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Event Card -->
            <a href="#" class="group relative overflow-hidden rounded-lg shadow-md">
                <img src="{{ asset('images/event1.png') }}" alt="Child Protection Awareness" class="w-full h-56 object-cover transform group-hover:scale-105 transition duration-300">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                    <span class="text-white font-bold text-lg">Child Protection Awareness</span>
                </div>
            </a>
            <!-- Event Card -->
            <a href="#" class="group relative overflow-hidden rounded-lg shadow-md">
                <img src="{{ asset('images/event2.png') }}" alt="School Engagement Session" class="w-full h-56 object-cover transform group-hover:scale-105 transition duration-300">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                    <span class="text-white font-bold text-lg">School Engagement Session</span>
                </div>
            </a>
            <!-- Event Card -->
            <a href="#" class="group relative overflow-hidden rounded-lg shadow-md">
                <img src="{{ asset('images/event3.png') }}" alt="Children’s Rights Week Celebration" class="w-full h-56 object-cover transform group-hover:scale-105 transition duration-300">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                    <span class="text-white font-bold text-lg">Children’s Rights Week Celebration</span>
                </div>
            </a>
        </div>
        <div class="mt-6 text-center">
            <a href="#" class="text-green-600 font-semibold hover:underline">View All Events ></a>
        </div>
    </div>
</section>

<!-- Our Programs -->
<section class="py-12 px-6 md:px-12 bg-slate-50">
    <div class="max-w-8xl mx-auto text-center">
        <h2 class="text-2xl md:text-2xl font-bold text-green-700 mb-2">Our Programs</h2>
        <p class="text-gray-600 mb-8">What We Do For Children</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Protection -->
            <div class="p-6 hover:shadow-lg transition duration-300">
                <i class="fa-solid fa-shield-halved text-green-600 text-5xl mb-4"></i>
                <h3 class="font-bold text-lg text-gray-800 mb-2">Protection</h3>
                <p class="text-gray-600">Child Protection Services</p>
            </div>
            <!-- Education -->
            <div class="p-6 hover:shadow-lg transition duration-300">
                <i class="fa-solid fa-book-open text-green-600 text-5xl mb-4"></i>
                <h3 class="font-bold text-lg text-gray-800 mb-2">Education</h3>
                <p class="text-gray-600">Back to School Initiative</p>
            </div>
            <!-- Labor -->
            <div class="p-6 hover:shadow-lg transition duration-300">
                <i class="fa-solid fa-briefcase text-green-600 text-5xl mb-4"></i>
                <h3 class="font-bold text-lg text-gray-800 mb-2">Labor</h3>
                <p class="text-gray-600">Anti-Child Labor</p>
            </div>
        </div>
    </div>
</section>


     <!-- Statistics Section -->
    <!--<section class="bg-green-700 py-12 px-6 md:px-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div><h3 class="text-2xl font-bold text-white">1,249</h3><p>Children Supported</p></div>
            <div><h3 class="text-2xl font-bold text-white">2,000+</h3><p>Families Reached</p></div>
            <div><h3 class="text-2xl font-bold text-white">6,000</h3><p>Community Members</p></div>
            <div><h3 class="text-2xl font-bold text-white">28</h3><p>Districts Covered</p></div>
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

