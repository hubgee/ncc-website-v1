<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [PageController::class, 'show'])->defaults('slug', 'about')->name('about');
Route::get('/what-we-do', [PageController::class, 'show'])->defaults('slug', 'what-we-do')->name('what-we-do');
Route::get('/childrens-corner', [PageController::class, 'show'])->defaults('slug', 'childrens-corner')->name('childrens-corner');
Route::get('/reporting', [PageController::class, 'show'])->defaults('slug', 'reporting')->name('reporting');

Route::get('/dashboard', function () {
    if (auth()->user()?->is_admin) {
        return redirect()->route('admin.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
