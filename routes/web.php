<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::resource('/telegram', MessageController::class);
