<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
});

Route::get('/aboutUs', function () {
    return view('user.aboutUs');
});

Route::get('/program', function () {
    return view('user.program');
});

Route::get('/contact', function () {
    return view('user.contact');
});
