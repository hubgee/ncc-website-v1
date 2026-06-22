@extends('layouts.app')

@section('title', 'Reporting')

@section('content')
<section class="py-12 px-6 md:px-12 bg-white" x-data="{ tab: 'complaint' }">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-green-700 mb-6">Reporting and Tracking</h1>

        <!-- Tabs -->
        <div class="flex flex-wrap gap-4 mb-8">
            <button @click="tab = 'complaint'" :class="tab === 'complaint' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border'" class="px-4 py-2 rounded-md font-semibold">File Complaint</button>
            <button @click="tab = 'evidence'" :class="tab === 'evidence' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border'" class="px-4 py-2 rounded-md font-semibold">Attach Evidence</button>
            <button @click="tab = 'track'" :class="tab === 'track' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border'" class="px-4 py-2 rounded-md font-semibold">Track Case</button>
            <button @click="tab = 'stats'" :class="tab === 'stats' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border'" class="px-4 py-2 rounded-md font-semibold">Statistics</button>
        </div>

        <!-- File Complaint -->
        <div x-show="tab === 'complaint'" class="bg-slate-50 rounded-lg shadow-md p-6 space-y-6">
            <h2 class="text-xl font-bold text-gray-800">File a Complaint</h2>
            <form class="space-y-4">
                <!-- Violation Details -->
                <div>
                    <label class="block text-sm font-semibold">Child’s Age</label>
                    <input type="number" class="w-full border rounded-md p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Gender</label>
                    <select class="w-full border rounded-md p-2">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold">Nature of Violation</label>
                    <select class="w-full border rounded-md p-2">
                        <option>Abuse</option>
                        <option>Neglect</option>
                        <option>Child Marriage</option>
                        <option>Exploitation / Labour</option>
                        <option>Other</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold">District / Location</label>
                    <input type="text" class="w-full border rounded-md p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Date of Incident</label>
                    <input type="date" class="w-full border rounded-md p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Description</label>
                    <textarea class="w-full border rounded-md p-2"></textarea>
                </div>

                <!-- Reporter Info -->
                <h3 class="text-lg font-bold text-gray-700 mt-6">Reporter Info (Optional)</h3>
                <div>
                    <label class="block text-sm font-semibold">Your Name</label>
                    <input type="text" class="w-full border rounded-md p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Preferred Contact</label>
                    <input type="text" class="w-full border rounded-md p-2">
                </div>

                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md font-semibold">Submit Complaint</button>
                <p class="text-sm text-gray-500 mt-2">You will receive a reference number to track your case.</p>
            </form>
        </div>

        <!-- Attach Evidence -->
        <div x-show="tab === 'evidence'" class="bg-slate-50 rounded-lg shadow-md p-6 space-y-6">
            <h2 class="text-xl font-bold text-gray-800">Attach Evidence</h2>
            <div>
                <label class="block text-sm font-semibold">Case Reference Number</label>
                <input type="text" placeholder="e.g. NCC-2025-XXXXX" class="w-full border rounded-md p-2">
            </div>
            <!-- Drag & Drop Upload -->
            <div id="dropZone" class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center cursor-pointer hover:border-green-600 transition">
                <p class="text-gray-600 mb-2">Drag & drop files here or click to upload</p>
                <input type="file" multiple class="hidden" id="fileUpload">
                <label for="fileUpload" class="bg-green-600 text-white px-4 py-2 rounded-md cursor-pointer">Choose Files</label>
                <p class="text-sm text-gray-500 mt-2">Allowed: JPEG, PNG, MP3, MP4, PDF (max 20 MB)</p>
            </div>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 text-sm text-gray-700">
                <p><strong>Safe Evidence Guidance:</strong></p>
                <ul class="list-disc ml-6">
                    <li>Avoid including identifying details if it puts you or a child at risk.</li>
                    <li>Include a consent statement if uploading media showing a child.</li>
                    <li>If upload fails, describe the content in the complaint description field instead.</li>
                </ul>
            </div>
            <button class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md font-semibold">Submit Evidence</button>
        </div>

        <!-- Track Case -->
        <div x-show="tab === 'track'" class="bg-slate-50 rounded-lg shadow-md p-6 space-y-6">
            <h2 class="text-xl font-bold text-gray-800">Track Your Case</h2>
            <input type="text" placeholder="e.g. NCC-2025-00847" class="w-full border rounded-md p-2 mb-4">
            <div class="bg-white rounded-md shadow p-4">
                <h3 class="font-bold text-gray-800 mb-2">Case NCC-2025-00847</h3>
                <p>Status: <span class="text-green-600 font-semibold">Investigation ongoing</span></p>
                <p>Violation type: Child marriage</p>
                <p>Region: Southern — Blantyre</p>
            </div>
            <div class="mt-4">
                <h4 class="font-bold text-gray-700 mb-2">Case Timeline</h4>
                <ul class="space-y-2 text-gray-600">
                    <li>Complaint received — 12 Jan 2025</li>
                    <li>Under assessment — 14 Jan 2025</li>
                    <li class="font-semibold text-green-700">Investigation ongoing — 20 Jan 2025 (current)</li>
                    <li>Referred / resolved — Pending</li>
                </ul>
            </div>
            <p class="text-sm text-gray-500 mt-4">Estimated resolution: 4–6 weeks. For updates, call <span class="font-bold">116</span>.</p>
        </div>

        <!-- Statistics -->
        <div x-show="tab === 'stats'" class="bg-slate-50 rounded-lg shadow-md p-6 space-y-6">
            <h2 class="text-xl font-bold text-gray-800">Case Statistics Jan–Dec 2024 – Fully anonymised</h2>
            <!-- Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div class="bg-white rounded-md shadow p-4">
                    <h3 class="text-2xl font-bold text-green-700">1,284</h3>
                    <p class="text-gray-600">Cases filed</p>
                </div>
                <div class="bg-white rounded-md shadow p-4">
                    <h3 class="text-2xl font-bold text-green-700">71%</h3>
                    <p class="text-gray-600">Resolution rate</p>
                </div>
                <div class="bg-white rounded-md shadow p-4">
                    <h3 class="text-2xl font-bold text-green-700">23 days</h3>
                    <p class="text-gray-600">Avg. response</p>
                </div>
            </div>
            <!-- Chart -->
            <canvas id="caseChart" class="w-full h-64"></canvas>
                        <p class="text-sm text-gray-500">All data is fully anonymised. No individual or identifiable information is published.</p>
        </div>
    </div>
</section>

@endsection

<!-- Scripts -->
@push('scripts')
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script>
        // Chart.js setup
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('caseChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Abuse / neglect', 'Child marriage', 'Exploitation / labour', 'Violence', 'Other'],
                    datasets: [{
                        label: 'Cases by Violation Type',
                        data: [34, 27, 19, 12, 8],
                        backgroundColor: [
                            '#16a34a','#22c55e','#4ade80','#86efac','#bbf7d0'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        });

        // Drag & Drop file upload demo
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('fileUpload');

        dropZone.addEventListener('click', () => fileInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-green-600');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-green-600');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-green-600');
            fileInput.files = e.dataTransfer.files;
            alert(`${fileInput.files.length} file(s) selected`);
        });
    </script>
@endpush
