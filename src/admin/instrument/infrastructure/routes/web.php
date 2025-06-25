<?php

use Illuminate\Support\Facades\Route;
use Src\admin\instrument\infrastructure\controllers\InstrumentController;

Route::resource('/admin/instrument', InstrumentController::class);