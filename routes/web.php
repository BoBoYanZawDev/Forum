<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Notifications\NewMessageNotification;

// routes/web.php
Route::get('/notifications', function () {
    return auth()->user()->notifications; // OR unreadNotifications
})->middleware('auth');

Route::get('/notify', function () {
    $user = User::find(11);
  $user->notify(new NewMessageNotification("You got a new message!"));
  return  'hit';
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
require __DIR__ . '/admin.php';
