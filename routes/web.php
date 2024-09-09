<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/migration_translation', function () {
    return view('app.translation');
});
Route::get('/markdown', function () {
    return view('app.markdown');
});
