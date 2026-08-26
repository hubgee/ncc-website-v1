# Navbar Redesign Plan

## Current State
`resources/views/layouts/app.blade.php:18-109` — single-tier sticky header with logo, nav links, action buttons, and hamburger menu all in one flex container.

## Goal
Split the header into two visually distinct sections while preserving all existing routes, Alpine.js behavior (`open`, `latestOpen`), and responsive collapse logic.

## Structure

### Top Section
- **Background**: `bg-emerald-800` — provides strong visual separation and aligns with NCC brand colors
- **Layout**: `flex items-center justify-between`
- **Left**: Logo (unchanged)
- **Right (lg+)**: Action button group — "Child Rights Corner", "Report a Case Now", "Donate"
- **Right (<lg)**: Hamburger toggle button
- **Padding**: `px-4 py-3 sm:px-6 lg:px-8`

### Bottom Section
- **Background**: `bg-white border-b border-slate-200`
- **Layout**: `flex items-center`
- **Left (lg+)**: Navigation links — "Home", "About", "Latest" (with dropdown), "What we do", "Resources", "Advertise"
- **Hidden**: Below `lg` (links move into mobile dropdown)
- **Padding**: `px-4 py-2 sm:px-6 lg:px-8`

### Mobile Dropdown (`lg:hidden`)
- **Visibility**: `x-show="open"`, `@click.away="open = false"`, `x-transition`
- **Contents**: All nav links + action buttons (same set as current mobile menu)
- **Background**: `bg-white border-t border-slate-200`

## Button Adjustments (Top Section on Dark Background)
- "Child Rights Corner": `border border-white/30 text-white hover:border-white hover:text-white`
- "Report a Case Now": `bg-red-600 text-white` (unchanged — works on dark)
- "Donate": `bg-red-600 text-white` (unchanged — works on dark)
- Hamburger icon: `text-white hover:bg-emerald-700`

## Responsive Behavior
- **Desktop (lg+)**: Top bar = logo + buttons; Bottom bar = nav links. No hamburger.
- **Tablet/Mobile (<lg)**: Top bar = logo + hamburger; Bottom bar hidden. Dropdown opens with all links + buttons.
- `latestOpen` dropdown continues to function in both desktop and mobile contexts.

## Implementation Tasks
1. Edit `resources/views/layouts/app.blade.php`
2. Replace the single inner `<div>` (line 20) with two sibling `<div>`s: top section and bottom section
3. Move action buttons into the top section
4. Move nav links into the bottom section
5. Update button and hamburger classes for dark-top-section contrast
6. Keep the mobile dropdown (lines 74-109) intact, ensuring it contains all links and buttons
7. Remove the `flex-1` and `justify-end` wrappers since layout is now split across two rows

## Validation
- Desktop: two distinct bars, correct left/right alignment
- Mobile: hamburger visible, bottom bar hidden, dropdown contains all content
- Test "Latest" dropdown on both breakpoints
- Verify all route links and hover states
