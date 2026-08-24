# Navigation Restructure Plan

## Goal
Restructure the header navigation in `resources/views/layouts/app.blade.php` so that:
- Desktop (lg+) navigation remains unchanged.
- Tablet and mobile screens use a hamburger menu containing ALL nav items and action buttons.
- The tablet icon-only nav is removed entirely.

## Current Behavior
| Breakpoint | Nav Items | Action Buttons | Menu Type |
|---|---|---|---|
| Desktop (lg+) | Full text links + Latest dropdown | Child Rights Corner, Report, Donate (inline) | Inline |
| Tablet (md–lg) | Icon-only links (Home, About, etc.) | Child Rights Corner, Report, Donate (inline) | Inline (icons) |
| Mobile (<md) | Text links in hamburger | Child Rights Corner, Report, Donate (inline, outside hamburger) | Hamburger |

## Target Behavior
| Breakpoint | Nav Items | Action Buttons | Menu Type |
|---|---|---|---|
| Desktop (lg+) | Unchanged | Unchanged | Inline |
| Tablet (md–lg) | All items in hamburger | All buttons in hamburger | Hamburger |
| Mobile (<md) | All items in hamburger | All buttons in hamburger | Hamburger |

## Required Edits

### Edit 1 — Desktop nav container (line 25)
Change the main nav container from showing on `md+` to showing only on `lg+`.

**Before:**
```html
<div class="hidden flex-1 items-center justify-end gap-10 lg:gap-10 md:flex">
```

**After:**
```html
<div class="hidden flex-1 items-center justify-end gap-10 lg:gap-10 lg:flex">
```

### Edit 2 — Remove tablet icon nav (lines 26–37)
Delete the entire icon-only navigation block that currently renders between md and lg.

**Remove:**
```html
<nav class="hidden md:flex lg:hidden items-center gap-15 text-red-700" aria-label="Main navigation">
    <a href="{{ route("home") }}" class="hover:text-emerald-700" aria-label="Home"><i class="fa-solid fa-house text-lg"></i></a>
    <a href="{{ route("about") }}" class="hover:text-emerald-700" aria-label="About"><i class="fa-solid fa-circle-info text-lg"></i></a>
    <a href="{{ route("what-we-do") }}" class="hover:text-emerald-700" aria-label="What we do"><i class="fa-solid fa-hand-holding-heart text-lg"></i></a>
    <a href="{{ route("resources") }}" class="hover:text-emerald-700" aria-label="Resources"><i class="fa-solid fa-file text-lg"></i></a>
    <a href="{{ route("advertise") }}" class="hover:text-emerald-700" aria-label="Advertise"><i class="fa-solid fa-bullhorn text-lg"></i></a>
</nav>
```

### Edit 3 — Simplify text nav visibility (line 38)
Since the parent container now only renders on `lg+`, the text nav no longer needs `hidden lg:flex`.

**Before:**
```html
<nav class="hidden lg:flex items-center gap-6 text-sm text-black">
```

**After:**
```html
<nav class="flex items-center gap-6 text-sm text-black">
```

### Edit 4 — Hamburger toggle container (lines 77–96)
Change visibility from `md:hidden` to `lg:hidden` and remove the action buttons (they will be inside the hamburger menu). Keep only the hamburger toggle button.

**Before:**
```html
<div class="flex items-center gap-2 md:hidden">
    <a href="{{ route("childrens-corner") }}" class="...">Child Rights Corner</a>
    <a href="{{ route("reporting") }}" class="...">Report a Case Now</a>
    <a href="{{ route("donate") }}" class="...">Donate</a>
    <button type="button" class="..." @click="open = !open" :aria-expanded="open" aria-label="Toggle navigation">
        <i class="fa-solid text-lg" :class="open ? 'fa-xmark' : 'fa-bars'"></i>
    </button>
</div>
```

**After:**
```html
<div class="flex items-center gap-2 lg:hidden">
    <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-slate-700 transition hover:bg-slate-100 hover:text-emerald-700" @click="open = !open" :aria-expanded="open" aria-label="Toggle navigation">
        <i class="fa-solid text-lg" :class="open ? 'fa-xmark' : 'fa-bars'"></i>
    </button>
</div>
```

### Edit 5 — Hamburger menu container and content (lines 99–119)
Change visibility from `md:hidden` to `lg:hidden` so it appears on both tablet and mobile. Add the three action buttons inside the `<nav>` element with consistent styling.

**Before:**
```html
<div class="border-t border-slate-200 px-4 pb-4 md:hidden" x-show="open" @click.away="open = false" x-transition>
    <nav class="mt-4 flex flex-col gap-3 text-sm text-slate-700">
        ...
    </nav>
</div>
```

**After:**
```html
<div class="border-t border-slate-200 px-4 pb-4 lg:hidden" x-show="open" @click.away="open = false" x-transition>
    <nav class="mt-4 flex flex-col gap-3 text-sm text-slate-700">
        <a href="{{ route("home") }}" class="hover:text-emerald-700">Home</a>
        <a href="{{ route("about") }}" class="hover:text-emerald-700">About</a>
        <div>
            <button @click="latestOpen = !latestOpen" class="flex items-center gap-1 hover:text-emerald-700">
                Latest <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>
            <div x-show="latestOpen" x-transition class="ml-4 mt-2 flex flex-col gap-2">
                <a href="{{ route("news") }}" class="hover:text-emerald-700">News</a>
                <a href="#" class="hover:text-emerald-700">Stories</a>
            </div>
        </div>
        <a href="{{ route("what-we-do") }}" class="hover:text-emerald-700">What we do</a>
        <a href="{{ route("resources") }}" class="hover:text-emerald-700">Resources</a>
        <a href="{{ route("advertise") }}" class="hover:text-emerald-700">Advertise</a>

        <div class="mt-4 flex flex-col gap-3">
            <a href="{{ route("childrens-corner") }}" class="flex items-center justify-center rounded-md border border-gray-300 px-4 py-3 text-sm font-semibold uppercase text-gray-800 transition hover:border-green-700 hover:text-green-700">
                <i class="fa-solid fa-child mr-2 text-red-600"></i>
                Child Rights Corner
            </a>
            <a href="{{ route("reporting") }}" class="flex items-center justify-center rounded-md bg-red-600 px-4 py-3 text-center font-semibold text-white transition hover:bg-red-700">
                Report a Case Now
            </a>
            <a href="{{ route("donate") }}" class="flex items-center justify-center rounded-md bg-red-600 px-4 py-3 text-center font-semibold text-white transition hover:bg-red-700">
                Donate
            </a>
        </div>
    </nav>
</div>
```

**Note:** The `href` for "News" in the Latest dropdown is also updated from `#` to `{{ route("news") }}` for consistency with the desktop version.

## Validation Steps
1. Open the site at `lg+` breakpoint (≥1024px): confirm desktop nav is unchanged with inline text links and action buttons.
2. Open at tablet breakpoint (768px–1023px): confirm the icon nav is gone, hamburger toggle is visible, and clicking it reveals a menu containing all nav links plus the three action buttons.
3. Open at mobile breakpoint (<768px): confirm hamburger toggle is visible and menu contains all nav links plus the three action buttons.
4. Verify the "Latest" dropdown works inside the hamburger menu on both tablet and mobile.
5. Verify `@click.away` closes the hamburger menu on both breakpoints.

## Out of Scope
- Footer navigation changes.
- Any new navigation partials or components (all nav remains in `app.blade.php`).
- Route definitions (all routes already exist in `routes/web.php`).
