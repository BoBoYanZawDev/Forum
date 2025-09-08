<?php

use App\Http\Controllers\Frontend\FollowingController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ThreadController;

// for home page threads
Route::get('/', [ThreadController::class,'index'])->name('thread.index');
Route::post('/', [ThreadController::class,'store'])->name('thread.store');
Route::get('/threads/{thread}/edit', [ThreadController::class,'edit'])->name('thread.edit');
Route::get('/threads/{thread}', [ThreadController::class,'show'])->name('thread.show');
Route::put('/threads/{thread}', [ThreadController::class,'update'])->name('thread.update');
Route::delete('/threads/{thread}', [ThreadController::class,'destroy'])->name('thread.destroy');

Route::get('/following',[FollowingController::class,'index'])->name('following.index');
Route::get('/trending',[FrontendController::class,'trending'])->name('following.index');
