<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/what-we-do', function () {
    return view('pages.what-we-do');
})->name('what-we-do');

Route::get('/childrens-corner', function () {
    return view('pages.childrens-corner');
})->name('childrens-corner');

Route::get('/reporting', function () {
    return view('pages.reporting');
})->name('reporting');

Route::get('/resources', function () {
    return view('pages.resources');
})->name('resources');

Route::get('/donate', function () {
    return view('pages.donate');
})->name('donate');

Route::get('/advertise', function () {
    return view('pages.advertise');
})->name('advertise');

Route::get('/news', function () {
    return view('pages.news');
})->name('news');

Route::get('/latest-news', function () {
    return view('pages.latest-news');
})->name('latest-news');


Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware([AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/contents/{section}', [ContentController::class, 'index'])->name('contents.index');
    Route::post('/contents/{section}', [ContentController::class, 'store'])->name('contents.store');
    Route::get('/contents/{section}/{id}/edit', [ContentController::class, 'edit'])->name('contents.edit');
    Route::put('/contents/{section}/{id}', [ContentController::class, 'update'])->name('contents.update');
    Route::delete('/contents/{section}/{id}', [ContentController::class, 'destroy'])->name('contents.destroy');
    Route::post('/contents/{section}/{id}/toggle-publish', [ContentController::class, 'togglePublish'])->name('contents.toggle-publish');
    Route::post('/contents/{id}/upload-image', [ContentController::class, 'uploadImage'])->name('contents.upload-image');
});

