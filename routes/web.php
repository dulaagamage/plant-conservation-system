<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/plants');
});

Route::get('/plants', function () {
    return view('plants');
});

Route::get('/plants/{id}', function ($id) {
    return view('plant-detail', compact('id'));
});
