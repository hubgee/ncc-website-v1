<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', function () {
    return view('pages.what-we-do');
})->name('services');

Route::get('/childrens-corner', function () {
    return view('pages.childrens-corner');
})->name('childrens-corner');

Route::get('/reporting', function () {
    return view('pages.reporting');
})->name('reporting');

Route::get('/get-involved', function () {
    return view('pages.get-involved');
})->name('get-involved');
