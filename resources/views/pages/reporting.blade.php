@extends("layouts.app")

@section("title", "Reporting")

@section("content")
				<section class="py-12 px-6 md:px-12 bg-white" x-data="{
	    tab: 'complaint',
	    form: {
	        child_age: '',
	        child_name: '',
	        district: '',
	        village_ta: '',
	        gender: '',
	        nature_of_violation: '',
	        date_of_incident: '',
	        description: '',
	        reporter_name: '',
	        preferred_contact: ''
	    },
	    errors: {},
	    touched: {},
	    isSubmitting: false,
	    submittedRef: null,
	    copied: false,
	    trackRef: '',
	    trackReferenceInput: '',
	    isSearching: false,
	    trackedCase: null,
	    searchError: '',
	    mockCases: {
	        'NCC-2026-00042': {
	            reference: 'NCC-2026-00042',
	            dateSubmitted: 'Aug 26, 2026',
	            status: 'Under Investigation',
	            assignedOfficer: 'Child Protection Unit — Lilongwe HQ',
	            lastUpdated: '2 hours ago'
	        },
	        'NCC-2025-00847': {
	            reference: 'NCC-2025-00847',
	            dateSubmitted: 'Jan 12, 2025',
	            status: 'Investigation ongoing',
	            assignedOfficer: 'Child Protection Unit — Blantyre HQ',
	            lastUpdated: 'Jan 20, 2025'
	        }
	    },
	    isDownloading: false,
	    downloadMessage: '',
	    showContactPanel: false,
	    validate() {
	        const errors = {};
	        const f = this.form;
	
	        if (!f.child_age && f.child_age !== 0) {
	            errors.child_age = 'Child\'s age is required';
	        } else if (!Number.isInteger(Number(f.child_age)) || f.child_age < 0 || f.child_age > 18) {
	            errors.child_age = 'Child\'s age must be between 0 and 18';
	        }
	
	        if (!f.date_of_incident) {
	            errors.date_of_incident = 'Date of incident is required';
	        } else if (f.date_of_incident > this.today) {
	            errors.date_of_incident = 'Date of incident cannot be in the future';
	        }
	
	        if (!f.description) {
	            errors.description = 'Description must be 20–2000 characters';
	        } else if (f.description.length < 20) {
	            errors.description = 'Description must be 20–2000 characters';
	        } else if (f.description.length > 2000) {
	            errors.description = 'Description must be 20–2000 characters';
	        }
	
	        if (!f.child_name) errors.child_name = 'Required';
	        if (!f.district) errors.district = 'Required';
	        if (!f.village_ta) errors.village_ta = 'Required';
	        if (!f.gender) errors.gender = 'Required';
	        if (!f.nature_of_violation) errors.nature_of_violation = 'Required';
	
	        this.errors = errors;
	        return Object.keys(errors).length === 0;
	    },
	    submitForm() {
	        this.touched = {
	            child_age: true,
	            child_name: true,
	            district: true,
	            village_ta: true,
	            gender: true,
	            nature_of_violation: true,
	            date_of_incident: true,
	            description: true,
	            reporter_name: true,
	            preferred_contact: true
	        };
	
	        if (this.validate()) {
	            this.isSubmitting = true;
	            setTimeout(() => {
	                this.submittedRef = 'NCC-2026-' + Math.floor(10000 + Math.random() * 90000);
	                this.trackRef = this.submittedRef;
	                this.trackReferenceInput = this.submittedRef;
	                this.isSubmitting = false;
	                this.tab = 'track';
	            }, 1500);
	        }
	    },
	    copyRef() {
	        if (this.submittedRef && navigator.clipboard) {
	            navigator.clipboard.writeText(this.submittedRef).then(() => {
	                this.copied = true;
	                setTimeout(() => this.copied = false, 2000);
	            });
	        }
	    },
	    get today() {
	        return new Date().toISOString().split('T')[0];
	    },
	    files: [],
	    isUploading: false,
	    uploadProgress: 0,
	    uploadSuccess: false,
	    uploadError: null,
	    handleFiles(event) {
	        const selected = Array.from(event.target.files || event.dataTransfer.files || []);
	        const allowedTypes = ['image/jpeg', 'image/png', 'audio/mpeg', 'video/mp4', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
	        const allowedExts = ['.jpg', '.jpeg', '.png', '.mp3', '.mp4', '.pdf', '.doc', '.docx'];
	        const maxSize = 20 * 1024 * 1024;
	        const validFiles = [];
	        const errors = [];
	
	        for (const file of selected) {
	            const ext = '.' + file.name.split('.').pop().toLowerCase();
	            if (!allowedTypes.includes(file.type) || !allowedExts.includes(ext)) {
	                errors.push('Invalid file type: ' + file.name);
	            } else if (file.size > maxSize) {
	                errors.push('File too large (max 20 MB): ' + file.name);
	            } else {
	                validFiles.push(file);
	            }
	        }
	
	        if (errors.length) {
	            this.uploadError = errors.join('; ');
	        } else {
	            this.uploadError = null;
	        }
	        this.files = [...this.files, ...validFiles];
	        this.uploadSuccess = false;
	    },
	    removeFile(index) {
	        this.files.splice(index, 1);
	    },
	    formatSize(bytes) {
	        if (bytes === 0) return '0 Bytes';
	        const k = 1024;
	        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
	        const i = Math.floor(Math.log(bytes) / Math.log(k));
	        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
	    },
	    uploadFiles() {
	        if (!this.files.length) return;
	        this.isUploading = true;
	        this.uploadProgress = 0;
	        this.uploadSuccess = false;
	        this.uploadError = null;
	
	        const interval = setInterval(() => {
	            this.uploadProgress += 2 + Math.floor(Math.random() * 2);
	            if (this.uploadProgress >= 100) {
	                this.uploadProgress = 100;
	                clearInterval(interval);
	                setTimeout(() => {
	                    this.isUploading = false;
	                    this.uploadSuccess = true;
	                }, 200);
	            }
	        }, 40);
	    },
	    searchCase() {
	        const input = this.trackReferenceInput.trim();
	        if (!input || input.length < 8) {
	            this.searchError = 'Please enter a valid reference number';
	            this.trackedCase = null;
	            return;
	        }
	        this.isSearching = true;
	        this.searchError = '';
	        this.trackedCase = null;
	
	        setTimeout(() => {
	            this.isSearching = false;
	            const mock = this.mockCases[input] || {
	                reference: input.toUpperCase(),
	                dateSubmitted: new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' }),
	                status: 'Under Investigation',
	                assignedOfficer: 'Child Protection Unit — Regional HQ',
	                lastUpdated: 'Just now'
	            };
	            this.trackedCase = mock;
	        }, 1000);
	    },
	    downloadReport() {
	        if (!this.trackedCase) return;
	        this.isDownloading = true;
	        this.downloadMessage = '';
	        setTimeout(() => {
	            this.isDownloading = false;
	            this.downloadMessage = 'Downloading PDF summary...';
	            setTimeout(() => {
	                this.downloadMessage = '';
	            }, 3000);
	        }, 1000);
	    },
	    toggleContactPanel() {
	        this.showContactPanel = !this.showContactPanel;
	    }
	}">
								<div class="max-w-7xl mx-auto">
												<h1 class="text-3xl font-bold text-green-700 mb-6">Reporting and Tracking</h1>

												<!-- Tabs -->
												<div class="flex flex-wrap gap-4 mb-8">
																<button @click="tab = 'complaint'"
																				:class="tab === 'complaint' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border'"
																				class="px-4 py-2 rounded-md font-semibold">File Complaint</button>
																<button @click="tab = 'evidence'"
																				:class="tab === 'evidence' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border'"
																				class="px-4 py-2 rounded-md font-semibold">Attach Evidence</button>
																<button @click="tab = 'track'"
																				:class="tab === 'track' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border'"
																				class="px-4 py-2 rounded-md font-semibold">Track Case</button>
																<button @click="tab = 'stats'"
																				:class="tab === 'stats' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border'"
																				class="px-4 py-2 rounded-md font-semibold">Statistics</button>
												</div>

												<!-- File Complaint -->
												<div x-show="tab === 'complaint'" class="bg-slate-50 rounded-lg shadow-md p-6 space-y-6">
																<h2 class="text-xl font-bold text-gray-800">File a Complaint</h2>

																<!-- Error Summary -->
																<div x-show="Object.keys(errors).length > 0" role="alert" aria-live="assertive"
																				class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
																				<p class="font-bold text-red-700">Please correct the following errors:</p>
																				<ul class="list-disc ml-6 mt-2 text-red-700">
																								<template x-for="(error, field) in errors" :key="field">
																												<li>
																																<a href="#" @click.prevent="$refs[field].focus()" x-text="error"></a>
																												</li>
																								</template>
																				</ul>
																</div>

																<form @submit.prevent="submitForm()" class="space-y-4">
																				<!-- Violation Details -->
																				<div>
																								<label class="block text-sm font-semibold">Child's Age <span class="text-red-600">*</span></label>
																								<input type="number" x-model="form.child_age" @blur="touched.child_age = true"
																												:class="errors.child_age && touched.child_age ? 'border-red-500' : ''" x-ref="child_age"
																												class="w-full border rounded-md p-2">
																								<p x-show="errors.child_age && touched.child_age" x-text="errors.child_age"
																												class="text-red-600 text-sm mt-1"></p>
																				</div>
																				<div>
																								<label class="block text-sm font-semibold">Child's Name <span class="text-red-600">*</span></label>
																								<input type="text" x-model="form.child_name" @blur="touched.child_name = true"
																												:class="errors.child_name && touched.child_name ? 'border-red-500' : ''" x-ref="child_name"
																												class="w-full border rounded-md p-2">
																								<p x-show="errors.child_name && touched.child_name" x-text="errors.child_name"
																												class="text-red-600 text-sm mt-1"></p>
																				</div>
																				<div>
																								<label class="block text-sm font-semibold">District <span class="text-red-600">*</span></label>
																								<input type="text" x-model="form.district" @blur="touched.district = true"
																												:class="errors.district && touched.district ? 'border-red-500' : ''" x-ref="district"
																												class="w-full border rounded-md p-2">
																								<p x-show="errors.district && touched.district" x-text="errors.district"
																												class="text-red-600 text-sm mt-1"></p>
																				</div>
																				<div>
																								<label class="block text-sm font-semibold">Village,T/A <span class="text-red-600">*</span></label>
																								<input type="text" x-model="form.village_ta" @blur="touched.village_ta = true"
																												:class="errors.village_ta && touched.village_ta ? 'border-red-500' : ''" x-ref="village_ta"
																												class="w-full border rounded-md p-2">
																								<p x-show="errors.village_ta && touched.village_ta" x-text="errors.village_ta"
																												class="text-red-600 text-sm mt-1"></p>
																				</div>
																				<div>
																								<label class="block text-sm font-semibold">Gender <span class="text-red-600">*</span></label>
																								<select x-model="form.gender" @blur="touched.gender = true"
																												:class="errors.gender && touched.gender ? 'border-red-500' : ''" x-ref="gender"
																												class="w-full border rounded-md p-2">
																												<option value="">Select</option>
																												<option>Male</option>
																												<option>Female</option>
																												<option>Other</option>
																								</select>
																								<p x-show="errors.gender && touched.gender" x-text="errors.gender"
																												class="text-red-600 text-sm mt-1"></p>
																				</div>
																				<div>
																								<label class="block text-sm font-semibold">Nature of Violation <span
																																class="text-red-600">*</span></label>
																								<select x-model="form.nature_of_violation" @blur="touched.nature_of_violation = true"
																												:class="errors.nature_of_violation && touched.nature_of_violation ? 'border-red-500' : ''"
																												x-ref="nature_of_violation" class="w-full border rounded-md p-2">
																												<option value="">Select</option>
																												<option>Abuse</option>
																												<option>Neglect</option>
																												<option>Child Marriage</option>
																												<option>Exploitation / Labour</option>
																												<option>Other</option>
																								</select>
																								<p x-show="errors.nature_of_violation && touched.nature_of_violation"
																												x-text="errors.nature_of_violation" class="text-red-600 text-sm mt-1"></p>
																				</div>

																				<div>
																								<label class="block text-sm font-semibold">Date of Incident <span
																																class="text-red-600">*</span></label>
																								<input type="date" x-model="form.date_of_incident" :max="today"
																												@blur="touched.date_of_incident = true"
																												:class="errors.date_of_incident && touched.date_of_incident ? 'border-red-500' : ''"
																												x-ref="date_of_incident" class="w-full border rounded-md p-2">
																								<p x-show="errors.date_of_incident && touched.date_of_incident" x-text="errors.date_of_incident"
																												class="text-red-600 text-sm mt-1"></p>
																				</div>
																				<div>
																								<label class="block text-sm font-semibold">Description <span class="text-red-600">*</span></label>
																								<textarea x-model="form.description" @blur="touched.description = true"
																								    :class="errors.description && touched.description ? 'border-red-500' : ''" x-ref="description"
																								    class="w-full border rounded-md p-2" rows="4"></textarea>
																								<p x-text="form.description.length + ' / 2000 chars (min 20)'"
																												:class="touched.description && (form.description.length < 20 || form.description.length > 2000) ?
																												    'text-red-600' : 'text-gray-500'"
																												class="text-sm mt-1"></p>
																								<p x-show="errors.description && touched.description" x-text="errors.description"
																												class="text-red-600 text-sm mt-1"></p>
																				</div>

																				<!-- Reporter Info -->
																				<h3 class="text-lg font-bold text-gray-700 mt-6">Reporter Info (Optional)</h3>
																				<div>
																								<label class="block text-sm font-semibold">Your Name</label>
																								<input type="text" x-model="form.reporter_name" @blur="touched.reporter_name = true"
																												x-ref="reporter_name" class="w-full border rounded-md p-2">
																				</div>
																				<div>
																								<label class="block text-sm font-semibold">Preferred Contact</label>
																								<input type="text" x-model="form.preferred_contact" @blur="touched.preferred_contact = true"
																												x-ref="preferred_contact" class="w-full border rounded-md p-2">
																				</div>

																				<button type="submit" :disabled="isSubmitting"
																								class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md font-semibold disabled:opacity-50">
																								<span x-show="!isSubmitting">Submit Complaint</span>
																								<span x-show="isSubmitting">Submitting...</span>
																				</button>

																				<!-- Success Card -->
																				<div x-show="submittedRef" class="bg-green-50 border border-green-200 rounded-md p-4 mt-4">
																								<p class="font-bold text-green-800">Complaint submitted successfully!</p>
																								<p class="text-green-700 mt-1">Your reference number: <span x-text="submittedRef"
																																class="font-mono font-bold"></span></p>
																								<button @click="copyRef()" type="button"
																												class="mt-2 bg-green-600 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-green-700">
																												<span x-text="copied ? 'Copied!' : 'Copy Reference'"></span>
																								</button>
																				</div>

																				<div class="flex flex-row gap-2">
																								<p class="text-sm text-gray-500 mt-2">You will receive a reference number to attach evidence and
																												track your case.</p>
																								<p class="text-sm text-red-700 mt-2">Use your reference number to attach evidence using the button
																												above, anytime.
																								</p>
																				</div>
																</form>
												</div>

												<!-- Attach Evidence -->
												<div x-show="tab === 'evidence'" class="bg-slate-50 rounded-lg shadow-md p-6 space-y-6">
																<h2 class="text-xl font-bold text-gray-800">Attach Evidence</h2>
																<div>
																				<label class="block text-sm font-semibold">Case Reference Number</label>
																				<input type="text" placeholder="e.g. NCC-2025-XXXXX" class="w-full border rounded-md p-2">
																</div>
																<div @click="$refs.fileInput.click()" @dragover.prevent="" @drop.prevent="handleFiles($event)"
																				class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center cursor-pointer hover:border-green-600 transition"
																				:class="isUploading ? 'opacity-50 pointer-events-none' : ''">
																				<p class="text-gray-600 mb-2">Drag & drop files here or click to upload</p>
																				<input type="file" multiple class="hidden" x-ref="fileInput" @change="handleFiles">
																				<p class="text-sm text-gray-500 mt-2">Allowed: JPEG, PNG, MP3, MP4, PDF, DOC, DOCX (max 20 MB)</p>
																</div>
																<div x-show="files.length > 0" class="space-y-2">
																				<template x-for="(file, index) in files" :key="index">
																								<div class="flex items-center justify-between bg-white border rounded-md p-2">
																												<div class="flex items-center gap-2">
																																<template x-if="file.type && file.type.startsWith('image/')">
																																				<img :src="URL.createObjectURL(file)" class="h-16 w-16 object-cover rounded">
																																</template>
																																<template x-if="!file.type || !file.type.startsWith('image/')">
																																				<i class="fa-solid fa-file text-gray-400 text-xl"></i>
																																</template>
																																<span x-text="file.name" class="text-sm text-gray-700"></span>
																												</div>
																												<div class="flex items-center gap-2">
																																<span x-text="formatSize(file.size)" class="text-xs text-gray-500"></span>
																																<button @click="removeFile(index)" type="button"
																																				class="text-red-600 hover:text-red-800 text-xs font-semibold">Remove</button>
																												</div>
																								</div>
																				</template>
																</div>
																<div x-show="isUploading" class="space-y-2">
																				<div class="w-full bg-gray-200 rounded-full h-2.5">
																								<div class="bg-green-600 h-2.5 rounded-full transition-all duration-300"
																												:style="'width: ' + uploadProgress + '%'"></div>
																				</div>
																				<p class="text-sm text-gray-600" x-text="'Uploading... ' + uploadProgress + '%'"></p>
																</div>
																<div x-show="uploadSuccess && !isUploading" class="bg-green-50 border border-green-200 rounded-md p-4">
																				<p class="text-green-800 font-semibold">Evidence uploaded successfully!</p>
																</div>
																<div x-show="uploadError && !isUploading" class="bg-red-50 border border-red-200 rounded-md p-4">
																				<p class="text-red-700" x-text="uploadError"></p>
																</div>
																<div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 text-sm text-gray-700">
																				<p><strong>Safe Evidence Guidance:</strong></p>
																				<ul class="list-disc ml-6">
																								<li>Avoid including identifying details if it puts you or a child at risk.</li>
																								<li>Include a consent statement if uploading media showing a child.</li>
																								<li>If upload fails, describe the content in the complaint description field instead.</li>
																				</ul>
																</div>
																<button @click="uploadFiles()" :disabled="isUploading || !files.length"
																				class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md font-semibold disabled:opacity-50">
																				<span x-show="!isUploading">Submit Evidence</span>
																				<span x-show="isUploading">Uploading...</span>
																</button>
																<p class="text-sm text-red-700 mt-2">Use your reference number to track your case using the button above,
																				anytime.
																</p>
												</div>

												<!-- Track Case -->
												<div x-show="tab === 'track'" class="bg-slate-50 rounded-lg shadow-md p-6 space-y-6">
																<h2 class="text-xl font-bold text-gray-800">Track Your Case</h2>
																<div class="flex gap-2">
																				<input type="text" x-model="trackReferenceInput" @keydown.enter="searchCase()"
																								placeholder="e.g. NCC-2025-00847" x-ref="trackInput" class="flex-1 border rounded-md p-2">
																				<button @click="searchCase()" :disabled="isSearching"
																								class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md font-semibold disabled:opacity-50">
																								<span x-show="!isSearching">Track Case</span>
																								<span x-show="isSearching">Searching...</span>
																				</button>
																</div>
																<div x-show="searchError" class="bg-red-50 border border-red-200 rounded-md p-4">
																				<p class="text-red-700" x-text="searchError"></p>
																</div>
																<div x-show="isSearching" class="text-center py-8">
																				<div
																								class="inline-block w-8 h-8 border-4 border-green-600 border-t-transparent rounded-full animate-spin">
																				</div>
																				<p class="text-gray-600 mt-2">Looking up case...</p>
																</div>

																<template x-if="trackedCase && !isSearching">
																				<div class="space-y-6">
																								<div class="bg-white rounded-md shadow p-4">
																												<h3 class="font-bold text-gray-800 mb-2" x-text="'Case ' + trackedCase.reference"></h3>
																												<p>Status: <span class="text-green-600 font-semibold" x-text="trackedCase.status"></span></p>
																												<p>Assigned Officer: <span x-text="trackedCase.assignedOfficer"></span></p>
																												<p>Date Submitted: <span x-text="trackedCase.dateSubmitted"></span></p>
																												<p>Last Updated: <span x-text="trackedCase.lastUpdated"></span></p>
																								</div>

																								<div>
																												<h4 class="font-bold text-gray-700 mb-4">Case Status Timeline</h4>
																												<div class="flex items-center justify-between relative">
																																<div class="absolute top-4 left-0 right-0 h-1 bg-gray-200"></div>
																																<div class="absolute top-4 left-0 h-1 bg-green-600"
																																				:style="'width: ' + (trackedCase.status === 'Investigation ongoing' || trackedCase
																																				    .status === 'Under Investigation' ? '66%' : trackedCase
																																				    .status === 'Referred / resolved' ? '100%' : '33%') +
																																				'; transition: width 0.5s ease-in-out;'">
																																</div>
																																<div class="relative flex flex-col items-center">
																																				<div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center z-10">
																																								<i class="fa-solid fa-check text-white text-xs"></i>
																																				</div>
																																				<span class="text-xs text-gray-600 mt-1">Submitted</span>
																																</div>
																																<div class="relative flex flex-col items-center">
																																				<div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center z-10">
																																								<i class="fa-solid fa-check text-white text-xs"></i>
																																				</div>
																																				<span class="text-xs text-gray-600 mt-1">Under Review</span>
																																</div>
																																<div class="relative flex flex-col items-center">
																																				<div
																																								class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center z-10 animate-pulse">
																																								<i class="fa-solid fa-magnifying-glass text-white text-xs"></i>
																																				</div>
																																				<span class="text-xs text-gray-600 mt-1" x-text="trackedCase.status"></span>
																																</div>
																																<div class="relative flex flex-col items-center">
																																				<div
																																								class="w-8 h-8 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center z-10">
																																								<i class="fa-solid fa-hourglass text-gray-400 text-xs"></i>
																																				</div>
																																				<span class="text-xs text-gray-400 mt-1">Resolved</span>
																																</div>
																												</div>
																								</div>

																								<div class="flex flex-wrap gap-3">
																												<button @click="downloadReport()" :disabled="isDownloading"
																																class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold disabled:opacity-50 flex items-center gap-2">
																																<span x-show="!isDownloading">Download Report</span>
																																<span x-show="isDownloading">Preparing...</span>
																												</button>
																												<button @click="toggleContactPanel()"
																																class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md font-semibold">
																																Contact Investigator
																												</button>
																								</div>

																								<div x-show="isDownloading" class="bg-blue-50 border border-blue-200 rounded-md p-3">
																												<p class="text-blue-700 text-sm" x-text="downloadMessage || 'Preparing your report...'"></p>
																								</div>

																								<div x-show="showContactPanel" class="bg-white rounded-md shadow p-4 border border-gray-200">
																												<h4 class="font-bold text-gray-800 mb-2">Contact Helpline</h4>
																												<p class="text-gray-700">For urgent support, call <span
																																				class="font-bold text-green-700">116</span></p>
																												<p class="text-gray-600 text-sm mt-1">Investigating Officer: <span
																																				x-text="trackedCase.assignedOfficer"></span></p>
																								</div>
																				</div>
																</template>

																<div x-show="!trackedCase && !isSearching && !searchError" class="bg-white rounded-md shadow p-4">
																				<h3 class="font-bold text-gray-800 mb-2">Case NCC-2025-00847</h3>
																				<p>Status: <span class="text-green-600 font-semibold">Investigation ongoing</span></p>
																				<p>Violation type: Child marriage</p>
																				<p>Region: Southern — Blantyre</p>
																				<p class="text-sm text-gray-500 mt-4">Estimated resolution: 4–6 weeks. For updates, call <span
																												class="font-bold">116</span>.</p>
																</div>

																<div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 text-sm text-gray-700">
																				<p><strong>Privacy Notice:</strong></p>
																				<ul class="list-disc ml-6">
																								<li>Do not share your reference number publicly.</li>
																								<li>Only use this tracker on trusted devices.</li>
																				</ul>
																</div>
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
																<p class="text-sm text-gray-500">All data is fully anonymised. No individual or identifiable information is
																				published.</p>
												</div>
								</div>
				</section>

@endsection

<!-- Scripts -->
@push("scripts")
				<script>
								// Chart.js setup
								document.addEventListener('DOMContentLoaded', () => {
												const ctx = document.getElementById('caseChart').getContext('2d');
												new Chart(ctx, {
																type: 'bar',
																data: {
																				labels: ['Abuse / neglect', 'Child marriage', 'Exploitation / labour', 'Violence',
																								'Other'
																				],
																				datasets: [{
																								label: 'Cases by Violation Type',
																								data: [34, 27, 19, 12, 8],
																								backgroundColor: [
																												'#16a34a', '#22c55e', '#4ade80', '#86efac', '#bbf7d0'
																								]
																				}]
																},
																options: {
																				responsive: true,
																				plugins: {
																								legend: {
																												display: false
																								}
																				}
																}
												});
								});
				</script>
@endpush
