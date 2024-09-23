<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'welcome']);

Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);

Route::resource("posts", PostsController::class);

// This works, trust me
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
