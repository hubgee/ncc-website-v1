@extends("layouts.app")

@section("title", "Resources")

@section("content")
<div x-data="{
    search: '',
    activeFilter: 'all',
    modalOpen: false,
    modalResource: null,
    recentlyViewed: [],
    cards: [
        { id: 1, title: 'NCC Act', category: 'acts', categoryLabel: 'Acts', description: 'Official Act establishing the National Children’s Commission.', file: 'NCC-Act.pdf', size: '1.2 MB', pages: 42, updated: '15 Jan 2026', hasFile: true },
        { id: 2, title: 'NCC National Guidelines', category: 'guidelines', categoryLabel: 'Guidelines', description: 'Guidelines for implementing child protection and participation programs.', file: 'NCC NATIONAL GUIDELINES.pdf', size: '2.8 MB', pages: 86, updated: '03 Mar 2026', hasFile: true },
        { id: 3, title: 'Child Protection Strategic Plan 2024–2029', category: 'strategic-policies', categoryLabel: 'Strategic Policies', description: 'Five-year strategic framework guiding national child protection priorities and investments.', file: null, size: '3.1 MB', pages: 120, updated: '22 Feb 2026', hasFile: false },
        { id: 4, title: 'Legal Instruments Compendium', category: 'legal-instruments', categoryLabel: 'Legal Instruments', description: 'A consolidated reference of national and international legal instruments on child rights.', file: null, size: '4.5 MB', pages: 210, updated: '10 Dec 2025', hasFile: false },
        { id: 5, title: 'Stakeholder Engagement Toolkit', category: 'stakeholder-tools', categoryLabel: 'Stakeholder Tools', description: 'Practical tools and templates for coordinating child protection stakeholders.', file: null, size: '1.8 MB', pages: 64, updated: '08 Jan 2026', hasFile: false },
        { id: 6, title: 'Annual Child Welfare Report 2025', category: 'reports', categoryLabel: 'Reports', description: 'Comprehensive annual report on child welfare outcomes, activities, and impact data.', file: null, size: '5.2 MB', pages: 156, updated: '30 Mar 2026', hasFile: false }
    ],
    filters: [
        { key: 'all', label: 'All' },
        { key: 'acts', label: 'Acts' },
        { key: 'guidelines', label: 'Guidelines' },
        { key: 'legal-instruments', label: 'Legal Instruments' },
        { key: 'strategic-policies', label: 'Strategic Policies' },
        { key: 'stakeholder-tools', label: 'Stakeholder Tools' },
        { key: 'reports', label: 'Reports' }
    ],
    init() {
        this.loadRecentlyViewed();
    },
    get filteredCards() {
        return this.cards.filter(c => {
            const matchesFilter = this.activeFilter === 'all' || c.category === this.activeFilter;
            const term = this.search.trim().toLowerCase();
            const matchesSearch = !term || c.title.toLowerCase().includes(term) || c.description.toLowerCase().includes(term);
            return matchesFilter && matchesSearch;
        });
    },
    openPreview(card) {
        this.modalResource = card;
        this.modalOpen = true;
        this.pushRecent(card.id);
    },
    closeModal() {
        this.modalOpen = false;
        this.modalResource = null;
    },
    pushRecent(id) {
        let ids = this.recentlyViewed.filter(i => i !== id);
        ids.unshift(id);
        this.recentlyViewed = ids.slice(0, 10);
        localStorage.setItem('ncc_recently_viewed', JSON.stringify(this.recentlyViewed));
    },
    loadRecentlyViewed() {
        try {
            const stored = localStorage.getItem('ncc_recently_viewed');
            if (stored) this.recentlyViewed = JSON.parse(stored);
        } catch (e) { this.recentlyViewed = []; }
    },
    get recentCards() {
        return this.recentlyViewed.map(id => this.cards.find(c => c.id === id)).filter(Boolean);
    }
}" x-init="init()" @keydown.escape.window="closeModal()" class="max-w-7xl mx-auto px-4 py-10">

    <!-- Page Header -->
    <h1 class="text-3xl font-bold text-emerald-700 mb-6">Resources</h1>
    <p class="text-gray-600 mb-8">
        Browse official documents and guidelines. Use the search and filters to quickly find what you need.
    </p>

    <!-- Recently Viewed -->
    <div x-show="recentCards.length > 0" x-transition class="mb-8">
        <h2 class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-3">Recently Viewed</h2>
        <div class="flex gap-4 overflow-x-auto pb-2">
            <template x-for="card in recentCards" :key="card.id">
                <button @click="openPreview(card)"
                    class="flex-shrink-0 w-56 text-left bg-white border border-slate-200 rounded-lg p-3 hover:border-emerald-500 hover:shadow-md transition">
                    <span class="text-xs font-medium text-emerald-600" x-text="card.categoryLabel"></span>
                    <p class="text-sm font-semibold text-gray-800 mt-1 line-clamp-2" x-text="card.title"></p>
                    <span class="text-xs text-gray-400 mt-2 block" x-text="card.updated"></span>
                </button>
            </template>
        </div>
    </div>

    <!-- Search + Filters -->
    <div class="flex flex-col mb-8 gap-4">
        <!-- Search -->
        <div class="relative flex-1">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Search resources..." x-model="search"
                class="w-full border rounded-lg pl-11 pr-4 py-2 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>
        <!-- Filters -->
        <div class="flex flex-wrap gap-3">
            <template x-for="filter in filters" :key="filter.key">
                <button @click="activeFilter = filter.key" :aria-pressed="activeFilter === filter.key"
                    :class="activeFilter === filter.key ? 'bg-emerald-600 text-white border-emerald-600' : 'text-gray-600 hover:bg-emerald-50 hover:text-emerald-700'"
                    class="px-4 py-2 border rounded-lg transition" x-text="filter.label">
                </button>
            </template>
        </div>
    </div>

    <!-- Resource Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <template x-for="card in filteredCards" :key="card.id">
            <div :data-category="card.category" class="bg-white shadow rounded-lg p-6 flex flex-col">
                <span class="text-xs font-medium text-emerald-600 uppercase tracking-wide" x-text="card.categoryLabel"></span>
                <h3 class="text-lg font-bold text-gray-800 mt-1 mb-2" x-text="card.title"></h3>
                <p class="text-gray-600 text-sm mb-4" x-text="card.description"></p>

                <!-- File metadata -->
                <div class="text-xs text-gray-500 flex flex-wrap gap-x-3 gap-y-1 mb-4">
                    <span class="inline-flex items-center gap-1"><i class="fa-solid fa-file-pdf text-red-500"></i> PDF</span>
                    <span class="inline-flex items-center gap-1"><i class="fa-solid fa-weight-hanging"></i> <span x-text="card.size"></span></span>
                    <span class="inline-flex items-center gap-1"><i class="fa-solid fa-copy"></i> <span x-text="card.pages + ' pages'"></span></span>
                    <span class="inline-flex items-center gap-1"><i class="fa-regular fa-calendar"></i> <span x-text="card.updated"></span></span>
                </div>

                <!-- Actions -->
                <div class="mt-auto flex flex-wrap gap-2">
                    <button @click="openPreview(card)"
                        class="px-3 py-2 bg-emerald-600 text-white text-sm rounded-lg hover:bg-emerald-700 transition">
                        <i class="fa-solid fa-eye mr-1"></i> Preview
                    </button>
                    <a :href="card.hasFile ? '{{ asset('resource/') }}/' + card.file : '#'" target="_blank"
                        :class="card.hasFile ? 'bg-emerald-600 text-white hover:bg-emerald-700' : 'bg-gray-200 text-gray-400 cursor-not-allowed pointer-events-none'"
                        class="px-3 py-2 text-sm rounded-lg transition">
                        <i class="fa-solid fa-arrow-up-right-from-square mr-1"></i> View
                    </a>
                    <a :href="card.hasFile ? '{{ asset('resource/') }}/' + card.file : '#'" :download="card.hasFile ? card.file : null"
                        :class="card.hasFile ? 'border border-emerald-600 text-emerald-600 hover:bg-emerald-50' : 'border border-gray-200 text-gray-400 cursor-not-allowed pointer-events-none'"
                        class="px-3 py-2 text-sm rounded-lg transition">
                        <i class="fa-solid fa-download mr-1"></i> Download
                    </a>
                </div>
            </div>
        </template>
    </div>

    <!-- Empty state -->
    <div x-show="filteredCards.length === 0" class="text-center py-16">
        <i class="fa-solid fa-folder-open text-4xl text-gray-300 mb-4"></i>
        <p class="text-gray-500">No resources match your search.</p>
    </div>

    <!-- Preview Modal -->
    <div x-show="modalOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="closeModal()"></div>
        <div x-show="modalOpen" x-transition class="relative bg-white rounded-xl shadow-2xl w-full max-w-4xl max-h-[90vh] flex flex-col"
            role="dialog" aria-modal="true" :aria-labelledby="'modal-title-' + (modalResource ? modalResource.id : '')">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b border-slate-200">
                <div>
                    <span class="text-xs font-medium text-emerald-600 uppercase tracking-wide" x-text="modalResource?.categoryLabel"></span>
                    <h2 :id="'modal-title-' + (modalResource?.id || '')" class="text-xl font-bold text-gray-800 mt-1" x-text="modalResource?.title"></h2>
                    <div class="text-xs text-gray-500 flex flex-wrap gap-x-3 gap-y-1 mt-2">
                        <span><i class="fa-solid fa-file-pdf text-red-500 mr-1"></i> PDF</span>
                        <span x-text="modalResource?.size"></span>
                        <span x-text="modalResource?.pages + ' pages'"></span>
                        <span x-text="'Updated ' + modalResource?.updated"></span>
                    </div>
                </div>
                <button @click="closeModal()" aria-label="Close preview" class="text-gray-400 hover:text-gray-700 transition ml-4">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex-1 overflow-auto p-5">
                <template x-if="modalResource && modalResource.hasFile">
                    <iframe :src="'{{ asset('resource/') }}/' + modalResource.file" class="w-full h-[75vh] border rounded-lg" title="Document preview"></iframe>
                </template>
                <template x-if="modalResource && !modalResource.hasFile">
                    <div class="space-y-4">
                        <p class="text-gray-600" x-text="modalResource?.description"></p>
                        <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 space-y-3">
                            <div class="h-4 bg-slate-200 rounded w-3/4"></div>
                            <div class="h-3 bg-slate-200 rounded w-full"></div>
                            <div class="h-3 bg-slate-200 rounded w-5/6"></div>
                            <div class="h-3 bg-slate-200 rounded w-full"></div>
                            <div class="h-3 bg-slate-200 rounded w-2/3"></div>
                            <div class="h-4 bg-slate-200 rounded w-1/2 mt-6"></div>
                            <div class="h-3 bg-slate-200 rounded w-full"></div>
                            <div class="h-3 bg-slate-200 rounded w-4/5"></div>
                        </div>
                        <p class="text-sm text-gray-400 italic text-center">Full document preview available once the file is uploaded.</p>
                    </div>
                </template>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end gap-3 p-5 border-t border-slate-200">
                <button @click="closeModal()" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800 transition">Close</button>
                <template x-if="modalResource && modalResource.hasFile">
                    <a :href="'{{ asset('resource/') }}/' + modalResource.file" target="_blank"
                        class="px-4 py-2 text-sm bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                        <i class="fa-solid fa-arrow-up-right-from-square mr-1"></i> Open in new tab
                    </a>
                </template>
            </div>
        </div>
    </div>
</div>
@endsection
