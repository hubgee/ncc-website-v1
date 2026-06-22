<?php

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

