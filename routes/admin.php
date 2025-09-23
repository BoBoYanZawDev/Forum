<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;

// for category
// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'is_admin']], function () {
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get("/dashboard", [DashboardController::class, 'index'])->name("dashboard");
    Route::resource('categories', CategoryController::class);

    // for tags
    Route::resource('tags', TagController::class);
});
