<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::resource('telegram.php', MessageController::class);
