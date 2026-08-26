# Plan: Update `reporting.blade.php` with Alpine.js Validation, Attach Evidence, & Track Case Flows

## Objective
Enhance the existing Reporting & Tracking page with:
1. Client-side form validation, accessibility features, live character counting, and a simulated submission flow (Phase 1).
2. Client-side file handling, validation, previews, and simulated upload progress for the "Attach Evidence" tab (Phase 2).
3. Simulated real-time case lookup, visual status timeline, and action buttons for the "Track Case" tab (Phase 3).
4. Security & privacy enhancements: anonymous reporting toggle, encryption badges, incognito banner, and input security attributes (Phase 4).
Preserve the existing Tailwind visual design throughout.

## Context
- **File**: `resources/views/pages/reporting.blade.php`
- **Existing tech**: Blade, Tailwind CSS, Alpine.js (v3 via global CDN), Chart.js (global CDN), Font Awesome (global CDN)
- **Current state (Phase 1 done)**: Expanded Alpine component with `tab`, `form`, `errors`, `touched`, `isSubmitting`, `submittedRef`, `copied`, `trackRef`, and `today` getter. Form fields wired with `x-model`, validation rules for `child_age`, `date_of_incident`, `description`, and required-field asterisks. Error summary with `role="alert"` and `$refs` focus links. Simulated submit with 1.5s timeout, reference generation (`NCC-2026-XXXXX`), copy-to-clipboard, and auto-switch to Track tab.
- **Current state (Phase 2 done)**: File handling state (`files`, `isUploading`, `uploadProgress`, `uploadSuccess`, `uploadError`) added. Drag-and-drop and file input wired to `handleFiles()`. File list UI with thumbnails/icons, formatted sizes, and remove buttons. Simulated upload progress bar and success/error banners added.
- **Current state (Phase 3 done)**: Track Case state (`trackReferenceInput`, `isSearching`, `trackedCase`, `searchError`, `mockCases`, `isDownloading`, `downloadMessage`, `showContactPanel`) added. Search flow with 1s simulated lookup, mock data rendering, 4-step visual timeline with animated active step, and action buttons (Download Report, Contact Investigator) implemented.
- **Layout**: Alpine.js and Chart.js are loaded globally in `layouts/app.blade.php`

## Phase 2: Attach Evidence Enhancements (New Work)

### 1. Extend Alpine State for File Handling
Add to the existing `x-data` object:

```javascript
files: [],
isUploading: false,
uploadProgress: 0,
uploadSuccess: false,
uploadError: ''
```

### 2. Replace Static Upload Markup
In the "Attach Evidence" tab, replace the existing drag-and-drop HTML and inline JS with Alpine-driven markup:

- **Drop zone**: A single container that handles both `@click` (trigger file input) and `@dragover.prevent` / `@drop.prevent`.
- **File input**: Hidden `<input type="file" multiple>` with `x-ref="fileInput"`.
- **Allowed types**: `image/*`, `.pdf`, `.doc`, `.docx`, `.mp3`, `.mp4` (validate via MIME type and file extension).
- **Max size**: 20MB per file.

### 3. File Selection & Validation
Implement `handleFiles(files)` method:

1. Clear previous `uploadError` and `uploadSuccess`.
2. Iterate through dropped/selected files.
3. **Reject** any file > 20MB and push error to `uploadError`.
4. **Reject** any file with unsupported type/extension and push error to `uploadError`.
5. Append accepted files to `files` array (store the raw `File` object so `URL.createObjectURL` and `file.size` remain available).

### 4. File List UI
Below the drop zone, render a list/grid when `files.length > 0`:

- **Image files**: Show `<img :src="URL.createObjectURL(file)" class="h-16 w-16 object-cover rounded">`.
- **Non-image files**: Show a generic document icon (Font Awesome `fa-file` or similar).
- **Metadata**: File name (truncated if long), formatted size (MB/KB).
- **Remove action**: `@click="files.splice(i, 1)"` button with an `X`.

Helper method for size formatting:
```javascript
formatSize(bytes) {
  if (bytes === 0) return '0 Bytes';
  const k = 1024;
  const sizes = ['Bytes', 'KB', 'MB', 'GB'];
  const i = Math.floor(Math.log(bytes) / Math.log(k));
  return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}
```

### 5. Simulated Upload Progress
Add `uploadFiles()` method:

1. Set `isUploading = true`, `uploadProgress = 0`, `uploadSuccess = false`, `uploadError = ''`.
2. Use `setInterval` to increment `uploadProgress` by ~2-3% every ~30-50ms until reaching 100% (total ~1.5-2 seconds).
3. On completion:
   - Clear interval.
   - Set `isUploading = false`, `uploadSuccess = true`.
   - Optionally clear `files = []` or keep them; keep them for UX clarity.
4. If `files.length === 0` when triggered, set `uploadError = 'Please select files first'` and abort.

### 6. Upload UI Controls
- **"Upload Files" button**: Visible when `!isUploading && files.length > 0`. Calls `uploadFiles()`.
- **Progress bar**: Visible during upload (`x-show="isUploading"`). Use a `<div>` with an inner `<div>` whose `width` is bound to `uploadProgress + '%'`. Tailwind classes: `bg-gray-200 rounded-full h-2.5` outer, `bg-green-600 h-2.5 rounded-full` inner with `transition-all duration-300`.
- **Progress text**: `x-text="uploadProgress + '%'"`.
- **Success banner**: `x-show="uploadSuccess"` with green styling, e.g., "Files uploaded successfully."
- **Error banner**: `x-show="uploadError"` with red styling, displaying the validation/upload error message.

### 7. Preserve Existing Functionality
- Keep the existing "Safe Evidence Guidance" box and text.
- Keep the existing static "Case Reference Number" input in this tab (it remains non-Alpine unless the user wants it wired later).
- Keep Chart.js and all other tab content untouched.
- Maintain all Tailwind design tokens already in use.

## Phase 3: Track Case Enhancements (New Work)

### 1. Extend Alpine State for Case Lookup
Add to the existing `x-data` object:

```javascript
trackReferenceInput: '',
isSearching: false,
trackedCase: null,
searchError: ''
```

### 2. Mock Case Data
When lookup succeeds, populate `trackedCase` with:

```javascript
{
  reference: 'NCC-2026-00042',
  dateSubmitted: 'Aug 26, 2026',
  status: 'Under Investigation',
  assignedOfficer: 'Child Protection Unit — Lilongwe HQ',
  lastUpdated: '2 hours ago'
}
```

### 3. Search / Lookup Flow
- Input field bound to `trackReferenceInput` with `x-ref="trackInput"`.
- On form submit or button click:
  1. Set `isSearching = true`, clear `trackedCase` and `searchError`.
  2. If input is empty or shorter than expected (e.g., < 8 chars), set `searchError = 'Please enter a valid reference number'` and abort.
  3. Use `setTimeout` (~1 second) to simulate backend lookup.
  4. On completion, set `trackedCase` with mock data and `isSearching = false`.
- If user just submitted a complaint, pre-fill `trackReferenceInput` with `submittedRef`.

### 4. Case Status Timeline (Visual Component)
Render a 4-step vertical or horizontal timeline:

1. **Submitted** (Completed) — green check
2. **Under Review** (Completed) — green check
3. **In Investigation** (Active) — animated/pulsing indicator
4. **Case Resolved** (Pending) — grayed out

Implementation approach:
- Use a flex or grid layout with step circles and connecting lines.
- Active step gets a glowing ring animation (`animate-pulse` or custom CSS).
- Completed steps get a filled green circle with check icon.
- Pending steps get a gray outline circle.
- Connecting lines between steps are filled green up to the active step, gray after.

### 5. Action Buttons
- **"Download Report"**: Button that sets a brief loading state (`isDownloading = true`), then after `setTimeout` (~1s) shows an alert or toast: "Downloading PDF summary..."
- **"Contact Investigator"**: Button that either:
  - Opens a small inline contact panel/modal with helpline info (`116` and investigator details), or
  - Smooth-scrolls to a contact/helpline block on the page.

### 6. Preserve Existing Functionality
- Keep the existing static case card (NCC-2025-00847 example) as fallback or replace it with the dynamic `trackedCase` rendering.
- Keep the existing timeline list as fallback or replace with the new visual timeline.
- Keep Chart.js and all other tab content untouched.
- Maintain all Tailwind design tokens already in use.

## Phase 4: Security & Privacy Enhancements (New Work)

### 1. Anonymous Reporting Toggle
- Add `isAnonymous: false` to Alpine state.
- Add a toggle switch/checkbox at the top of the Reporter Information section: "Report Anonymously".
- When `isAnonymous` is `true`:
  - Smooth-slide/hide all personal reporter input fields (Your Name, Preferred Contact).
  - Clear bound model values (`reporter_name`, `preferred_contact`) so they are not submitted.
- Use `x-show` and `x-transition` for smooth hide/show animation.

### 2. Encryption & Trust Badges
- Display a security notice banner near the form submit button or top of the form:
  - Lock icon (`fa-lock`) + text: "Your data is encrypted end-to-end (256-bit SSL)".
  - Styled with a subtle green/blue left border and light background to match the existing design tokens.

### 3. Incognito / Sensitive Session Banner
- Add a subtle notice banner (e.g., just below the encryption badge or at the top of the form):
  - Text: "Private Mode Active — No local logs or session history will be retained on this device."
  - Use a muted gray/blue background with an icon (`fa-eye-slash` or similar).
  - This is a static informational banner (no actual incognito detection required for this phase unless specified).

### 4. Input Security Attributes
- Add the following attributes to all sensitive form fields:
  - `autocomplete="off"`
  - `data-lpignore="true"` (to prevent LastPass/1Password auto-fill)
- Apply to:
  - Reporter details: `reporter_name`, `preferred_contact`
  - Victim/child details: `child_name`, `child_age`, `district`, `village_ta`
  - Any other fields that may contain personally identifiable information.
- Ensure these attributes do not break existing `x-model` bindings or styling.

### 5. Preserve Existing Functionality
- Keep all existing Phase 1-3 functionality intact.
- Maintain all Tailwind design tokens and visual consistency.
- Keep Chart.js and other tabs untouched.

## Out of Scope
- Backend API integration for actual file uploads.
- Server-side file validation.
- Persistent storage of uploaded files.
- Changing the overall page layout or color scheme.

## Validation Steps
1. Open `resources/views/pages/reporting.blade.php`.
2. Verify Alpine.js component initializes without console errors.
3. **Tab switching**: All four tabs render and switch correctly.
4. **Phase 1 spot-check**: Existing validation and submission flow still works.
5. **Attach Evidence - Selection**:
   - Click drop zone → file picker opens.
   - Select mixed valid/invalid files → invalid files are rejected with inline error; valid files appear in list.
   - Drag files onto drop zone → same validation applies.
6. **Attach Evidence - Previews**:
   - Images show thumbnails.
   - Non-images show file icon.
   - File sizes are formatted correctly (MB/KB).
   - Remove button removes individual file from list.
7. **Attach Evidence - Upload simulation**:
   - With files selected, click "Upload Files" → progress bar advances smoothly to 100%.
   - Buttons are disabled during upload.
   - Success banner appears at 100%.
   - Attempting upload with no files shows error message.
8. **Track Case - Lookup**:
   - Enter empty/invalid reference → inline error shown.
   - Enter valid reference → 1s loading spinner → mock case data displayed.
   - If just submitted complaint, track input is pre-filled and auto-switched.
9. **Track Case - Timeline**:
   - 4 steps render with correct states (completed, active, pending).
   - Active step has animated indicator.
   - Connecting lines show progress correctly.
10. **Track Case - Actions**:
    - "Download Report" shows loading then alert/toast.
    - "Contact Investigator" opens contact panel or scrolls to helpline.
11. **Accessibility**:
    - Drop zone is keyboard accessible (click to open file picker).
    - Error messages are associated with controls where applicable.
    - Timeline and action buttons are keyboard navigable.
12. **Security & Privacy**:
    - Anonymous toggle hides/shows reporter fields smoothly and clears values.
    - Encryption badge and incognito banner are visible and styled correctly.
    - Sensitive inputs have `autocomplete="off"` and `data-lpignore="true"`.
    - No console errors from security attribute additions.

## Dependencies
- Alpine.js is already loaded globally in `layouts/app.blade.php`.
- Tailwind CSS is available via Vite.
- Font Awesome is available globally.
- No new dependencies required.
