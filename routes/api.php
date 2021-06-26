<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::post('/develop', [MainController::class, 'develop']);