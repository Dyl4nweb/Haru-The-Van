<?php

use App\Http\Controllers\VanRentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VanRentalController::class, 'index'])->name('landing');
