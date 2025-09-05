<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ThreadController;

Route::get('/', [ThreadController::class, 'index'])->name('home');
