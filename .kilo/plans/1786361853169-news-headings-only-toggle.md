# News Page - Headings Only Toggle Plan

## Goal
Add a "Headings Only" toggle button to the "Related News" and "Latest News" sections in `resources/views/pages/news.blade.php`.

## Current State
- Alpine.js is already loaded globally in `resources/views/layouts/app.blade.php` (line 12: `<script src="//unpkg.com/alpinejs" defer></script>`)
- No conflicts with existing Alpine.js states on this page
- Both news sections use card layouts with `flex flex-col md:flex-row` containing an `<img>` and a text container

## Implementation Steps

### 1. Related News Section (lines 46–102)

**Add Alpine state to section container**
- Add `x-data="{ headingsOnly: false }"` to the `<section>` tag at line 46

**Restructure heading (lines 51–53)**
- Wrap the existing `<h1>` and the new toggle button in a flex container:
  ```html
  <div class="flex justify-between items-center gap-4">
      <h1 class="text-3xl md:text-3xl font-bold text-red-700">
          RELATED NEWS
      </h1>
      <!-- toggle button here -->
  </div>
  ```
- Remove the redundant `max-w-7xl mx-auto px-4` from the `<h1>` since the parent already constrains width

**Add toggle button**
```html
<button @click="headingsOnly = !headingsOnly"
        :class="headingsOnly ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border border-gray-300 hover:border-red-600 hover:text-red-600'"
        class="px-4 py-1.5 rounded-md text-sm font-semibold transition flex-shrink-0">
    <i class="fa-solid mr-1.5" :class="headingsOnly ? 'fa-list' : 'fa-images'"></i>
    <span x-text="headingsOnly ? 'Show All' : 'Headings Only'"></span>
</button>
```

**Hide images on toggle**
- Add `x-show="!headingsOnly"` to the three `<img>` tags at lines 64, 73, and 88

### 2. Latest News Section (lines 107–268)

**Extend existing Alpine state**
- Update line 112 `x-data` to include `headingsOnly: false`:
  ```html
  x-data="{ showMoreNews: false, tab: 'child-protection', mobileOpen: false, headingsOnly: false }"
  ```

**Restructure heading (lines 114–116)**
- Wrap the existing `<h2>` and toggle button in a flex container with `flex justify-between items-center gap-4`

**Add the same toggle button** (with `@click="headingsOnly = !headingsOnly"`)

**Hide images on toggle**
- Add `x-show="!headingsOnly"` to all six `<img>` tags at lines 164, 179, 194, 212, 226, and 240

### 3. Layout Behavior When Images Are Hidden
- Cards use `flex flex-col md:flex-row` with `overflow-hidden`
- Alpine.js `x-show` sets `display: none` on the `<img>`, which collapses the image in the flex layout
- The text sibling (`flex-1`) automatically expands to fill the available width
- No additional class changes needed on the card containers

### 4. Responsive Behavior
- The `flex justify-between items-center` heading wrapper works on all screen sizes
- The toggle button uses `flex-shrink-0` so it never collapses
- On mobile, if the heading text and button overflow, they will wrap naturally; the `gap-4` provides spacing

## Validation
1. Load the news page and confirm the toggle appears on the right side of both section headings
2. Click "Headings Only" in Related News — images should disappear, headings and excerpts remain
3. Click again — images should reappear
4. Repeat for Latest News section
5. Switch tabs in Latest News while toggle is active — tab switching should still work
6. Click "Load More" / "Show Less" while toggle is active — should work independently
7. Verify on mobile viewport (DevTools) that toggle remains accessible and layout holds

## Edge Cases
- `x-show` uses `display: none`, which correctly collapses flex children
- `overflow-hidden` on card parents does not interfere with hidden images
- No state naming conflicts with existing Alpine.js properties (`showMoreNews`, `tab`, `mobileOpen`)
- The `border-t-3` class on the red divider (line 49, 110) is invalid Tailwind but pre-existing; no change needed
