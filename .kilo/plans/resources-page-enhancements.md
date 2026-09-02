# Resources Page Enhancements — Plan

**File:** `resources/views/pages/resources.blade.php`
**Goal:** Presentation-ready resource cards with metadata, preview modal, recently viewed, and expanded placeholder content. No backend changes.

## Design decisions (defaults chosen — user dismissed the clarifying questions)

1. **Preview modal** — For the 2 existing cards with real PDFs (NCC Act, NCC National Guidelines), render the document in an `<iframe>` using the existing `asset("resource/...")` URL. For the 4 new placeholder cards (no real document), show a "document outline" placeholder (title, description, faux page skeleton) so the modal UX is identical for every card.
2. **Recently viewed** — Track via `localStorage` key `ncc_recently_viewed` (array of resource IDs, max 10, most-recent first, deduplicated). Persists across sessions, per-device. Populated when a user clicks **View** or **Preview**.
3. **Category filters** — Client-side filtering via Alpine.js `x-data`. Each card carries a `data-category` attribute; clicking a filter button hides non-matching cards. "All" shows everything.
4. **Search** — Client-side text filter (title + description), wired to the existing search input via Alpine.

## Data: 6 resources (2 real + 4 placeholders)

| # | Title | Category | Has real PDF | Size | Pages | Updated |
|---|-------|----------|--------------|------|-------|---------|
| 1 | NCC Act | Acts | Yes (`resource/NCC-Act.pdf`) | 1.2 MB | 42 | 15 Jan 2026 |
| 2 | NCC National Guidelines | Guidelines | Yes (`resource/NCC NATIONAL GUIDELINES.pdf`) | 2.8 MB | 86 | 03 Mar 2026 |
| 3 | Child Protection Strategic Plan 2024–2029 | Strategic Policies | No | 3.1 MB | 120 | 22 Feb 2026 |
| 4 | Legal Instruments Compendium | Legal Instruments | No | 4.5 MB | 210 | 10 Dec 2025 |
| 5 | Stakeholder Engagement Toolkit | Stakeholder Tools | No | 1.8 MB | 64 | 08 Jan 2026 |
| 6 | Annual Child Welfare Report 2025 | Reports | No | 5.2 MB | 156 | 30 Mar 2026 |

## Structure of changes

### Alpine `x-data` on the outer wrapper
- `search: ''`
- `activeFilter: 'all'`
- `modalOpen: false`
- `modalResource: null`  (the selected resource object)
- `recentlyViewed: []`   (loaded from localStorage on init)
- `openPreview(resource)` — sets modal, pushes to recently viewed
- `closeModal()`
- `matchesSearch(card)` / `matchesFilter(card)` helpers
- `get filteredCards()` — computed
- `pushRecent(id)` / `loadRecent()` / `saveRecent()`

### New sections (in order)

1. **Recently viewed** — horizontal scroll row at the very top of the content area (only rendered when `recentlyViewed.length > 0`). Each item is a small card showing title + category, clickable to re-open the preview. Left/right overflow with `overflow-x-auto` and a subtle scrollbar.

2. **Search + Filters** — existing markup, but:
   - Search input gets `x-model="search"` and an icon.
   - Filter buttons get `@click="activeFilter = '…'"` and an `.active` style (emerald bg / white text) when matching `activeFilter`.

3. **Resource Cards grid** — expanded from 2 → 6 cards. Each card gains:
   - File metadata row: format badge (PDF), size, page count, last-updated date (with icons).
   - A **Preview** button alongside View / Download.
   - `data-category` attribute for filtering.
   - Placeholder cards: View + Download buttons are disabled / visually muted (no real file); Preview still works (shows outline placeholder).

### Preview modal
- Fixed fullscreen overlay (`z-50`), centered card, backdrop blur.
- Header: title, category badge, close button.
- Body (real PDF): `<iframe>` with `src` set to the asset URL, tall (80vh), rounded.
- Body (placeholder): document outline — title, description, metadata, and 3–4 faux "page" lines to evoke a document.
- Footer: Download button (real cards only) + View full link (real cards only).

### Styling
- Tailwind only (already in the stack). No new CSS files.
- Active filter: `bg-emerald-600 text-white` (vs default gray border).
- Cards use existing `bg-white shadow rounded-lg p-6 flex flex-col` pattern.
- Metadata row: `text-xs text-gray-500 flex flex-wrap gap-3 items-center`.

## Accessibility
- Modal: `role="dialog"`, `aria-modal="true"`, `aria-labelledby` pointing to the modal title. Focus moved to the modal on open (via `x-trap` if available, else `@keydown.escape.window="closeModal()"`).
- Filter buttons: `aria-pressed` reflecting active state.
- Recently viewed items: `<a>` with descriptive label.

## Out of scope (confirmed)
- No backend / DB / route changes.
- No real PDF rendering for placeholder cards.
- No actual download functionality for placeholder cards (buttons disabled).
- No pagination (6 cards fit in one grid).
