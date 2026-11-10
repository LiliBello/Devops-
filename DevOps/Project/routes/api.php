<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', [SiteController::class, 'index']);
Route::post('/register', [SiteController::class, 'register']);
