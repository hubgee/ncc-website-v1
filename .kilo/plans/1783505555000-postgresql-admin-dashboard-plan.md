# Plan: PostgreSQL Dynamic Content Admin Dashboard for NCC Website

## Current State
- Laravel 13.8, Tailwind v4, Vite, Alpine.js, Chart.js, Font Awesome 6
- All routes are anonymous closures in `routes/web.php`; no controllers, models, or admin infrastructure
- Only the default `users` migration exists
- All images are static in `public/images/` (30 files)
- `home.blade.php` contains hardcoded hero, updates, and news content
- `.env` has PostgreSQL credentials already configured (`DB_CONNECTION=pgsql`) but currently uses SQLite in practice
- Previous backend attempts broke links/styling; this plan preserves all existing Tailwind classes and route names

## Goal
Connect PostgreSQL, build a minimal admin dashboard to manage dynamic images, updates, and news starting with `home.blade.php`, without breaking existing CSS/JS or route structure.

## Key Decisions
1. **Auth**: Minimal custom admin auth — add `is_admin` boolean to existing `users` table. No Breeze/Jetstream to avoid asset/compilation conflicts.
2. **Images**: Existing `public/images/` stay untouched. New admin uploads go to `storage/app/public/uploads` and are served via `asset('storage/...')` after `php artisan storage:link`.
3. **Scope**: Phase 1 = `home.blade.php` only (hero, updates, news). Architecture supports all pages later.
4. **Validation**: jpg/png/webp only, 2MB max per image.
5. **Blade rule**: Never remove or rename existing CSS classes. Only replace inner content with `@forelse` loops and static fallbacks.

---

## Database Schema

### Table: `site_contents`
Single flat table for all dynamic content.

| Field | Type | Notes |
|-------|------|-------|
| `id` | bigint PK | auto-increment |
| `section` | varchar(100) | e.g. `home`, `about` |
| `type` | varchar(50) | e.g. `hero`, `update`, `news` |
| `title` | varchar(255) | nullable |
| `subtitle` | varchar(255) | nullable |
| `description` | text | nullable |
| `image_path` | varchar(255) | nullable |
| `accent_color` | varchar(50) | default `red` (for update cards) |
| `button_text` | varchar(100) | nullable |
| `button_url` | varchar(255) | nullable |
| `sort_order` | integer | default `0` |
| `is_published` | boolean | default `true` |
| `published_at` | timestamp | nullable |
| `timestamps` | | `created_at`, `updated_at` |

**Indexes**: `section`, `type`, composite `(is_published, sort_order)`.

### Table: `users` modification
Add `is_admin` boolean, default `false`, indexed. Use existing auth scaffolding.

---

## Routes

Append to `routes/web.php`. Do NOT remove or rename existing public routes.

```php
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\AdminMiddleware;

// Public auth routes (minimal)
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Protected admin routes
Route::middleware([AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/contents/{section}', [ContentController::class, 'index'])->name('contents.index');
    Route::post('/contents/{section}', [ContentController::class, 'store'])->name('contents.store');
    Route::put('/contents/{id}', [ContentController::class, 'update'])->name('contents.update');
    Route::delete('/contents/{id}', [ContentController::class, 'destroy'])->name('contents.destroy');
    Route::post('/contents/{id}/upload-image', [ContentController::class, 'uploadImage'])->name('contents.upload-image');
});
```

---

## Controllers & Validation

### `Admin\AuthController`
- `showLoginForm()`: return `admin.login` view
- `login()`: validate `email|required|email`, `password|required`; check `user->is_admin`; `Auth::login()`; redirect to `admin.dashboard`
- `logout()`: `Auth::logout(); return redirect()->route('admin.login')`

### `Admin\DashboardController`
- `index()`: count published contents by section + recent activity list; return `admin.dashboard`

### `Admin\ContentController`
- `index($section)`: load `SiteContent::where('section', $section)->where('is_published', true)->orderBy('sort_order')->get()`; return view with existing records + empty form
- `store($section)`: 
  - Validated fields: `title|nullable|string|max:255`, `subtitle|nullable|string|max:255`, `description|nullable|string`, `image|nullable|image|mimes:jpg,jpeg,png,webp|max:2048`, `accent_color|nullable|string|max:50|in:red,green,blue,yellow,purple,orange`, `button_text|nullable|string|max:100`, `button_url|nullable|url|max:255`, `sort_order|nullable|integer|min:0`
  - If image uploaded: store in `uploads` disk, set `image_path` to relative path
  - Save record
- `update($id)`: same validation; if new image uploaded, delete old file from storage, replace path
- `destroy($id)`: delete record and associated image file from `storage/app/public/uploads`; redirect back
- `uploadImage($id)`: AJAX upload handler; validates image; stores; returns JSON `{url: asset('storage/' . $path)}`
- `togglePublish($id)`: flips `is_published`; redirects back

---

## Blade Template Adjustments (home.blade.php)

**Constraint**: Keep every existing Tailwind class. Only change the tags that currently hold hardcoded data.

### 1. Hero Section
At top of `@section("content")`, add:
```blade
@php
    $hero = \App\Models\SiteContent::where('section', 'home')->where('type', 'hero')->where('is_published', true)->first();
    $heroImage = $hero && $hero->image_path ? asset('storage/' . $hero->image_path) : asset('images/hero-children.jpg');
@endphp
```
Replace the hero `img` background URL with `{{ $heroImage }}`.

### 2. Updates Section
Add before the grid:
```blade
@php
    $updates = \App\Models\SiteContent::where('section', 'home')->where('type', 'update')->where('is_published', true)->orderBy('sort_order')->get();
    $featured = $updates->first();
    $sidebar = $updates->slice(1);
@endphp
```

Replace the left panel with:
```blade
@if($featured)
    <div class="md:col-span-2 flex flex-col md:flex-row rounded-lg overflow-hidden shadow-lg">
        <div class="flex-1">
            <img src="{{ $featured->image_path ? asset('storage/' . $featured->image_path) : asset('images/vaccine.jpg') }}" alt="{{ $featured->title }}" class="w-full h-full object-cover">
        </div>
        <div class="bg-{{ $featured->accent_color ?? 'red' }}-600 text-white flex flex-col justify-between p-4 md:w-1/2">
            <div class="flex justify-start mb-4"><i class="fa-solid fa-kit-medical text-2xl"></i></div>
            <div>
                <h3 class="text-2xl font-bold mb-2">{{ $featured->title }}</h3>
                <p class="text-sm md:text-base mb-4">{{ $featured->description }}</p>
            </div>
            @if($featured->button_text && $featured->button_url)
                <a href="{{ $featured->button_url }}" class="underline text-sm hover:text-gray-200">{{ $featured->button_text }}</a>
            @endif
        </div>
    </div>
@else
    <!-- Keep original static left panel -->
    <div class="md:col-span-2 flex flex-col md:flex-row rounded-lg overflow-hidden shadow-lg">
        ...original static code...
    </div>
@endif
```

Replace the right panel with:
```blade
@if($sidebar->isNotEmpty())
    @php $s = $sidebar->first(); @endphp
    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
        <img src="{{ $s->image_path ? asset('storage/' . $s->image_path) : asset('images/Kids-Coding.jpg') }}" alt="{{ $s->title }}" class="w-full h-48 object-cover">
        <div class="p-6 flex flex-col justify-between flex-1">
            <div>
                <h3 class="text-2xl font-bold mb-2">{{ $s->title }}</h3>
                <p class="text-sm md:text-base mb-4">{{ $s->description }}</p>
            </div>
            @if($s->button_text && $s->button_url)
                <a href="{{ $s->button_url }}" class="underline text-sm text-green-700 hover:text-green-900">{{ $s->button_text }}</a>
            @endif
        </div>
    </div>
@else
    <!-- Keep original static right panel -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
        ...original static code...
    </div>
@endif
```

### 3. News Section
Replace the three `<article>` tags with:
```blade
@php
    $news = \App\Models\SiteContent::where('section', 'home')->where('type', 'news')->where('is_published', true)->orderBy('sort_order')->get();
@endphp
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($news as $article)
        <article class="overflow-hidden bg-white shadow rounded-[10px]">
            <img src="{{ $article->image_path ? asset('storage/' . $article->image_path) : asset('images/update-1.jpg') }}" alt="{{ $article->title }}" class="w-full h-70 object-cover rounded-t-[10px]">
            <div class="p-6">
                <h3 class="font-semibold text-xl">{{ $article->title }}</h3>
            </div>
        </article>
    @empty
        <!-- Original static article cards (copy exact markup here) -->
    @endforelse
</div>
```

**Important**: Do not alter any other page (`about.blade.php`, `what-we-do.blade.php`, `childrens-corner.blade.php`, `reporting.blade.php`) in this phase.

---

## Environment Setup

1. **PostgreSQL extension**: Verify `php_pgsql` and `php_pdo_pgsql` are enabled (`php -m | findstr pgsql` on Windows PowerShell: `php -m | Select-String pgsql`)
2. **Database**: Create `ncc_website` in pgAdmin or via `createdb`
3. **`.env`**: Already has correct `DB_CONNECTION=pgsql`, `DB_HOST=127.0.0.1`, `DB_PORT=5432`, `DB_DATABASE=ncc_website`, `DB_USERNAME=postgres`, `DB_PASSWORD=...`. Keep as-is.
4. **Storage**: Create `storage/app/public/uploads` directory; run `php artisan storage:link`
5. **Run migrations**: `php artisan migrate`
6. **Seed first admin**: Insert a user with `is_admin = true` (via seeder or tinker)
   ```php
   $user = \App\Models\User::first();
   $user->is_admin = true;
   $user->save();
   ```
7. **Clear caches**: `php artisan config:clear`, `php artisan route:clear`, `php artisan view:clear`

---

## Migration / Rollout Order

1. Create 2 migrations: `add_is_admin_to_users_table` + `create_site_contents_table`
2. Generate models and middleware (`SiteContent`, `AdminMiddleware`)
3. Build auth controllers + views
4. Build admin content CRUD views and controllers
5. Update `home.blade.php` with dynamic rendering and static fallbacks
6. Seed initial content from existing static markup (so site looks identical post-migration)
7. Run smoke tests

---

## Seed Data (Required for Zero Regression)

Insert these rows via a seeder so the site is visually unchanged immediately after migration:

| section | type | title | description | image_path | accent_color | sort_order |
|---------|------|-------|-------------|------------|--------------|------------|
| home | hero | null | null | null | red | 0 |
| home | update | TAKE ON TYPHOID | Typhoid vaccine being administered to children below 15 | null | red | 0 |
| home | update | CHILDREN IN TECH | Children in Tech highlights the growing involvement... | null | red | 1 |
| home | news | May 2025 – Parliament Passes Strengthened Child Protection Act | null | null | red | 0 |
| home | news | May 2025 – National Day of the African Child – Celebrations & Pledges | null | null | red | 1 |
| home | news | May 2025 – National Day of the African Child – Celebrations & Pledges | null | null | red | 2 |

Falling back to `public/images/...` when `image_path` is null preserves the current look.

---

## Files to Create

- `database/migrations/xxxx_xx_xx_xxxxxx_add_is_admin_to_users_table.php`
- `database/migrations/xxxx_xx_xx_xxxxxx_create_site_contents_table.php`
- `app/Models/SiteContent.php`
- `app/Http/Middleware/AdminMiddleware.php`
- `app/Http/Controllers/Admin/AuthController.php`
- `app/Http/Controllers/Admin/DashboardController.php`
- `app/Http/Controllers/Admin/ContentController.php`
- `resources/views/admin/login.blade.php`
- `resources/views/admin/dashboard.blade.php`
- `resources/views/admin/contents/index.blade.php`

## Files to Modify

- `routes/web.php`
- `resources/views/pages/home.blade.php`

---

## Validation Checklist

- [ ] `php artisan migrate` runs cleanly on PostgreSQL
- [ ] `php artisan tinker` → `DB::connection()->getPdo()` succeeds
- [ ] Admin login works for `is_admin = true` user; non-admin is redirected/403
- [ ] Existing public routes (`/`, `/about`, `/what-we-do`, `/childrens-corner`, `/reporting`) return 200 and identical styling
- [ ] Image upload via admin panel stores file in `storage/app/public/uploads` and creates DB record
- [ ] Uploaded images render on home page with `asset('storage/...')`
- [ ] Removing a record or its image reverts to static `public/images/...` fallback
- [ ] No broken Tailwind classes (compare rendered HTML before/after blade changes)
- [ ] `php artisan storage:link` symlink exists and `public/storage` is accessible

---

## Risks & Mitigations

| Risk | Mitigation |
|------|------------|
| Breaking existing CSS by changing Blade structure | Change only inner container content. Keep every Tailwind class string identical. Compare rendered HTML in browser DevTools before and after. |
| Asset path conflict between `asset()` and `Storage::url()` | Use explicit `asset('storage/' . $path)` for uploads and `asset('images/...')` for static fallbacks. Never use `Storage::url()` inside Blade. |
| PostgreSQL missing `pdo_pgsql` extension | Verify with `php -m` before running migrations. |
| Admin URLs being indexed | Add `<meta name="robots" content="noindex">` to admin layout. |
| Uploaded images with missing fallback | Always provide a static `public/images/...` fallback in Blade ternary. |

---

## Out of Scope (Explicitly)

- Changes to any page other than `home.blade.php` in this phase
- Rich text / WYSIWYG editor (use plain text for now)
- Multi-language / i18n
- Image cropping, resizing, or optimization
- Activity logging / audit trail
- Email notifications
- Front-end API / JSON endpoints
