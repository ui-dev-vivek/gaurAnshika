<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('post/{slug}', [BlogController::class, 'showPost'])->name('post.show');
Route::get('tags/{slug}', [BlogController::class, 'showByTag'])->name('tags.show');
Route::get('categories/{slug}', [BlogController::class, 'showByCategory'])->name('categories.show');
