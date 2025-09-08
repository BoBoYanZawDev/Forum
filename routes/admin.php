<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\CategoryController;

// for category
Route::resource('categories', CategoryController::class);

// for tags
Route::resource('tags',TagController::class);