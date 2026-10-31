<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


// Home page: send visitors to the books list
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Books: all 7 resource routes
Route::resource('books', BookController::class);

// Authors and categories: everything except "show" (we do not need a detail page)
Route::resource('authors', AuthorController::class)->except(['show']);
Route::resource('categories', CategoryController::class)->except(['show']);
