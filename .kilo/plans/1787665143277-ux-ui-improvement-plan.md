# UX/UI Improvement Plan — NCC Website v1

## Summary of Current State
The NCC website is a Laravel + Tailwind v4 + Alpine.js prototype with 11 public pages, an admin panel, and a `SiteContent` CMS model. Content is largely hardcoded, forms are non-functional, and several files are dead/empty. The goal is to transform this into a realistic, interactive customer demo that simulates a live site.

---

## Phase 1 — Global Layout & Navigation (All Pages)

### 1.1 Cleanup Dead Code & Duplicate Includes
- **Remove empty files:** `resources/views/partials/navbar.blade.php`, `resources/views/partials/footer.blade.php`, `resources/views/welcome.blade.php`, `resources/views/pages/checkout.blade.php`
- **Deduplicate CDN loads:** Font Awesome 6, Alpine.js, and Chart.js are loaded in `layouts/app.blade.php` AND re-included via `@push('scripts')` on the Reporting page. Keep them only in the layout head.
- **Remove inline `<style>` blocks** from individual pages (`home`, `childrens-corner`, `donate`, `advertise`) and migrate custom keyframe animations into `resources/css/app.css`.

### 1.2 Accessibility Foundation
- Add **skip-to-content link** as the first focusable element in `layouts/app.blade.php`
- Add **active nav state** highlighting using `Request::routeIs()` in the header
- Add **ARIA labels** to all icon-only buttons (mobile toggle, carousel arrows, modal close buttons)
- Ensure all form inputs have associated `<label for>` and `id` attributes (currently missing on Reporting, Advertise, News, Resources forms)
- Add `role="alert"` and `aria-live="polite"` regions for form validation messages

### 1.3 Visual Polish
- Replace `animate-bounce` on headings with subtle `animate-pulse` or remove entirely (bounce is excessively distracting for a government/rights site)
- Standardize button styles across all pages into reusable Tailwind component classes
- Add **smooth page-load transitions** using Alpine `x-transition` on `<main>` content
- Implement a **loading skeleton** pattern for content cards while "data loads" (simulated with `setTimeout` for the demo)

---

## Phase 2 — Home Page (`home.blade.php`)

### 2.1 Hero Slider
- Replace pure-CSS crossfade with an **Alpine.js-driven slider** that includes:
  - Manual prev/next arrows
  - Dot pagination
  - Pause on hover
  - Auto-advance every 9s with reset on interaction
- Add a **scroll-down indicator** (animated chevron) at the bottom of the hero

### 2.2 Content Structure
- Extract the repeated **statistics block** (1,249+ children, etc.) into a Blade component `components/stat-card.blade.php`
- Replace hardcoded news card "Read More" links with a **modal or expandable preview** to simulate article detail pages
- Add a **"Featured Video"** embed section below the hero to match the Donate page pattern
- Fix the `@forelse` empty state in "moments that matter" — it currently renders 3 placeholder cards when no CMS content exists; use a single "Coming Soon" card instead

### 2.3 Action Buttons
- Convert the two action buttons into a **sticky mobile CTA bar** (visible only on `md:` and below) for faster access to Report/Donate

---

## Phase 3 — About Page (`about.blade.php`)

### 3.1 Tabbed Content
- Differentiate the Mandate/Mission/Vision tab content (currently identical copy-pasted blocks)
- Add **tab indicator animation** (sliding underline) using Alpine transitions
- Replace the vanilla JS tab script for Commissioners/Managers/Ex-Officials with **Alpine.js** for consistency

### 3.2 Biography Modals
- Convert inline `onclick` modal triggers to **Alpine modal components** with:
  - `x-data` modal state
  - Keyboard support (Esc to close)
  - Focus trap (first focusable element on open, return focus on close)
  - `x-transition` for open/close animation
  - Body scroll lock when open

### 3.3 Organogram
- Replace the static vertical org chart with a **responsive horizontal org chart** using CSS Grid or Flexbox
- Add hover tooltips with role/contact info

---

## Phase 4 — What We Do (`what-we-do.blade.php`)

### 4.1 Uncomment & Fix Services Tabs
- Uncomment the tabbed services section (lines 44–165) and wire it to the existing `x-data="{ tab: 'protection' }"`
- Add **icon + description + CTA button** for each service tab (Child Protection, Advocacy & Policy, Awareness, Capacity Building, Referral & Support, Research)
- Link each service to a **placeholder detail section** below the tabs

### 4.2 Program Cards
- Add hover **overlay with "Learn More" link** to each program card
- Add staggered **scroll-triggered fade-in** using IntersectionObserver (pattern already used on Donate page)

### 4.3 Remove Dead Animation
- Remove `animate-pulse` from the hero banner image (`what-we-do-banner.png`) — pulse implies loading state

---

## Phase 5 — Children's Corner (`childrens-corner.blade.php`)

### 5.1 Functional Activity Icons
- Convert the 7 activity icons (Quizzes, Games, Videos, Stories, Share Story, Share Drawing, Share Poem) into **interactive cards** with:
  - Click-to-expand modal showing sample content
  - For "Share Story/Drawing/Poem" — open a **demo submission form** (simulated)
  - For "Quizzes/Games/Videos/Stories" — show a **content gallery placeholder**

### 5.2 Child Rights Section
- Add **expandable accordion** for each right (Education, Participation, Protection, Healthy) with child-friendly language and illustrative icons
- Add a **"Test Your Knowledge"** mini-quiz placeholder with score feedback

### 5.3 Image Carousel
- Desktop marquee: add **pause/resume toggle button** and navigation dots
- Mobile carousel: add **slide counter** (e.g., "2 / 5")

### 5.4 Safety & Privacy
- Add a **child safety notice** banner: "This area is for kids. Ask a grown-up before sharing anything online."
- Add COPPA/privacy notice link in the footer specifically for this section

---

## Phase 6 — Reporting & Tracking (`reporting.blade.php`) — CRITICAL

### 6.1 Form Validation & Feedback
- Add **real-time inline validation** using Alpine.js:
  - Required field indicators (red asterisk + border)
  - Age validation (0–18 range)
  - Date picker max-date = today
  - Character count on description textarea (min 20, max 2000)
- Add **error summary** at top of form with `role="alert"`
- Add **success state** after "submission" (simulated with `setTimeout`):
  - Display generated reference number (e.g., `NCC-2026-00042`)
  - Show copy-to-clipboard button
  - Auto-switch to "Track Case" tab with the new reference pre-filled

### 6.2 Attach Evidence
- Add **file preview thumbnails** after drag-drop selection
- Add **remove file button** per file
- Show **upload progress bar** (simulated)
- Validate file size (20MB) and type client-side before "upload"

### 6.3 Track Case
- Wire the search input to **simulate a lookup** with loading spinner
- Show **case status timeline** with animated progress bar
- Add **"Download Report"** and **"Contact Investigator"** placeholder buttons

### 6.4 Security & Privacy Enhancements
- Add **encryption notice**: "Your data is encrypted end-to-end"
- Add **anonymous reporting toggle** that hides the reporter info fields
- Add **incognito mode indicator** for sensitive submissions
- Add `autocomplete="off"` and `data-lpignore="true"` on sensitive fields

---

## Phase 7 — Advertise (`advertise.blade.php`)

### 7.1 Inquiry Form
- Add **form sections with progress indicator** (Company Info → Campaign Details → Upload → Review)
- Add **pricing tiers** table (Bronze / Silver / Gold sponsorship packages with MWK amounts)
- Add **contact follow-up fields**: Contact Person Name, Phone, Email
- Add **terms & conditions checkbox** with link to modal
- Add **file upload preview** for ad artwork with image crop placeholder
- Add **submission confirmation** with reference number and "Our team will contact you within 48 hours"

### 7.2 Content Improvements
- Add **case studies / past partnerships** section with logos and testimonials
- Add **media kit download** button
- Replace hardcoded stats with CMS-managed content where possible

### 7.3 Sponsored Ads
- Sync the carousel data source with a **shared Blade component** (currently duplicated from What We Do)
- Add **ad label disclosure** ("Sponsored" badge) for transparency

---

## Phase 8 — Donate (`donate.blade.php`)

### 8.1 Donation Flow
- Add **custom amount input** alongside preset buttons (Mkw 2,000 / 5,000 / 10,000 / Custom)
- Add **donor information form** that appears after amount selection (Name, Email, Phone, Message)
- Add **in-memory receipt preview** before "submission"
- Add **recurring donation toggle** with frequency selector (Monthly / Quarterly / Annually)

### 8.2 Checkout Page
- Build `checkout.blade.php` as a **payment simulation page**:
  - Show selected amount and donor info summary
  - Provide **Mobile Money** (Airtel / TNM) and **Card** (Visa/Mastercard) simulation buttons
  - Show **processing spinner** then success state with receipt number
  - Add "Back to Donate" and "Download Receipt" buttons

### 8.3 Impact Section
- Fix carousel `perPage` logic — currently has conflicting desktop (auto-scroll) vs mobile (arrow navigation) behavior
- Add **donor wall / thank-you messages** carousel (simulated testimonials)

---

## Phase 9 — News (`news.blade.php`)

### 9.1 Article Detail Simulation
- Convert hardcoded article content into a **simulated article detail view**
- Add **breadcrumbs** (Home > News > Article Title)
- Add **social share buttons** (Facebook, Twitter/X, WhatsApp, Email) with share count placeholders
- Add **related articles** sidebar based on category tags

### 9.2 Category Filtering
- Wire the category tabs to **actually filter the visible cards** using Alpine.js `x-show` with category data attributes
- Add **active filter count badge**

### 9.3 Accessibility
- Fix headings-only toggle — currently images remain in DOM; use `x-show` properly or `aria-hidden`
- Add **estimated reading time** to each article card
- Add **print-friendly** button that triggers `window.print()`

---

## Phase 10 — Resources (`resources.blade.php`)

### 10.1 Search & Filter
- Wire search input to **real-time client-side filtering** using Alpine.js
- Wire filter buttons to **category filtering** with active state
- Add **no-results state** with "Contact us" fallback

### 10.2 Resource Cards
- Add **file metadata**: size, format, last updated date, page count
- Add **preview modal** that shows first page or document outline
- Add **recently viewed** horizontal scroll section at top
- Expand from 2 cards to at least **6 placeholder resources** across categories

---

## Phase 11 — Cross-Cutting Features

### 11.1 Notification System
- Add a **global toast notification** component (Alpine.js) for:
  - Form submission success
  - Newsletter subscription confirmation
  - Error messages
- Position: top-right on desktop, top-center on mobile
- Auto-dismiss after 5s with manual close button

### 11.2 Error & Maintenance Pages
- Create `resources/views/errors/404.blade.php` and `500.blade.php` extending the main layout
- Add **friendly illustrations** and "Go Home" / "Report Issue" buttons

### 11.3 Performance & SEO
- Add **lazy loading** to all below-fold images (some already have `loading="lazy"`, standardize)
- Add **preload** for hero images and fonts
- Add **Open Graph meta tags** in layout head (og:title, og:description, og:image)
- Add **structured data** (JSON-LD) for Organization and NewsArticle

### 11.4 Cookie & Privacy
- Add **cookie consent banner** on first visit with Accept / Decline / Settings
- Link to **Privacy Policy** and **Terms of Service** in footer
- Add **data retention notice** on the Reporting page

---

## Phase 12 — Admin Panel (Backend Simulation)

### 12.1 Content Management Simulation
- Add **inline editing preview** in admin that shows front-end render as you edit
- Add **image upload preview** with crop/scale simulation
- Add **publish scheduling** (date picker for future publish)

### 12.2 Dashboard Enhancements
- Add **recent activity log** table
- Add **quick action buttons** (Add Hero, Add News, Add Update)
- Add **system status** indicator (simulated: "All systems operational")

---

## Technical Debt & Refactoring

| Item | Action |
|---|---|
| Duplicate CDN scripts | Move to layout only, remove `@push` duplicates |
| Inline `<style>` blocks | Migrate to `resources/css/app.css` |
| Hardcoded statistics | Create `components/stat-block.blade.php` |
| Repeated carousel code (advertise/what-we-do) | Create `components/sponsored-carousel.blade.php` |
| Repeated modal code (about page) | Create `components/bio-modal.blade.php` |
| Empty `checkout.blade.php` | Implement as Phase 8.2 |
| `navbar.blade.php` / `footer.blade.php` empty | Delete |
| No error pages | Create 404.blade.php, 500.blade.php |
| No component structure | Create `components/` directory with reusable parts |

---

## Validation & Demo Checklist

Before customer presentation, verify:
1. [ ] All navigation links work and highlight active page
2. [ ] Forms show validation errors and success states
3. [ ] Drag-drop file upload shows preview
4. [ ] Case tracking returns simulated results
5. [ ] Donation flow: select amount → fill form → checkout → receipt
6. [ ] News category filters actually filter cards
7. [ ] Resource search filters documents in real-time
8. [ ] All modals close with Esc key and return focus
9. [ ] Mobile menu opens/closes smoothly
10. [ ] Page load transitions feel smooth (< 300ms)
11. [ ] No console errors in browser DevTools
12. [ ] Site is responsive at 320px, 768px, 1024px, 1440px breakpoints

---

## Open Decisions for Customer

1. **Payment Gateway:** Which provider should the checkout simulation mimic? (Airtel Money, TNM Mpamba, Stripe, PayPal?)
2. **User Accounts:** Should there be a public registration/login system for donors/reporters, or remain fully anonymous with reference numbers?
3. **Content Language:** Should the site support Chichewa/English toggle, or remain English-only for the prototype?
4. **Data Persistence:** For the demo, should form submissions store in session/localStorage, or remain purely client-side with no persistence?
