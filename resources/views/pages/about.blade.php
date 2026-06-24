@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<section class="relative overflow-hidden py-12 px-6 md:px-12 min-h-[32rem]" x-data="{
        tab: 'mandate',
        backgrounds: {
            mandate: '{{ asset("images/about-mandate.jpg") }}',
            mission: '{{ asset("images/about-mission.jpg") }}',
            vision: '{{ asset("images/about-vision.jpg") }}'
        },
        cycleInterval: null,
        startCycle() {
            this.cycleInterval = setInterval(() => {
                this.tab = this.tab === 'mandate' ? 'mission' : this.tab === 'mission' ? 'vision' : 'mandate'
            }, 8000)
        },
        stopCycle() {
            clearInterval(this.cycleInterval)
            this.cycleInterval = null
        }
    }"
    x-init="startCycle()"
    @mouseenter="stopCycle()"
    @mouseleave="startCycle()">
    <div class="absolute inset-0">
        <template x-for="(image, key) in backgrounds" :key="key">
            <div x-show="tab === key" x-cloak
                x-transition:enter="transition-opacity duration-1000"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-1000"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 z-0 bg-cover bg-center bg-no-repeat"
                :style="'background-image: url(' + image + ')' "></div>
        </template>
        <div class="absolute inset-0 z-10 bg-green-900/50"></div>
    </div>

    <div class="relative max-w-7xl mx-auto z-20">
        <div class="bg-white/90 border border-slate-200 rounded-2xl shadow-sm p-8 backdrop-blur-sm">
            <div class="flex flex-wrap items-center justify-center gap-4 border-b border-slate-200 pb-6 mb-8">
                <button @click="tab = 'mandate'"
                    :class="tab === 'mandate' ? 'border-b-4 border-green-600 text-green-700' : 'text-gray-600'"
                    class="px-4 py-3 font-semibold transition duration-200">
                    Our Mandate
                </button>
                <button @click="tab = 'mission'"
                    :class="tab === 'mission' ? 'border-b-4 border-green-600 text-green-700' : 'text-gray-600'"
                    class="px-4 py-3 font-semibold transition duration-200">
                    Our Mission
                </button>
                <button @click="tab = 'vision'"
                    :class="tab === 'vision' ? 'border-b-4 border-green-600 text-green-700' : 'text-gray-600'"
                    class="px-4 py-3 font-semibold transition duration-200">
                    Our Vision
                </button>
            </div>

            <div class="space-y-6">
                <div x-show="tab === 'mandate'" class="grid grid-cols-1 gap-8" x-cloak>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
                            <i class="fa-solid fa-shield-halved text-green-600 text-3xl mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Protection</h3>
                            <p class="text-gray-600 text-sm">Safeguarding children from abuse and exploitation.</p>
                        </div>
                        <div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
                            <i class="fa-solid fa-scale-balanced text-green-600 text-3xl mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Policy & Law</h3>
                            <p class="text-gray-600 text-sm">Monitoring child rights laws and conventions.</p>
                        </div>
                        <div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
                            <i class="fa-solid fa-bullhorn text-green-600 text-3xl mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Advocacy</h3>
                            <p class="text-gray-600 text-sm">Amplifying children’s voices in society.</p>
                        </div>
                    </div>
                    <div class="bg-slate-50 rounded-3xl p-8 shadow-sm">
                        <h2 class="text-xl font-bold text-green-700 mb-4">What the Commission is Mandated to Do</h2>
                        <p class="text-gray-700 mb-6">
                            The Commission was established under the Child Care, Protection and Justice Act to serve as the independent authority for promoting and protecting children’s rights across all 28 districts.
                            We collaborate with government ministries, civil society, and communities to ensure every child in Malawi grows up safe and able to reach their full potential.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Child Protection</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Rights Monitoring</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Community Engagement</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Education Access</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Policy Reform</span>
                        </div>
                    </div>
                </div>

                <div x-show="tab === 'mission'" class="grid grid-cols-1 gap-8" x-cloak>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
                            <i class="fa-solid fa-shield-halved text-green-600 text-3xl mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Protection</h3>
                            <p class="text-gray-600 text-sm">Safeguarding children from abuse and exploitation.</p>
                        </div>
                        <div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
                            <i class="fa-solid fa-scale-balanced text-green-600 text-3xl mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Policy & Law</h3>
                            <p class="text-gray-600 text-sm">Monitoring child rights laws and conventions.</p>
                        </div>
                        <div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
                            <i class="fa-solid fa-bullhorn text-green-600 text-3xl mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Advocacy</h3>
                            <p class="text-gray-600 text-sm">Amplifying children’s voices in society.</p>
                        </div>
                    </div>
                    <div class="bg-slate-50 rounded-3xl p-8 shadow-sm">
                        <h2 class="text-xl font-bold text-green-700 mb-4">What the Commission is Mandated to Do</h2>
                        <p class="text-gray-700 mb-6">
                            The Commission was established under the Child Care, Protection and Justice Act to serve as the independent authority for promoting and protecting children’s rights across all 28 districts.
                            We collaborate with government ministries, civil society, and communities to ensure every child in Malawi grows up safe and able to reach their full potential.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Child Protection</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Rights Monitoring</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Community Engagement</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Education Access</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Policy Reform</span>
                        </div>
                    </div>
                </div>

                <div x-show="tab === 'vision'" class="grid grid-cols-1 gap-8" x-cloak>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
                            <i class="fa-solid fa-shield-halved text-green-600 text-3xl mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Protection</h3>
                            <p class="text-gray-600 text-sm">Safeguarding children from abuse and exploitation.</p>
                        </div>
                        <div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
                            <i class="fa-solid fa-scale-balanced text-green-600 text-3xl mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Policy & Law</h3>
                            <p class="text-gray-600 text-sm">Monitoring child rights laws and conventions.</p>
                        </div>
                        <div class="bg-slate-50 rounded-3xl shadow-sm p-6 text-center">
                            <i class="fa-solid fa-bullhorn text-green-600 text-3xl mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Advocacy</h3>
                            <p class="text-gray-600 text-sm">Amplifying children’s voices in society.</p>
                        </div>
                    </div>
                    <div class="bg-slate-50 rounded-3xl p-8 shadow-sm">
                        <h2 class="text-xl font-bold text-green-700 mb-4">What the Commission is Mandated to Do</h2>
                        <p class="text-gray-700 mb-6">
                            The Commission was established under the Child Care, Protection and Justice Act to serve as the independent authority for promoting and protecting children’s rights across all 28 districts.
                            We collaborate with government ministries, civil society, and communities to ensure every child in Malawi grows up safe and able to reach their full potential.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Child Protection</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Rights Monitoring</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Community Engagement</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Education Access</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Policy Reform</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Governance Section -->
<section class="py-12 px-6 md:px-12 bg-slate-50">
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
                
                <div class="space-y-4 mt-47">
                    <h4 class="text-lg font-bold text-gray-800 mb-4">Ex‑Officials</h4>
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
<!-- Secretariat and Organogram side-by-side -->
<section class="py-12 px-6 md:px-12 bg-slate-50">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow-sm p-6 lg:p-8">
            <h3 class="text-2xl font-bold text-green-700 mb-2">Secretariat</h3>
            <h3 class="text-xl font-semibold text-black mb-4">Management Team</h3>
            <p class="text-gray-600 mb-6">Senior management responsible for the day-to-day operations of the National Children’s Commission.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-center gap-4 border border-green-600 rounded-2xl bg-slate-50 p-4">
                    <i class="fa-solid fa-user-tie text-green-600 text-3xl"></i>
                    <div>
                        <p class="font-semibold">Mr Geoffrey Chimwala</p>
                        <p class="text-sm text-gray-600">Chief Executive Officer (Acting)</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 border border-green-600 rounded-2xl bg-slate-50 p-4">
                    <i class="fa-solid fa-user-tie text-green-600 text-3xl"></i>
                    <div>
                        <p class="font-semibold">Mrs Martha Chiwanda</p>
                        <p class="text-sm text-gray-600">Director of Compliance (Acting)</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 border border-green-600 rounded-2xl bg-slate-50 p-4">
                    <i class="fa-solid fa-user text-green-600 text-3xl"></i>
                    <div>
                        <p class="font-semibold">Mr Allan Jere</p>
                        <p class="text-sm text-gray-600">Finance Manager (Acting)</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 border border-green-600 rounded-2xl bg-slate-50 p-4">
                    <i class="fa-solid fa-user text-green-600 text-3xl"></i>
                    <div>
                        <p class="font-semibold">Thoko Gremu</p>
                        <p class="text-sm text-gray-600">Human Resource Manager (Acting)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 lg:p-8">
            <h2 class="text-2xl text-green-700 text-center mb-2">Organogram</h2>
            <div class="flex justify-center mb-8">
                <div class="border border-green-600 rounded-2xl bg-slate-50 p-4 mx-auto flex items-center gap-4">
                    <i class="fa-solid fa-user-tie text-green-600 text-3xl"></i>
                    <p class="font-semibold">Chief Executive Officer</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="flex items-center gap-4 border border-green-600 rounded-2xl bg-slate-50 p-4">
                    <i class="fa-solid fa-user-tie text-green-600 text-3xl"></i>
                    <p class="font-semibold">Director of Compliance</p>
                </div>
                <div class="flex items-center gap-4 border border-green-600 rounded-2xl bg-slate-50 p-4">
                    <i class="fa-solid fa-user text-green-600 text-3xl"></i>
                    <p class="font-semibold">Finance Manager</p>
                </div>
                <div class="flex items-center gap-4 border border-green-600 rounded-2xl bg-slate-50 p-4">
                    <i class="fa-solid fa-user text-green-600 text-3xl"></i>
                    <p class="font-semibold">Human Resource Manager</p>
                </div>
            </div>
            <p class="text-sm text-gray-600 text-center italic mt-15">Full Organogram available on request.</p>
        </div>
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

