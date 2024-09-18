<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'welcome']);

Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);