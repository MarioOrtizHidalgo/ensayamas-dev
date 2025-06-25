<?php

use Illuminate\Support\Facades\Route;
use Src\admin\band\infrastructure\controllers\BandController;

Route::get('/register/band', [BandController::class, 'create'])->name('band.create');
Route::post('/create-band',  [BandController::class, 'store'])->name('band.store');