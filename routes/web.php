<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Livewire\Cms;
use \App\Http\Livewire\Tag;

Route::get('cms', Cms::class)->name('cms');
Route::get('tag', Tag::class)->name('tag');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('upload', 'App\Http\Controllers\UploadFileController@upload')
    ->name('upload');
