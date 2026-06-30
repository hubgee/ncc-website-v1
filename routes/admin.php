<?php

use App\Http\Controllers\Admin\ContentBlockController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PageContentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/pages/{page:slug}/edit', [PageContentController::class, 'edit'])->name('pages.edit');
Route::put('/pages/{page:slug}', [PageContentController::class, 'update'])->name('pages.update');

Route::post('/pages/{page:slug}/blocks', [ContentBlockController::class, 'store'])->name('blocks.store');
Route::put('/blocks/{block}', [ContentBlockController::class, 'update'])->name('blocks.update');
Route::delete('/blocks/{block}', [ContentBlockController::class, 'destroy'])->name('blocks.destroy');

Route::post('/media', [MediaController::class, 'store'])->name('media.store');
Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');
